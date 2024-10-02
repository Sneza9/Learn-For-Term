<?php
	session_start();
	include("config/konekcija.php");

	if(isset($_SESSION["idKorisnik"]))
	{
	
	$upit = mysqli_query($kon,"SELECT * FROM korisnici WHERE idKorisnik='".$_GET['idKorisnik']."'");

	$rezultat = mysqli_fetch_array($upit);	
	$rezultatSlika = $rezultat['slika'];
	$rezSlika = substr($rezultatSlika,3);
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
                    <li><a href="#">Oglasi</a></li>
                    <li class="active"><a href="#">Profil profesora</a></li>
                </ul>
                <h2 class="inner-banner__title"><?php echo $rezultat['ime']." ".$rezultat['prezime'];?></h2>
            </div> 
        </section>
        <section class="team-details">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-5">
                        <div class="team-details__content">
                            <h2 class="team-details__title">Podaci</h2>
                            <p class="team-details__text">
                                Ime: <?php echo $rezultat['ime'];?><br/>
                                Prezime: <?php echo $rezultat['prezime'];?><br/>
                                Email: <?php echo $rezultat['email'];?><br/>
                                Telefon: <?php echo $rezultat['telefon'];?><br/>
							</p>
                        </div>
                    </div> 
                    <div class="col-lg-6">
                        <div class="team-one__single">
                            <div class="team-one__image">
                                <img src="<?php echo $rezSlika;?>" alt="" width="200" height="200">
                            </div>
                            <div class="team-one__content">
                                <h2 class="team-one__name"><a><?php echo $rezultat['ime']." ".$rezultat['prezime'];?></a></h2>
                                <p class="team-one__designation">Profesor</p>
                            </div>
                        </div>
                    </div> 
                </div>
            </div> 
        </section>

        <section class="course-one__top-title thm-gray-bg">
            <div class="container">
                <div class="block-title mb-0">
                    <h2 class="block-title__title">Oglasi profesora</h2>
                </div>
            </div> 
        </section>

        <section class="course-one course-one__teacher-details">
            <div class="container">
                <div class="row">

                    <?php
                        $upit1 = mysqli_query($kon,"SELECT * FROM oglasi WHERE idKorisnik='".$_GET['idKorisnik']."'");

                        while($rezultat1 = mysqli_fetch_array($upit1))
                        {	
                            $rezultatSlika1 = $rezultat1['slikaOglas'];
                            $rezSlika1 = substr($rezultatSlika1,3);
                    ?>

                    <div class="col-lg-4">
                        <div class="course-one__single">
                            <div class="course-one__image">
                                <img src="<?php echo $rezSlika1;?>" alt="">
                            </div>
                            <div class="course-one__content">
                                <a href="#" class="course-one__category"></a>
                                <div class="course-one__admin">
                                </div>
                                <h2 class="course-one__title"> 
                                    <a>
                                        <?php echo $rezultat1['naslov'];?>
                                    </a>
                                </h2>
                                <div class="course-one__meta">
                                    <a>
                                        <i class="far fa-clock"></i> 45 min
                                    </a>
                                    <a>
                                        <?php echo $rezultat1['cena'];?> RSD
                                    </a>
                                </div>
                                <a href="oglas-detalji.php?idOglasa=<?php echo $rezultat1['idOglasa'];?>" class="course-one__link">Vidi oglas</a>
                            </div>
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
