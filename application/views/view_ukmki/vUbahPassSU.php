<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Change Password</title>

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
        <div class="card-header">Change Password</div>
        <div class="card-body">
          <?php foreach($admin as $u){ ?>
          <form method="post" action="<?php echo base_url('superuser/action_changePass')?>">
            <div class="form-group">
              <div class="form-label-group">
                <input type="hidden" name="username" id="inputUsername" class="form-control" value="<?php echo $u->username?>" required="required" readonly>
                <label for="inputUsername">Username</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="hidden" name="getPass" id="inputGPass" class="form-control" value="<?php echo $u->password?>" required="required" readonly>
                <label for="inputGPass">Get Pass</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" name="c-password" id="inputCPass" class="form-control" placeholder="Current Password" required="required">
                <label for="inputCPass">Current Password</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
                    <label for="inputPassword">New Password</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" name="re-password" id="confirmPassword" class="form-control" placeholder="Confirm password" required="required">
                    <label for="confirmPassword">Confirm New Password</label>
                  </div>
                </div>
              </div>
            </div>
            <input class="tombol-submit" type="submit" name="submit" value="Change"/>
            <!-- <a class="btn btn-primary btn-block" type="submit">Add</a>-->
          </form>
        <?php } ?>
          <div class="text-center">
            <a class="d-block small mt-3" href="<?php echo base_url('superuser')?>">Back</a>
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
