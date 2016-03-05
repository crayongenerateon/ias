<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>SAKTI <?php echo isset($title) ? ' | ' . $title : null; ?></title>
	<link rel="shortcut icon" href="<?php echo base_url('media/ico/sakti.png') ?>" width="100px">

	<link href="<?php echo base_url('media/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('media/css/ionicons.min.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('media/css/style-dashboard.css') ?>" rel="stylesheet" type="text/css">

	<script src="<?php echo base_url('media/js/jquery-1.11.1.min.js') ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('media/js/bootstrap.min.js') ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('media/js/slide.js') ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('media/js/template.js') ?>" type="text/javascript"></script>

</head>

<body <?php echo isset($ngapp) ? $ngapp : null;?>>

	<nav class="navbar navbar-default navbar-fixed-top navsu">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed">
					MENU
				</button>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href=""><font color="#333"><h3 class="hidden-xs" style="margin:4px 10px 0px 0px;"><img src="<?php echo base_url('media/ico/sakti2.png') ?>" width="60%"></h3></font></a>
				<a href=""><font color="#333"><h2 class="hidden-lg hidden-md hidden-sm" style="margin:10px 10px 10px 100px;">Sakti</h2></font></a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?php echo site_url('manage');?>"><span class="ion-ios-home ionst"></span> Home</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							<?php echo $this->session->userdata('s_full_name'); ?>
							<img src="<?php echo base_url('media/img/people.png');?>" class="img-pe img-circle">
							<span class="caret ionsh"></span></a>
							<ul class="dropdown-menu drome" role="menu">
								<li class="liaprofile">
									<a href="<?php echo site_url('manage/profile');?>"><span class="ion-person"></span> Profile</a></li>
									<li class="divider divide"></li>
									<li class="lialogout"><a href="<?php echo site_url('manage/auth/logout');?>"><span class="ion-log-out"></span> Logout</a></li>
								</ul>
							</li>
						</ul>
						<form action="#" class="col-md-3 pull-right">
							<p></p>
							<span>
								<input type="text" name="search" value="" class="form-control" placeholder="Search Menu..." style="border-radius: 1px; border: 1px solid #fff;">
							</span>
						</form>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>

			<div class="container-fluid main-container">
				<!-- 	<div class="absolute-wrapper"> </div> -->
				<div id="wrapper">
					<div id="sidebar-wrapper">
						<?php $this->load->view('templates/list');?>
					</div>

					<!-- Halaman konten -->
					<div id="page-content-wrapper">

						<!-- Div semua konten -->
						<div class="page-content inset">

							<?php if ($this->session->flashdata('success')): ?>
								<div class="alert alert-success"><?php echo $this->session->flashdata('success');?></div>
							<?php endif ?>

							<?php if ($this->session->flashdata('error')): ?>
								<div class="alert alert-danger"><?php echo $this->session->flashdata('error');?></div>
							<?php endif ?>

							<?php isset($page) ? $this->load->view($page) : null; ?>

						</div>
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<div class="row">
					<nav class="navbar navbar-default navbar-static-bottom navas">
						<div class="container">
							<div class="row">
								<center>
									<p class="col-md-12">
										Copyright &COPY; 2016 <a href="#">Sakti</a>
									</p>
								</center>
							</div>
						</div>
					</nav>
				</div>
			</div>


		</body>
		</html>