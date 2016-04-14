<h3 class="page-header">Pengajuan Cuti</h3>
<div class="row">

	<?php $this->load->view('datepicker'); ?>

	<?php 
	if (isset($cuti)) {
		$inputStart = $cuti['cuti_start'];
		$inputEnd = $cuti['cuti_end'];
		$inputUser = $cuti['user_id'];
		$inputDesc = $cuti['cuti_desc'];
	}else{
		$inputStart = set_value('inputStart');
		$inputEnd = set_value('inputEnd');
		$inputUser = set_value('inputUser');
		$inputDesc = set_value('inputDesc');
	}
	?>
	<?php
	echo validation_errors();
	echo form_open(current_url())?>
	<div class="col-md-8">
		<label>Dari Tanggal*</label>
		<input id="inputStart" name="cuti_start" type="text" class="form-control datepicker hasDatepickerr" value="<?php echo $inputStart; ?>">
		<br>
		<label>Sampai Tanggal*</label>
		<input id="inputEnd" name="cuti_end" type="text" class="form-control datepicker hasDatepickerr" value="<?php echo $inputEnd; ?>">
		<br>
		<label>Alasan Cuti*</label>
		<textarea name="cuti_desc" class="form-control" style="width: 100%" rows="10"><?php echo $inputDesc; ?></textarea>
		<p style="color:#9C9C9C;margin-top: 5px"><i>*) Field Wajib Diisi</i></p>
		<br>
	</div>
	<div class="col-md-4">
		<label>Aksi</label><br>
		<button type="submit" class="btn btn-primary">Simpan</button>
		<a href="<?php echo site_url('user')?>" class="btn btn-success">Batal</a>
	</div>
	<?php echo form_close()?>
</div>