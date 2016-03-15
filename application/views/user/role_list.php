 <!-- Page Heading -->
 <div class="row">
 	<div class="col-lg-12">
 		<h1 class="page-header">
 			Role
 		</h1>
 		<ol class="breadcrumb">
 			<li>
 				<i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
 			</li>
 			<li class="active">
 				<i class="fa fa-edit"></i> List
 			</li>
 		</ol>
 	</div>
 </div>
 <!-- /.row -->

    <div class="panel-body bods" align="justify">
		<div class="row tombols">
	    	<div class="col-md-10 col-sm-6 col-xs-6 but">
	    	</div>
	    	<div class="col-md-2 col-sm-3 col-xs-3 butst">
	    		<a class="btn btn-default btn-md pull-right buton"
	    			href="<?php echo site_url('user/role/add');?>" role="button">
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
										<a href="<?php echo site_url('user/role/edit/'.$key['role_id']) ?>">
											<?php echo $key['role_name'] ?>
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