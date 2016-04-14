<a href="<?php echo site_url('cuti/add') ?>"><div class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Pengajuan cuti </div></a>
<h3 class="page-header">Daftar Cuti</h3>


<table class="table table-hover table-responsive">
	<thead>
		<?php if ($this->session->userdata('m_role') != 4): ?>	
			<th>Nama</th>
		<?php endif ?>

		<th>Cuti dari tanggal</th>
		<th>Sampai tanggal</th>
		<th>Jumlah Cuti</th>
		<th>Alasan Cuti</th>
		<th>Status</th>
		<th>Aksi</th>
	</thead>
	<tbody>
		<?php foreach ($cuti as $key) {
			?>
			<tr>
				<?php if ($this->session->userdata('m_role') != 4): ?>	
					<td><?php echo $key['user_full_name'] ?></td>
				<?php endif ?>
				<td><?php echo pretty_date($key['cuti_start'], 'l, d/m/Y', FALSE); ?></td>
				<td><?php echo pretty_date($key['cuti_end'], 'l, d/m/Y', FALSE); ?></td>
				<td><?php echo $key['cuti_count'] ?> Hari</td>
				<td><?php echo $key['cuti_desc'] ?></td>
				<td><?php echo ($key['cuti_is_approved'] == 0) ? 'Belum diproses' : 'Proses' ?></td>
				<td>
					<a href="<?php echo site_url('cuti/view/'.$key['cuti_id']) ?>"><button class="btn btn-default btn-link"><i class="ion ion-eye"></i></button></a>
				</td>
				<td>
				<?php /*$aclist = array(1); ?>
					<?php if (in_array($this->session->userdata('m_role'), $aclist)): ?>
						<a href="<?php echo site_url('cuti/edit/'. $key['cuti_id']);?>"><button class="btn btn-default btn-link"><i class="ion ion-pen-b"></i></button></a>
					<?php endif */?>
				</td>
				<td>
				<?php $aclist = array(1); ?>
					<?php if (in_array($this->session->userdata('m_role'), $aclist)): ?>
						<a href="<?php echo site_url('cuti/del/'. $key['cuti_id']);?>"><button class="btn btn-default btn-link"><i class="ion ion-trash-b"></i></button></a>
					<?php endif ?>
				</td>
			</tr>
			<?php
		}?>
	</tbody>
</table>
<div class="pagination">
	<?php echo $this->pagination->create_links()?>
</div>