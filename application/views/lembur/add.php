<h3 class="page-header">Pengajuan lembur</h3>
<div class="row">

	<?php $this->load->view('datepicker'); ?>

	<?php 
	if (isset($lembur)) {
		$inputDate = $lembur['lembur_date'];
		$inputUser = $lembur['user_id'];
		$inputDesc = $lembur['lembur_desc'];
	}else{
		$inputDate = set_value('inputDate');
		$inputUser = set_value('inputUser');
		$inputDesc = set_value('inputDesc');
	}
	?>
	<?php
	echo validation_errors();
	echo form_open(current_url())?>
	<div class="col-md-8">
		<label>Tanggal*</label>
		<input id="inputDate" name="lembur_date" type="text" class="form-control datepicker hasDatepickerr" value="<?php echo $inputDate; ?>">
		<br>
		<label>Kegiatan*</label>
		<textarea name="lembur_desc" class="form-control" style="width: 100%" rows="10"><?php echo $inputDesc; ?></textarea>
		<p style="color:#9C9C9C;margin-top: 5px"><i>*) Field Wajib Diisi</i></p>
		<br>
	</div>
	<div class="col-md-4">
		<label>Aksi</label><br>
		<button type="submit" class="btn btn-primary">Simpan</button>
		<a href="<?php echo site_url('lembur')?>" class="btn btn-success">Batal</a>
	</div>
	<?php echo form_close()?>
</div>