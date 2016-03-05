<h3 class="page-header"><?php echo $header ?></h3>
<?php 
echo validation_errors();
echo form_open(current_url()) ?>
<div class="row">
	<div class="col-md-8">
		<?php if ($this->uri->segment(3) == 'cpw'): ?>
			<label>Password Lama</label>
			<input type="password" name="inputOldPassword" class="form-control">
			<br>
		<?php else: ?>
			<input type="hidden" name="inputId" value="<?php echo $this->uri->segment(4)?>">
		<?php endif; ?>
		<label>Password Baru</label>
		<input type="password" name="inputPassword" class="form-control">
		<br>
		<label>Konformasi Password Baru</label>
		<input type="password" name="inputPasswordConfirmation" class="form-control">
		<br>
	</div>
	<div class="col-md-4">
		<label>Aksi</label><br>
		<button type="submit" class="btn btn-primary">Simpan</button>
		<a href="<?php echo site_url('user/profil')?>" class="btn btn-warning">Batal</a>
	</div>
</div>
<?php echo form_close() ?>