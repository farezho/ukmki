<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UKMKI UNAIR</title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="<?php echo base_url()?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url()?>assets/css/sb-admin.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url()?>assets/css/dropdownFilter.css" rel="stylesheet">

    <!-- CSS fonts di Report bug -->
    <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed" rel="stylesheet">

    <!-- CONFIRM BUTTON BEFORE DELETING DATA -->
    <script language="JavaScript" type="text/javascript">
      function checkDelete(){
          return confirm('Are you sure?');
      }
    </script>

    <!-- dropdown filter by faculty -->
    <script>
      /* When the user clicks on the button,
      toggle between hiding and showing the dropdown content */
      function myFunction() {
          document.getElementById("myDropdown").classList.toggle("show");
      }

      function filterFunction() {
          var input, filter, ul, li, a, i;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          div = document.getElementById("myDropdown");
          a = div.getElementsByTagName("a");
          for (i = 0; i < a.length; i++) {
              if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                  a[i].style.display = "";
              } else {
                  a[i].style.display = "none";
              }
          }
      }
    </script>
    <!-- end of dropdown filter by faculty -->

    <!-- dropdown filter by KDR -->
    <script>
      /* When the user clicks on the button,
      toggle between hiding and showing the dropdown content */
      function myFunction2() {
          document.getElementById("myDropdown2").classList.toggle("show");
      }

      function filterFunction2() {
          var input, filter, ul, li, a, i;
          input = document.getElementById("myInput2");
          filter = input.value.toUpperCase();
          div = document.getElementById("myDropdown2");
          a = div.getElementsByTagName("a");
          for (i = 0; i < a.length; i++) {
              if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                  a[i].style.display = "";
              } else {
                  a[i].style.display = "none";
              }
          }
      }
    </script>
    <!-- end of dropdown filter by KDR -->

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="">Hai, <?php echo $this->session->userdata("nama"); ?></a>
       <?php $level = $this->session->userdata("level"); ?>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Other Menu</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo base_url('login/logout'); ?>">Logout</a>
          </div>
        </li>
      </ul>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

    </nav>