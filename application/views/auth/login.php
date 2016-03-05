<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SAKTI | Login</title>
	<link rel="shortcut icon" href="<?php echo base_url('media/ico/sakti.png') ?>" width="100px">
	<link href="<?php echo base_url('media/css/bootstrap.min.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('media/css/login.css');?>" rel="stylesheet">

	<script src="<?php echo base_url('media/js/jquery-1.11.2.min.js'); ?>"></script>
	<script src="<?php echo base_url();?>media/js/bootstrap.min.js"></script>

</head>
<body style="background:#f4f8fa; color:#333;">
	<section id="intro" class="intro-section">
		<div class="container">
			<div class="row">
				<br><br><br>
				<div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 images_1_of_4 repeat">
					<div class="col-md-12 col-sm-12 margin-30"> 
					<div class="login"> 
						<div class="panel-body">
							<?php if($this->session->flashdata('errorLogin')):?>
								<div class="alert alert-danger"><?php echo $this->session->flashdata('errorLogin');?></div>
							<?php elseif(validation_errors()):?>
								<?php echo validation_errors();?>
							<?php endif;?>
							<center><h1>Login Sakti</h1></center>
							<?php echo form_open(current_url(), array('role'=>'form', 'class'=>'form-signin')); ?>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="form-group">
										<input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12">
									<div class="form-group">
										<input type="password" name="password" class="form-control" placeholder="Password" required>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-8 col-sm-12 col-md-12">
									<a href="">Lupa Password</a>
									<p></p>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-12 col-md-12">
									<button class="btn btn-lg btn-primary btn-block" type="submit">
										Sign in <span class="glyphicon glyphicon-ok"></span>
									</button>
								</div>
							</div>
							<hr class="colorgraph">
							<?php echo form_close();?>
						</div>
					</div>
				</div>
				</div>
				<div class="col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
					<br>
					<center>
						<small>
							<font color="#333">
								Kami segera menghadirkan Sistem Informasi Koperasi terkini: SAKTI.
								SAKTI akan memberikan layanan optimal dari Koperasi kepada Anggotanya.
								Nantikan kabar baik ini !. 
							</font>
						</small>
					</center>
				</div>

			</div>
		</div>
	</section>
	<nav class="navbar navbar-default navbar-fixed-bottom navas hidden-xs">
		<div class="container">
			<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
				<center>
					<small><font color="#333">Copyright © 2016 AKSES Indonesia & PT Netsindo InterMedia eTrade. All Rights Reserved.</font></small>
				</center>
			</div>
		</div>
	</nav>
	<nav class="navbar navbar-static-bottom hidden-lg hidden-md hidden-sm">
		<div class="container">
			<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
				<p></p>
				<center>
					<small><strong><font color="#333">Copyright © 2016 AKSES Indonesia & PT Netsindo InterMedia eTrade. All Rights Reserved.</font></strong></small>
				</center>
			</div>
		</div>
	</nav>
</body>
</html>
