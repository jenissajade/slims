<?php
class Reports_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_acquisitions($material, $mode, $user, $from, $to)
	{
		$this->db->select('a.AcquisitionID, a.HoldingsID, 
		CASE WHEN a.Title = "" THEN " " ELSE CONCAT(a.Title,". ") END AS Title, 

		CASE WHEN GROUP_CONCAT(c.AuthorName) IS NULL THEN " " ELSE CONCAT(GROUP_CONCAT(c.AuthorName SEPARATOR "yyyyyyy"), ". ") END AS Author, 

		CASE WHEN a.CopyNumber = "" THEN " " ELSE CONCAT(a.CopyNumber,". ") END as CopyNumber, 
		b.MaterialTypeID, CONCAT(f.Source,". ") AS Source,
      
        CASE WHEN d.Publication LIKE "%$a%" THEN (CASE 
        WHEN d.Publication LIKE "%$b%" THEN CONCAT(SUBSTRING_INDEX((SUBSTRING_INDEX(d.Publication,"$a",-1)),"$b",1),": ") 
        ELSE  CONCAT(SUBSTRING_INDEX(d.Publication,"$a",-1),": ")  END) ELSE " " END as PublicationPlace,

        CASE WHEN d.Publication LIKE "%$b%" THEN (CASE 
        WHEN d.Publication LIKE "%$c%" THEN CONCAT(SUBSTRING_INDEX((SUBSTRING_INDEX(d.Publication,"$b",-1)),"$",1),". ")
        ELSE CONCAT(SUBSTRING_INDEX(d.Publication,"$b",-1),". ") END) ELSE "" END as Publisher,
      	
      	CASE WHEN d.PublicationYear = "" THEN " " ELSE CONCAT(d.PublicationYear, ". ") END AS PublicationYear,
      
      	CASE WHEN b.CallNumber LIKE "%$a%" THEN (CASE 
        WHEN b.CallNumber LIKE "%$b%" 
        OR b.CallNumber LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(b.CallNumber,"$a",-1)),"$",1)
        ELSE SUBSTRING_INDEX(b.CallNumber,"$a",-1) END) ELSE "" END AS ClassificationNum,

        CASE WHEN b.CallNumber LIKE "%$b%" THEN (CASE 
        WHEN b.CallNumber LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(b.CallNumber,"$b",-1)),"$",1) 
        ELSE SUBSTRING_INDEX(b.CallNumber,"$b",-1) END) ELSE "" END as AuthorNum,

        CASE WHEN b.CallNumber LIKE "%$c%" THEN CONCAT("(", SUBSTRING_INDEX(b.CallNumber,"$c",-1), "). ") ELSE " " END as CopyrightDate,

        e.Volume, e.IssueNumber');
        $this->db->from('tblacquisitions a');
        $this->db->join('tblholdings b', 'b.HoldingsID = a.HoldingsID', 'left');
        $this->db->join('(SELECT HoldingsID, CASE 
		WHEN AuthorTag = 100 THEN (
            CASE WHEN AuthorName LIKE "%$a%" THEN (CASE 
            WHEN AuthorName LIKE "%$b%" 
            OR AuthorName LIKE "%$c%" 
            OR AuthorName LIKE "%$e%" 
            OR AuthorName LIKE "%$d%" 
            OR AuthorName LIKE "%$q%" 
            OR AuthorName LIKE "%$u%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(AuthorName,"$a",-1)),"$",1)
            ELSE SUBSTRING_INDEX(AuthorName,"$a",-1) END) ELSE "" END ) 
        
        WHEN AuthorTag = 110 THEN (
            CASE WHEN AuthorName LIKE "%$a%" THEN (CASE 
            WHEN AuthorName LIKE "%$b%"
            OR AuthorName LIKE "%$c%"
            OR AuthorName LIKE "%$d%"
            OR AuthorName LIKE "%$n%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(AuthorName,"$a",-1)),"$",1)
            ELSE SUBSTRING_INDEX(AuthorName,"$a",-1) END) ELSE "" END )
            
        WHEN AuthorTag = 700 THEN (
            CASE WHEN AuthorName LIKE "%$a%" THEN (CASE 
            WHEN AuthorName LIKE "%$b%" 
            OR AuthorName LIKE "%$c%" 
            OR AuthorName LIKE "%$e%" 
            OR AuthorName LIKE "%$d%" 
            OR AuthorName LIKE "%$q%" 
            OR AuthorName LIKE "%$u%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(AuthorName,"$a",-1)),"$",1)
            ELSE SUBSTRING_INDEX(AuthorName,"$a",-1) END) ELSE "" END )
            
        WHEN AuthorTag = 710 THEN (
            CASE WHEN AuthorName LIKE "%$a%" THEN (CASE 
            WHEN AuthorName LIKE "%$b%"
            OR AuthorName LIKE "%$c%"
            OR AuthorName LIKE "%$d%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(AuthorName,"$a",-1)),"$",1)
            ELSE SUBSTRING_INDEX(AuthorName,"$a",-1) END) ELSE "" END )
            
        ELSE "" END AS AuthorName FROM tblauthors) c', 'c.HoldingsID = a.HoldingsID', 'left');
        $this->db->join('tblpublications d', 'd.HoldingsID = a.HoldingsID', 'left');
        $this->db->join('tblholdingscopy e', 'e.AcquisitionID = a.AcquisitionID', 'left');
        $this->db->join('tblsources f', 'f.SourceID = e.AcquisitionMode', 'left');
		$this->db->where('a.IsActive', 1);
		$this->db->where('b.MaterialTypeID', $material);
		$this->db->where_in('e.AcquisitionMode', $mode);
		$this->db->where_in('a.CreatedBy', $user);
		$this->db->where('DATE_FORMAT(e.DateAcquired, "%m/%d/%Y") BETWEEN "'.$from.'" AND "'.$to.'"');
		$this->db->group_by('a.AcquisitionID');
		$this->db->order_by('b.CreatedAt', 'ASC');

		return $this->db->get()->result_array();	
	}

	public function get_materialtypes()
    {
        $query = $this->db->query('SELECT * FROM tblmaterials WHERE MaterialTypeID != 9 ORDER BY MaterialTypeID');
        return $query->result_array();
    }

    public function get_sources()
    {
        $query = $this->db->query('SELECT * FROM tblsources ORDER BY SourceID');
        return $query->result_array();
    }

    public function get_users()
    {
        $query = $this->db->query('SELECT * FROM tblusers ORDER BY UserID');
        return $query->result_array();
    }

	public function create_log($log_record)
	{
		$this->db->select('Transaction');
		$this->db->from('tbltransactiontypes');
		$this->db->where('TransactionID', $log_record['Transaction']);
		$query = $this->db->get();
		$result = $query->row();

		$log_record['Transaction'] = (string)$result->Transaction;

		return $this->db->insert('tbllogs_backend', $log_record); 
	}

	function relax()
	{
		;
	}
}
?>