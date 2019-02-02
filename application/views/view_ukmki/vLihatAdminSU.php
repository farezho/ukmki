      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">See All Admins</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Admin List</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Full Name</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Address</th>
                      <th>Phone Number</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Full Name</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Address</th>
                      <th>Phone Number</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <?php 
                    $no = 1;
                    foreach($admin as $u){ 
                    ?>
                  <tbody>
                    <tr>
                      <td><?php echo $u->nama_lengkap ?></td>
                      <td><?php echo $u->username ?></td>
                      <td><?php echo $u->password ?></td>
                      <td><?php echo $u->alamat ?></td>
                      <td><?php echo $u->no_hp ?></td>
                      <td><?php echo $u->email ?></td>
                      <td>
                          <?php echo anchor('superuser/editAdmin/'.$u->username,'Edit'); ?>
                          <?php
                            if(strcmp($u->username, $this->session->userdata("nama"))){ ?>
                              <a onClick='return checkDelete()' href="<?php echo base_url('superuser/hapusAdmin/'.$u->username); ?>">Hapus
                              </a>
                           <?php }?>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
          </div>

        </div>
        <!-- /.container-fluid -->