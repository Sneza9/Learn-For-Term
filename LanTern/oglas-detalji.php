<?php
    session_start();
    include('config/konekcija.php');
    if(isset($_SESSION["idKorisnik"]))
    {
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
                    <li class="active"><a href="#">Prikaz oglasa</a></li>
                </ul>
                <h2 class="inner-banner__title">Prikaz oglasa</h2> 
            </div> 
        </section>
        <section class="course-details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
					<?php
						$upit = mysqli_query($kon,"SELECT * FROM oglasi o inner join korisnici k ON o.idKorisnik = k.idKorisnik WHERE idOglasa='".$_GET['idOglasa']."'");
				
						$rezultat = mysqli_fetch_array($upit);	
						
						$rezultatSlika= $rezultat['slikaOglas'];
						$rezSlika = substr($rezultatSlika, 3);
						
						$rezultatSlikaKorisnik= $rezultat['slika'];
						$rezSlikaKorisnik = substr($rezultatSlikaKorisnik, 3);
						
						$korisnik = $rezultat['idKorisnik'];
						
					?>
                        <div class="course-details__content">
                            <p class="course-details__author">
                                <img src="<?php echo $rezSlikaKorisnik;?>" alt="">
                                Objavio:  <a href="profesor-profil.php?idKorisnik=<?php echo $rezultat['idKorisnik'];?>"><?php echo $rezultat['ime']." ".$rezultat['prezime'];?></a>
                            </p> 

                            <div class="course-details__top">
                                <div class="course-details__top-left">
                                    <h2 class="course-details__title"><?php echo $rezultat['naslov'];?></h2>
                                    <div class="course-one__stars"></div>
                                </div>
                                <div class="course-details__top-right">
                                    <a href="#" class="course-one__category">Časovi</a>
                                </div>
                            </div>
                            <div class="course-one__image">
                                <img src="<?php echo $rezSlika;?>" alt="">
                                <i class="far fa-heart"></i>
                            </div>

                            <ul class="course-details__tab-navs list-unstyled nav nav-tabs" role="tablist">
                                <li>
                                    <a class="active" role="tab" data-toggle="tab" href="#overview">Opis</a>
                                </li>
                            </ul>
                            <div class="tab-content course-details__tab-content ">
                                <div class="tab-pane show active  animated fadeInUp" role="tabpanel" id="overview">
                                    <p class="course-details__tab-text">
                                        <?php echo $rezultat['opis'];?>
                                    </p><br><br>
                                </div>
                            </div>
                        </div>
                    </div>

					<?php
					    if($korisnik == $_SESSION['idKorisnik'])
						{
					?>

                    <div class="col-lg-4">
                        <div class="course-details__price">
                            <p class="course-details__price-text">Cena časa </p>
                            <p class="course-details__price-amount">
                                <?php echo $rezultat['cena'];?> RSD
                            </p>
                        </div>

                        <div class="course-details__meta">
                            <a href="#" class="course-details__meta-link">
                                <span class="course-details__meta-icon">
                                    <i class="far fa-clock"></i>
                                </span> 
                                Trajanje: <span>45 min</span>
                            </a> 
                            <a href="#" class="course-details__meta-link">
                                <span class="course-details__meta-icon">
                                    <i class="far fa-bell"></i> 
                                </span> 
                                Jezik: <span>Srpski</span>
                            </a> 
                        </div>
                    </div> 
					
                    <?php
						}
						else
						{
					?>

					<div class="col-lg-4">
                        <div class="course-details__price">
                            <p class="course-details__price-text">Cena časa </p>
                            <p class="course-details__price-amount">
                                <?php echo $rezultat['cena'];?> RSD
                            </p>
                            <a href="zakazi-cas.php?idOglasa=<?php echo $rezultat['idOglasa'];?>" class="thm-btn course-details__price-btn">Zakaži čas</a>
							<a href="funkcije/dodaj-u-omiljeni.php?idOglasa=<?php echo $rezultat['idOglasa'];?>" class="thm-btn course-details__price-btn">Sačuvaj oglas &nbsp; <i class="far fa-heart"></i></a>
                        </div>

                        <div class="course-details__meta">
                            <a href="#" class="course-details__meta-link">
                                <span class="course-details__meta-icon">
                                    <i class="far fa-clock"></i>
                                </span> 
                                Trajanje: <span>45 min</span>
                            </a> 
                            <a href="#" class="course-details__meta-link">
                                <span class="course-details__meta-icon">
                                    <i class="far fa-bell"></i> 
                                </span> 
                                Jezik: <span>Srpski</span>
                            </a> 
                        </div> 
                    </div> 
					
					<?php
						}
					?>
                </div>
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

<?php
    }

    else
    {
            header ('location:zabranjen-pristup.php');
    }
?>
