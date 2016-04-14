<a href="<?php echo site_url('lembur/add') ?>"><div class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Pengajuan Lembur </div></a>
<h3 class="page-header">Daftar Lembur</h3>

<table class="table table-hover table-responsive">
	<thead>
		<?php if ($this->session->userdata('m_role') != 4): ?>	
			<th>Nama</th>
		<?php endif ?>

		<th>Tanggal overtime</th>
		<th>Kegiatan</th>
		<th>Status</th>
		<th>Aksi</th>
	</thead>
	<tbody>
		<?php foreach ($lembur as $key) {
			?>
			<tr>
				<?php if ($this->session->userdata('m_role') != 4): ?>	
					<td><?php echo $key['user_full_name'] ?></td>
				<?php endif ?>
				<td><?php echo pretty_date($key['lembur_date'], 'l, d/m/Y', FALSE); ?></td>
				<td><?php echo $key['lembur_desc'] ?></td>
				<td><?php echo ($key['lembur_is_approved'] == 0) ? 'Tolak' : 'Valid' ?></td>
				<td>
					<a href="<?php echo site_url('lembur/view/'.$key['lembur_id']) ?>"><button class="btn btn-default btn-link"><i class="ion ion-eye"></i></button></a>
				</td>
			</tr>
			<?php
		}?>
	</tbody>
</table>
<div class="pagination">
	<?php echo $this->pagination->create_links()?>
</div>