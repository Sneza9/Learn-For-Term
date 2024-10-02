<?php
	session_start();
	include('config/konekcija.php');
	if(isset($_SESSION["idKorisnik"]))
	{
		if(isset($_POST['btnDodajOglas']))
		{
			$naslov=$_POST['naslov'];
			$opis=$_POST['opis'];
			$cena=$_POST['cena'];
			$idKategorija=$_POST['kategorija'];
			$idGrad=$_POST['grad'];

			$file = $_FILES['file']['name'];
			$file_loc = $_FILES['file']['tmp_name'];
			$file_size = $_FILES['file']['size'];
			$file_type = $_FILES['file']['type'];
			$folder="assets/images/oglasi/";

			$new_file_name = strtolower($file);
			$final_file=str_replace(' ','-',$new_file_name);
		
			$obavestenje=array();
			
			if($idKategorija==0)
			{
				$obavestenje['kategorija']="Morate odabrati neku stavku iz liste!";
			}
			
			if(empty($naslov))
			{
				$obavestenje['naslov']="Polje naslov mora biti popunjeno!";
			}
			if(empty($opis))
			{
				$obavestenje['opis']="Polje opis mora biti popunjeno!";
			}
			
			if(empty($cena))
			{
				$obavestenje['cena']="Polje cena mora biti popunjeno!";
			}
			
			if($idGrad==0)
			{
				$obavestenje['grad']="Morate odabrati neku stavku iz liste!";
			}
			if($_FILES["file"]["error"] == 4) 
			{
				$obavestenje['slika']="Polje slika mora biti popunjeno!";
			}
			
			if(count($obavestenje)>0)
			{
				
			}
			else
			{
				if(move_uploaded_file($file_loc,$folder.$final_file))
				{
				
					$upit = "INSERT INTO oglasi(idOglasa,naslov,opis,slikaOglas,cena,idKategorija,idGrad,idKorisnik) VALUES('','1','1','../$folder$file','1','1','1','".$_SESSION['idKorisnik']."')";
					
					if (mysqli_query($kon, $upit)) 
					{
						$idOglas= mysqli_insert_id($kon);  
						header('Location: funkcije/dodaj-mojoglas.php?idOglas='.$idOglas.'&naslov='.$naslov.'&opis='.$opis.'&cena='.$cena.'&idKategorija='.$idKategorija.'&idGrad='.$idGrad.'');
					} 
					else 
					{
						echo "Greska: " . $upit . "<br/> " . mysqli_error($kon);
					}
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
                <h2 class="inner-banner__title">.....</h2>
            </div>
        </section>
       
        <section class="contact-one">
            <div class="container">
			
                <h2 class="contact-one__title text-center">Dodaj oglas <br></h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row low-gutters">
						<div class="col-lg-12">
                            <input type="text" name="naslov" id="naslov" placeholder="Naslov" value="<?php if(isset($naslov)){echo $naslov;}?>">
							<label style="color:red">
								<?php if(isset($obavestenje['naslov'])){echo $obavestenje['naslov'];}?>
							</label>
                        </div>
						<div class="col-lg-12">
                            <textarea name="opis" id="opis" placeholder="Opis"> <?php if(isset($opis)){echo $opis;}?> </textarea>
							<label style="color:red">
								<?php if(isset($obavestenje['opis'])){echo $obavestenje['opis'];}?>
							</label>
                        </div>
                        <div class="col-lg-12">
                            <input type="number" name="cena" id="cena" placeholder="Cena" value="<?php if(isset($cena)){echo $cena;}?>">
							<label style="color:red">
								<?php if(isset($obavestenje['cena'])){echo $obavestenje['cena'];}?>
							</label>
                        </div>
						<div class="col-lg-12">
                            <select name="kategorija" id="kategorija" class="col-lg-12">
								<option value="0">Izaberi Kategoriju</option>
								<?php
									$kategorija = mysqli_query($kon,"select * from kategorija");
									while($rezultatKategorija=mysqli_fetch_array($kategorija))
									{
								?>
								
								<option value="<?php echo $rezultatKategorija['idKategorija'];?>">
									<?php echo $rezultatKategorija['nazivKategorija'];?>
								</option>	

								<?php
									}
								?>

							</select>
							<label style="color:red">
								<?php if(isset($obavestenje['kategorija'])){echo $obavestenje['kategorija'];}?>
							</label>
                        </div>
						<br/>
						<div class="col-lg-12">
                           <select name="grad" id="grad" class="col-lg-12">
								<option value="0">Izaberi Grad</option>

								<?php
									$grad = mysqli_query($kon,"select * from grad");
									while($rezultatGrad=mysqli_fetch_array($grad))
									{
								?>
									
								<option value="<?php echo $rezultatGrad['idGrad'];?>">
									<?php echo $rezultatGrad['nazivGrada'];?>
								</option>

								<?php
									}
								?>
							</select>
							<label style="color:red">
								<?php if(isset($obavestenje['grad'])){echo $obavestenje['grad'];}?>
							</label>
                        </div>
						<br/>
						<div class="col-lg-12">
                            <input type="file" name="file" id="file">
							<label style="color:red">
								<?php if(isset($obavestenje['slika'])){echo $obavestenje['slika'];}?>
							</label>
                        </div>
                        <div class="col-lg-12">                          
                            <div class="text-center">
                                <button type="submit" class="contact-one__btn thm-btn" name="btnDodajOglas" id="btnDodajOglas">Postavi oglas</button>
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
