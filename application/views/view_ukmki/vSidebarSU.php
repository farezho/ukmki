<div id="wrapper">
  <?php $level = $this->session->userdata("level");?>

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url('superuser'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages Superuser</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Admin Page:</h6>
            <a class="dropdown-item" href="<?php echo base_url('superuser/addAdmin'); ?>">Add New Admin</a>
            <a class="dropdown-item" href="<?php echo base_url('superuser/lihatAdmin')?>">See All Admins</a>
            <a class="dropdown-item" href="<?php echo base_url('superuser/changePassword/'.$this->session->userdata("nama"))?>">Change Password</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Member Page:</h6>
            <a class="dropdown-item" href="<?php echo base_url('crudAnggota/addAnggota/').$level ; ?>">Add New Member</a>
            <a class="dropdown-item" href="<?php echo base_url('crudAnggota/lihatAnggota/').$level; ?>">See All Members</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Database Page:</h6>
            <a class="dropdown-item" href="<?php echo base_url('superuser/lihatFakultas/'); ?>">Faculty</a>
            <a class="dropdown-item" href="<?php echo base_url('superuser/lihatAmanah/'); ?>">Position</a>
            <a class="dropdown-item" href="<?php echo base_url('superuser/lihatKDR/'); ?>">Regeneration Status</a>
            <a class="dropdown-item" href="<?php echo base_url('superuser/lihatExc/'); ?>">Excellencia Status</a>
          </div>
        </li>
      </ul>