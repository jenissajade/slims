<?php
class Circulations_controller extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct();   
		$this->load->model("Accounts_model");
	} 

	public function index()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
		{
			redirect('');
		}

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

		$data['roles'] = $this->Accounts_model->get_roles_dropdown();
		$data['groups'] = $this->Accounts_model->get_groups_dropdown();
		$data['agencies'] = $this->Accounts_model->get_agencies_dropdown();

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

		$this->load->template('circulation/circulation', $data, $page);
	}
}