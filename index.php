<?php 
    session_start();
    // include 'Model/connect.php';
    // include 'Model/tea.php';
    // include 'Model/giohang.php';
    // include 'Model/user.php';
    // include 'Model/hoadon.php';
    include "./PHPMailer/src/PHPMailer.php";
    include "./PHPMailer/src/SMTP.php";
    set_include_path(get_include_path().PATH_SEPARATOR.'Model/');
    spl_autoload_extensions('.php');
    spl_autoload_register();
    include "./Model/uploadimage.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Coffee - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="Content/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="Content/css/animate.css">
    
    <link rel="stylesheet" href="Content/css/owl.carousel.min.css">
    <link rel="stylesheet" href="Content/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="Content/css/magnific-popup.css">

    <link rel="stylesheet" href="Content/css/aos.css">

    <link rel="stylesheet" href="Content/css/ionicons.min.css">

    <link rel="stylesheet" href="Content/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="Content/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="Content/css/flaticon.css">
    <link rel="stylesheet" href="Content/css/icomoon.css">
    <link rel="stylesheet" href="Content/css/styleMain.css">
</head>
<body>
    <?php include('./View/header.php') ?>
    <div>
            <!-- hien thi noi dung đây -->
            <?php 
                $ctrl = 'home';
                if(isset($_GET['action'])){
                    $ctrl = $_GET['action'];
                }
                include './Controller/'.$ctrl .'.php';
            ?>
    </div>
    <?php include('./View/footer.php') ?>
    <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="Content/js/jquery.min.js"></script>
<script src="Content/js/jquery-migrate-3.0.1.min.js"></script>
<script src="Content/js/popper.min.js"></script>
<script src="Content/js/bootstrap.min.js"></script>
<script src="Content/js/jquery.easing.1.3.js"></script>
<script src="Content/js/jquery.waypoints.min.js"></script>
<script src="Content/js/jquery.stellar.min.js"></script>
<script src="Content/js/owl.carousel.min.js"></script>
<script src="Content/js/jquery.magnific-popup.min.js"></script>
<script src="Content/js/aos.js"></script>
<script src="Content/js/jquery.animateNumber.min.js"></script>
<script src="Content/js/bootstrap-datepicker.js"></script>
<script src="Content/js/jquery.timepicker.min.js"></script>
<script src="Content/js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="Content/js/google-map.js"></script>
<script src="Content/js/main.js"></script>
</body>
</html>