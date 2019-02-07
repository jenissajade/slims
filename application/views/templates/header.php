<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SLIMS</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>dist/css/skins/skin-blue.min.css">
	<!-- Date Picker -->
	<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
	<!-- iCheck for checkboxes and radio inputs -->
	<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/iCheck/all.css">
	<!-- Bootstrap Color Picker -->
	<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
	<!-- Bootstrap time Picker -->
	<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/timepicker/bootstrap-timepicker.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>bower_components/select2/dist/css/select2.min.css">
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>scripts/DataTables-1.10.16/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>scripts/DataTables-1.10.16/css/buttons.dataTables.min.css">
	<!-- iCheck for checkboxes and radio inputs -->
	<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/iCheck/all.css">
	<!-- JQuery UI -->
	<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>scripts/jquery-ui-1.12.1.custom/jquery-ui.min.css">
	<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/toastr.min.css">

	<!-- jQuery -->
	<script src="<?php echo base_url()."assets/"; ?>bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?php echo base_url()."assets/"; ?>scripts/jquery-ui-1.12.1.custom/jquery-1.12.4.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?php echo base_url()."assets/"; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- Select2 -->
	<script src="<?php echo base_url()."assets/"; ?>bower_components/select2/dist/js/select2.full.min.js"></script>
	<!-- InputMask -->
	<script src="<?php echo base_url()."assets/"; ?>plugins/input-mask/jquery.inputmask.js"></script>
	<script src="<?php echo base_url()."assets/"; ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
	<script src="<?php echo base_url()."assets/"; ?>plugins/input-mask/jquery.inputmask.extensions.js"></script>
	<!-- date-range-picker -->
	<script src="<?php echo base_url()."assets/"; ?>bower_components/moment/min/moment.min.js"></script>
	<script src="<?php echo base_url()."assets/"; ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
	<!-- bootstrap datepicker -->
	<script src="<?php echo base_url()."assets/"; ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<!-- bootstrap color picker -->
	<script src="<?php echo base_url()."assets/"; ?>bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
	<!-- bootstrap time picker -->
	<script src="<?php echo base_url()."assets/"; ?>plugins/timepicker/bootstrap-timepicker.min.js"></script>
	<!-- ckeditor -->
	<script src="<?php echo base_url()."assets/"; ?>bower_components/ckeditor/ckeditor.js"></script>
	<!-- DataTables -->
	<script src="<?php echo base_url()."assets/"; ?>scripts/datatables.min.js"></script>
	<!-- <script src="<?php echo base_url()."assets/"; ?>scripts/datatables.min.js"></script> -->
<!-- 	<script src="<?php echo base_url()."assets/"; ?>scripts/DataTables-1.10.16/js/jquery.dataTables.min.js"></script> -->
	<!-- Added for freeze -->
	<!-- <script src="<?php echo base_url()."assets/"; ?>scripts/DataTables-1.10.16/js/jquery.dataTables.min1.js"></script> -->
	<script src="<?php echo base_url()."assets/"; ?>scripts/DataTables-1.10.16/js/dataTables.fixedColumns.min.js"></script>
	

	<script src="<?php echo base_url()."assets/"; ?>scripts/DataTables-1.10.16/js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo base_url()."assets/"; ?>scripts/DataTables-1.10.16/js/dataTables.buttons.min.js"></script>
	<script src="<?php echo base_url()."assets/"; ?>scripts/DataTables-1.10.16/js/buttons.flash.min.js"></script>
	<script src="<?php echo base_url()."assets/"; ?>scripts/DataTables-1.10.16/js/jszip.min.js"></script>
	<script src="<?php echo base_url()."assets/"; ?>scripts/DataTables-1.10.16/js/pdfmake.min.js"></script>
	<script src="<?php echo base_url()."assets/"; ?>scripts/DataTables-1.10.16/js/vfs_fonts.js"></script>
	<script src="<?php echo base_url()."assets/"; ?>scripts/DataTables-1.10.16/js/buttons.html5.min.js"></script>
	<script src="<?php echo base_url()."assets/"; ?>scripts/DataTables-1.10.16/js/buttons.print.min.js"></script>
	<script src="<?php echo base_url()."assets/"; ?>scripts/DataTables-1.10.16/js/buttons.colVis.min.js"></script>
	<script src="<?php echo base_url()."assets/"; ?>scripts/DataTables-1.10.16/js/dataTables-rowsgroup.min.js"></script>

	<!-- iCheck 1.0.1 -->
	<script src="<?php echo base_url()."assets/"; ?>plugins/iCheck/icheck.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url()."assets/"; ?>dist/js/adminlte.min.js"></script>
	<!-- jquery.maskMoney -->
	<script src="<?php echo base_url()."assets/"; ?>scripts/jquery.maskMoney.js"></script>
	<!-- JQuery UI -->
	<script src="<?php echo base_url()."assets/"; ?>scripts/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<!-- Toast -->
	<script src="<?php echo base_url()."assets/"; ?>scripts/toastr.min.js"></script>

	<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>dist/css/bedlam.css">
	<link rel="icon" type="image/png" href="<?php echo base_url()."assets/"; ?>dist/img/favicon.ico" />

	<style type="text/css">
	.fa {
		width: 13px;
		height: 13px;
	}

	.redph.form-control::-webkit-input-placeholder {
		color: #B22222;
		opacity: 0.7;
	}

	.select2-container--default .select2-selection--single .select2-selection__placeholder {
		color: #B22222;
		opacity: 0.7;
	}

	.recolor:hover {
		color: #ffcc00;
	}

	td.details-control {
		background: url('../assets/scripts/DataTables-1.10.16/images/details_open.png') no-repeat center center;
		cursor: pointer;
	}
	tr.details td.details-control {
		background: url('../assets/scripts/DataTables-1.10.16/images/details_close.png') no-repeat center center;
	}

	.hidemodule {
		display: none;
	}

	.post-thumb {
		width: 15%; 
		margin: auto;;
	}

	.handhover { 
		cursor: pointer;
	}

	.chorva {
		background: #3c8dbc !important;
		color: #fff !important;
	}

