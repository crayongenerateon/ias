 <!-- Page Heading -->
 <div class="row">
 	<div class="col-lg-12">
 		<h1 class="page-header">
 			Add
 		</h1>
 		<ol class="breadcrumb">
 			<li>
 				<i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
 			</li>
 			<li class="active">
 				<i class="fa fa-edit"></i> Add
 			</li>
 		</ol>
 	</div>
 </div>
 <!-- /.row -->

 <div class="panel-body bods" align="justify">
 	<div class="row tombols">
 	</div>

 	<?php echo validation_errors() ?>
 	<?php 
 	if (isset($user)) {
 		$inputId = $user['user_id'];
 		$inputUsername = $user['user_name'];
 		$inputFullname = $user['user_full_name'];
 		$inputRole = $user['role_id'];
 	}else{
 		$inputUsername = set_value('inputUsername');
 		$inputFullname = set_value('inputFullname');
 		$inputRole = set_value('inputRole');
 	}
 	?>
 	<?php echo form_open(current_url()); ?>
 	<div class="row">
 		<div class="col-md-8">
 			<?php if (isset($user)): ?>
 				<input type="hidden" name="inputId" value="<?php echo $inputId ?>">
 			<?php endif ?>
 			<label>Username*</label>
 			<input type="text" name="inputUsername" value="<?php echo $inputUsername ?>" class="form-control">
 			<br>
 			<label>Nama Lengkap*</label>
 			<input type="text" name="inputFullname" value="<?php echo $inputFullname ?>" class="form-control">
 			<br>
 			<label>Role</label>
 			<select name="inputRole" class="form-control">
 				<option value="">--Pilih Jabatan--</option>
 				<?php foreach ($role as $key): ?>
 					<option value="<?php echo $key['role_id'] ?>" <?php echo (isset($user) AND ($key['role_id'] == $user['role_id'])) ? 'selected' : '' ; ?>><?php echo $key['role_name'] ?></option>
 				<?php endforeach ?>
 			</select>
 			<br>
 			<?php if ($this->uri->segment(3) == 'add'): ?>
 				<label>Password Baru*</label>
 				<input type="password" name="inputPassword" value="" class="form-control">
 				<br>
 				<label>Ketik Ulang Password*</label>
 				<input type="password" name="inputPasswordConf" value="" class="form-control">
 				<br>
 			<?php endif ?>

 		</div>
 		<div class="col-md-4">
 			<label>Aksi</label>
 			<br>
 			<button type="submit" class="btn btn-success">Simpan</button>
 			<a href="<?php echo site_url('user') ?>" class="btn btn-warning">Batal</a>
 		</div>
 	</div>
 	<?php echo form_close(); ?>

 </div>

