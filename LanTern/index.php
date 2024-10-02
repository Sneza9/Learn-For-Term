<?php
    session_start();
    include('config/konekcija.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LanTern</title>
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="assets/images/favicons/site.webmanifest">

    <!-- plugin scripts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,500i,600,700,800%7CSatisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome-free-5.11.2-web/css/all.min.css">
    <link rel="stylesheet" href="assets/plugins/kipso-icons/style.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/vegas.min.css">

    <!-- template styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
    <div class="preloader"><span></span></div>
    <div class="page-wrapper">
       <?php include("sablon/meni.php");?>
        <div class="banner-wrapper">
            <section class="banner-one banner-carousel__one no-dots owl-theme owl-carousel">
                <div class="banner-one__slide banner-one__slide-one">
                    <div class="container">
                        <div class="banner-one__bubble-1"></div>
                        <div class="banner-one__bubble-2"></div>
                        <div class="banner-one__bubble-3"></div>
                        <img src="assets/images/slider-1-scratch2.png" alt="" class="banner-one__scratch">
                       
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <h3 class="banner-one__title banner-one__light-color">Lan Tern plaforma <br> za učenje </h3><br/>
                                <p class="banner-one__tag-line">Da li ste spremni za učenje?</p>
                                <a href="oglasi.php" class="thm-btn banner-one__btn">Pogledajte oglase</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-one__slide banner-one__slide-two">
                    <div class="container">
                        <div class="banner-one__bubble-1"></div>
                        <div class="banner-one__bubble-2"></div>
                        <div class="banner-one__bubble-3"></div>
                        <img src="assets/images/slider-1-scratch1.png" alt="" class="banner-one__scratch">
                        
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <h3 class="banner-one__title banner-one__light-color">Brzo i kvalitetno <br> učite sa nama</h3><br/>
                                <p class="banner-one__tag-line">Da li ste spremni za učenje?</p>
                                <a href="oglasi.php" class="thm-btn banner-one__btn">Pogledajte oglase</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="banner-carousel-btn">
                <a href="#" class="banner-carousel-btn__left-btn"><i class="kipso-icon-left-arrow"></i></a>
                <a href="#" class="banner-carousel-btn__right-btn"><i class="kipso-icon-right-arrow"></i></a>
            </div>
        </div>
        <section class="about-two">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="about-two__content">
                            <div class="block-title text-left">
                                <h2 class="block-title__title">Dobro došli na online platformu<br>za učenje</h2>
                            </div>
                            <p class="about-two__text">Želite da naučite brzo i lako. Pratite oglase i budite uvek u toku sa novostima. </p>
                            <div class="about-two__single-wrap">
                                <div class="about-two__single">
                                    <div class="about-two__single-icon">
                                        <i class="kipso-icon-professor"></i>
                                    </div>
                                    <div class="about-two__single-content">
                                        <p class="about-two__single-text">Počnite što pre sa učenjem.</p>
                                    </div>
                                </div>
                                <div class="about-two__single">
                                    <div class="about-two__single-icon">
                                        <i class="kipso-icon-knowledge"></i>
                                    </div>
                                    <div class="about-two__single-content">
                                        <p class="about-two__single-text">Unapredite svoje znanje.</p>
                                    </div>
                                </div>
                            </div>
                            <a href="oglasi.php" class="thm-btn">Pogledajte oglase</a>
                        </div>
                    </div>
                    <div class="col-xl-6 d-flex justify-content-xl-end justify-content-sm-center">
                        <div class="about-two__image">
                            <span class="about-two__image-dots"></span>
                            <img src="assets/images/about-1-1.jpg" alt="">
                            <div class="about-two__count">
                                <div class="about-two__count-text">Broj časova
                                    <span class="counter">250</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
        <section class="video-two">
            <div class="container">
                <img src="assets/images/scratch-1-1.png" class="video-two__scratch" alt="">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="video-two__content">
                            <h2 class="video-two__title">Brzo i lako <br>naučite sve što želite, <br>unapredite svoje znanje</h2>
                        </div>
                    </div>
                    <div class="col-lg-5 d-flex justify-content-lg-end justify-content-sm-start">
                        <div class="my-auto">
                            <a href="oglasi.php" class="video-two__popup"><i class="fa fa-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      
        <section class="thm-gray-bg course-category-one">
            <div class="container-fluid text-center">
                <div class="block-title text-center">
                    <h2 class="block-title__title">Online časovi<br> iz raznih oblasti</h2>
                </div>
                <div class="course-category-one__carousel owl-carousel owl-theme">
                    <div class="item">
                        <div class="course-category-one__single color-1">
                            <div class="course-category-one__icon">
                                <i class="kipso-icon-desktop"></i>
                            </div> 
                            <h3 class="course-category-one__title"><a href="#">IT</a></h3>
                        </div> 
                    </div> 
                    <div class="item">
                        <div class="course-category-one__single color-2">
                            <div class="course-category-one__icon">
                                <i class="kipso-icon-web-programming"></i> 
                            </div> 
                            <h3 class="course-category-one__title"><a href="#">Programiranje</a></h3>
                             
                        </div> 
                    </div> 
                    <div class="item">
                        <div class="course-category-one__single color-3">
                            <div class="course-category-one__icon">
                                <i class="kipso-icon-music-player"></i> 
                            </div> 
                            <h3 class="course-category-one__title"><a href="#">Muzika</a></h3>
                             
                        </div> 
                    </div> 
                    <div class="item">
                        <div class="course-category-one__single color-4">
                            <div class="course-category-one__icon">
                                <i class="kipso-icon-camera"></i> 
                            </div> 
                            <h3 class="course-category-one__title"><a href="#">Fotografija</a></h3>
                             
                        </div> 
                    </div> 
                    <div class="item">
                        <div class="course-category-one__single color-5">
                            <div class="course-category-one__icon">
                                <i class="kipso-icon-targeting"></i> 
                            </div> 
                            <h3 class="course-category-one__title"><a href="#">Marketing</a></h3>
                             
                        </div> 
                    </div> 
                    <div class="item">
                        <div class="course-category-one__single color-6">
                            <div class="course-category-one__icon">
                                <i class="kipso-icon-health"></i> 
                            </div> 
                            <h3 class="course-category-one__title"><a href="#">Zdravlje & Fitnes</a></h3>
                             
                        </div> 
                    </div> 
                   
                  
                </div> 

                
            </div>
        </section>
        <section class="cta-three">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 clearfix">
                        <img src="assets/images/7.jpg" class="cta-three__image" alt="">
                    </div> 
                    <div class="col-lg-6">
                        <div class="cta-three__content">
                            <div class="block-title text-left">
                                <h2 class="block-title__title">Benefiti učenja
                                   na LanTern platformi</h2> 
                            </div> 
                            <p class="cta-three__text">Ako želite da brzo naučite ono što žeilte, LanTern vam nudi brzu pretragu oglasa i brzo stupanje u kontakt sa profesorom.</p>
                             
                            <div class="cta-three__single-wrap">
                                <div class="cta-three__single">
                                    <i class="kipso-icon-strategy"></i> 
                                    <p class="cta-three__single-text">Profesionalna Predavanja</p> 
                                </div> 
                                <div class="cta-three__single">
                                    <i class="kipso-icon-training"></i> 
                                    <p class="cta-three__single-text">Odlični Predavači</p> 
                                </div> 
                                <div class="cta-three__single">
                                    <i class="kipso-icon-human-resources"></i>
                                    <p class="cta-three__single-text">Brzo učenje</p> 
                                </div> 
                            </div>
                            <a href="oglasi.php" class="thm-btn">Pogledajte oglase</a>
                        </div>
                    </div> 
                </div>
            </div>
        </section>
       
        <section class="cta-four">
            <img src="assets/images/circle-stripe-1.png" class="cta-four__stripe" alt="">
            <img src="assets/images/line-stripe-1.png" class="cta-four__line" alt="">
            <div class="container text-center">
                <div class="block-title">
                    <h2 class="block-title__title">Najbolji profesori <br> u svakoj kategoriji</h2> 
                </div> 
                <p class="cta-four__text">Pratite naš website, svakog dana očekuje vas preko 50 novih oglasa <br> iz različitih oblasti!
                </p>
            </div>
        </section>
       
        <?php include("sablon/footer.php");?>

    </div>
	
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/TweenMax.min.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/countdown.min.js"></script>
    <script src="assets/js/vegas.min.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- template scripts -->
    <script src="assets/js/theme.js"></script>
</body>
</html>
