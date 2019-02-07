<?php
	class Login extends CI_Controller 
	{
		public function __construct() 
		{
			parent::__construct();   
		} 

		public function index()
		{
			$this->load->view('admin/login');
		}

		public function login()
		{
			$data = array
			(
				'UserName' => $this->input->post('txtUsername'),
				'Password' => $this->input->post('txtPassword')
			);

			echo json_encode($this->Accounts_model->login($data));
		}

		public function logout()
		{
			$this->Accounts_model->logout();
			redirect('');
		}
	}
