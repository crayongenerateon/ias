<div class="panel panel-default artpanel">
    <div class="panel-heading artpanels">
		<span><?php echo $operation ?> Peran</span>
		<a class="pull-right" href="<?php echo site_url('manage');?>">Dashboard</a>
    </div>

    <div class="panel-body bods" align="justify">
		<div class="row tombols">
	    </div>

	<?php echo validation_errors() ?>
	<?php 
	if (isset($role)) {
		$inputId = $role['user_role_id'];
		$inputRole = $role['user_role_name'];
	}else{
		$inputRole = set_value('inputRole');
	}
	?>
	<?php echo form_open(current_url()); ?>
	<div class="row">
		<div class="col-md-8">
			<?php if (isset($role)): ?>
				<input type="hidden" name="inputId" value="<?php echo $inputId ?>">
			<?php endif ?>
			<label>Jabatan</label>
			<input type="text" name="inputRole" value="<?php echo $inputRole ?>" class="form-control">
		</div>
		<div class="col-md-4">
			<label>Aksi</label>
			<br>
			<button type="submit" class="btn btn-success">Simpan</button>
			<a href="<?php echo site_url('manage/user/role') ?>" class="btn btn-warning">Batal</a>
			<?php if (isset($role)): ?>
				<a href="<?php echo site_url('manage/user/role/del/'.$role['user_role_id']) ?>" class="btn btn-danger">Hapus</a>
			<?php endif ?>
		</div>
	</div>
	<?php echo form_close(); ?>

	</div>
</div>
