<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>AID-Benin Accueil</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="public/frontend/assets/img/favicon.png" rel="icon">
  <link href="public/frontend/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet"> 

  <!-- Vendor CSS Files -->
  <link href="public/frontend/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="public/frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="public/frontend/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="public/frontend/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="public/frontend/assets/vendor/aos/aos.css" rel="stylesheet">

   <!-- Vendor CSS Files -->
   <link href="public/frontend/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
   <link href="public/frontend/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="public/frontend/assets/css/main.css" rel="stylesheet">

</head>

<body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="container d-flex align-items-center justify-content-between">

      <a href="{{ path('app_homepage" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="public/frontend/assets/img/logo_aid.png" style="position:absolute;" alt="">
      </a>

      <!-- Nav Menu -->
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#" class="active">Accueil</a></li>
          <li><a href="#">A propos</a></li>
          <li><a href="#">Secteur</a></li>
          <li><a href="#">Nos actions</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#">Devenir membre</a></li>
        </ul>

        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav><!-- End Nav Menu -->

      <a class="btn-getstarted" href="#">Nous soutenir</a>

    </div>

  </header>
  <!-- End Header -->

  <main id="main">

    <!-- Hero Section - Home Page -->
    <!-- <section id="hero" class="hero">

      <img src="assets/img/hero-bg.jpg" alt="" data-aos="fade-in">

      <div class="container">
        <div class="row">
          <div class="col-lg-10">
            <h2 data-aos="fade-up" data-aos-delay="100">Welcome to Our Website</h2>
            <p data-aos="fade-up" data-aos-delay="200">We are team of talented designers making websites with Bootstrap</p>
          </div>
          <div class="col-lg-5">
            <form action="#" class="sign-up-form d-flex" data-aos="fade-up" data-aos-delay="300">
              <input type="text" class="form-control" placeholder="Enter email address">
              <input type="submit" class="btn btn-primary" value="Sign up">
            </form>
          </div>
        </div>
      </div>

    </section> -->
    <!-- End Hero Section -->

    <!-- ======= Hero Section ======= -->
    <section id="hero2">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url(public/frontend/assets/img/slide/slide-1.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">Bienvenue à  <span>AID-BENIN</span></h2>
                <p class="animate__animated animate__fadeInUp">La force de la solidarité, nous contribution à la promotion de l’eau potable pour tous et l’assainissement du milieu</p>
                <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Lire plus</a>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
           <!-- <div class="carousel-item" style="background-image: url(public/frontend/assets/img/slide/slide-2.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">Lorem Ipsum Dolor</h2>
                <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
              </div>
            </div>
          </div>  -->

          <!-- Slide 3 -->
           <!-- <div class="carousel-item" style="background-image: url(public/frontend/assets/img/slide/slide-3.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown">Sequi ea ut et est quaerat</h2>
                <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
              </div>
            </div>
          </div>  -->

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </section>
    <!-- End Hero -->


    <!-- About Section - Home Page -->
    <section id="about" class="about">

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-xl-center gy-5">

          <div class="col-xl-5 content">
            <h3>AID-BENIN</h3>
            <h2>La force de la solidarité</h2>
            <p>Nos objectifs se résument en la contribution à la promotion de l’eau potable pour tous et l’assainissement du milieu; 
            la contribution à faciliter l’accès aux services sociaux des communautés les plus vulnérables;
            et la promotion de l’hygiène et l'appui à l’éducation des communautés à la base </p>
            <a href="#" class="read-more"><span>Voir plus</span><i class="bi bi-arrow-right"></i></a>
          </div>

          <div class="col-xl-7">
            <div class="row gy-4 icon-boxes">

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box">
                  <i class="bi bi-buildings"></i>
                  <h3>Environnement</h3>
                  <p>La protection de l'environnement.</p>
                </div>
              </div> <!-- End Icon Box -->

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box">
                  <i class="bi bi-clipboard-pulse"></i>
                  <h3>Santé</h3>
                  <p>La santé pour tous. </p>
                </div>
              </div> <!-- End Icon Box -->

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box">
                  <i class="bi bi-command"></i>
                  <h3>Education</h3>
                  <p>L’éducation des enfants.</p>
                </div>
              </div> <!-- End Icon Box -->

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                <div class="icon-box">
                  <i class="bi bi-graph-up-arrow"></i>
                  <h3>Protection des droits de femmes et d’enfants </h3>
                  <p>Garntie la protection des droits des femmes et des enfants.</p>
                </div>
              </div> <!-- End Icon Box -->

            </div>
          </div>

        </div>
      </div>

    </section>
    <!-- End About Section -->

  </main>


  <!-- Scroll Top Button -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>

  <!-- Vendor JS Files -->
  <script src="public/frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="public/frontend/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="public/frontend/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="public/frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="public/frontend/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="public/frontend/assets/vendor/aos/aos.js"></script>
  <script src="public/frontend/assets/vendor/php-email-form/validate.js"></script>

  <script src="public/frontend/assets/js/main.js"></script>

</body>

</html>