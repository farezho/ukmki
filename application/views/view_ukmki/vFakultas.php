      <div id="content-wrapper">
        
        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Faculty</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Faculty List

              <a href="<?php echo base_url('superuser/addFakultas')?>" class="button">Add New Faculty</a>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Faculty Code</th>
                      <th>Faculty Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Faculty Code</th>
                      <th>Faculty Name</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <?php 
                    $no = 1;
                    foreach($fakultas as $u){ 
                    ?>
                  <tbody>
                    <tr>
                      <td><?php echo $u->kode_fakultas ?></td>
                      <td><?php echo $u->deskripsi ?></td>
                      <td>
                          <?php echo anchor('superuser/editFakultas/'.$u->kode_fakultas,'Edit'); ?>
                          <a onClick='return checkDelete()' href="<?php echo base_url('superuser/hapusFakultas/'.$u->kode_fakultas); ?>">Delete
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