</style>

<!-- Google Font -->
<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">  -->
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<header class="main-header">
			<!-- Logo -->
			<a href="<?php echo base_url()."admin/updateprofile"; ?>" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>SLIMS</span>
					<!-- logo for regular state and mobile devices -->
					<span class="logo-lg"><b>SLIMS</span>
					</a>
					<!-- Header Navbar: style can be found in header.less -->
					<nav class="navbar navbar-static-top">
						<!-- Sidebar toggle button-->
						<a href="<?php echo base_url()."assets/"; ?>#" class="sidebar-toggle" data-toggle="push-menu" role="button">
							<span class="sr-only">Toggle navigation</span>
						</a>

						<div class="navbar-custom-menu">
							<ul class="nav navbar-nav">

								<li class="dropdown messages-menu">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="fa fa-envelope-o"></i>
										<span class="label label-success" id="notifCount"><?php echo count($notifs) ?></span>
									</a>
									<ul class="dropdown-menu" id="aalnotf">
										<li class="header"><?php echo count($notifs) ?> New Inquiries </li>


										<li>
											<ul class="menu">

												<?php foreach($notifs as $notif): ?>
													<li>
														<a href='#'>
															<div class='pull-left'><img src="<?php echo base_url()."assets/"; ?>images/<?php echo $image ?>" class="user-image" alt="User Image"></div>
															<h4><?php echo $notif['InquiredBy']; ?><small><i class='fa fa-clock-o'></i><?php echo $notif['DateofInquiry']; ?></small></h4>
															<p><?php echo $notif['Subject']; ?></p>
														</a>
													</li>
												<?php endforeach; ?>

											</ul>
										</li>


										<li class="footer"><a href="#">View all</a></li>
									</ul>
								</li>

								<!-- User Account: style can be found in dropdown.less -->
								<li class="dropdown user user-menu">
									<a href="<?php echo base_url()."assets/"; ?>#" class="dropdown-toggle" data-toggle="dropdown">
										<img src="<?php echo base_url()."assets/"; ?>images/<?php echo $image ?>" class="user-image" alt="User Image">
										<span class="hidden-xs"><?php echo $user ?></span>
									</a>
									<ul class="dropdown-menu">
										<!-- User image -->
										<li class="user-header">
											<img src="<?php echo base_url()."assets/"; ?>images/<?php echo $image ?>" class="user-image" alt="User Image">

											<p>
												<?php echo $user ?> - Web Developer
												<small>Member since Nov. 2012</small>
											</p>
										</li>
										<!-- Menu Body -->
										<li class="user-body">
											<div class="row">
												<div class="col-xs-4 text-center">
													<a href="<?php echo base_url()."assets/"; ?>#">Followers</a>
												</div>
												<div class="col-xs-4 text-center">
													<a href="<?php echo base_url()."assets/"; ?>#">Sales</a>
												</div>
												<div class="col-xs-4 text-center">
													<a href="<?php echo base_url()."assets/"; ?>#">Friends</a>
												</div>
											</div>
											<!-- /.row -->
										</li>
										<!-- Menu Footer-->
										<li class="user-footer">
											<div class="pull-left">
												<a href="<?php echo base_url()."assets/"; ?>#" class="btn btn-default btn-flat">Profile</a>
											</div>
											<div class="pull-right">
												<a href="<?php echo base_url()."assets/"; ?>#" class="btn btn-default btn-flat">Sign out</a>
											</div>
										</li>
									</ul>
								</li>
							</ul>
						</div>
					</nav>
				</header>
				<!-- Left side column. contains the logo and sidebar -->
				<aside class="main-sidebar">
					<!-- sidebar: style can be found in sidebar.less -->
					<section class="sidebar">
						<!-- Sidebar user panel -->
						<div class="user-panel">
							<div class="pull-left image">
								<img src="<?php echo base_url()."assets/"; ?>images/<?php echo $image ?>" class="user-image" alt="User Image">
							</div>
							<div class="pull-left info">
								<p><?php echo $user ?></p>
								<!--  <a href="<?php echo base_url()."assets/"; ?>#"><i class="fa fa-circle text-success"></i> Online</a> -->
							</div>
						</div>

						<!-- sidebar menu: : style can be found in sidebar.less -->
						<ul class="sidebar-menu" data-widget="tree">
							<li class="header">MAIN NAVIGATION</li>
							<li class="treeview <?php echo $acquisition ?>">
								<a href="#">
									<i class="fa fa-book"></i> <span>Acquisition</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									<li><a href="<?php echo base_url()."acquisitions/new_acquisitions"; ?>"><i class="fa fa-plus-square"></i> New Acquisition</a></li>
									<li><a href="<?php echo base_url()."acquisitions/accession_book"; ?>"><i class="fa fa-book"></i> Accession Record Book</a></li>
									<li><a href="<?php echo base_url()."acquisitions/monitoring_serial"; ?>" style="letter-spacing:-0.5px;"><i class="fa fa-search-plus"></i> Monitoring of Serial Materials</a></li>
								</ul>
							</li>

							

							<li class="<?php echo $holdings ?>">
								<a href="<?php echo site_url('holdings/home');?>" >
									<i class="fa fa-book"></i> <span>Holdings</span>
								</a>
							</li>

							<li class="treeview">
								<a href="#">
									<i class="fa fa-book"></i> <span>Reports</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									<li><a href="<?php echo base_url()."holdings/reports"; ?>"><i class="fa fa-plus-square"></i> Inventory Report</a></li>
									<li><a href="<?php echo base_url()."holdings/reports2"; ?>"><i class="fa fa-book"></i> Acquisitions Report</a></li>
								</ul>
							</li>
							
							<li class="<?php echo $circulation ?>">
								<a href="<?php echo site_url('circulation/home');?>" >
									<i class="fa fa-book"></i> <span>Circulation</span>
								</a>
							</li>
						</ul>

						<ul class="sidebar-menu" data-widget="tree">
							<li class="header">ACCOUNT</li>
							<li class="treeview <?php echo $admin ?>">
								<a href="#">
									<i class="fa fa-users"></i> <span>Admin</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php echo $accounts ?>"><a href="<?php echo base_url()."admin/accounts"; ?>"><i class="fa fa-user-plus"></i> Account Management</a></li>
									<li class="<?php echo $others ?>"><a href="<?php echo base_url()."admin/groups"; ?>"><i class="fa fa-users"></i> Group Management</a></li>
									<li class="<?php echo $others ?>"><a href="<?php echo base_url()."admin/agencies"; ?>"><i class="fa fa-institution"></i> Member Agencies</a></li>
									<li class="<?php echo $others ?>"><a href="<?php echo base_url()."admin/modules"; ?>"><i class="fa fa-book"></i> Module Management</a></li>
									<li class="<?php echo $others ?>"><a href="<?php echo base_url()."admin/datalibrary"; ?>"><i class="fa fa-list"></i> Data Library</a></li>
									<li class="<?php echo $others ?>"><a href="<?php echo base_url()."admin/transactionlogs"; ?>"><i class="fa fa-gear"></i> Transaction Logs</a></li>
								</ul>
							</li>
							<li class="treeview">
								<a href="#">
									<i class="fa fa-gears"></i>
									<span>Accounts Settings</span>
									<span class="pull-right-container">
										<span class="fa fa-angle-left pull-right"></span>
									</span> 
								</a>
								<ul class="treeview-menu">
									<li><a href="<?php echo base_url()."admin/updateprofile"; ?>"><i class="fa fa-user"></i> Update Profile</a></li>
									<li><a href="<?php echo base_url()."admin/changepassword"; ?>"><i class="fa fa-lock"></i> Change Password</a></li>
								</ul>
							</li>
							<li>
								<a href="<?php echo site_url('login/logout');?>">
									<i class="fa fa-sign-out"></i> <span>Logout</span>
								</a>
							</li>
						</ul>
					</section>
					<!-- /.sidebar -->
				</aside>

				<style type="text/css">
				.disabled{
					pointer-events: none;
					cursor: default;  
					opacity: 0.3;
				}
			</style>

			<script type="text/javascript">
    /*
    * ------------------------------------------------------
    *  Navigation
    * ------------------------------------------------------
    */
    var url = window.location;
    // for sidebar menu entirely but not cover treeview
    $('ul.sidebar-menu a').filter(function() {
    	return this.href == url;
    }).parent().addClass('active');
    // for treeview
    $('ul.treeview-menu a').filter(function() {
    	return this.href == url;
    }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');

    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Date picker
      $('.datepicker').datepicker({
      	autoclose: true,
      	format: 'mm/dd/yyyy',
      })
  })

    //jquery.maskMoney
    $(function() {
    	$('.maskMoney').maskMoney();
    }) 

    // Toastr.js
    toastr.options = {
    	"progressBar": true,
    	"positionClass": "toast-bottom-right"
    }

    // Toastr Notifications
    if (localStorage.getItem("Success")){
    	toastr.success(localStorage.getItem("Success"));
    	localStorage.clear();
    } else if (localStorage.getItem("Error")){
    	toastr.error(localStorage.getItem("Error"));
    	localStorage.clear();
    }

</script>