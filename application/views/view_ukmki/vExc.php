      <div id="content-wrapper">
        
        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Excellencia Status</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Excellencia List

              <a href="<?php echo base_url('superuser/addExc')?>" class="button">Add New Excellencia</a>

            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Excellencia Code</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Excellencia Code</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <?php 
                    $no = 1;
                    foreach($exc as $u){ 
                    ?>
                  <tbody>
                    <tr>
                      <td><?php echo $u->kode_exc ?></td>
                      <td><?php echo $u->deskripsi_exc ?></td>
                      <td>
                          <?php echo anchor('superuser/editExc/'.$u->kode_exc,'Edit'); ?>
                          <a onClick='return checkDelete()' href="<?php echo base_url('superuser/hapusExc/'.$u->kode_exc); ?>">Delete
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