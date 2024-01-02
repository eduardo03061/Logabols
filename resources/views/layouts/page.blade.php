<!doctype html>

<html lang="en">





<head>

  <!-- Required meta tags -->

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Logabols | Bolsa Camiseta</title>

  <meta name="Logabols" content="Logabols">

  <!-- description -->

  <meta name="description" content="Bolsa Ecológica">

  <!-- keywords -->

  <meta name="keywords" content="Business , Bootstrap4, Responsive, HTML5, CSS3, Carousel, Website Template, Revolution, UI Development, Bizler">



  <!-- Favicon -->

  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />

  <!-- Aminate CSS -->

  <link rel="stylesheet" href="{{ asset('css/animate.css') }}" />

  <!-- Flaticon CSS -->

  <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}" />

  <!-- Bootstrap CSS -->

  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />

  <!-- Owl Carousel stylesheet -->

  <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" />

  <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}" />

  <!-- Lightbox CSS -->

  <link rel="stylesheet" href="{{ asset('css/lightbox.css') }}" />

  <!-- Skin Green Css -->

  <link rel="stylesheet" href="{{ asset('css/skin-green.css') }}" />

  <!-- Header CSS -->

  <link rel="stylesheet" href="{{ asset('css/header.css') }}">

  <!-- Style CSS -->

  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

  <!-- Responsive CSS -->

  <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" />

  <script src="{{ asset('js/jquery.min.js') }}"></script>

  <!-- REVOLUTION CSS -->

  <link rel="stylesheet" href="{{ asset('css/settings.css') }}" />

  <!-- REVOLUTION JS FILES -->

  <script src="{{ asset('js/revolution/jquery.themepunch.tools.min.js') }}"></script>

  <script src="{{ asset('js/revolution/jquery.themepunch.revolution.min.js') }}"></script>

  <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->

  <script src="{{ asset('js/revolution/revolution.extension.actions.min.js') }}"></script>

  <script src="{{ asset('js/revolution/revolution.extension.layeranimation.min.js') }}"></script>

  <script src="{{ asset('js/revolution/revolution.extension.parallax.min.js') }}"></script>

  <script src="{{ asset('js/revolution/revolution.extension.slideanims.min.js') }}"></script>

</head>

