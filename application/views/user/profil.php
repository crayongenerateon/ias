<h3 class="page-header"><?php echo $user['user_full_name']?></h3>
<div class="row">
	<div class="col-md-10">
		<table class="table table-responsive">
			<tr>
				<td>Nama Lengkap</td>
				<td><?php echo $user['user_full_name'] ?></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><?php echo $user['user_name'] ?></td>
			</tr>
			<tr>
				<td>Role</td>
				<td><?php echo $user['role_name'] ?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><?php echo $user['user_email'] ?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><?php echo $user['user_address'] ?></td>
			</tr>
			<tr>
				<td>No. Telp</td>
				<td><?php echo $user['user_phone'] ?></td>
			</tr>
			<tr>
				<td>Tempat dan Tanggal lahir</td>
				<td><?php echo $user['user_born'] ?> <?php echo pretty_date($user['user_date_born'], ' d F Y', FALSE); ?></td>
			</tr>
			<tr>
				<td>Usia</td>
				<td><?php echo $user['user_age'] ?></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td><?php echo $user['user_gender'] ?></td>
			</tr>
			<tr>
				<td>Agama</td>
				<td><?php echo $user['user_religion'] ?></td>
			</tr>
			<tr>
				<td>NPWP</td>
				<td><?php echo $user['user_npwp'] ?></td>
			</tr>
			<tr>
				<td>Askes</td>
				<td><?php echo $user['user_askes'] ?></td>
			</tr>
			<tr>
				<td>Tanggal Masuk Kerja</td>
				<td><?php echo pretty_date($user['user_start_work'], 'd F Y') ?></td>
			</tr>
			<tr>
				<td>Tanggal Daftar</td>
				<td><?php echo pretty_date($user['date_created'], 'l, d F Y', false) ?></td>
			</tr>
			<?php if ($user['last_update'] != ''): ?>
				<tr>
					<td>Terakhir diubah</td>
					<td><?php echo pretty_date($user['last_update'], 'l, d F Y', false) ?></td>
				</tr>
			<?php endif ?>
		</table>
	</div>
	<div class="col-md-2">
		<a href="<?php echo site_url('profile/edit/');?>" class="btn btn-primary">Edit</a>
		<a href="<?php echo site_url('user/cpw/')?>" class="btn btn-warning">Ganti Password</a>
	</div>
</div>