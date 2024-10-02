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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
                    <li class="active"><a href="#">Omiljeni oglasi</a></li>
                </ul>
                <h2 class="inner-banner__title">Omiljeni Oglasi</h2>
            </div> 
        </section>
        <section class="course-one course-page">
            <div class="container">
                <div class="row">

                    <?php
                        $upit = mysqli_query($kon,"SELECT * FROM omiljenioglas om INNER JOIN oglasi o ON om.idOglas = o.idOglasa 
                        inner join korisnici k ON o.idKorisnik = k.idKorisnik
                        WHERE om.idKorisnik='".$_SESSION['idKorisnik']."'");
                        
                        while($rezultat = mysqli_fetch_array($upit))
                        {
                            $rezultatSlika= $rezultat['slikaOglas'];
                            $rezSlika = substr($rezultatSlika, 3);

                            $slikaKorisnik = $rezultat['slika'];
                            $rezSlikaKorisnik = substr($slikaKorisnik, 3);
                    ?>

                    <div class="col-lg-4">
                        <div class="course-one__single">
                            <div class="course-one__image">
                                <img src="<?php echo $rezSlika;?>" alt="" width="370" height="230">
                            </div>
                            <div class="course-one__content">
                                <a href="#" class="course-one__category"></a>
                                <div class="course-one__admin">
                                    <img src="<?php echo $rezSlikaKorisnik;?>" alt="">
                                    Objavio 
                                    <a href="profesor-profil.php?idKorisnik=<?php echo $rezultat['idKorisnik'];?>">
                                        <?php echo $rezultat['ime']." ".$rezultat['prezime'];?>
                                    </a>
                                </div>
                                <h2 class="course-one__title">
                                    <a>
                                        <?php echo $rezultat['naslov'];?>
                                    </a>
                                </h2>

                                <div class="course-one__meta">
                                    <a>
                                        <i class="far fa-clock"></i> 45 min
                                    </a>
                                    <a>
                                        <?php echo $rezultat['cena'];?> RSD
                                    </a>
                                </div>
                                <a href="oglas-detalji.php?idOglasa=<?php echo $rezultat['idOglasa'];?>" class="course-one__link">Vidi oglas</a>
								<a href="funkcije/obrisi-omiljeni.php?idOglasa=<?php echo $rezultat['idOglasa'];?>" class="course-one__link">Ukloni oglas <i class="fa fa-close"></i></a>
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
