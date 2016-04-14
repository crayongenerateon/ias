<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="<?php echo site_url('base') ?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class=" <?php echo ($this->uri->segment(1) == 'user' ? 'active' : 'panel-default'); ?>">
                        <a href="javascript:;" data-toggle="collapse" data-target="#user"><i class="fa fa-user"></i> User <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="user" class="collapse <?php echo ($this->uri->segment(1) == 'user' ? 'in' : ''); ?>">
                            <li>
                                <a href="<?php echo site_url('user') ?>">List User</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('user/role') ?>">Role</a>
                            </li>`
                        </ul>
                    </li>
                    <li class=" <?php echo ($this->uri->segment(1) == 'cuti' ? 'active' : 'panel-default'); ?>">
                        <a href="javascript:;" data-toggle="collapse" data-target="#cuti"><i class="fa fa-fw fa-file"></i> Cuti <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="cuti" class="collapse <?php echo ($this->uri->segment(1) == 'cuti' ? 'in' : ''); ?>">
                            <li>
                                <a href="<?php echo site_url('cuti') ?>">List Cuti</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('cuti/add') ?>">Add cuti</a>
                            </li>
                        </ul>
                    </li>
                    <li class=" <?php echo ($this->uri->segment(1) == 'lembur' ? 'active' : 'panel-default'); ?>">
                        <a href="javascript:;" data-toggle="collapse" data-target="#lembur"><i class="fa fa-fw fa-edit"></i> Lembur <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="lembur" class="collapse <?php echo ($this->uri->segment(1) == 'lembur' ? 'in' : ''); ?>">
                            <li>
                                <a href="<?php echo site_url('lembur') ?>">List Cuti</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('lembur/add') ?>">Add cuti</a>
                            </li>
                        </ul>
                    </li>
                    <li class=" <?php echo ($this->uri->segment(1) == 'holiday' ? 'active' : 'panel-default'); ?>">
                        <a href="javascript:;" data-toggle="collapse" data-target="#holiday"><i class="fa fa-fw fa-table"></i> Hari Libur <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="holiday" class="collapse <?php echo ($this->uri->segment(1) == 'holiday' ? 'in' : ''); ?>">
                            <li>
                                <a href="<?php echo site_url('holiday') ?>">List Hari Libur</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('holiday/add') ?>">Add Hari Libur</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
                    </li>
                    <li>
                        <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
                    </li>
                    <li>
                        <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
                    </li>
                    <li>
                        <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>