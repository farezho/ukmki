      <div id="content-wrapper">
        
        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Position</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Position List

              <a href="<?php echo base_url('superuser/addAmanah')?>" class="button">Add New Position</a>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Position Code</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Position Code</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <?php 
                    $no = 1;
                    foreach($amanah as $u){ 
                    ?>
                  <tbody>
                    <tr>
                      <td><?php echo $u->kode_amanah ?></td>
                      <td><?php echo $u->deskripsi_amanah ?></td>
                      <td>
                          <?php echo anchor('superuser/editAmanah/'.$u->kode_amanah,'Edit'); ?>
                          <a onClick='return checkDelete()' href="<?php echo base_url('superuser/hapusAmanah/'.$u->kode_amanah); ?>">Delete
                          </a>
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