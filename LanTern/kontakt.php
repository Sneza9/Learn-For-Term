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
        <section class="inner-banner">
            <div class="container">
                <ul class="list-unstyled thm-breadcrumb">
                    <li><a href="#">Početna</a></li>
                    <li class="active"><a href="#">Kontakt</a></li>
                </ul> 
                <h2 class="inner-banner__title">Kontakt</h2> 
            </div> 
        </section> 
        <section class="contact-info-one">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="contact-info-one__single wow fadeInDown" data-wow-duration="1500ms">
                            <div class="contact-info-one__icon">
                                <i class="kipso-icon-manager"></i>
                            </div>
                            <h2 class="contact-info-one__title">O nama </h2>
                            <p class="contact-info-one__text">Mi smo LanTern <br> platforma za online učenje.<br></p>
                        </div> 
                    </div> 
                    <div class="col-lg-4">
                        <div class="contact-info-one__single wow fadeInUp" data-wow-duration="1500ms">
                            <div class="contact-info-one__icon">
                                <i class="kipso-icon-placeholder"></i>
                            </div> 
                            <h2 class="contact-info-one__title">Nasa adresa</h2> 
                            <p class="contact-info-one__text">Bulevar Nikole Tesle, <br> Niš <br></p> 
                        </div> 
                    </div> 
                    <div class="col-lg-4">
                        <div class="contact-info-one__single wow fadeInDown" data-wow-duration="1500ms">
                            <div class="contact-info-one__icon">
                                <i class="kipso-icon-contact"></i> 
                            </div> 
                            <h2 class="contact-info-one__title">Kontakt</h2> 
                            <p class="contact-info-one__text">lantern@gmail.com <br> 0604587958 <br></p> 
                        </div> 
                    </div> 
                </div> 
            </div> 
        </section> 
        <section class="contact-one">
            <div class="container">
                <h2 class="contact-one__title text-center">Kontaktirajte nas <br></h2> 
                <form action="funkcije/admin-kontakt.php" method="post"> 
                    <div class="row low-gutters">
                        <div class="col-lg-6">
                            <input type="text" name="ime" id="ime" placeholder="Vaše ime">
                        </div> 
                        <div class="col-lg-6">
                            <input type="email" name="email" id="email"placeholder="Vaš E-mail">
                        </div> 
                        <div class="col-lg-12">
                            <textarea name="poruka" id="poruka" placeholder="Napišite poruku..."></textarea>
                            <div class="text-center">
                                <button type="submit" class="contact-one__btn thm-btn" name="porukaAdmin" id="porukaAdmin">Pošalji</button>
                            </div> 
                        </div> 
                    </div> 
                </form> 
                <div class="result text-center"></div> 
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
