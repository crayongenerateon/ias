<div class="panel panel-default artpanel">
    <div class="panel-heading artpanels">
		<span>Daftar Role</span>
		<a class="pull-right" href="<?php echo site_url('manage');?>">Dashboard</a>
    </div>

    <div class="panel-body bods" align="justify">
		<div class="row tombols">
	    	<div class="col-md-10 col-sm-6 col-xs-6 but">
	    	</div>
	    	<div class="col-md-2 col-sm-3 col-xs-3 butst">
	    		<a class="btn btn-default btn-md pull-right buton"
	    			href="<?php echo site_url('manage/user/role/add');?>" role="button">
	    			<span class="ion-plus-circled"></span> Add Role</a>
	    	</div>
	    </div>

		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<th>Peran</th>
						</thead>
						<tbody>
							<?php foreach ($role as $key): ?>
								<tr>
									<td>
										<a href="<?php echo site_url('manage/user/role/edit/'.$key['user_role_id']) ?>">
											<?php echo $key['user_role_name'] ?>
										</a>
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
