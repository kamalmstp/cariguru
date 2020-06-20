<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="endless admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, endless admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link href="<?=base_url();?>public/img/logo.png" rel="icon">
    <link rel="shortcut icon" href="<?=base_url();?>public/img/logo.png" type="image/x-icon">
    <title><?php echo $title;?></title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>login/css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>login/css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>login/css/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>login/css/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>login/css/feather-icon.css">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>login/css/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>login/css/style.css">
    <link id="color" rel="stylesheet" href="<?php echo base_url('assets/') ?>login/css/light-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>login/css/responsive.css">
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
      <div class="container-fluid p-0">
        <!-- login page start-->
        <div class="authentication-main">
          <div class="row">
            <div class="col-md-12">
              <div class="text-center">
                <div class="text-center">
                  
                  <img src="<?=base_url();?>public/img/logo.png" width="5%">

                </div>
            </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-xl-6">
              <div class="text-center">
                <img src="<?php echo base_url('public/') ?>img/login.png" width="100%" alt="">
              </div>
            </div>
            <div class="col-sm-12 col-xl-6">
              <div class="auth-innerright">
                <div class="authentication-box">
                  <h2>Login Form</h2>
        <?php if (validation_errors()) { ?>
            <div class="alert alert-danger">
                <?php echo validation_errors(); ?>
            </div>
        <?php } ?>
        <?php if (!empty($this->input->get('msg')) && $this->input->get('msg') == 1) { ?>
            <div class="alert alert-danger">
                Please Enter Your Valid Information.
            </div>
        <?php } ?>
        <?php echo form_open('auth/doLogin'); ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        <input type="text" name="user_name" class="form-control" id="username" placeholder="User Name/Email">
                    </div>
                </div>        
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-lock"></i>
                        </span>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <span class="small pull-left">Not a user yet? </span><a href="<?php print site_url(); ?>signup" class="small pull-left">&nbsp;Register Now</a>
                    <a href="<?php print site_url(); ?>forgotpwd" class="small pull-right">Forgot password?</a>
                </div>
            </div>                
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group pull-right">
                    <button type="submit" id="login" class="btn btn-info">Login</button>
                </div>
            </div>
        </div>
    <?php echo form_close(); ?>
                  <!-- <?php if ($this->session->flashdata('MSG')) { ?>
                  <?= $this->session->flashdata('MSG') ?>
                  <?php } ?>
                  <div class="card mt-4" style="border-radius: 4px;">
                    <div class="card-body">
                      <form class="theme-form" action="<?php echo site_url('login/do_login')?>" method="post">
                        <div class="form-group">
                            <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus required="" style="background-color: #F9EFF2; border-color: #F9EFF2;">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="password" type="password" value="" required="" style="background-color: #F9EFF2; border-color: #F9EFF2;">
                        </div>
                        <div class="form-group form-row mt-3 mb-0">
                          <button class="btn btn-danger btn-block" type="submit">LOGIN</button>
                        </div>
                        <div class="form-group">
                          <div class="text-right">
                          <a href="" style="color: red;"><i>Lupa Password?</i></a>
                        </div>
                        </div>
                        
                      </form>
                    </div>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                  <p style="color: red;">Belum punya akun? Silahkan <a href="<?php echo site_url('register')?>"><b style="color: red;">DAFTAR</b></a></p>
                </div>
            </div>
          </div>
        </div>
        <!-- login page end-->
      </div>
    </div>
    <!-- latest jquery-->
    <script src="<?php echo base_url('assets/') ?>login/js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap js-->
    <script src="<?php echo base_url('assets/') ?>login/js/bootstrap/popper.min.js"></script>
    <script src="<?php echo base_url('assets/') ?>login/js/bootstrap/bootstrap.js"></script>
    <!-- feather icon js-->
    <script src="<?php echo base_url('assets/') ?>login/js/icons/feather-icon/feather.min.js"></script>
    <script src="<?php echo base_url('assets/') ?>login/js/icons/feather-icon/feather-icon.js"></script>
    <!-- Sidebar jquery-->
    <script src="<?php echo base_url('assets/') ?>login/js/sidebar-menu.js"></script>
    <script src="<?php echo base_url('assets/') ?>login/js/config.js"></script>
    <!-- Plugins JS start-->
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="<?php echo base_url('assets/') ?>login/js/script.js"></script>
    <!-- Plugin used-->
  </body>

<!-- Mirrored from admin.pixelstrap.com/endless/ltr/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 May 2020 19:02:49 GMT -->
</html>