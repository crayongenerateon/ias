<h3 class="page-header">View lembur</h3>

<?php $this->load->view('tinymce_init'); ?>
<table class="table table-responsive">
	<tr>
		<td>Nama</td>
		<td><?php echo $lembur['user_full_name']?></td>
	</tr>
	<tr>
		<td>Tanggal lembur</td>
		<td><?php echo pretty_date($lembur['lembur_date'], 'l, d/m/Y', FALSE); ?></td>
	</tr>
	<tr>
		<td>Kegiatan</td>
		<td><?php echo $lembur['lembur_desc']; ?></td>
	</tr>	
</table>
<?php echo form_open(current_url())?>

<?php $aclist = array(1, 2, 3); ?>
<?php if (in_array($this->session->userdata('m_role'), $aclist)): ?>
	<a href="<?php echo site_url('lembur/confirm/'. $lembur['lembur_id'])?>" class="btn btn-primary" 
		onclick="return confirm('Apakah anda yakin mengkonfirmasi?')" >Proses</a>
	<?php endif ?>
	<a href="<?php echo site_url('lembur')?>" class="btn btn-warning">Kembali</a>
	<?php echo form_close()?>