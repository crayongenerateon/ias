<div class="alert alert-danger">
	Anda yakin akan menghapus jabatan <?php echo $role['user_role_name'] ?> ?
</div>
<table class="table table-responsive">
	<tr>
		<td>Nama Jabatan</td>
		<td><?php echo $role['user_role_name'] ?></td>
	</tr>
</table>
<?php echo form_open(current_url()); ?>
<input type="hidden" name="inputId" value="<?php echo $role['user_role_id'] ?>">
<button type="submit" class="btn btn-primary">Hapus</button>
<a href="<?php echo site_url('manage/user/role')?>" class="btn btn-warning">Batal</a>
<?php echo form_close(); ?>
