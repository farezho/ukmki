      <div id="content-wrapper">
        <?php $level = $this->session->userdata("level");?>
        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Member List
              
              <!-- DROPDOWN FILTER BY FACULTY -->
              <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn">Filter</button>
                  <div id="myDropdown" class="dropdown-content">
                    <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
                    <a href="<?php echo base_url('superuser/filterFakultas/'.'FEB'); ?>">Fakultas Ekonomi dan Bisnis</a>
                    <a href="<?php echo base_url('superuser/filterFakultas/'.'FST'); ?>">Fakultas Sains dan Teknologi</a>
                    <a href="<?php echo base_url('superuser/filterFakultas/'.'FF'); ?>">Fakultas Farmasi</a>
                    <a href="<?php echo base_url('superuser/filterFakultas/'.'FH'); ?>">Fakultas Hukum</a>
                    <a href="<?php echo base_url('superuser/filterFakultas/'.'FK'); ?>">Fakultas Kedokteran</a>
                    <a href="<?php echo base_url('superuser/filterFakultas/'.'FPSI'); ?>">Fakultas Psikologi</a>
                    <a href="<?php echo base_url('superuser/filterFakultas/'.'FKM'); ?>">Fakultas Kesehatan Masyarakat</a>
                    <a href="<?php echo base_url('superuser/filterFakultas/'.'FKG'); ?>">Fakultas Kedokteran Gigi</a>
                    <a href="<?php echo base_url('superuser/filterFakultas/'.'FKP'); ?>">Fakultas Keperawatan</a>
                    <a href="<?php echo base_url('superuser/filterFakultas/'.'FIB'); ?>">Fakultas Ilmu Budaya</a>
                    <a href="<?php echo base_url('superuser/filterFakultas/'.'FKH'); ?>">Fakultas Kedokteran Hewan</a>
                    <a href="<?php echo base_url('superuser/filterFakultas/'.'FISIP'); ?>">Fakultas Sosial dan Politik</a>
                    <a href="<?php echo base_url('superuser/filterFakultas/'.'FPK'); ?>">Fakultas Perikanan dan Kelautan</a>
                    <a href="<?php echo base_url('superuser/filterFakultas/'.'FV'); ?>">Fakultas Vokasi</a>
                  </div>
              </div>
              <!-- END OF DROPDOWN FILTER BY FACULTY -->

              <!-- DROPDOWN FILTER BY KDR -->
              <div class="dropdown">
                <button onclick="myFunction2()" class="dropbtn">Filter</button>
                  <div id="myDropdown2" class="dropdown-content">
                    <input type="text" placeholder="Search.." id="myInput2" onkeyup="filterFunction2()">
                    <a href="<?php echo base_url('superuser/filterKDR/'.'1'); ?>">Pra Mula</a>
                    <a href="<?php echo base_url('superuser/filterKDR/'.'2'); ?>">Mula (Sudah PDK 1)</a>
                    <a href="<?php echo base_url('superuser/filterKDR/'.'3'); ?>">Madya (Sudah PDK 2)</a>
                    <a href="<?php echo base_url('superuser/filterKDR/'.'4'); ?>">Utama (Sudah PDK 3)</a>
                  </div>
              </div>
              <!-- END OF DROPDOWN FILTER BY KDR -->

              <a href="<?php echo base_url('admin/exportExcelFak/'.$kode); ?>">Export to Excel</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama Lengkap</th>
                      <th>NIM</th>
                      <th>Alamat</th>
                      <th>No. HP</th>
                      <th>Amanah</th>
                      <th>Status KDR</th>
                      <th>Status Exc</th>
                      <th>Nama Mentor</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nama Lengkap</th>
                      <th>NIM</th>
                      <th>Alamat</th>
                      <th>No. HP</th>
                      <th>Amanah</th>
                      <th>Status KDR</th>
                      <th>Status Exc</th>
                      <th>Nama Mentor</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <?php 
                    $no = 1;
                    foreach($anggota as $u){ 
                    ?>
                  <tbody>
                    <tr>
                      <td><?php echo $u->nama_lengkap ?></td>
                      <td><?php echo $u->nim ?></td>
                      <td><?php echo $u->alamat ?></td>
                      <td><?php echo $u->no_hp ?></td>
                      <td><?php echo $u->deskripsi_amanah ?></td>
                      <td><?php echo $u->deskripsi_kdr ?></td>
                      <td><?php echo $u->deskripsi_exc ?></td>
                      <td><?php echo $u->nama_mentor ?></td>
                      <td>
                          <?php echo anchor('crudAnggota/editAnggota/'.$u->nim,'Edit'); ?>
                          <a onClick='return checkDelete()' href="<?php echo base_url('crudAnggota/hapusAnggota/'.$u->nim.'/'.$level); ?>">Hapus
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