<?php
	session_start();
	include("config/konekcija.php");

	if(isset($_SESSION["idKorisnik"]))
	{
	
        $upit = mysqli_query($kon,"SELECT * FROM korisnici WHERE idKorisnik='".$_SESSION['idKorisnik']."'");

        $rezultat = mysqli_fetch_array($upit);	
        
        $rezultatSlika = $rezultat['slika'];
        $rezSlika = substr($rezultatSlika,3);
        
        if(isset($_POST['btnIzmeniProfil']))
        {
            
            $ime=$_POST['ime'];
            $prezime=$_POST['prezime'];
            $email=$_POST['email'];
            $korisnickoIme=$_POST['korisnickoIme'];
            $lozinka=$_POST['lozinka'];
            $telefon=$_POST['telefon'];

            $file = $_FILES['file']['name'];
            $file_loc = $_FILES['file']['tmp_name'];
            $file_size = $_FILES['file']['size'];
            $file_type = $_FILES['file']['type'];
            $folder="assets/images/korisnici/";

            $new_file_name = strtolower($file);
            $final_file=str_replace(' ','-',$new_file_name);
            
            $regImePrezime = "/^[A-ZŠĐĆŽČ][a-zšđčćž]{2,14}$/";	
            $regKorisnicko ="/^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/";	
            $regLozinka="/^[A-Za-z0-9]{6,14}$/";
        
            $obavestenje=array();

            if(empty($ime))
            {
                $obavestenje['ime']="Polje ime mora biti popunjeno!";
            }
            else if(!preg_match($regImePrezime,$ime))
            {
                $obavestenje['ime']="Polje ime mora biti u dobrom formatu, prvo slovo mora biti veliko, min 2 max 14 karaktera!";
            }
            
            if(empty($prezime))
            {
                $obavestenje['prezime']="Polje prezime mora biti popunjeno!";
            }
            else if(!preg_match($regImePrezime,$prezime))
            {
                $obavestenje['prezime']="Polje prezime mora biti u dobrom formatu, prvo slovo mora biti veliko,min 2 max 14 karaktera!";
            }
            
            if(empty($email))
            {
                $obavestenje['email']="Polje email mora biti popunjeno!";
            }
            
            if(empty($telefon))
            {
                $obavestenje['telefon']="Polje telefon mora biti popunjeno!";
            }
            
            if(empty($korisnickoIme))
            {
                $obavestenje['korisnickoIme']="Polje korisnicko mora biti popunjeno!";
            }
            else  if(!preg_match($regKorisnicko,$korisnickoIme))
            {
                $obavestenje['korisnickoIme']="Polje korisnicko mora imati jedno veliko slovo ili broj!";
            }
            
            if(empty($lozinka))
            {
                $obavestenje['lozinka']="Polje lozinka mora biti popunjeno!";
            }
            else if(!preg_match($regLozinka,$lozinka))
            {
                $obavestenje['lozinka']="Polje lozinka mora biti min 6, max 14 karaktera!";
            }

            if(count($obavestenje)>0)
            {
                
            }
            else
            {
                if(move_uploaded_file($file_loc,$folder.$final_file))
                {
                    $upit1 = mysqli_query($kon,"UPDATE korisnici set slika='../$folder$file' WHERE idKorisnik='" . $_SESSION['idKorisnik'] . "'");

                    if (mysqli_query($kon, $upit1))
                    {
                        $idKorisnik=$_SESSION['idKorisnik'];
                        header('Location: funkcije/izmeni-prof.php?idKorisnik='.$idKorisnik.'&ime='.$ime.'&prezime='.$prezime.'&email='.$email.'&korisnickoIme='.$korisnickoIme.'&lozinka='.$lozinka.'&telefon='.$telefon.'');
                    }
                    else 
                    {
                        header('location:izmeni-profil.php');
                    }
                }
                else
                {
                    $idKorisnik=$_SESSION['idKorisnik'];
                    header('Location: funkcije/izmeni-prof.php?idKorisnik='.$idKorisnik.'&ime='.$ime.'&prezime='.$prezime.'&email='.$email.'&korisnickoIme='.$korisnickoIme.'&lozinka='.$lozinka.'&telefon='.$telefon.'');
                }
            }
        }
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
                    <li class="active"><a href="#">Izmeni profil</a></li>
                </ul> 
                <h2 class="inner-banner__title">
                    <?php echo $rezultat['ime']." ".$rezultat['prezime'];?>
                </h2> 
            </div> 
        </section> 
        <section class="team-details">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-6">
                        <div class="team-details__content">
                            <h2 class="team-details__title">Podaci</h2> 
                            <p class="team-details__text">
                                Ime: <?php echo $rezultat['ime'];?><br/>
                                Prezime: <?php echo $rezultat['prezime'];?><br/>
                                Korisničko ime: <?php echo $rezultat['korisnickoIme'];?><br/>
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
                                <h2 class="team-one__name">
                                    <a href="#">
                                        <?php echo $rezultat['ime']." ".$rezultat['prezime'];?>
                                    </a>
                                </h2>
                                <p class="team-one__designation">Profesor</p>
                            </div> 
                        </div> 
                    </div> 
                </div> 
            </div> 
        </section> 
        <section class="contact-one">
            <div class="container">
                <h2 class="contact-one__title text-center">Izmeni profil <br></h2> 
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row low-gutters">
						<div class="col-lg-6">
						    <span>Ime:</span>
                            <input type="text" name="ime" id="ime" placeholder="Ime" value="<?php echo $rezultat['ime'];?>">
							<label style="color:red">
                                <?php if(isset($obavestenje['ime'])){echo $obavestenje['ime'];}?>
                            </label>
                        </div> 
						<div class="col-lg-6">
						    <span>Prezime:</span>
                            <input type="text" name="prezime" id="prezime" placeholder="Prezime" value="<?php echo $rezultat['prezime'];?>">
							<label style="color:red">
                                <?php if(isset($obavestenje['prezime'])){echo $obavestenje['prezime'];}?>
                            </label>
                        </div> 
                        <div class="col-lg-6">
						<span>Korisničko ime:</span>
                            <input type="text" name="korisnickoIme" id="korisnickoIme" placeholder="Korisničko ime" value="<?php echo $rezultat['korisnickoIme'];?>">
							<label style="color:red">
                                <?php if(isset($obavestenje['korisnickoIme'])){echo $obavestenje['korisnickoIme'];}?>
                            </label>
                        </div> 
						<div class="col-lg-6">
						    <span>E-mail:</span>
                            <input type="email" name="email" id="email" placeholder="E-mail" value="<?php echo $rezultat['email'];?>">
							<label style="color:red">
                                <?php if(isset($obavestenje['email'])){echo $obavestenje['email'];}?>
                            </label>
                        </div> 
                        <div class="col-lg-12">
						    <span>Lozinka:</span>
                            <input type="password" name="lozinka" id="lozinka" id placeholder="Lozinka" value="<?php echo $rezultat['lozinka'];?>">
							<label style="color:red">
                                <?php if(isset($obavestenje['lozinka'])){echo $obavestenje['lozinka'];}?>
                            </label>
						<div class="col-lg-12">
						    <span>Broj telefona:</span>
                            <input type="text" name="telefon" id="telefon" placeholder="Telefon" value="<?php echo $rezultat['telefon'];?>">
							<label style="color:red">
                                <?php if(isset($obavestenje['telefon'])){echo $obavestenje['telefon'];}?>
                            </label>
                        </div> 
						<div class="col-lg-12">
						    <span>Slika:</span>
                            <input type="file" name="file" id="file">
                        </div> 
                        <div class="col-lg-12">                          
                            <div class="text-center">
                                <button type="submit" class="contact-one__btn thm-btn" name="btnIzmeniProfil" id="btnIzmeniProfil">Sačuvaj</button>
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

<?php
    }

    else
    {
        header ('location:zabranjen-pristup.php');
    }
?>
