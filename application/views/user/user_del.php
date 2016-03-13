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

<div class="alert alert-danger">
	Anda yakin akan menghapus pengguna <?php echo $user['user_name'] ?> ?
</div>
<table class="table table-responsive">
	<tr>
		<td>Username</td>
		<td><?php echo $user['user_name'] ?></td>
	</tr>
	<tr>
		<td>Nama Lengkap</td>
		<td><?php echo $user['user_full_name'] ?></td>
	</tr>
	<tr>
		<td>Role</td>
		<td><?php echo $user['role_name'] ?></td>
	</tr>
</table>
<?php echo form_open(current_url()); ?>
<input type="hidden" name="inputId" value="<?php echo $user['user_id'] ?>">
<button type="submit" class="btn btn-primary">Hapus</button>
<a href="<?php echo site_url('user')?>" class="btn btn-warning">Batal</a>
<?php echo form_close(); ?>
