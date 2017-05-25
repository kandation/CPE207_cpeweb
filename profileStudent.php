<?php
// Import api
include_once dirname(__FILE__) . "/admin/inc/inc_dbcon.inc.php";
include_once dirname(__FILE__)."/api.php";


if(isset($_GET['id'])){
    $ff = new StudentApi("student");
    $prof = $ff->find_data_by_sid($_GET['id'])[0];
    $student_img = new ImageApi();
}
?>

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
      <!-- HEADER -->
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
          <!-- NAVBAR -->

    </header>

    <!-- PAGE TITLE SECTION-->
      <?php
      include_once "static/page_title.php";
      title_person("student");

      ?>

    <!-- MAIN SECTION -->
    <section class="mainContent full-width clearfix">
      <div class="container">
        <div class="row">
          <div class="col-sm-4 col-xs-12">
            <div class="teachersPhoto">

                <img class="img-rounded img-responsive" src="<?=$student_img->get_student_img_url($prof['sid']);?>">

            </div>
          </div>
          <div class="col-sm-8 col-xs-12">
            <div class="teachersInfo">

              <h3>Student Information</h3>
              <div class="teachersProfession bg-color-1">Name</div>
              <div class="professionDetails"><?php echo $prof['firstname_th'];?> <?php echo $prof['lastname_th'];?></div>
              <div class="teachersProfession bg-color-2">Nickname</div>
              <div class="professionDetails"><?php echo $prof['nickname'];?></div>
              <div class="teachersProfession bg-color-3">ID</div>
              <div class="professionDetails"><?php echo $prof['sid'];?></div>
                <div class="teachersProfession bg-color-4">Gender</div>
                <div class="professionDetails"><?php echo $prof['gender'];?></div>
                <div class="teachersProfession bg-color-5">Telephon number</div>
                <div class="professionDetails"><?php echo "0".$prof['telno'];?></div>
                <div class="teachersProfession bg-color-6">E-mail</div>
                <div class="professionDetails"><?php echo $prof['email'];?></div>
                <div class="teachersProfession bg-color-3">วิธีเข้ามา</div>
                <div class="professionDetails"><?php echo $prof['from'];?></div>
            </div>
          </div>
        </div>
      </div>
    </section>

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
