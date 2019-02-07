		<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

		class Holdings_model extends CI_Model 
		{
			public function __construct()
			{
				parent::__construct();
				$this->load->database();
			}

			public function get_users()
			{
				$query = $this->db->query('SELECT * from tblusers WHERE RoleID =2 or RoleID =3   ');
				return $query->result_array();
			}			

			public function get_serial()
			{
				$query = $this->db->query('SELECT DISTINCT a.HoldingsID, CASE WHEN a.Title = "" THEN b.SeriesStatement ELSE a.Title END AS Title FROM tblholdingscopy a LEFT JOIN tblholdings b ON b.HoldingsID = a.HoldingsID WHERE b.MaterialTypeID = 2 ');
				return $query->result_array();
			}

			public function get_volume()
			{
				$query = $this->db->query('SELECT DISTINCT HoldingsID, Title, Volume FROM `tblholdingscopy` WHERE CopyNumber IN ("1", "c1", "C1") AND Frequency != "" ORDER BY HoldingsID, Volume');
				return $query->result_array();
			}

			public function get_issue()
			{
				$query = $this->db->query('SELECT DISTINCT HoldingsID, Title, Volume, IssueNumber FROM `tblholdingscopy` WHERE CopyNumber IN ("1", "c1", "C1") AND Frequency != "" Order by HoldingsID, IssueNumber');
				return $query->result_array();
			}

			public function get_type()
			{
				$query = $this->db->query('SELECT * FROM tblmaterials ORDER BY MaterialTypeID');
				return $query->result_array();
			}

			public function get_source()
			{
				$query = $this->db->query('SELECT * FROM tblsources ORDER BY SourceID');
				return $query->result_array();
			}

			public function get_broadclass()
			{
				$query = $this->db->query('SELECT * FROM tblbroadclass ORDER BY BroadClassID');
				return $query->result_array();
			}

		

			public function get_language()
			{
				$query = $this->db->query('SELECT * FROM tbllanguage ORDER BY LanguageID');
				return $query->result_array();
			} 

			public function get_contenttype()
			{
				$query = $this->db->query('SELECT * FROM tblcontenttype ORDER BY ContentTypeID');
				return $query->result_array();
			}

			public function get_mediatype()
			{
				$query = $this->db->query('SELECT * FROM tblmediatype ORDER BY MediaTypeID');
				return $query->result_array();
			}

			public function get_carriertype()
			{
				$query = $this->db->query('SELECT * FROM tblcarriertype ORDER BY CarrierTypeID');
				return $query->result_array();
			}

			public function get_frontpage($holdings_id)
			{

				$sql = 'SELECT FrontPageLocation FROM tblfrontpage where HoldingsID =?';
				$query = $this->db->query($sql, $holdings_id);
				$result =  $query->row();

				if($query->num_rows()==0)
				{

					echo "";
				}


				else

				{
					return $result->FrontPageLocation;
				}     


			}

			public function get_frontpageid($holdings_id)
			{

				$sql = 'SELECT FrontPageID FROM tblfrontpage where HoldingsID=?';
				$query = $this->db->query($sql, $holdings_id);
				$result =  $query->row();

				if($query->num_rows()==0)
				{

					echo "";
				}


				else

				{
					return $result->FrontPageID;
				}     


			}

			public function get_frontpage_serials($acquisitions_id)
			{

				$sql = 'SELECT FrontPageLocation FROM tblfrontpage where AcquisitionID =? ';
				$query = $this->db->query($sql, $acquisitions_id );
				$result =  $query->row();

				if($query->num_rows()==0)
				{

					echo "";
				}


				else

				{
					return $result->FrontPageLocation;
				}     


			}


			public function get_frontpageid_serials($acquisitions_id)
			{

				$sql = 'SELECT FrontPageID FROM tblfrontpage where AcquisitionID=?';
				$query = $this->db->query($sql, $acquisitions_id);
				$result =  $query->row();

				if($query->num_rows()==0)
				{

					echo "";
				}


				else

				{
					return $result->FrontPageID;
				}     


			}

			public function get_accession_number($accession_number)
			{
				$sql = 'SELECT AccessionNumber FROM tblholdingscopy where AccessionNumber =?';
				$query = $this->db->query($sql, $accession_number);
				$result = $query->row();

				if($query->num_rows()==0)
				{
					echo "";
				}
			}

				public function get_material($materialID)
			{
				
				$this->db->select('MaterialType');
			    $this->db->from('tblmaterials');
			    $this->db->where('MaterialTypeID',$materialID);
			    return $this->db->get()->row()->MaterialType;



			}


			public function get_month()
    		{
	        $query = $this->db->query('SELECT * FROM tblmonths ORDER BY MonthID');
	        return $query->result_array();
	    	}



			public function author_get_data($holdings_id)
			{
				// $sql= 'SELECT a.HoldingsID, a.AuthorID, a.AuthorTag, CASE WHEN a.AuthorName LIKE "%$a%" THEN (CASE 
				// WHEN a.AuthorName LIKE "%$b%"
				// OR a.AuthorName LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.AuthorName,"$a",-1)),"$",1)
				// ELSE SUBSTRING_INDEX(a.AuthorName,"$a",-1) END) ELSE "" END AS AuthorName, CASE WHEN b.titlestatement LIKE "%$a%" THEN (CASE 
				// 	WHEN b.titlestatement LIKE "%$b%"
				// 	OR b.titlestatement LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(b.titlestatement,"$a",-1)),"$",1)
				// 	ELSE SUBSTRING_INDEX(b.titlestatement,"$a",-1) END) ELSE "" END AS Title from tblauthors a left join tblholdings b on a.HoldingsID=b.HoldingsID WHERE a.HoldingsID = ?';
				$sql= 'SELECT HoldingsID, AuthorID, AuthorTag, CASE WHEN AuthorName LIKE "%$a%" THEN (CASE 
				WHEN AuthorName LIKE "%$b%"
				OR AuthorName LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(AuthorName,"$a",-1)),"$",1)
				ELSE SUBSTRING_INDEX(AuthorName,"$a",-1) END) ELSE "" END AS AuthorName from tblauthors WHERE HoldingsID = ?';

					
				$query = $this->db->query($sql, $holdings_id);
				return $query->result();
			}

			public function subjects_get_data($holdings_id)
			{
				$sql = 'SELECT HoldingsID, SubjectID, SubjectType, CASE WHEN Subject LIKE "%$a%" THEN (CASE 
				WHEN Subject LIKE "%$x%"
				OR Subject LIKE "%$v%" OR Subject LIKE "%$y%" OR Subject LIKE "%$z%" OR Subject LIKE "%$c%" OR Subject LIKE "%$b%" OR Subject LIKE "%$d%" OR Subject LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(Subject,"$a",-1)),"$",1)
				ELSE SUBSTRING_INDEX(Subject,"$a",-1) END) ELSE "" END AS Subject   FROM tblsubjects WHERE HoldingsID = ? group by SubjectID';
				$query = $this->db->query($sql, $holdings_id);
				return $query->result();
			}

			public function multimedia_get_data($holdings_id)
			{
				$sql = 'SELECT MultimediaID, HoldingsID, FileName, FileLocation, Permission, FileType FROM tblmultimedia WHERE HoldingsID = ?';
				$query = $this->db->query($sql, $holdings_id);
				
			  
				return $query->result();
			}


			public function uncatalog_get_data()
			{
				$query = $this->db->query('SELECT DISTINCT a.HoldingsID, c.MaterialType  as MaterialType, d.AuthorID as AuthorID, CONCAT(CASE WHEN a.callnumber LIKE "%$a%" THEN (CASE WHEN a.callnumber LIKE "%$b%"OR a.callnumber LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.callnumber,"$a",-1)),"$",1) ELSE SUBSTRING_INDEX(a.callnumber,"$a",-1) END) ELSE "" END, " ", CASE WHEN a.callnumber LIKE "%$b%" THEN (CASE WHEN a.callnumber LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.callnumber,"$b",-1)),"$",1) ELSE SUBSTRING_INDEX(a.callnumber,"$b",-1) END) ELSE "" END, " ", CASE WHEN a.callnumber LIKE "%$c%" THEN SUBSTRING_INDEX(a.callnumber,"$c",-1) ELSE "" END) AS callnumber, CASE WHEN a.titlestatement LIKE "%$a%" THEN (CASE 
					WHEN a.titlestatement LIKE "%$b%"
					OR a.titlestatement LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.titlestatement,"$a",-1)),"$",1)
					ELSE SUBSTRING_INDEX(a.titlestatement,"$a",-1) END) ELSE "" END AS Title, a.CatalogNumber, a.CreatedAt FROM tblholdings a LEFT JOIN tblmaterials c on c.MaterialTypeID = a.MaterialTypeID LEFT JOIN tblauthors d on d.HoldingsID = a.HoldingsID where a.CatalogNumber="" and a.isActive=1  ORDER BY DATE(a.CreatedAt) DESC' );

				return $query->result();
			}


			public function publications_get_data($holdings_id)
			{
				$sql= 'SELECT HoldingsID, PublicationID, CASE WHEN Publication LIKE "%$a%" THEN (CASE WHEN Publication LIKE "%$b%"
				OR Publication LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(Publication,"$a",-1)),"$",1)
				ELSE SUBSTRING_INDEX(Publication,"$a",-1) END) ELSE "" END AS Publication, PublicationYear FROM tblpublications WHERE HoldingsID = ?';
				$query = $this->db->query($sql, $holdings_id);
				return $query->result();
			}



			public function holdingscopy_get_data($holdings_id)
			{
				$sql= 'SELECT a.HoldingsID, a.HoldingsCopyID, a.AcquisitionID, a.Title, a.CirculationNumber, a.AccessionNumber, b.MaterialTypeID,a.CopyNumber FROM tblholdingscopy a LEFT JOIN tblholdings b on a.HoldingsID=b.HoldingsID  WHERE a.HoldingsID = ?and a.isActive=1 ';
				$query = $this->db->query($sql, $holdings_id);
				return $query->result();
			}



			public function get_data()
			{
				$query = $this->db->query('SELECT DISTINCT a.HoldingsID, f.CirculationNumber, a.CatalogDate,   a.CreatedBy, c.MaterialType  as MaterialType, d.AuthorID as AuthorID, CONCAT(CASE WHEN a.callnumber LIKE "%$a%" THEN (CASE WHEN a.callnumber LIKE "%$b%"OR a.callnumber LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.callnumber,"$a",-1)),"$",1) ELSE SUBSTRING_INDEX(a.callnumber,"$a",-1) END) ELSE "" END, " ", CASE WHEN a.callnumber LIKE "%$b%" THEN (CASE WHEN a.callnumber LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.callnumber,"$b",-1)),"$",1) ELSE SUBSTRING_INDEX(a.callnumber,"$b",-1) END) ELSE "" END, " ", CASE WHEN a.callnumber LIKE "%$c%" THEN SUBSTRING_INDEX(a.callnumber,"$c",-1) ELSE "" END) AS callnumber, CASE WHEN a.titlestatement LIKE "%$a%" THEN (CASE 
					WHEN a.titlestatement LIKE "%$b%"
					OR a.titlestatement LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.titlestatement,"$a",-1)),"$",1)
					ELSE SUBSTRING_INDEX(a.titlestatement,"$a",-1) END) ELSE "" END AS Title, a.CatalogNumber, if(a.PublicationStatus=1, "Published", "Unpublished") as PublicationStatus , Count(DISTINCT(e.MultimediaID)) as counted FROM tblholdings a LEFT JOIN tblmaterials c on c.MaterialTypeID = a.MaterialTypeID LEFT JOIN tblauthors d on d.HoldingsID = a.HoldingsID LEFT JOIN tblmultimedia e on e.HoldingsID = a.HoldingsID LEFT JOIN tblholdingscopy f on f.HoldingsID=a.HoldingsID  where a.CatalogNumber !="" and a.isActive=1 group by a.HoldingsID order by a.CatalogDate desc ' );

				return $query->result();
			}


	public function generate_inventory($SortBy,$MaterialType,$FromDate, $ToDate)
			{

			$sql = 'SELECT DISTINCT b.HoldingsID, CONCAT(CASE WHEN b.callnumber LIKE "%$a%" THEN (CASE WHEN b.callnumber LIKE "%$b%"OR b.callnumber LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(b.callnumber,"$a",-1)),"$",1) ELSE SUBSTRING_INDEX(b.callnumber,"$a",-1) END) ELSE "" END, " ", CASE WHEN b.callnumber LIKE "%$b%" THEN (CASE WHEN b.callnumber LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(b.callnumber,"$b",-1)),"$",1) ELSE SUBSTRING_INDEX(b.callnumber,"$b",-1) END) ELSE "" END, " ", CASE WHEN b.callnumber LIKE "%$c%" THEN SUBSTRING_INDEX(b.callnumber,"$c",-1) ELSE "" END) AS callnumber,a.TemporaryLocation, CASE WHEN b.titlestatement LIKE "%$a%" THEN (CASE 
                    WHEN b.titlestatement LIKE "%$b%"
                    OR b.titlestatement LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(b.titlestatement,"$a",-1)),"$",1)
                    ELSE SUBSTRING_INDEX(b.titlestatement,"$a",-1) END) ELSE "" END AS Title, c.Author, CASE WHEN b.Edition LIKE "%$a%" THEN (CASE 
                    WHEN b.Edition LIKE "%$b%"
                    OR b.Edition LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(b.Edition,"$a",-1)),"$",1)
                    ELSE SUBSTRING_INDEX(b.Edition,"$a",-1) END) ELSE "" END AS Edition,  CASE WHEN d.Publication LIKE "%$a%" THEN (CASE 
				    WHEN d.Publication LIKE "%$b%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(d.Publication,"$a",-1)),"$b",1) 
				    ELSE SUBSTRING_INDEX(d.Publication,"$a",-1) END) ELSE "" END as PublicationPlace, d.PublicationYear as PublicationYear, a.CopyNumber as CopyNumber, e.BroadClass as BroadClass, a.AccessionNumber as AccessionNumber, f.Source as AcquisitionSource, a.DateAcquired as AcquisitionDate, b.HoldingsID as HoldingsID, a.CirculationNumber, g.InventoryDate as InventoryDate, g.Remarks as Remarks, (CASE ? WHEN 0 THEN b.callnumber WHEN 1 THEN b.titlestatement WHEN 2 THEN e.BroadClass WHEN 3 THEN a.HoldingsID WHEN 4 THEN g.CirculationNumber END) as OrdBy  FROM tblholdingscopy a left join tblholdings b  on a.HoldingsID=b.HoldingsID left join tblpublications d on d.HoldingsID=a.HoldingsID left join tblbroadclass e on e.BroadClassID=b.BroadClass left join tblsources f on f.SourceID=a.AcquisitionMode left join tblinventory g on g.CirculationNumber=a.CirculationNumber 
				    left join (SELECT a.HoldingsID, GROUP_CONCAT(CASE WHEN a.AuthorName LIKE "%$a%" THEN (CASE 
				    WHEN a.AuthorName LIKE "%$b%"
				    OR a.AuthorName LIKE "%$c%"
				    OR a.AuthorName LIKE "%$d%"
				    OR a.AuthorName LIKE "%$n%"
				    OR a.AuthorName LIKE "%$e%"
				    OR a.AuthorName LIKE "%$q%"
				    OR a.AuthorName LIKE "%$u%"THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.AuthorName,"$a",-1 )) ,"$",1 ) 
				    ELSE (SUBSTRING_INDEX((a.AuthorName),"$a",-1)) END) ELSE "" END SEPARATOR"/") as Author FROM tblauthors a left join tblholdingscopy b on b.HoldingsID=a.HoldingsID GROUP by b.AcquisitionID ) c on c.HoldingsID = a.HoldingsID WHERE  b.MaterialTypeID = ? AND a.DateAcquired BETWEEN ? AND ? ORDER BY OrdBy DESC'; 

		

				$query = $this->db->query($sql, array($SortBy, $MaterialType, $FromDate, $ToDate ));
				return $query->result();
			}


			public function generate_summary_report($MaterialTypeSum,$FromDate,$ToDate)

			{

				$sql = 'SELECT DISTINCT a.HoldingsID, c.BroadClass as BroadClass, COUNT(a.titlestatement) as Title, COUNT(b.AcquisitionID) as Copies,  YEAR(b.DateAcquired) as DateAcquired  from tblholdings a left join tblbroadclass c on c.BroadClassID=a.BroadClass left join tblholdingscopy b on a.HoldingsID=b.HoldingsID WHERE a.MaterialTypeID IN ? AND b.DateAcquired BETWEEN ? AND ? GROUP BY BroadClass,YEAR(b.DateAcquired)';
				$query = $this->db->query($sql, array($MaterialTypeSum,$FromDate,$ToDate));
				return $query->result();

			}

	


			public function books_get_data()
			{
			

				$query = $this->db->query('SELECT DISTINCT a.HoldingsID, a.CatalogDate, a.CreatedBy, f.CirculationNumber, c.MaterialType  as MaterialType, d.AuthorID as AuthorID, CONCAT(CASE WHEN a.callnumber LIKE "%$a%" THEN (CASE WHEN a.callnumber LIKE "%$b%"OR a.callnumber LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.callnumber,"$a",-1)),"$",1) ELSE SUBSTRING_INDEX(a.callnumber,"$a",-1) END) ELSE "" END, " ", CASE WHEN a.callnumber LIKE "%$b%" THEN (CASE WHEN a.callnumber LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.callnumber,"$b",-1)),"$",1) ELSE SUBSTRING_INDEX(a.callnumber,"$b",-1) END) ELSE "" END, " ", CASE WHEN a.callnumber LIKE "%$c%" THEN SUBSTRING_INDEX(a.callnumber,"$c",-1) ELSE "" END) AS callnumber, CASE WHEN a.titlestatement LIKE "%$a%" THEN (CASE 
					WHEN a.titlestatement LIKE "%$b%"
					OR a.titlestatement LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.titlestatement,"$a",-1)),"$",1)
					ELSE SUBSTRING_INDEX(a.titlestatement,"$a",-1) END) ELSE "" END AS Title, a.CatalogNumber, if(a.PublicationStatus=1, "Published", "Unpublished") as PublicationStatus , Count(DISTINCT(e.MultimediaID)) as counted FROM tblholdings a LEFT JOIN tblmaterials c on c.MaterialTypeID = a.MaterialTypeID LEFT JOIN tblauthors d on d.HoldingsID = a.HoldingsID LEFT JOIN tblmultimedia e on e.HoldingsID = a.HoldingsID LEFT JOIN tblholdingscopy f on f.HoldingsID=a.HoldingsID  where a.CatalogNumber !="" and a.isActive=1 and c.MaterialType="Books" group by a.HoldingsID ' );

				return $query->result();
			}

			public function nonprints_get_data()
			{


				$query = $this->db->query('SELECT DISTINCT a.HoldingsID, a.CatalogDate, a.CreatedBy, f.CirculationNumber, c.MaterialType  as MaterialType, d.AuthorID as AuthorID, CONCAT(CASE WHEN a.callnumber LIKE "%$a%" THEN (CASE WHEN a.callnumber LIKE "%$b%"OR a.callnumber LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.callnumber,"$a",-1)),"$",1) ELSE SUBSTRING_INDEX(a.callnumber,"$a",-1) END) ELSE "" END, " ", CASE WHEN a.callnumber LIKE "%$b%" THEN (CASE WHEN a.callnumber LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.callnumber,"$b",-1)),"$",1) ELSE SUBSTRING_INDEX(a.callnumber,"$b",-1) END) ELSE "" END, " ", CASE WHEN a.callnumber LIKE "%$c%" THEN SUBSTRING_INDEX(a.callnumber,"$c",-1) ELSE "" END) AS callnumber, CASE WHEN a.titlestatement LIKE "%$a%" THEN (CASE 
					WHEN a.titlestatement LIKE "%$b%"
					OR a.titlestatement LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.titlestatement,"$a",-1)),"$",1)
					ELSE SUBSTRING_INDEX(a.titlestatement,"$a",-1) END) ELSE "" END AS Title, a.CatalogNumber, if(a.PublicationStatus=1, "Published", "Unpublished") as PublicationStatus , Count(DISTINCT(e.MultimediaID)) as counted FROM tblholdings a LEFT JOIN tblmaterials c on c.MaterialTypeID = a.MaterialTypeID LEFT JOIN tblauthors d on d.HoldingsID = a.HoldingsID LEFT JOIN tblmultimedia e on e.HoldingsID = a.HoldingsID LEFT JOIN tblholdingscopy f on f.HoldingsID=a.HoldingsID  where a.CatalogNumber !="" and a.isActive=1 and c.MaterialType="Non-Prints" group by a.HoldingsID' );

				return $query->result();
			}

			public function investigatoryprojects_get_data()
			{


				$query = $this->db->query('SELECT DISTINCT a.HoldingsID, a.CatalogDate, a.CreatedBy, f.CirculationNumber, c.MaterialType  as MaterialType, d.AuthorID as AuthorID, CONCAT(CASE WHEN a.callnumber LIKE "%$a%" THEN (CASE WHEN a.callnumber LIKE "%$b%"OR a.callnumber LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.callnumber,"$a",-1)),"$",1) ELSE SUBSTRING_INDEX(a.callnumber,"$a",-1) END) ELSE "" END, " ", CASE WHEN a.callnumber LIKE "%$b%" THEN (CASE WHEN a.callnumber LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.callnumber,"$b",-1)),"$",1) ELSE SUBSTRING_INDEX(a.callnumber,"$b",-1) END) ELSE "" END, " ", CASE WHEN a.callnumber LIKE "%$c%" THEN SUBSTRING_INDEX(a.callnumber,"$c",-1) ELSE "" END) AS callnumber, CASE WHEN a.titlestatement LIKE "%$a%" THEN (CASE 
					WHEN a.titlestatement LIKE "%$b%"
					OR a.titlestatement LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.titlestatement,"$a",-1)),"$",1)
					ELSE SUBSTRING_INDEX(a.titlestatement,"$a",-1) END) ELSE "" END AS Title, a.CatalogNumber, if(a.PublicationStatus=1, "Published", "Unpublished") as PublicationStatus , Count(DISTINCT(e.MultimediaID)) as counted FROM tblholdings a LEFT JOIN tblmaterials c on c.MaterialTypeID = a.MaterialTypeID LEFT JOIN tblauthors d on d.HoldingsID = a.HoldingsID LEFT JOIN tblmultimedia e on e.HoldingsID = a.HoldingsID LEFT JOIN tblholdingscopy f on f.HoldingsID=a.HoldingsID  where a.CatalogNumber !="" and a.isActive=1 and c.MaterialType="Investigatory Projects" group by a.HoldingsID ' );



				return $query->result();
			}

			public function verticalfiles_get_data()
			{
				$query = $this->db->query('SELECT DISTINCT a.HoldingsID, a.CatalogDate, a.CreatedBy, f.CirculationNumber, c.MaterialType  as MaterialType, d.AuthorID as AuthorID, CONCAT(CASE WHEN a.callnumber LIKE "%$a%" THEN (CASE WHEN a.callnumber LIKE "%$b%"OR a.callnumber LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.callnumber,"$a",-1)),"$",1) ELSE SUBSTRING_INDEX(a.callnumber,"$a",-1) END) ELSE "" END, " ", CASE WHEN a.callnumber LIKE "%$b%" THEN (CASE WHEN a.callnumber LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.callnumber,"$b",-1)),"$",1) ELSE SUBSTRING_INDEX(a.callnumber,"$b",-1) END) ELSE "" END, " ", CASE WHEN a.callnumber LIKE "%$c%" THEN SUBSTRING_INDEX(a.callnumber,"$c",-1) ELSE "" END) AS callnumber, CASE WHEN a.titlestatement LIKE "%$a%" THEN (CASE 
					WHEN a.titlestatement LIKE "%$b%"
					OR a.titlestatement LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.titlestatement,"$a",-1)),"$",1)
					ELSE SUBSTRING_INDEX(a.titlestatement,"$a",-1) END) ELSE "" END AS Title, a.CatalogNumber, if(a.PublicationStatus=1, "Published", "Unpublished") as PublicationStatus , Count(DISTINCT(e.MultimediaID)) as counted FROM tblholdings a LEFT JOIN tblmaterials c on c.MaterialTypeID = a.MaterialTypeID LEFT JOIN tblauthors d on d.HoldingsID = a.HoldingsID LEFT JOIN tblmultimedia e on e.HoldingsID = a.HoldingsID LEFT JOIN tblholdingscopy f on f.HoldingsID=a.HoldingsID  where a.CatalogNumber !="" and a.isActive=1 and c.MaterialType="Vertical Files" group by a.HoldingsID' );

				return $query->result();
			}


				public function theses_get_data()
			{
				$query = $this->db->query('SELECT DISTINCT a.HoldingsID, a.CatalogDate, a.CreatedBy, c.MaterialType  as MaterialType, f.CirculationNumber, d.AuthorID as AuthorID, CONCAT(CASE WHEN a.callnumber LIKE "%$a%" THEN (CASE WHEN a.callnumber LIKE "%$b%"OR a.callnumber LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.callnumber,"$a",-1)),"$",1) ELSE SUBSTRING_INDEX(a.callnumber,"$a",-1) END) ELSE "" END, " ", CASE WHEN a.callnumber LIKE "%$b%" THEN (CASE WHEN a.callnumber LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.callnumber,"$b",-1)),"$",1) ELSE SUBSTRING_INDEX(a.callnumber,"$b",-1) END) ELSE "" END, " ", CASE WHEN a.callnumber LIKE "%$c%" THEN SUBSTRING_INDEX(a.callnumber,"$c",-1) ELSE "" END) AS callnumber, CASE WHEN a.titlestatement LIKE "%$a%" THEN (CASE 
					WHEN a.titlestatement LIKE "%$b%"
					OR a.titlestatement LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.titlestatement,"$a",-1)),"$",1)
					ELSE SUBSTRING_INDEX(a.titlestatement,"$a",-1) END) ELSE "" END AS Title, a.CatalogNumber, if(a.PublicationStatus=1, "Published", "Unpublished") as PublicationStatus , Count(DISTINCT(e.MultimediaID)) as counted FROM tblholdings a LEFT JOIN tblmaterials c on c.MaterialTypeID = a.MaterialTypeID LEFT JOIN tblauthors d on d.HoldingsID = a.HoldingsID LEFT JOIN tblmultimedia e on e.HoldingsID = a.HoldingsID LEFT JOIN tblholdingscopy f on f.HoldingsID=a.HoldingsID  where a.CatalogNumber !="" and a.isActive=1 and c.MaterialType="Theses/Dissertations" group by a.HoldingsID' );


				return $query->result();
			}

			public function serials_get_data()
			{
							$query = $this->db->query('SELECT DISTINCT a.HoldingsID, a.CatalogDate, a.CreatedBy, f.CirculationNumber, c.MaterialType  as MaterialType, d.AuthorID as AuthorID, CONCAT(CASE WHEN a.callnumber LIKE "%$a%" THEN (CASE WHEN a.callnumber LIKE "%$b%"OR a.callnumber LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.callnumber,"$a",-1)),"$",1) ELSE SUBSTRING_INDEX(a.callnumber,"$a",-1) END) ELSE "" END, " ", CASE WHEN a.callnumber LIKE "%$b%" THEN (CASE WHEN a.callnumber LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.callnumber,"$b",-1)),"$",1) ELSE SUBSTRING_INDEX(a.callnumber,"$b",-1) END) ELSE "" END, " ", CASE WHEN a.callnumber LIKE "%$c%" THEN SUBSTRING_INDEX(a.callnumber,"$c",-1) ELSE "" END) AS callnumber, CASE WHEN a.titlestatement LIKE "%$a%" THEN (CASE 
					WHEN a.titlestatement LIKE "%$b%"
					OR a.titlestatement LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.titlestatement,"$a",-1)),"$",1)
					ELSE SUBSTRING_INDEX(a.titlestatement,"$a",-1) END) ELSE "" END AS Title, a.CatalogNumber, if(a.PublicationStatus=1, "Published", "Unpublished") as PublicationStatus , Count(DISTINCT(e.MultimediaID)) as counted FROM tblholdings a LEFT JOIN tblmaterials c on c.MaterialTypeID = a.MaterialTypeID LEFT JOIN tblauthors d on d.HoldingsID = a.HoldingsID LEFT JOIN tblmultimedia e on e.HoldingsID = a.HoldingsID LEFT JOIN tblholdingscopy f on f.HoldingsID=a.HoldingsID  where a.CatalogNumber !="" and a.isActive=1 and c.MaterialType="serials" group by a.HoldingsID' );

				return $query->result();
			}

				public function reprints_get_data()
			{
							$query = $this->db->query('SELECT DISTINCT a.HoldingsID, a.CatalogDate, a.CreatedBy, f.CirculationNumber, c.MaterialType  as MaterialType, d.AuthorID as AuthorID, CONCAT(CASE WHEN a.callnumber LIKE "%$a%" THEN (CASE WHEN a.callnumber LIKE "%$b%"OR a.callnumber LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.callnumber,"$a",-1)),"$",1) ELSE SUBSTRING_INDEX(a.callnumber,"$a",-1) END) ELSE "" END, " ", CASE WHEN a.callnumber LIKE "%$b%" THEN (CASE WHEN a.callnumber LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.callnumber,"$b",-1)),"$",1) ELSE SUBSTRING_INDEX(a.callnumber,"$b",-1) END) ELSE "" END, " ", CASE WHEN a.callnumber LIKE "%$c%" THEN SUBSTRING_INDEX(a.callnumber,"$c",-1) ELSE "" END) AS callnumber, CASE WHEN a.titlestatement LIKE "%$a%" THEN (CASE 
					WHEN a.titlestatement LIKE "%$b%"
					OR a.titlestatement LIKE "%$c%" THEN SUBSTRING_INDEX((SUBSTRING_INDEX(a.titlestatement,"$a",-1)),"$",1)
					ELSE SUBSTRING_INDEX(a.titlestatement,"$a",-1) END) ELSE "" END AS Title, a.CatalogNumber, if(a.PublicationStatus=1, "Published", "Unpublished") as PublicationStatus , Count(DISTINCT(e.MultimediaID)) as counted FROM tblholdings a LEFT JOIN tblmaterials c on c.MaterialTypeID = a.MaterialTypeID LEFT JOIN tblauthors d on d.HoldingsID = a.HoldingsID LEFT JOIN tblmultimedia e on e.HoldingsID = a.HoldingsID LEFT JOIN tblholdingscopy f on f.HoldingsID=a.HoldingsID  where a.CatalogNumber !="" and a.isActive=1 and c.MaterialType="reprints" group by a.HoldingsID' );

				return $query->result();
			}

			public function holdings_edit($id)
			{
				$sql = 'CALL sp_holdings(?);';
				$query = $this->db->query($sql, $id);
				$res = $query->result();

				$query->next_result(); 
				$query->free_result();

				return $res;
			}

			public function publications_edit($id)
			{
				$sql = 'CALL sp_publications(?);';
				$query = $this->db->query($sql, $id);
				$res = $query->result();

				$query->next_result(); 
				$query->free_result();
 
				return $res;
			}

			public function holdingscopy_edit($id)
			{
				$sql = 'CALL sp_holdingscopy(?);';
				$query = $this->db->query($sql, $id);
				$res = $query->result();

				$query->next_result(); 
				$query->free_result();

				return $res;
			}
   
			public function authors_edit($id,$iAuthor)
			{
				$sql = 'CALL sp_authors(?, ?);';
				$query = $this->db->query($sql,array($id, $iAuthor));
				$res = $query->result();

				$query->next_result(); 
				$query->free_result();

				return $res;
			}

			public function subjects_edit($id,$iSubject)
			{
				$sql = 'CALL sp_subjects(?, ?);';
				$query = $this->db->query($sql,array($id, $iSubject));
				$res = $query->result();

				$query->next_result(); 
				$query->free_result();

				return $res;
			}

			public function indices_edit($id)
			{
				$sql = 'CALL sp_indices(?);';
				$query = $this->db->query($sql, $id);
				$res = $query->result();

				$query->next_result(); 
				$query->free_result();


				return $res;
			}


			public function update_indices_author($holdings_id, $Author)
			{	
				$this->db->set("Author", $Author);
				$this->db->where("HoldingsID", $holdings_id); 
				$this->db->update("tblindices");

				   
				 
				
			}

			public function update_indices_publications($holdings_id, $Publication)
			{	
				$this->db->set("Publisher", $Publication);
				$this->db->where("HoldingsID", $holdings_id); 
				$this->db->update("tblindices");
				 
				
			}



			public function update_indices_subjects($holdings_id, $Subjects)
			{	
				$this->db->set("Subjects", $Subjects);
				$this->db->where("HoldingsID", $holdings_id); 
				$this->db->update("tblindices");
				 
				
			}

 
			public function update_multimedia($multimedia_id, $Permission)
			{	

				
				$this->db->set("Permission", $Permission);
				$this->db->where("MultimediaID", $multimedia_id); 
				$this->db->update("tblmultimedia");
				 
				
			}


			public function check_subject($holdings_id)
			{

				$sql = 'SELECT Subjects from tblindices where HoldingsID = ?';
				$query =$this->db->query($sql,$holdings_id);
				return $query->result();


			}


			public function multimedia_edit($id)
			{


				$sql= 'SELECT HoldingsID, MultimediaID, FileName, FileType, FileLocation, Permission FROM tblmultimedia WHERE MultimediaID = ?';
				$query = $this->db->query($sql, $id);
				return $query->result();
			}


				public function frontpage_edit($id)
			{


				$sql= 'SELECT FrontPageID, HoldingsID, AcquisitionID, FrontPageName, FrontPageType, FrontPageLocation FROM tblfrontpage WHERE FrontPageID = ?';
				$query = $this->db->query($sql, $id);
				return $query->result();
			}


			public function update_subjects($subject_id, $updated_record)
			{
				$this->db->where("SubjectID", $subject_id);  
				$this->db->update("tblsubjects", $updated_record); 
			}

			public function update_authors($author_id, $updated_record)
			{
				$this->db->where("AuthorID", $author_id);  
				$this->db->update("tblauthors", $updated_record); 
			}

			public function update_publications($publication_id, $updated_record)
			{
				$this->db->where("PublicationID", $publication_id);  
				$this->db->update("tblpublications", $updated_record); 
			}

			public function update_holdingscopy($holdingscopy_id, $updated_record)
			{
				$this->db->where("HoldingsCopyID", $holdingscopy_id);  
				$this->db->update("tblholdingscopy", $updated_record); 
			}    

			public function update_holdings($holdings_id, $updated_record)
			{
				$this->db->where("HoldingsID", $holdings_id);  
				$this->db->update("tblholdings", $updated_record); 
			}


			public function update_frontpage($holdings_id, $updated_record)
			{
				$this->db->where("HoldingsID", $holdings_id);  
				$this->db->update('tblfrontpage', $updated_record); 
			}

			public function update_indices($holdings_id, $updated_record)
			{
				$this->db->where("HoldingsID", $holdings_id);  
				$this->db->update('tblindices', $updated_record); 
			}

			public function update_acquisitions($acquisitions_id, $acquisitions_record)

			{

				$this->db->where("AcquisitionID", $acquisitions_id);
				$this->db->update("tblacquisitions", $acquisitions_record);

			}

			public function update_inventory($circulation_number, $inventory_record)

			{
				$this->db->where("CirculationNumber", $circulation_number);
				$this->db->update("tblinventory", $inventory_record);

			}


			public function catalog_number($catno)
			{
				$sql = 'CALL sp_generatecatalog(?);';

				$query = $this->db->query($sql,array($catno)); 
				$result = $query->row();

				$query->next_result(); 
				$query->free_result(); 

				return $result;
			}

			public function create_publications($record)
			{
				return $this->db->insert('tblpublications', $record); 
			}

			public function create_authors($record)
			{
				return $this->db->insert('tblauthors', $record);    
			}

			public function create_subjects($record)
			{
				return $this->db->insert('tblsubjects', $record);    
			}

			public function create_multimedia($record)
			{
				return $this->db->insert('tblmultimedia', $record);    
			}
			public function create_indices($record)
			{
				return $this->db->insert('tblindices', $record); 
			}



			public function create_frontpage($record)
			{
				return $this->db->insert('tblfrontpage', $record); 
			}


				public function create_inventory($record)
			{
				return $this->db->insert('tblinventory', $record); 
			}

			public function delete_inventory($circ_num)
			{
				$this->db->where("CirculationNumber", $circ_num);  
				$this->db->delete("tblinventory"); 
			}

			public function delete_indices($index_id)
			{
				$this->db->where("indexID", $index_id);  
				$this->db->delete("tblindices"); 
			}

			public function delete_holdings($holdings_id, $holdings_record)
			{
				$this->db->where("HoldingsID", $holdings_id);  
				$this->db->update("tblholdings", $holdings_record); 
			}

			public function delete_authors($author_id)
			{
				$this->db->where("AuthorID", $author_id);  
				$this->db->delete("tblauthors"); 
			}

			public function delete_publications($publication_id)
			{
				$this->db->where("PublicationID", $publication_id);  
				$this->db->delete("tblpublications"); 
			}

			public function delete_holdingscopy($holdingscopy_id)
			{
				$this->db->where("HoldingsCopyID", $holdingscopy_id);  
				$this->db->delete("tblholdingscopy"); 
			}


			public function delete_subjects($subject_id)
			{
				$this->db->where("SubjectID", $subject_id);  
				$this->db->delete("tblsubjects"); 
			}

			public function delete_fulltext($multimedia_id,$attachment)
			{
				$this->db->where("MultimediaID", $multimedia_id);  
				unlink($attachment);
				$this->db->delete("tblmultimedia"); 
			}


			public function delete_frontpage($frontpage,$attachment,$thumbnail)
			{
				$this->db->where("FrontPageID", $frontpage);  
				unlink($attachment);
				unlink($thumbnail);
				$this->db->delete("tblfrontpage"); 
			}


			public function insert($data = array())
			{
				$insert = $this->db->insert_batch('files',$data);
				return $insert?true:false;
			}

			public function checkaccession($accessionnumber)
			{
				// $this->db->select('HoldingsCopyID');
				// $this->db->from('tblholdingscopy');
				// $this->db->where("accessionnumber", $accessionnumber);
				// return $num_results = $this->db->count_all_results();


				 $this->db->where('Accessionnumber',$accessionnumber);
			     $query = $this->db->get('tblholdingscopy');
			    if ($query->num_rows() > 0){
			        return true;
			    }
			    else{
			        return false;
			    }

				 
			}



			

		}

		?>