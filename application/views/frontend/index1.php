<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CariGuru</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url();?>public/img/favicon.png" rel="icon">
  <link href="<?php echo base_url();?>public/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url();?>public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>public/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>public/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>public/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?php echo base_url();?>public/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>public/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet">

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <?php include 'navigation.php'; ?>
  </header><!-- End Header -->

  <main id="main">

    <?php include $page_name.'.php'; ?>

  </main>

  <footer id="footer">
    <?php include 'footer.php';?>
  </footer>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url();?>public/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url();?>public/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url();?>public/vendor/php-email-form/validate.js"></script>
  <script src="<?php echo base_url();?>public/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url();?>public/vendor/venobox/venobox.min.js"></script>
  <script src="<?php echo base_url();?>public/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="<?php echo base_url();?>public/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url();?>public/js/main.js"></script>

</body>

</html>