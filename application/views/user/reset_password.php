<h3 class="page-header">Reset Password <?php echo $user['user_full_name'] ?></h3>

<?php echo validation_errors() ?>
<?php echo form_open(current_url()); ?>
<div class="row">
	<div class="col-md-8">
		<label>Password Baru*</label>
		<input type="password" name="inputPassword" value="" class="form-control">
		<br>
		<label>Ketik Ulang Password*</label>
		<input type="password" name="inputPasswordConf" value="" class="form-control">
		<br>
	</div>
	<div class="col-md-4">
		<label>Aksi</label>
		<br>
		<button type="submit" class="btn btn-success">Simpan</button>
		<a href="<?php echo site_url('manage/user') ?>" class="btn btn-warning">Batal</a>
	</div>
</div>
<?php echo form_close(); ?>