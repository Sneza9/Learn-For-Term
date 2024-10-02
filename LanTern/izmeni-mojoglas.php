<?php
	session_start();
	include('config/konekcija.php');

	if(isset($_SESSION["idKorisnik"]))
	{
		$oglasOdabrani = $_GET['idOglasa'];
		if(isset($_POST['btnIzmeniOglas']))
		{
			$naslov=$_POST['naslov'];
			$opis=$_POST['opis'];
			$cena=$_POST['cena'];
			$kategorija=$_POST['kategorija'];
			$grad=$_POST['grad'];
			
			$file = $_FILES['file']['name'];
			$file_loc = $_FILES['file']['tmp_name'];
			$file_size = $_FILES['file']['size'];
			$file_type = $_FILES['file']['type'];
			$folder="assets/images/oglasi/";
			
			$new_file_name = strtolower($file);
			$final_file=str_replace(' ','-',$new_file_name);
			
			$obavestenje=array();
			
			if($kategorija==0)
			{
				$obavestenje['kategorija']="Morate odabrati kategoriju iz liste!";
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
			
			if($grad==0)
			{
				$obavestenje['grad']="Morate odabrati grad iz liste!";
			}

			$upitSlikaBrisanje = mysqli_query($kon,"select * from oglasi where idOglasa = '$oglasOdabrani'");
			$rezultatSlikaBrisanje= mysqli_fetch_array($upitSlikaBrisanje);

			$slikaOglasBrisanje = $rezultatSlikaBrisanje['slikaOglas'];
			
			if(count($obavestenje)>0)
			{
				
			}
			else
			{	
				if(move_uploaded_file($file_loc,$folder.$final_file))
				{
					unlink($slikaOglasBrisanje);
					mysqli_query($kon,"UPDATE oglasi set naslov='$naslov',opis='$opis',cena='$cena',slikaOglas='../$folder$file', idKategorija='$kategorija', idGrad='$grad' WHERE idOglasa='" . $_GET['idOglasa'] . "'");
					
					header('Location: moji-oglasi.php');
				}
				else
				{
					mysqli_query($kon,"UPDATE oglasi set naslov='$naslov',opis='$opis',cena='$cena',idKategorija='$kategorija', idGrad='$grad' WHERE idOglasa='".$_GET['idOglasa']."'");
					
					header('Location: moji-oglasi.php');
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
                    <li><a href="#"></a></li>
                    <li class="active"><a href="#"></a></li>
                </ul>
                <h2 class="inner-banner__title"></h2> 
            </div> 
        </section> 
       
        <section class="contact-one">
            <div class="container">

				<?php
					$upit = mysqli_query($kon,"SELECT * FROM oglasi o INNER JOIN kategorija k ON o.idKategorija = k.idKategorija
											INNER JOIN grad g ON o.idGrad = g.idGrad WHERE idOglasa='".$_GET['idOglasa']."'");

					$rezultat = mysqli_fetch_array($upit);
				?>

                <h2 class="contact-one__title text-center">Izmeni oglas<br></h2> 
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row low-gutters">
						<div class="col-lg-12">
							<span>Naslov: </span>
                            <input type="text" name="naslov" id="naslov" placeholder="Naslov" value="<?php echo $rezultat['naslov'];?>">
							<label style="color:red">
								<?php if(isset($obavestenje['naslov'])){echo $obavestenje['naslov'];}?>
							</label>
                        </div> 
						<div class="col-lg-12">
							<span>Opis: </span>
							<textarea name="opis" id="opis" rows="20" cols="30"><?php echo $rezultat['opis'];?></textarea>
							<label style="color:red">
								<?php if(isset($obavestenje['opis'])){echo $obavestenje['opis'];}?>
							</label>
                        </div> 
                        <div class="col-lg-12">
							<span>Cena: </span>
                            <input type="text" name="cena" id="cena" placeholder="Cena" value="<?php echo $rezultat['cena'];?>">
							<label style="color:red">
								<?php if(isset($obavestenje['cena'])){echo $obavestenje['cena'];}?>
							</label>
                        </div> 
						<div class="col-lg-12">
							<span>Kategorija: </span>
                            <select name="kategorija" id="kategorija" class="col-lg-12">
								<option value="<?php echo $rezultat['idKategorija'];?>"><?php echo $rezultat['nazivKategorija'];?></option>
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
							<span>Grad: </span>
                          	<select name="grad" id="grad" class="col-lg-12">
								<option value="<?php echo $rezultat['idGrad'];?>"><?php echo $rezultat['nazivGrada'];?></option>
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
							<span>Slika oglasa: </span>
                            <input type="file" name="file" id="file">
                        </div> 
                        <div class="col-lg-12">                          
                            <div class="text-center">
                                <button type="submit" class="contact-one__btn thm-btn" name="btnIzmeniOglas" id="btnIzmeniOglas">Ažuriraj oglas</button>
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
