<?php 
$session = $this->session->userdata('ci_seesion_key');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>CariGuru | <?=$page_title;?></title>
    <?php include 'top.php'; ?>
  </head>
  <body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="loader bg-white">
        <div class="whirly-loader"> </div>
      </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper">
      <!-- Page Header Start-->
      <div class="page-main-header">
        <?php include 'header.php'; ?>  
      </div>
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <?php include $session['tipe'].'/navigation.php';?>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col">
                  <div class="page-header-left">
                    <h3><?=$session['tipe']?></h3>
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                      <li class="breadcrumb-item">Dashboard</li>
                    </ol>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <?php include $session['tipe'].'/'.$page_name.'.php'; ?>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 footer-copyright">
                <p class="mb-0">Copyright 2020 © CariGuru rights reserved.</p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    
    <?php include 'bottom.php'; ?>
  </body>
</html>