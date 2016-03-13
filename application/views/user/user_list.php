<div class="panel panel-default artpanel">
    <div class="panel-heading artpanels">
		<span>List User</span>
		<a class="pull-right" href="<?php echo site_url('manage');?>">Dashboard</a>
    </div>

    <div class="panel-body bods" align="justify">
		<div class="row tombols">
	    	<div class="col-md-10 col-sm-6 col-xs-6 but">
	    	</div>
	    	<div class="col-md-2 col-sm-3 col-xs-3 butst">
	    		<a class="btn btn-default btn-md pull-right buton"
	    			href="<?php echo site_url('user/add');?>" role="button">
	    			<span class="ion-plus-circled"></span> Add User</a>
	    	</div>
	    </div>

		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<th>Nama Pengguna</th>
							<th>Aksi</th>
						</thead>
						<tbody>
							<?php foreach ($user as $key): ?>
								<tr>
									<td>
										<a href="<?php echo site_url('user/edit/'.$key['user_id']) ?>">
											<?php echo $key['user_name'] ?>
										</a>
									</td>
									<td>
										<a href="<?php echo site_url('user/rpw/'.$key['user_id']) ?>"
											class="btn btn-danger btn-xs">Reset Password</a>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
