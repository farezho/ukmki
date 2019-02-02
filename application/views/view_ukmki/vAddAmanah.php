<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add New Position</title>

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
        <div class="card-header">Add New Position</div>
        <div class="card-body">
          <form method="post" action="<?php echo base_url('superuser/aksi_addAmanah')?>">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="deskripsi_amanah" id="inputName" class="form-control" placeholder="Full Name" required="required">
                <label for="inputName">Description</label>
              </div>
            </div>
            <input class="tombol-add" type="submit" name="submit" value="Add"/>
            <!-- <a class="btn btn-primary btn-block" type="submit">Add</a>-->
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="<?php echo base_url('superuser/lihatAmanah')?>">Back</a>
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
