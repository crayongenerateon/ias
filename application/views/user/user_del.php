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
		<td><?php echo $user['user_role_name'] ?></td>
	</tr>
</table>
<?php echo form_open(current_url()); ?>
<input type="hidden" name="inputId" value="<?php echo $user['user_id'] ?>">
<button type="submit" class="btn btn-primary">Hapus</button>
<a href="<?php echo site_url('manage/user')?>" class="btn btn-warning">Batal</a>
<?php echo form_close(); ?>
