<?php $aclist = array(1, 2, 3); ?>
<?php if (in_array($this->session->userdata('m_role'), $aclist)): ?>
	<a href="<?php echo site_url('user/add') ?>"><div class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Tambah </div></a>
<?php endif ?>

<h3 class="page-header">Daftar Pegawai</h3>

<table class="table table-hover table-responsive">
	<thead>
		<th>Nama</th>
		<th>No. Telp</th>
		<th>Email</th>
		<th>Role</th>
		<?php $aclist = array(1, 2, 3); ?>
		<?php if (in_array($this->session->userdata('m_role'), $aclist)): ?>
			<th>Aksi</th>
		<?php endif ?>
	</thead>
	<tbody>
		<?php foreach ($user as $key) {
			?>
			<tr>
				<td><?php echo $key['user_full_name']?></td>
				<td><?php echo $key['user_phone']?></td>
				<td><?php echo $key['user_email']?></td>
				<td><?php echo $key['role_name']?></td>
				<td>
					<?php $aclist = array(1, 2, 3); ?>
					<?php if (in_array($this->session->userdata('m_role'), $aclist)): ?>
						<a href="<?php echo site_url('user/view/'.$key['user_id']);?>">
							View
						</a> &nbsp; &nbsp; &nbsp;
					<?php endif ?>

					<?php $aclist = array(1, 2, 3); ?>
					<?php if (in_array($this->session->userdata('m_role'), $aclist)): ?>
						<a href="<?php echo site_url('user/edit/'. $key['user_id']);?>">
							Edit
						</a> &nbsp; &nbsp; &nbsp; 
					<?php endif ?>

					<?php $aclist = array(1, 2, 3); ?>
					<?php if (in_array($this->session->userdata('m_role'), $aclist)): ?>
						<a href="<?php echo site_url('user/del/'. $key['user_id']);?>">
							Delete
						</a>
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
