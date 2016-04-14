<h3 class="page-header">View cuti</h3>

<?php $this->load->view('tinymce_init'); ?>
<table class="table table-responsive">
	<tr>
		<td>Nama</td>
		<td><?php echo $cuti['user_full_name']?></td>
	</tr>
	<tr>
		<td>Cuti dari tanggal</td>
		<td><?php echo pretty_date($cuti['cuti_start'], 'l, d/m/Y', FALSE); ?></td>
	</tr>
	<tr>
		<td>Sampai tanggal</td>
		<td><?php echo pretty_date($cuti['cuti_end'], 'l, d/m/Y', FALSE); ?></td>
	</tr>
	<tr>
		<td>Alasan cuti</td>
		<td><?php echo $cuti['cuti_desc']?></td>
	</tr>
	<tr>
		<td>Jumlah cuti</td>
		<td><?php echo $cuti['cuti_count']?> Hari</td>
	</tr>
	<tr>
		<td>Sisa Cuti</td>
		<td><?php echo 12 - $cuti['cuti_count'] ?></td>
	</tr>	
	<tr>
		<td>Deskripsi Atasan</td>
		<td>
			<div id="showDeskripsi">
				<?php $aclist = array(1, 2, 3); ?>
				<?php if (in_array($this->session->userdata('m_role'), $aclist)): ?>
					<button class="btn btn-primary btn-xs pull-right" onclick="$('#showDeskripsi').addClass('hide'); $('#editDeskripsi').removeClass('hide')">Edit</button>
				<?php endif ?>
				
				<?php echo $cuti['cuti_desc_approved'] ?>
			</div>
			<div id="editDeskripsi" class="hide">
				<button class="btn btn-primary btn-xs pull-right" onclick="$('#showDeskripsi').removeClass('hide'); $('#editDeskripsi').addClass('hide')">Batal</button>
				<?php echo form_open(current_url()); ?>
				<br>
				<br>
				<div id="p_deskripsi">
					<textarea name="cuti_desc_approved" class="form-control" style="width: 100%" rows="10"><?php echo $cuti['cuti_desc_approved']?></textarea>
					<br>
				</div>
				<button class="btn btn-primary" type="submit">Simpan</button>
			</div>
			<?php echo form_close(); ?>
		</td>
	</div>
</tr>
</table>
<?php echo form_open(current_url())?>

<?php $aclist = array(1, 2, 3); ?>
<?php if (in_array($this->session->userdata('m_role'), $aclist)): ?>
	<a href="<?php echo site_url('cuti/confirm/'. $cuti['cuti_id'])?>" class="btn btn-primary" 
		onclick="return confirm('Apakah anda yakin mengkonfirmasi?')" >Proses</a>
	<?php endif ?>
	<a href="<?php echo site_url('cuti')?>" class="btn btn-warning">Kembali</a>
	<?php echo form_close()?>