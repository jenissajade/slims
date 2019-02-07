<?php
class Accounts_controller extends CI_Controller 
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

		$this->load->template('admin/accounts', $data, $page);
	}

	public function group_view()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
		{
			redirect('');
		}

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));
		
		$data['roles'] = $this->Accounts_model->get_roles_dropdown();
		$data['modules'] = $this->Accounts_model->get_modules_dropdown();
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

		$this->load->template('admin/groups', $data, $page);
	}

	public function agency_view()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
		{
			redirect('');
		}

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));
		
		$data['roles'] = $this->Accounts_model->get_roles_dropdown();
		$data['modules'] = $this->Accounts_model->get_modules_dropdown();
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

		$this->load->template('admin/agencies', $data, $page);
	}

	public function module_view()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
		{
			redirect('');
		}

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

		$data['modules'] = $this->Accounts_model->get_modules_dropdown();
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

		$this->load->template('admin/modules', $data, $page);
	}

	public function datalibrary_view()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
		{
			redirect('');
		}

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

		$data['modules'] = $this->Accounts_model->get_modules_dropdown();
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

		$this->load->template('admin/data-library', $data, $page);
	}

	public function transactionlogs_view()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
		{
			redirect('');
		}

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

		$data['modules'] = $this->Accounts_model->get_modules_dropdown();

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

		$this->load->template('admin/transaction-logs', $data, $page);
	}

	public function changepassword_view()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
		{
			redirect('');
		}

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));

		$data['username'] = $this->Accounts_model->get_session_data('UserName');
		$data['userid'] = $this->Accounts_model->get_session_data('UserID');

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

		$this->load->template('admin/change-password', $data, $page);
	}

	public function updateprofile_view()
	{
		if(!$this->Accounts_model->get_session_data('UserName'))
		{
			redirect('');
		}

		$modules = $this->load->disable_modules(explode(',', $this->Accounts_model->get_session_data('ModuleAssignment')), $this->Accounts_model->get_session_data('RoleID'));
		
		$data['username'] = $this->Accounts_model->get_session_data('UserName');
		$data['userid'] = $this->Accounts_model->get_session_data('UserID');
		$data['LibrarianName'] = $this->Accounts_model->get_session_data('LibrarianName');
		$data['position'] = $this->Accounts_model->get_session_data('Position');
		$data['email'] = $this->Accounts_model->get_session_data('Email');
		$data['faxno'] = $this->Accounts_model->get_session_data('FaxNo');
		$data['telno'] = $this->Accounts_model->get_session_data('TelNo');
		$data['officeaddress'] = $this->Accounts_model->get_session_data('OfficeAddress');

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

		$this->load->template('admin/update-profile', $data, $page);
	}

	public function load_user_table()
	{
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$records = $this->Accounts_model->get_users();

		$data = array();

		foreach($records as $r) 
		{
			$sub_array = array();
			
			$sub_array[] = $r->Role;
			$sub_array[] = '<a type="text" onclick="edit_record('."'".$r->UserID."'".')">'."".$r->Username."".'</a>';
			$sub_array[] = $r->AgencyCode;
			$sub_array[] = $r->GroupName;
			$sub_array[] = $r->Status;
			$sub_array[] = $r->CreatedAt;
			$data[] = $sub_array;
		}

		$output = array
		(
			"draw" => $draw,
			"recordsTotal" => count($records),
			"recordsFiltered" => count($records),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}

	public function load_group_table()
	{
	    	// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

	    	// Get records
		$records = $this->Accounts_model->get_groups();

		$data = array();

	    	// Store records into sub_array
		foreach($records as $r) 
		{
			$sub_array = array();
			
			$sub_array[] = '<a type="text" onclick="edit_record('."'".$r->GroupID."'".')">'."".$r->GroupName."".'</a>';
			$sub_array[] = $r->GroupType;
			$sub_array[] = $r->ValidDate;
			$sub_array[] = $r->Status;
			$data[] = $sub_array;
		}

	    	// Store everything into another array
		$output = array
		(
			"draw" => $draw,
			"recordsTotal" => count($records),
			"recordsFiltered" => count($records),
			"data" => $data
		);

	    	// Encode data
		echo json_encode($output);
		exit();
	}

	public function load_agency_table()
	{
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$records = $this->Accounts_model->get_agencies();

		$data = array();

		foreach($records as $r) 
		{
			$sub_array = array();
			
			$sub_array[] = '<a type="text" onclick="edit_record('."'".$r->AgencyID."'".')">'."".$r->AgencyCode."".'</a>';
			$sub_array[] = $r->AgencyName;
			$data[] = $sub_array;
		}

		$output = array
		(
			"draw" => $draw,
			"recordsTotal" => count($records),
			"recordsFiltered" => count($records),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}

	public function load_module_table()
	{
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$records = $this->Accounts_model->get_modules();

		$data = array();

		foreach($records as $r) 
		{
			$sub_array = array();
			
			$sub_array[] = '<a type="text" onclick="edit_record('."'".$r->ModuleID."'".')">'."".$r->ModuleID."".'</a>';
			$sub_array[] = $r->Module;
			$data[] = $sub_array;
		}

		$output = array
		(
			"draw" => $draw,
			"recordsTotal" => count($records),
			"recordsFiltered" => count($records),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}

	public function load_datalibrary_table()
	{
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$records = $this->Accounts_model->get_datalibraries($_POST['type']);

		$data = array();

		if($_POST['type'] >= 1 && $_POST['type'] <= 3)
		{
			foreach($records as $r) 
			{
				$sub_array = array();
				
				$sub_array['ID'] = '<a type="text" onclick="edit_record('."'".$r->ID."'".')">'."".$r->ID."".'</a>';
				$sub_array['Description'] = $r->Description;
				$data[] = $sub_array;
			}
		}
		else if ($_POST['type'] >= 4)
		{
			foreach($records as $r) 
			{
				$sub_array = array();
				
				$sub_array['ID'] = '<a type="text" onclick="edit_record('."'".$r->ID."'".')">'."".$r->ID."".'</a>';
				$sub_array['Code'] = $r->Code;
				$sub_array['Description'] = $r->Description;
				$data[] = $sub_array;
			}
		}
		

		$output = array
		(
			"draw" => $draw,
			"recordsTotal" => count($records),
			"recordsFiltered" => count($records),
			"data" => $data
		);

		echo json_encode($output);
		exit();
	}

	public function load_logs_table()
	{
    	// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

    	// Get records
		$records = $this->Accounts_model->get_logs();

		$data = array();

    	// Store records into sub_array
		foreach($records as $r) 
		{
			$sub_array = array();
			$sub_array[] = $r->ID;
			$sub_array[] = $r->Username;
			$sub_array[] = $r->Module;
			$sub_array[] = $r->ModuleFeature;
			$sub_array[] = $r->Transaction;
			$sub_array[] = $r->LogDate;
			$sub_array[] = $r->IP;

			$data[] = $sub_array;
		}

    	// Store everything into another array
		$output = array
		(
			"draw" => $draw,
			"recordsTotal" => count($records),
			"recordsFiltered" => count($records),
			"data" => $data
		);

    	// Encode data
		echo json_encode($output);
		exit();
	}

	public function create_user()
	{
		$validation = $this->validate_data('user', $this->input->post('requirepass'));

		if($validation['status'] == 'validation error')
		{
			echo json_encode($validation);
		}
		else
		{
			$user_record = array
			(
				'Username' => $this->input->post('txtUsername'),
			        // 'LibrarianName' => $this->input->post('txtLibrarianName'),
			        // 'Email' => $this->input->post('txtEmail'),
				'Password' => $this->input->post('txtPassword'),
				'RoleID' => $this->input->post('cboRole'),
				'GroupID' => $this->input->post('cboGroup'),
				'Agency' => $this->input->post('cboAgency'),
				'Status' => $this->input->post('cboStatus'),
				'CreatedBy' => $this->Accounts_model->get_session_data('UserName')
			);

			$create_user = $this->Accounts_model->create_user($user_record);
			echo json_encode($create_user);
		}
	}

	public function create_group()
	{
		$validation = $this->validate_data('group', null);

		if($validation['status'] == 'validation error')
		{
			echo json_encode($validation);
		}
		else
		{
			$this->input->post('txtValidDate') == "" ? $validdate = null : $validdate = date("Y/m/d", strtotime($this->input->post('txtValidDate')));
			$group_record = array
			(
				'GroupName' => $this->input->post('txtGroupname'),
				'GroupType' => $this->input->post('cboGroupType'),
				'Status' => $this->input->post('cboGroupStatus'),
				'ModuleAssignment' => $this->input->post('cboModule'),
				'Agency' => $this->input->post('cboAgency'),
				'ValidDate' => $validdate,
				'CreatedBy' => $this->Accounts_model->get_session_data('UserName')
			);

			$create_group = $this->Accounts_model->create_group($group_record);
			echo json_encode($create_group);
		}
	}

	public function create_agency()
	{
		$validation = $this->validate_data('agency', null);

		if($validation['status'] == 'validation error')
		{
			echo json_encode($validation);
		}
		else
		{
			$agency_record = array
			(
				'AgencyCode' => $this->input->post('txtAgencyCode'),
				'AgencyName' => $this->input->post('txtAgencyName'),
				'HomePage' => $this->input->post('txtHomePage'),
				'FaxNo' => $this->input->post('txtFaxNo'),
				'TelNo' => $this->input->post('txtTelNo'),
				'Agency_ID' => $this->input->post('txtAgency_ID'),
				'CreatedBy' => $this->Accounts_model->get_session_data('UserName')
			);

			$create_agency = $this->Accounts_model->create_agency($agency_record);
			echo json_encode($create_agency);
		}
	}

	public function create_module()
	{
		$validation = $this->validate_data('module', null);

		if($validation['status'] == 'validation error')
		{
			echo json_encode($validation);
		}
		else
		{
			$module_record = array
			(
				'Module' => $this->input->post('txtModuleName'),
				'CreatedBy' => $this->Accounts_model->get_session_data('UserName')
			);

			$create_module = $this->Accounts_model->create_module($module_record);
			echo json_encode($create_module);
		}
	}

	public function create_datalibrary()
	{
		$validation = $this->validate_data('datalibrary', null);

		$datalib = $this->input->post('cboDataLib');

		if($validation['status'] == 'validation error')
		{
			echo json_encode($validation);
		}
		else
		{
			if($datalib == "1")
			{
				$record = array
				(
					'MaterialType' => $this->input->post('txtDescription')
				);  
			}
			else if($datalib == "2")
			{
				$record = array
				(
					'Source' => $this->input->post('txtDescription')
				);
			}
			else if($datalib == "3")
			{
				$record = array
				(
					'BroadClass' => $this->input->post('txtDescription')
				);
			}
			else if($datalib == "4")
			{
				$record = array
				(
					'CarrierTypeTerm' => $this->input->post('txtDescription'),
					'CarrierTypeCode' => $this->input->post('txtCode')
				);
			}
			else if($datalib == "5")
			{
				$record = array
				(
					'ContentTypeTerm' => $this->input->post('txtDescription'),
					'ContentTypeCode' => $this->input->post('txtCode')
				);
			}
			else if($datalib == "6")
			{
				$record = array
				(
					'MediaTypeTerm' => $this->input->post('txtDescription'),
					'MediaTypeCode' => $this->input->post('txtCode')
				);
			}

			$create_record = $this->Accounts_model->create_datalibrary($record, $datalib);
			echo json_encode($create_record);
		}
	}

	public function update_user()
	{
		$validation = $this->validate_data('user', $this->input->post('requirepass'));

		if($validation['status'] == 'validation error')
		{
			echo json_encode($validation);
		}
		else
		{
			$account_record = array
			(
				'UserID' => $this->input->post('txtUserID'),
				'UserName' => $this->input->post('txtUsername'),
				'Password' => $this->input->post('txtPassword'),
				'RoleID' => $this->input->post('cboRole'),
				'GroupID' => $this->input->post('cboGroup'),
				'Agency' => $this->input->post('cboAgency'),
				'Status' => $this->input->post('cboStatus'),
				'ConfirmPass' => $this->input->post('txtPassword'),
				'UpdatedBy' => $this->Accounts_model->get_session_data('UserName'),
				'UpdatedAt' => date('Y-m-d H:i:s')
			);

			$update_user = $this->Accounts_model->update_user($account_record, FALSE);
			echo json_encode($update_user);
		}
	}

	public function update_group()
	{
		$validation = $this->validate_data('group', null);
		
		if($validation['status'] == 'validation error')
		{
			echo json_encode($validation);
		}
		else
		{
			$this->input->post('txtValidDate') == "" ? $validdate = null : $validdate = date("Y/m/d", strtotime($this->input->post('txtValidDate')));

			$group_record = array
			(
				'GroupID' => $this->input->post('txtGroupID'),
				'GroupName' => $this->input->post('txtGroupname'),
				'GroupType' => $this->input->post('cboGroupType'),
				'Status' => $this->input->post('cboGroupStatus'),
				'ModuleAssignment' => $this->input->post('cboModule'),
				'Agency' => $this->input->post('cboAgency'),
				'ValidDate' => $validdate,
				'UpdatedBy' => $this->Accounts_model->get_session_data('UserName'),
				'UpdatedAt' => date('Y-m-d H:i:s')
			);

			$update_group = $this->Accounts_model->update_group($group_record);
			echo json_encode($update_group);
		}
	}

	public function update_agency()
	{
		$validation = $this->validate_data('agency', null);
		
		if($validation['status'] == 'validation error')
		{
			echo json_encode($validation);
		}
		else
		{
			$agency_record = array
			(
				'AgencyID' => $this->input->post('txtAgencyID'),
				'AgencyCode' => $this->input->post('txtAgencyCode'),
				'AgencyName' => $this->input->post('txtAgencyName'),
				'HomePage' => $this->input->post('txtHomePage'),
				'FaxNo' => $this->input->post('txtFaxNo'),
				'TelNo' => $this->input->post('txtTelNo'),
				'Agency_ID' => $this->input->post('txtAgency_ID'),
				'UpdatedBy' => $this->Accounts_model->get_session_data('UserName'),
				'UpdatedAt' => date('Y-m-d H:i:s')
			);

			$update_agency = $this->Accounts_model->update_agency($agency_record);
			echo json_encode($update_agency);
		}
	}

	public function update_module()
	{
		$validation = $this->validate_data('module', null);
		
		if($validation['status'] == 'validation error')
		{
			echo json_encode($validation);
		}
		else
		{
			$module_record = array
			(
				'ModuleID' => $this->input->post('txtModuleID'),
				'Module' => $this->input->post('txtModuleName'),
				'UpdatedBy' => $this->Accounts_model->get_session_data('UserName'),
				'UpdatedAt' => date('Y-m-d H:i:s')
			);

			$update_module = $this->Accounts_model->update_module($module_record);
			echo json_encode($update_module);
		}
	}

	public function update_datalibrary()
	{
		$validation = $this->validate_data('datalibrary', null);

		$datalib = $this->input->post('cboDataLib');
		
		if($validation['status'] == 'validation error')
		{
			echo json_encode($validation);
		}
		else
		{
			if($datalib == "1")
			{
				$record = array
				(
					'MaterialTypeID' => $this->input->post('txtID'),
					'MaterialType' => $this->input->post('txtDescription')
				);  
			}
			else if($datalib == "2")
			{
				$record = array
				(
					'SourceID' => $this->input->post('txtID'),
					'Source' => $this->input->post('txtDescription')
				);
			}
			else if($datalib == "3")
			{
				$record = array
				(
					'BroadClassID' => $this->input->post('txtID'),
					'BroadClass' => $this->input->post('txtDescription')
				);
			}
			else if($datalib == "4")
			{
				$record = array
				(
					'CarrierTypeID' => $this->input->post('txtID'),
					'CarrierTypeCode' => $this->input->post('txtCode'),
					'CarrierTypeTerm' => $this->input->post('txtDescription')
				);
			}
			else if($datalib == "5")
			{
				$record = array
				(
					'ContentTypeID' => $this->input->post('txtID'),
					'ContentTypeCode' => $this->input->post('txtCode'),
					'ContentTypeTerm' => $this->input->post('txtDescription')
				);
			}
			else if($datalib == "6")
			{
				$record = array
				(
					'MediaTypeID' => $this->input->post('txtID'),
					'MediaTypeCode' => $this->input->post('txtCode'),
					'MediaTypeTerm' => $this->input->post('txtDescription')
				);
			}

			$udpate_record = $this->Accounts_model->update_datalibrary($record, $datalib);
			echo json_encode($udpate_record);
		}
	}

	public function delete_user($id)
	{
		$data = array
		(
			'Status' => 'inactive'
		);

		echo json_encode($this->Accounts_model->delete_user($id, $data));
	}

	public function delete_group($id)
	{
		echo json_encode($this->Accounts_model->delete_group($id));
	}

	public function delete_agency($id)
	{

		echo json_encode($this->Accounts_model->delete_agency($id));
	}

	public function delete_module($id)
	{

		echo json_encode($this->Accounts_model->delete_module($id));
	}

	public function delete_datalibrary($id)
	{

		echo json_encode($this->Accounts_model->delete_datalibrary($id, $this->input->post('cboDataLib')));
	}

	public function updateprofile()
	{
	    // $validation = $this->validate_data("updateprofile", null);

	    // if($validation['status'] == 'validation error')
	    // {
	    //   echo json_encode($validation);
	    // }
	    // else
	    // {

		$config['upload_path'] = './assets/images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '0';
		$config['max_width'] = '0';
		$config['max_height'] = '0';

		$this->load->library('upload', $config);

		if($this->upload->do_upload())
		{
			$data = array('upload_data' => $this->upload->data());
			$image = $_FILES['userfile']['name']; 
		}
		else
		{
			$errors = array('error' => $this->upload->display_errors());
			$image = 'noimage.png';
		}

		$data = array(
			'LibrarianID' => $this->input->post('txtUserID'),
			'LibrarianName' => $this->input->post('txtFullname'),
			'Position' => $this->input->post('txtPosition'),
			'Email' => $this->input->post('txtEmail'),
			'FaxNo' => $this->input->post('txtFaxNo'),
			'TelNo' => $this->input->post('txtTelNo'),
			'OfficeAddress' => $this->input->post('txtOfficeAddress'),
			'Image' => $image
		);

		$this->Accounts_model->update_profile($data);
		redirect('admin/updateprofile');
	    	// }
	}

	public function changepassword()
	{
	    	// Entry validation
		$validation = $this->validate_data('changepass', null);

		if($validation['status'] == 'validation error')
		{
			echo json_encode($validation);
		}
		else
		{
			$userpass = array(
				'UserName' => $this->input->post('txtUsername'),
				'Password' => $this->input->post('txtCurrentPass')
			);

			$data = array(
				'UserID' => $this->input->post('txtUserID'),
				'UserName' => $this->input->post('txtUsername'),
				'Password' => $this->input->post('txtNewPass'),
				'ConfirmPass' => $this->input->post('txtConfirmPass'),
				'UpdatedAt' => date('Y-m-d H:i:s')
			);

			$validate_user = $this->Accounts_model->login($userpass);
			if($validate_user['status'] == 'success')
			{
				echo json_encode($this->Accounts_model->change_password($data, TRUE));
			}
			else
			{
				echo json_encode(
					array(
						'status' => 'error',
						'message' => $validate_user['message']
					)
				);
			}
		}
	}

	public function get_user()
	{
		$output = array();

	    	// Get recrod via ID
		$data = $this->Accounts_model->get_user($_POST["id"]);
		    //print_r($data[0]->Salt);
		    // Save into array every fields
		foreach($data as $row)
		{
			$output['UserID'] = $row->UserID;
			$output['UserName'] = $row->UserName;   
			$output['LibrarianName'] = $row->LibrarianName;  
			$output['Position'] = $row->Position;
			$output['Email'] = $row->Email;  
			$output['FaxNo'] = $row->FaxNo;
			$output['TelNo'] = $row->TelNo;
			$output['OfficeAddress'] = $row->OfficeAddress;
			$output['RoleID'] = $row->RoleID; 
			$output['GroupID'] = $row->GroupID;  
			$output['Agency'] = $row->Agency;
			$output['Status'] = $row->Status;
		}

		echo json_encode($output);  
	} 

	public function get_group()
	{
		$output = array();

	    	// Get recrod via ID
		$data = $this->Accounts_model->get_group($_POST["id"]);
		
	    	// Save into array every fields
		foreach($data as $row)
		{
			$output['GroupID'] = $row->GroupID;
			$output['GroupName'] = $row->GroupName;   
			$output['GroupType'] = $row->GroupType;   
			$output['Status'] = $row->Status;  
			$output['ValidDate'] = $row->ValidDate; 
			$output['ModuleAssignment'] = $row->ModuleAssignment;  
			$output['Agency'] = $row->Agency;
		}

		echo json_encode($output);  
	} 

	public function get_agency()
	{
		$output = array();

	    	// Get recrod via ID
		$data = $this->Accounts_model->get_agency($_POST["id"]);
		
	    	// Save into array every fields
		foreach($data as $row)
		{
			$output['AgencyID'] = $row->AgencyID;
			$output['AgencyCode'] = $row->AgencyCode;   
			$output['AgencyName'] = $row->AgencyName;   
			$output['HomePage'] = $row->HomePage;  
			$output['FaxNo'] = $row->FaxNo; 
			$output['TelNo'] = $row->TelNo;  
			$output['Agency_ID'] = $row->Agency_ID;
		}

		echo json_encode($output);  
	}

	public function get_module()
	{
		$output = array();

	    	// Get recrod via ID
		$data = $this->Accounts_model->get_module($_POST["id"]);
		
	    	// Save into array every fields
		foreach($data as $row)
		{
			$output['ModuleID'] = $row->ModuleID;
			$output['Module'] = $row->Module;   
		}

		echo json_encode($output);  
	}

	public function get_datalibrary()
	{
		$output = array();

	    	// Get recrod via ID
		$data = $this->Accounts_model->get_datalibrary($_POST["id"], $_POST["type"]);
		
	    	// Save into array every fields
		foreach($data as $row)
		{
			$output['ID'] = $row->ID;
			$output['Description'] = $row->Description; 
			$output['Code'] = $row->Code;     
		}

		echo json_encode($output);  
	}

	public function validate_data($feature, $requirepass)
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = '';

		$ids = array();
		$errors = array();   

		if($feature == 'user')
		{
			$ids[] = 'txtUsername';
			$errors[] = 'Username';

				// $ids[] = 'txtEmail';
				// $errors[] = 'Email';

			if($requirepass == 'yes')
			{
				$ids[] = 'txtPassword';
				$errors[] = 'Password';
			}

			$ids[] = 'cboAgency';
			$errors[] = 'Agency';
			
			$ids[] = 'cboRole';
			$errors[] = 'Role';

			$ids[] = 'cboGroup';
			$errors[] = 'Group';

			$ids[] = 'cboStatus';
			$errors[] = 'Status';
		}

		if($feature == 'group')
		{
			$ids[] = 'txtGroupname';
			$errors[] = 'Group Status';

			$ids[] = 'cboGroupStatus';
			$errors[] = 'Group Name';

			$ids[] = 'cboGroupType';
			$errors[] = 'Group Type';

			$ids[] = 'cboModule';
			$errors[] = 'Module';

			$ids[] = 'cboAgency';
			$errors[] = 'Agency';
		}

		if($feature == 'agency')
		{
			$ids[] = 'txtAgencyCode';
			$errors[] = 'Agency Code';

			$ids[] = 'txtAgencyName';
			$errors[] = 'Agency Name';

			$ids[] = 'txtAgency_ID';
			$errors[] = 'Agency ID';
		}

		if($feature == 'module')
		{
			$ids[] = 'txtModuleName';
			$errors[] = 'Module Name';
		}

		if($feature == 'datalibrary')
		{
			$ids[] = 'txtDescription';
			$errors[] = 'This field';
		}

		    // if($feature == 'updateprofile')
		    // {
		    //   $ids[] = 'txtFullName';
		    //   $errors[] = 'Full Name';
		    // }

		if($feature == 'changepass')
		{
			$ids[] = 'txtCurrentPass';
			$errors[] = 'Current Password';

			$ids[] = 'txtNewPass';
			$errors[] = 'New Password';

			$ids[] = 'txtConfirmPass';
			$errors[] = 'Password Confirmation';
		}
		
		for($x = 0; $x < count($ids); $x++)
		{
			if($this->input->post($ids[$x])  == '' || $this->input->post($ids[$x])  == 'null'){
				$data['inputerror'][] = $ids[$x];
				$data['error_string'][] = $errors[$x] . ' is required.';
				$data['status'] = 'validation error';
			}
		}

		if($data['status'] === 'validation error'){
			return $data;
		}
	}

	public function create_log()
	{
		$log_record = array
		(
			'ID' => $this->input->post('txtName'),
			'Username' => $this->Accounts_model->get_session_data('UserName'),
			'Module' => 'Admin and Security',
			'ModuleFeature' => $this->input->post('modulefeature'),
			'Transaction' => $this->input->post('id'),
			'IP' => $this->input->ip_address()
		);

		$this->Accounts_model->create_log($log_record);
	}

	function relax()
	{
		;
	}
}