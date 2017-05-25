<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gallery - CPE CMU</title>

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
    <section class="pageTitleSection">
      <div class="container">
        <div class="pageTitleInfo">
          <h2>Photo Gallery</h2>
          <ol class="breadcrumb">
            <li><a href="index-v1.html">Home</a></li>
            <li class="active">Photo Gallery</li>
          </ol>
        </div>
      </div>
    </section>

    <!-- MAIN SECTION -->
    <section class="mainContent full-width clearfix homeGallerySection">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="filter-container isotopeFilters">
              <ul class="list-inline filter">
                <li class="active"><a href="#" data-filter="*">View All</a></li>
                <li><a href="#" data-filter=".charity">Charity</a></li>
                <li><a href="#" data-filter=".nature">nature</a></li>
                <li><a href="#" data-filter=".children">children</a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="row isotopeContainer" id="container">
          <div class="col-md-3 col-sm-6 col-xs-12 isotopeSelector charity">
            <article class="">
              <figure>
                <img src="img/home/home_gallery/1.jpg" alt="image" class="img-rounded">
                <div class="overlay-background">
                  <div class="inner"></div>
                </div>
                <div class="overlay">
                  <a class="fancybox-pop" rel="portfolio-1" href="img/home/home_gallery/1.jpg">
                    <i class="fa fa-search-plus" aria-hidden="true"></i>
                  </a>
                </div>
              </figure>
            </article>
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12 isotopeSelector nature">
            <article class="">
              <figure>
                <img src="img/home/home_gallery/2.jpg" alt="image" class="img-rounded">
                <div class="overlay-background">
                  <div class="inner"></div>
                </div>
                <div class="overlay">
                  <a class="fancybox-pop" rel="portfolio-1" href="img/home/home_gallery/2.jpg">
                    <i class="fa fa-search-plus" aria-hidden="true"></i>
                  </a>
                </div>
              </figure>
            </article>
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12 isotopeSelector nature">
            <article class="">
              <figure>
                <img src="img/home/home_gallery/2-1.jpg" alt="image" class="img-rounded">
                <div class="overlay-background">
                  <div class="inner"></div>
                </div>
                <div class="overlay">
                  <a class="fancybox-pop" rel="portfolio-1" href="img/home/home_gallery/2-1.jpg">
                    <i class="fa fa-search-plus" aria-hidden="true"></i>
                  </a>
                </div>
              </figure>
            </article>
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12 isotopeSelector charity">
            <article class="">
              <figure>
                <img src="img/home/home_gallery/2-2.jpg" alt="image" class="img-rounded">
                <div class="overlay-background">
                  <div class="inner"></div>
                </div>
                <div class="overlay">
                  <a class="fancybox-pop" rel="portfolio-1" href="img/home/home_gallery/2-2.jpg">
                    <i class="fa fa-search-plus" aria-hidden="true"></i>
                  </a>
                </div>
              </figure>
            </article>
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12 isotopeSelector nature">
            <article class="">
              <figure>
                <img src="img/home/home_gallery/3.jpg" alt="image" class="img-rounded">
                <div class="overlay-background">
                  <div class="inner"></div>
                </div>
                <div class="overlay">
                  <a class="fancybox-pop" rel="portfolio-1" href="img/home/home_gallery/3.jpg">
                    <i class="fa fa-search-plus" aria-hidden="true"></i>
                  </a>
                </div>
              </figure>
            </article>
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12 isotopeSelector children">
            <article class="">
              <figure>
                <img src="img/home/home_gallery/4.jpg" alt="image" class="img-rounded">
                <div class="overlay-background">
                  <div class="inner"></div>
                </div>
                <div class="overlay">
                  <a class="fancybox-pop" rel="portfolio-1" href="img/home/home_gallery/4.jpg">
                    <i class="fa fa-search-plus" aria-hidden="true"></i>
                  </a>
                </div>
              </figure>
            </article>
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12 isotopeSelector children">
            <article class="">
              <figure>
                <img src="img/home/home_gallery/5.jpg" alt="image" class="img-rounded">
                <div class="overlay-background">
                  <div class="inner"></div>
                </div>
                <div class="overlay">
                  <a class="fancybox-pop" rel="portfolio-1" href="img/home/home_gallery/5.jpg">
                    <i class="fa fa-search-plus" aria-hidden="true"></i>
                  </a>
                </div>
              </figure>
            </article>
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12 isotopeSelector children">
            <article class="">
              <figure>
                <img src="img/home/home_gallery/6.jpg" alt="image" class="img-rounded">
                <div class="overlay-background">
                  <div class="inner"></div>
                </div>
                <div class="overlay">
                  <a class="fancybox-pop" rel="portfolio-1" href="img/home/home_gallery/6.jpg">
                    <i class="fa fa-search-plus" aria-hidden="true"></i>
                  </a>
                </div>
              </figure>
            </article>
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12 isotopeSelector nature">
            <article class="">
              <figure>
                <img src="img/home/home_gallery/7.jpg" alt="image" class="img-rounded">
                <div class="overlay-background">
                  <div class="inner"></div>
                </div>
                <div class="overlay">
                  <a class="fancybox-pop" rel="portfolio-1" href="img/home/home_gallery/7.jpg">
                    <i class="fa fa-search-plus" aria-hidden="true"></i>
                  </a>
                </div>
              </figure>
            </article>
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12 isotopeSelector charity">
            <article class="">
              <figure>
                <img src="img/home/home_gallery/8.jpg" alt="image" class="img-rounded">
                <div class="overlay-background">
                  <div class="inner"></div>
                </div>
                <div class="overlay">
                  <a class="fancybox-pop" rel="portfolio-1" href="img/home/home_gallery/8.jpg">
                    <i class="fa fa-search-plus" aria-hidden="true"></i>
                  </a>
                </div>
              </figure>
            </article>
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12 isotopeSelector nature">
            <article class="">
              <figure>
                <img src="img/home/home_gallery/9.jpg" alt="image" class="img-rounded">
                <div class="overlay-background">
                  <div class="inner"></div>
                </div>
                <div class="overlay">
                  <a class="fancybox-pop" rel="portfolio-1" href="img/home/home_gallery/9.jpg">
                    <i class="fa fa-search-plus" aria-hidden="true"></i>
                  </a>
                </div>
              </figure>
            </article>
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12 isotopeSelector children">
            <article class="">
              <figure>
                <img src="img/home/home_gallery/10.jpg" alt="image" class="img-rounded">
                <div class="overlay-background">
                  <div class="inner"></div>
                </div>
                <div class="overlay">
                  <a class="fancybox-pop" rel="portfolio-1" href="img/home/home_gallery/10.jpg">
                    <i class="fa fa-search-plus" aria-hidden="true"></i>
                  </a>
                </div>
              </figure>
            </article>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12 isotopeSelector nature">
            <article class="">
              <figure>
                <img src="img/home/home_gallery/course-2.jpg" alt="image" class="img-rounded">
                <div class="overlay-background">
                  <div class="inner"></div>
                </div>
                <div class="overlay">
                  <a class="fancybox-pop" rel="portfolio-1" href="img/home/home_gallery/course-2.jpg">
                    <i class="fa fa-search-plus" aria-hidden="true"></i>
                  </a>
                </div>
              </figure>
            </article>
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12 isotopeSelector charity">
            <article class="">
              <figure>
                <img src="img/home/home_gallery/bg_img1.jpg" alt="image" class="img-rounded">
                <div class="overlay-background">
                  <div class="inner"></div>
                </div>
                <div class="overlay">
                  <a class="fancybox-pop" rel="portfolio-1" href="img/home/home_gallery/bg_img1.jpg">
                    <i class="fa fa-search-plus" aria-hidden="true"></i>
                  </a>
                </div>
              </figure>
            </article>
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12 isotopeSelector nature">
            <article class="">
              <figure>
                <img src="img/home/home_gallery/11.jpg" alt="image" class="img-rounded">
                <div class="overlay-background">
                  <div class="inner"></div>
                </div>
                <div class="overlay">
                  <a class="fancybox-pop" rel="portfolio-1" href="img/home/home_gallery/11.jpg">
                    <i class="fa fa-search-plus" aria-hidden="true"></i>
                  </a>
                </div>
              </figure>
            </article>
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12 isotopeSelector children">
            <article class="">
              <figure>
                <img src="img/home/home_gallery/12.jpg" alt="image" class="img-rounded">
                <div class="overlay-background">
                  <div class="inner"></div>
                </div>
                <div class="overlay">
                  <a class="fancybox-pop" rel="portfolio-1" href="img/home/home_gallery/12.jpg">
                    <i class="fa fa-search-plus" aria-hidden="true"></i>
                  </a>
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