<body>

  <!-- ====== Preloader ====== -->

  <div class="preloader js-preloader flex-center">

    <div class="dots">

      <div class="dot"></div>

      <div class="dot"></div>

      <div class="dot"></div>

    </div>

  </div>



  <div class="wraper">

    <!-- ====== Header Starts ====== -->

    <header class="header">

      <div class="container">
        <nav class="navbar navbar-expand-lg">
          <!-- Brand -->
          <h2 class="nav-brand">
            <a class="navbar-brand" href="index.html" title="Bizler" style="color: green;">Logabols</a>
          </h2>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
          </button>
          <!-- Links -->

          <div class="main-menu collapse navbar-collapse" id="nav-content">
            <ul class="navbar-nav">
              <li class="nav-item dropdown active">
                <a class="nav-link" href="#">INICIO</a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="Productos/">PRODUCTOS</a>
                <ul class="dropdown-menu">
                  <li class="dropdown-item"><a href="#">Bolsa Camiseta</a></li>
                  <li class="dropdown-item"><a href="#">Rollo Camiseta</a></li>
                  <li class="dropdown-item"><a href="#">Rollo Natural</a></li>
                  <li class="dropdown-item"><a href="#">Rollo Color</a></li>
                  <li class="dropdown-item"><a href="#">Rollo Negro</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">CONTACTO</a>
                <ul class="dropdown-menu">
                  <li class="dropdown-item"><a href="{{ url('/Contacto') }}" title="Services">Ver Directorio Telefonico</a></li>

                  <!--<li class="dropdown-item"><a href="portfolio-3-column.html" title="Services">Portfolio 3 Column</a></li>

                  <li class="dropdown-item"><a href="portfolio-detail.html" title="Services">Portfolio Detail</a></li>-->

                </ul>

              </li>

              <li class="nav-item dropdown">
                <a class="nav-link" href="{{ route('login') }}">ACCESO</a>
              </li>
          </div>
        </nav>
      </div>
    </header>
    <!-- ====== Header End ====== -->

    <div class="container">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="http://www.logabols.com.mx/assets/images/Logo.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="http://www.logabols.com.mx/Imagenes/Logabols2018.jpg" class="d-block w-50 mx-auto" alt="...">
          </div>
          <div class="carousel-item">
            <img src="http://www.logabols.com.mx/Imagenes/Basura.jpeg" class="d-block w-50 mx-auto" alt="...">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    <!-- ====== Banner End ====== -->



    <!-- ====== Blog Posts Start ====== -->

    <section id="blog-post-list">

      <div class="container">

        <div class="col-lg-12 col-md-12 col-xs-12">

          <div class="row blog-isotope">

            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 card_mr_bt blog-iso-item">

              <div class="card  col-lg-10 col-xs-12">

                <img src="{{ asset('Img/Camiseta_Negra.jpeg') }}" class="card-img-top" alt="...">

                <div class="card-body">

                  <p class="card-text">Camiseta Baja Densidad Negra</p>

                </div>

                <a class="btn btn-success" href="#" role="button">VER DETALLES</a><br>
              </div>

            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 card_mr_bt blog-iso-item">

              <div class="card  col-lg-10 col-xs-12">

                <img src="{{ asset('Img/Camiseta_Polipapel_Color.png') }}" class="card-img-top" alt="...">

                <div class="card-body">

                  <p class="card-text">Bolsa Polipapel Color</p>

                </div>
                <a class="btn btn-success" href="#" role="button">VER DETALLES</a><br>
              </div>

            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 card_mr_bt blog-iso-item">

              <div class="card  col-lg-10 col-xs-12">

                <img src="{{ asset('Img/Camiseta_Polisuper.png') }}" class="card-img-top" alt="...">

                <div class="card-body">

                  <p class="card-text">Bolsa Polisuper</p>

                </div>
                <a class="btn btn-success" href="#" role="button">VER DETALLES</a><br>
              </div>

            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 card_mr_bt blog-iso-item">

              <div class="card  col-lg-10 col-xs-12">

                <img src="{{ asset('Img/Camiseta_Baja_Traslucida.jpeg') }}" class="card-img-top" alt="...">

                <div class="card-body">

                  <p class="card-text">Camiseta Baja Traslucida</p>

                </div>
                <a class="btn btn-success" href="#" role="button">VER DETALLES</a><br>
              </div>

            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 card_mr_bt blog-iso-item">

              <div class="card  col-lg-10 col-xs-12">

                <img src="{{ asset('Img/Bolsa_Plana_Baja_Densidad.png') }}" class="card-img-top" alt="...">

                <div class="card-body">

                  <p class="card-text">Bolsa Plana Baja Densidad</p>

                </div>
                <a class="btn btn-success" href="#" role="button">VER DETALLES</a><br>
              </div>

            </div>
            <!-- <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 card_mr_bt blog-iso-item">

          <div class="card col-lg-10 col-xs-12">

            <img src="http://www.logabols.com.mx/Imagenes/camiseta.png" class="card-img-top" alt="...">

            <div class="card-body">

                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

            </div>
            <a class="btn btn-success" href="#" role="button">VER DETALLES</a><br>
         </div>

        </div>
      </div>-->

          </div>

          <nav aria-label="Page navigation example">

            <ul class="pagination justify-content-center">

              <li class="page-item disabled"> <a class="page-link" href="#" tabindex="-1"><i class="flat flaticon-back"></i></a> </li>

              <li class="page-item active"><a class="page-link" href="#">1</a></li>

              <li class="page-item"><a class="page-link" href="#">2</a></li>

              <li class="page-item"><a class="page-link" href="#">3</a></li>

              <li class="page-item"> <a class="page-link" href="#"><i class="flat flaticon-arrow"></i></a> </li>

            </ul>

          </nav>

        </div>

    </section>

  </div>
  <footer>

    <div class="container">
      <div class="copyright col-lg-12">

        <div class="row">

          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"> Copyright &copy; 2020

            <span class="separator-pipesign"></span>

            All Rights Reserved

            <span class="separator-pipesign"></span>

            <a href="#">Logabols</a>
          </div>

        </div>
      </div>
    </div>
  </footer>

  <!-- ====== Footer End ====== -->

  <!-- popper js-->

  <script src="{{ asset('js/popper.min.js') }}"></script>

  <!-- bootstrap js-->

  <script src="{{ asset('js/bootstrap.min.js') }}"></script>

  <!-- Waypoints js plugin -->

  <script src="{{ asset('js/waypoints.min.js') }}"></script>

  <!-- Counter-up js plugin -->

  <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>

  <!-- Preloadinator -->

  <script src="{{ asset('js/jquery.preloadinator.min.js') }}"></script>

  <script>
    $('.js-preloader').preloadinator({

      minTime: 2000

    });
  </script>

  <!-- Lightbox-->

  <script src="{{ asset('js/lightbox.js') }}"></script>

  <!--imageloaded js plugin -->

  <script src="{{ asset('js/imagesloaded.js') }}"></script>

  <!-- isotope js -->

  <script src="{{ asset('js/isotope.min.js') }}"></script>

  <!-- Owl Slider js-->
  <script src="{{ asset('js/owl.carousel.js') }}"></script>
  <script src="{{ asset('js/owl.custom.js') }}"></script>
  <!-- parallax js-->
  <script src="{{ asset('js/jquery.parallax-1.1.3.js') }}"></script>
  <script src="{{ asset('js/jquery.localscroll-1.2.7-min.js') }}"></script>
  <!-- Header menu -->
  <script src="{{ asset('js/jquery.smartmenus.min.js') }}"></script>
  <!-- Custome js-->
  <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>