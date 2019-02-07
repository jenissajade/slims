<?php
class Reports_controller extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct();   
		$this->load->model("Reports_model");
	} 

	public function index()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
		{
			redirect('');
		}

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

		$data['materials'] = $this->Reports_model->get_materialtypes();
		$data['sources'] = $this->Reports_model->get_sources();
		$data['users'] = $this->Reports_model->get_users();

		$page = array(
			'admin'  => $modules['admin'],
			'acquisition'  => $modules['acquisition'],
			'holdings'  => $modules['holdings'],
			'circulation'  => $modules['circulation'],
			'accounts' => $modules['accounts'],
			'others' => $modules['others'],
			'user' => $this->Accounts_model->get_session_data('LibrarianName'),
			'image' => $this->Accounts_model->get_session_data('Image'),
			'notifs' => $this->Accounts_model->get_notifs()
		); 

		$this->load->template('reports/reports', $data, $page);
	}

	public function load_pdf()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
		{
			redirect('');
		}

		$from = $this->session->userdata('from');
		$to = $this->session->userdata('to');
		$material = $this->session->userdata('material');
		$mode = $this->session->userdata('mode');
		$user = $this->session->userdata('user');

		$data['from'] = $this->session->userdata('from');
		$data['to'] = $this->session->userdata('to');
		$data['material'] = $this->session->userdata('material');
		$data['mode'] = $this->session->userdata('mode');
		$data['user'] = $this->session->userdata('user');

		$data['books'] = in_array(1, $material) ? $this->Reports_model->get_acquisitions(1, $mode, $user, $from, $to) : array();
		$data['serials'] = in_array(2, $material) ? $this->Reports_model->get_acquisitions(2, $mode, $user, $from, $to) : array();
		$data['theses'] = in_array(3, $material) ? $this->Reports_model->get_acquisitions(3, $mode, $user, $from, $to) : array();
		$data['nonprints'] = in_array(4, $material) ? $this->Reports_model->get_acquisitions(4, $mode, $user, $from, $to) : array();
		$data['verticals'] = in_array(5, $material) ? $this->Reports_model->get_acquisitions(5, $mode, $user, $from, $to) : array();
		$data['investigatories'] = in_array(6, $material) ? $this->Reports_model->get_acquisitions(6, $mode, $user, $from, $to) : array();
		$data['technicals'] = in_array(7, $material) ? $this->Reports_model->get_acquisitions(7, $mode, $user, $from, $to) : array();
		$data['reprints'] = in_array(8, $material) ? $this->Reports_model->get_acquisitions(8, $mode, $user, $from, $to) : array();

		$letters = array('a'=>'','b'=>'','c'=>'','d'=>'','e'=>'','f'=>'','g'=>'','h'=>'');
		$letter = 'A';
		$letters['a'] = count($data['books']) > 0 ? $letter++ . '.' : '';
		$letters['b'] = count($data['serials']) > 0 ? $letter++ . '.' : '';
		$letters['c'] = count($data['theses']) > 0 ? $letter++ . '.' : '';
		$letters['d'] = count($data['nonprints']) > 0 ? $letter++ . '.' : '';
		$letters['e'] = count($data['verticals']) > 0 ? $letter++ . '.' : '';
		$letters['f'] = count($data['investigatories']) > 0 ? $letter++ . '.' : '';
		$letters['g'] = count($data['technicals']) > 0 ? $letter++ . '.' : '';
		$letters['h'] = count($data['reprints']) > 0 ? $letter++ . '.' : '';

		$data['letter'] = $letters;

		$this->load->view('reports/acquisitionsreport', $data);

		// Get output html
        $html = $this->output->get_output();
        
        // Load pdf library
        $this->load->library('pdf');
        
        // Load HTML content
        $this->dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation
        $this->dompdf->setPaper('A4', 'portrait');
        
        // Render the HTML as PDF
        $this->dompdf->render();
        
        // Output the generated PDF (1 = download and 0 = preview)
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
	}

	public function load_acquisitions()
	{
		$data['acquisitions'] = $this->Reports_model->get_acquisitions();
		echo json_encode($data);
	}

	public function set_params()
	{
		$this->load->library('session');
		$this->session->set_userdata('material', $_POST['material']);
		$this->session->set_userdata('mode', $_POST['mode']);
		$this->session->set_userdata('user', $_POST['user']);
		$this->session->set_userdata('from', $_POST['from']);
		$this->session->set_userdata('to', $_POST['to']);
		echo json_encode(array("status" => TRUE));
	}

	function relax()
	{
		;
	}
}