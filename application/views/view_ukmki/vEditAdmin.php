<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Admin</title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url()?>assets/css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Edit Admin</div>
        <div class="card-body">
          <?php foreach($admin as $u){ ?>
          <form method="post" action="<?php echo base_url('superuser/aksi_editAdmin')?>">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="username" id="inputUsername" class="form-control" value="<?php echo $u->username ?>" readonly>
                <label for="inputUsername">Username</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" name="password" id="inputPassword" class="form-control" value="<?php echo $u->password ?>" required="required">
                <label for="inputPassword">Password</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="name" id="inputName" class="form-control" placeholder="Full Name" required="required" value="<?php echo $u->nama_lengkap ?>">
                <label for="inputName">Full Name</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" name="email" id="inputEmail" class="form-control" value="<?php echo $u->email ?>" required="required">
                <label for="inputEmail">Email address</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="number" name="no_hp" id="inputNohp" class="form-control" value="<?php echo $u->no_hp ?>" required="required">
                <label for="inputNohp">Phone Number</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="address" id="inputAddress" class="form-control" value="<?php echo $u->alamat ?>" required="required">
                <label for="inputAddress">Address</label>
              </div>
            </div>
            <input class="tombol-submit" type="submit" name="submit" value="Update"/>
            <!-- <a class="btn btn-primary btn-block" type="submit">Add</a>-->
          </form>
          <?php } ?>
          <div class="text-center">
            <a class="d-block small mt-3" href="<?php echo base_url('superuser/lihatAdmin')?>">Back</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url()?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
