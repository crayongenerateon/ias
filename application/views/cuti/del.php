<h3 class="page-header">Konfirmasi</h3>

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
</table>
<?php echo form_open(current_url())?>
<input type="hidden" name="inputId" value="<?php echo $cuti['cuti_id']?>">
<button type="submit" class="btn btn-primary">Hapus</button>
<a href="<?php echo site_url('cuti')?>" class="btn btn-warning">Cancel</a>
<?php echo form_close()?>