<?php
    session_start();
    include('config/konekcija.php');

    if(isset($_POST['btnLogin']))
    {
        $email=$_POST['korisnickoEmail'];
        $lozinka=$_POST['lozinka'];
        $znak='@';
        
        $obavestenje=array();
        
        if(empty($email))
        {
            $obavestenje['korisnickoEmail']="Polje korisnicko ime mora biti popunjeno";
        }
        
        if(empty($lozinka))
        {
            $obavestenje['lozinka']="Polje lozinka mora biti popunjeno";
        }
        
        $resultEmail=mysqli_query($kon,"SELECT * FROM korisnici WHERE email='".$email."'");
        $resultKorisnickoIme=mysqli_query($kon,"SELECT * FROM korisnici WHERE korisnickoIme='".$email."'");
        $resultLozinka=mysqli_query($kon,"SELECT * FROM korisnici WHERE lozinka='".$lozinka."'");
        
        $rowEmail= mysqli_fetch_array($resultEmail);
        $rowKorisnickoIme = mysqli_fetch_array($resultKorisnickoIme); 
        $rowLozinka= mysqli_fetch_array($resultLozinka);

        if(!empty($email))
        {
            //ako je pronasao @
            if(strpos($email, $znak)!==false)
            {
                if(is_null($rowEmail))
                {
                    $obavestenje['poruka']="* Pogrešna e-mail adresa";
                }
            }
            //ako nije pronasao @ 
            else
            {
                if(is_null($rowKorisnickoIme))
                {
                    $obavestenje['korisnickoEmail']="* Pogrešno korisničko ime";
                }
            }
        }
        if(!empty($lozinka))
        {
            if(is_null($rowLozinka))
            {
                $obavestenje['lozinka']="* Pogrešna lozinka";
            }      
        }
        

        if(count($obavestenje)>0)
        {
            
        }
        else
        {
            header("location:funkcije/login.php?korisnickoEmail=$email&lozinka=$lozinka");
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
                <h2 class="inner-banner__title">.....</h2> 
            </div> 
        </section> 
       
        <section class="contact-one">
            <div class="container">
                <h2 class="contact-one__title text-center">Prijavite se <br></h2>
                <form action="" method="POST">
                    <div class="row low-gutters">
                        <div class="col-lg-12">
                            <input type="text" name="korisnickoEmail" id="korisnickoEmail" placeholder="Korisničko ime/e-mail" value="<?php if(isset($email)){echo $email;}?>">
							<label style="color:red">
                                <?php if(isset($obavestenje['korisnickoEmail'])){echo $obavestenje['korisnickoEmail'];}?>
                            </label>
                        </div> 
                        <div class="col-lg-12">
                            <input type="password" name="lozinka" id="lozinka" id placeholder="Lozinka">
							<label style="color:red">
                                <?php if(isset($obavestenje['lozinka'])){echo $obavestenje['lozinka'];}?>
                            </label>
                        </div> 
                        <div class="col-lg-12">
                            <label style="color:red">
                                <?php if(isset($obavestenje['poruka'])){echo $obavestenje['poruka'];}?>
                            </label>
                            <div class="text-center">
                                <button type="submit" class="contact-one__btn thm-btn" name="btnLogin" id="btnLogin">Prijavi se</button>
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
