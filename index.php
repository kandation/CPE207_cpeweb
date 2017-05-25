<!DOCTYPE html>
<html lang="en">
<head>

    <!-- SITE TITTLE -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home - CPE CMU</title>

    <!-- PLUGINS CSS STYLE -->
    <link href="plugins/jquery-ui/jquery-ui.css" rel="stylesheet">
    <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="plugins/rs-plugin/css/settings.css" media="screen">
    <link rel="stylesheet" type="text/css" href="plugins/selectbox/select_option1.css">
    <link rel="stylesheet" type="text/css" href="plugins/owl-carousel/owl.carousel.css" media="screen">
    <link rel="stylesheet" type="text/css" href="plugins/isotope/jquery.fancybox.css">
    <link rel="stylesheet" type="text/css" href="plugins/isotope/isotope.css">

    <!-- GOOGLE FONT -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Dosis:400,300,600,700' rel='stylesheet' type='text/css'>

    <!-- CUSTOM CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/colors/default.css" id="option_color">

    <!-- Icons -->
    <link rel="shortcut icon" href="img/logo_cpe.png">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="body-wrapper">

<div class="main-wrapper">
    <header id="pageTop" class="header-wrapper">
        <!-- COLOR BAR -->
        <div class="container-fluid color-bar top-fixed clearfix">
            <div class="row">
                <div class="col-sm-1 col-xs-2 bg-color-1">fix bar</div>
                <div class="col-sm-1 col-xs-2 bg-color-2">fix bar</div>
                <div class="col-sm-1 col-xs-2 bg-color-3">fix bar</div>
                <div class="col-sm-1 col-xs-2 bg-color-4">fix bar</div>
                <div class="col-sm-1 col-xs-2 bg-color-5">fix bar</div>
                <div class="col-sm-1 col-xs-2 bg-color-6">fix bar</div>
                <div class="col-sm-1 bg-color-1 hidden-xs">fix bar</div>
                <div class="col-sm-1 bg-color-2 hidden-xs">fix bar</div>
                <div class="col-sm-1 bg-color-3 hidden-xs">fix bar</div>
                <div class="col-sm-1 bg-color-4 hidden-xs">fix bar</div>
                <div class="col-sm-1 bg-color-5 hidden-xs">fix bar</div>
                <div class="col-sm-1 bg-color-6 hidden-xs">fix bar</div>
            </div>
        </div>

        <!-- TOP INFO BAR -->
        <?php
        include_once "static/top.php"?>

        <!-- NAVBAR -->
        <?php
        include_once dirname(__FILE__)."/static/menu.php";
        ?>
    </header>

    <?php
    include_once dirname(__FILE__)."/object/banner.php";
    ?>

    <?php
    include_once dirname(__FILE__)."/object/list.php";
    ?>

    <?php
    include_once dirname(__FILE__)."/object/content_fact.php";
    ?>

    <?php
    include_once dirname(__FILE__)."/object/promotion.php";
    ?>

    <?php
    include_once dirname(__FILE__)."/object/our_teacher.php";
    ?>

    <?php
    include_once dirname(__FILE__)."/object/our_gallery.php";
    ?>

    <?php
    include_once dirname(__FILE__)."/object/lastest_news.php";
    ?>



    <!-- FOOTER -->
    <footer>
        <?php
        include_once "static/footer.php";
        ?>
    </footer>
</div>

<div class="scrolling">
    <a href="#pageTop" class="backToTop hidden-xs" id="backToTop"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
</div>

<!-- LOGIN MODAL -->
<?php
include_once "static/login.php";
?>

<!-- CREATE ACCOUNT MODAL -->
<?php
include_once "static/register.php";
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.js"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="plugins/selectbox/jquery.selectbox-0.1.3.min.js"></script>
<script src="plugins/owl-carousel/owl.carousel.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="plugins/counter-up/jquery.counterup.min.js"></script>
<script src="plugins/isotope/isotope.min.js"></script>
<script src="plugins/isotope/jquery.fancybox.pack.js"></script>
<script src="plugins/isotope/isotope-triger.js"></script>
<script src="plugins/countdown/jquery.syotimer.js"></script>
<script src="plugins/velocity/velocity.min.js"></script>
<script src="plugins/smoothscroll/SmoothScroll.js"></script>
<script src="js/custom.js"></script>

</body>

</html>
