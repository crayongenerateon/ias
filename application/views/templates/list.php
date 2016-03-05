    <!-- Menu -->
    <div class="side-menu">
    	<nav class="navbar navbar-default nafsu" role="navigation">
    		<!-- Main Menu -->

    		<div class="side-menu-container">
          <ul class="nav navbar-nav">
            <li class="nav-title">Navigation</li>
            <li>
              <a href="<?php echo site_url('manage');?>">
               <span class="ion-ios-speedometer ionst"></span>&nbsp;&nbsp; Dashboard
             </a>
           </li>
           <li class="nav-title">Component</li>

           <li class=" <?php echo ($this->uri->segment(2) == 'pusdit' ? 'active' : 'panel panel-default'); ?>" id="dropdown">
            <a data-toggle="collapse" href="#dropdown-pusdit">
              <span class="ion-cash ionst"></span> Pusdit <span class="caret icon"></span>
            </a>
            <div id="dropdown-pusdit" class="panel-collapse collapse <?php echo ($this->uri->segment(2) == 'pusdit' ? 'in' : ''); ?>">
              <div class="panel-body">
                <ul class="nav navbar-nav">
                  <li>
                    <a href="<?php echo site_url('manage/pusdit');?>"><span class="ion-person-stalker"></span> List Pusdit</a>
                  </li>
                  <li>
                    <a href="<?php echo site_url('manage/pusdit/add');?>"><span class="ion-person-add"></span> Add Pusdit</a>
                  </li>
                </ul>
              </div>
            </div>
          </li>

          <li class=" <?php echo ($this->uri->segment(2) == 'primer' ? 'active' : 'panel panel-default'); ?>" id="dropdown">
            <a data-toggle="collapse" href="#dropdown-primer">
              <span class="ion-cash ionst"></span> Primer <span class="caret icon"></span>
            </a>
            <div id="dropdown-primer" class="panel-collapse collapse <?php echo ($this->uri->segment(2) == 'primer' ? 'in' : ''); ?>">
              <div class="panel-body">
                <ul class="nav navbar-nav">
                  <li>
                    <a href="<?php echo site_url('manage/primer');?>"><span class="ion-person-stalker"></span> List Primer</a>
                  </li>
                  <li>
                    <a href="<?php echo site_url('manage/primer/add');?>"><span class="ion-person-add"></span> Add Primer</a>
                  </li>
                </ul>
              </div>
            </div>
          </li>


          <li id="dropdown">
           <a data-toggle="collapse" href="#dropdown-member">
            <span class="ion-person icon"></span>&nbsp;&nbsp; Administrasi <span class="caret icon"></span>
          </a>
          <!-- Dropdown level 1 -->
          <div id="dropdown-member" class="panel-collapse collapse <?php echo ($this->uri->segment(2) == 'members') ? 'in' : '' ?>">
            <div class="panel-body">
             <ul class="nav navbar-nav">
              <li>
                <a href="<?php echo site_url('manage/members/index');?>"><span class="ion-person-stalker"></span>&nbsp;&nbsp;&nbsp; Anggota</a>
              </li>
              <li>
                <a href="<?php echo site_url('manage/members/add');?>"><span class="ion-person-add"></span>&nbsp;&nbsp;&nbsp; Non Anggota</a>
              </li>
              <li>
                <a href="<?php echo site_url('manage/members/');?>"><span class="ion-person-stalker"></span>&nbsp;&nbsp;&nbsp; Mutasi Anggota</a>
              </li>
              <li><a href=""><span class="ion-person-add"></span>&nbsp;&nbsp;&nbsp; Keluar Anggota</a></li>
              <li><a href=""><span class="ion-person-stalker"></span>&nbsp;&nbsp;&nbsp; Simpanan Saham</a></li>
              <li><a href=""><span class="ion-person-add"></span>&nbsp;&nbsp;&nbsp; Simpanan Harian</a></li>
              <li><a href=""><span class="ion-person-stalker"></span>&nbsp;&nbsp;&nbsp; Simpanan Berjangka</a></li>
              <li><a href=""><span class="ion-person-add"></span>&nbsp;&nbsp;&nbsp; Simpanan Deposito</a></li>
              <li><a href=""><span class="ion-person-stalker"></span>&nbsp;&nbsp;&nbsp; Pinjaman</a></li>
              <li><a href=""><span class="ion-person-add"></span>&nbsp;&nbsp;&nbsp; Migrasi</a></li>
              <li><a href=""><span class="ion-person-stalker"></span>&nbsp;&nbsp;&nbsp; Pinjaman</a></li>
              <li><a href=""><span class="ion-person-add"></span>&nbsp;&nbsp;&nbsp; Import Setoran</a></li>
              <li><a href=""><span class="ion-person-stalker"></span>&nbsp;&nbsp;&nbsp; Import Tarikan</a></li>
              <li><a href=""><span class="ion-person-add"></span>&nbsp;&nbsp;&nbsp; Import Realisasi</a></li>
              <li><a href=""><span class="ion-person-stalker"></span>&nbsp;&nbsp;&nbsp; Import Angusran</a></li>
              <li><a href=""><span class="ion-person-add"></span>&nbsp;&nbsp;&nbsp; Setting Non Tunai</a></li>
              <li><a href=""><span class="ion-person-add"></span>&nbsp;&nbsp;&nbsp; Ganti Buku</a></li>
              <li><a href=""><span class="ion-person-add"></span>&nbsp;&nbsp;&nbsp; Pengajuan Pinjaman</a></li>
            </ul>
          </div>
        </div>
      </li>

      <?php if($this->session->userdata('s_role') == ADMIN_USER):?>
       <li id="dropdown">
        <a data-toggle="collapse" href="#dropdown-user">
         <span class="ion-person icon"></span>&nbsp;&nbsp; Transaksi <span class="caret icon"></span>
       </a>
       <!-- Dropdown level 1 -->
       <div id="dropdown-user" class="panel-collapse collapse <?php echo ($this->uri->segment(2) == 'user') ? 'in' : '' ?>">
         <div class="panel-body">
          <ul class="nav navbar-nav">
           <li class="<?php echo ($this->uri->segment(3) == 'user') ? 'active' : '' ?>">
             <a href="<?php echo site_url('manage/user');?>"><span class="ion-person-stalker"></span> Users</a>
           </li>
           <li class="<?php echo ($this->uri->segment(3) == 'add') ? 'active' : '' ?>">
             <a href="<?php echo site_url('manage/user/add');?>"><span class="ion-person-add"></span> Add User</a>
           </li>
           <li class="<?php echo ($this->uri->segment(3) == 'role') ? 'active' : '' ?>">
             <a href="<?php echo site_url('manage/user/role');?>"><span class="ion-ios-list"></span> User Role</a>
           </li>
           <li class="<?php echo ($this->uri->segment(3) == 'role/add') ? 'active' : '' ?>">
             <a href="<?php echo site_url('manage/user/role/add');?>"><span class="ion-plus-circled"></span> Add Role</a>
           </li>
         </ul>
       </div>
     </div>
   </li>
 <?php endif;?>

 <li class="nav-title">User</li>
 <li><a href="<?php echo site_url('manage/profile');?>"><span class="ion-person icon"></span>&nbsp;&nbsp; Profile</a></li>
 <li><a href="<?php echo site_url('manage/auth/logout');?>"><span class="ion-log-out icon"></span>&nbsp;&nbsp; Logout</a></li>


</ul>
</div><!-- /.navbar-collapse -->
</nav>



</div>
