<?php
	session_start();
	include('config/konekcija.php');

	if(isset($_SESSION["idUloga"]) && $_SESSION['idUloga']=="1")
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
    <link rel="stylesheet" href="assets/css/dugme.css">
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
                    <li class="active"><a href="#">Admin</a></li>
                </ul>
                <h2 class="inner-banner__title">.....</h2>
            </div>
        </section>
       
        <section class="course-one__top-title thm-gray-bg">
            <div class="container">
                <div class="block-title mb-0">
                    <h2 class="block-title__title">Admin panel </h2>
                </div>
            </div>
        </section>

        <section class="course-one course-one__teacher-details">
            <div class="container">
                <div class="row">
                
                   <div class="col-lg-12">
                        <div class="course-one__single">
                            <h2>Korisnici</h2>
							<table border="1px solid black" style="text-align:center;">
								<tr>
									<th>Id Korisnik</th>
									<th>Ime Korisnika</th>
									<th>Prezime Korisnika </th>
									<th>Korisničko ime </th>
									<th>Email adresa </th>
									<th>Telefon korisnika </th>
									<th>Fotografija korisnika </th>
									<th>Obrišite korisnika </th>
								</tr>
								<?php
								
									$upit1 = mysqli_query($kon,"SELECT * FROM korisnici where idUloga != 1");
									
									while($rezultat1 = mysqli_fetch_array($upit1))
									{
										$rezultatSlika = $rezultat1['slika'];
										$slika = substr($rezultatSlika, 3);	
								?>
								<tr>
									<td><?php echo $rezultat1['idKorisnik'];?></td>
									<td><?php echo $rezultat1['ime'];?></td>
									<td><?php echo $rezultat1['prezime'];?></td>
									<td><?php echo $rezultat1['korisnickoIme'];?></td>
									<td><?php echo $rezultat1['email'];?></td>
									<td><?php echo $rezultat1['telefon'];?></td>
									<td><img src="<?php echo $slika;?>" width="50" height="50"/></td>
									<td><a href="funkcije/admin-brisanje-korisnika.php?idKorisnik=<?php echo $rezultat1['idKorisnik'];?>">
										<i class="fa fa-close" style="font-size:28px;color:red"></i>
										</a>
									</td>
								</tr>
							<?php }?>
							  
							</table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		
		  <section class="course-one course-one__teacher-details">
            <div class="container">
                <div class="row">
                
                   <div class="col-lg-12">
                        <div class="course-one__single">
                            <h2>Oglasi</h2>
							<table border="1px solid black" style="text-align:center;">
							  <tr>
								<th>Id Oglas</th>
								<th>Naslov</th>
								<th>Opis </th>
								<th>Cena </th>
								<th>Slika </th>
								<th>Kategorija </th>
								<th>Grad </th>
								<th>Korisnik </th>
								<th>Obrišite oglas</th>
							  </tr>

							  <?php
								$upit2 = mysqli_query($kon,"SELECT * FROM oglasi o inner join kategorija k on o.idKategorija=k.idKategorija
														inner join grad g on o.idGrad=g.idGrad
														inner join korisnici ko on o.idKorisnik=ko.idKorisnik");
								
								while($rezultat2 = mysqli_fetch_array($upit2))
								{
									$rezultatSlika2 = $rezultat2['slikaOglas'];
									$slika2 = substr($rezultatSlika2, 3);
							  ?>
							  <tr>
								<td><?php echo $rezultat2['idOglasa'];?></td>
								<td><?php echo $rezultat2['naslov'];?></td>
								<td><?php echo $rezultat2['opis'];?></td>
								<td><?php echo $rezultat2['cena'];?> RSD</td>
								<td><img src="<?php echo $slika2;?>" width="150" height="100"/></td>
								<td><?php echo $rezultat2['nazivKategorija'];?></td>
								<td><?php echo $rezultat2['nazivGrada'];?></td>
								<td><?php echo $rezultat2['ime']." ".$rezultat2['prezime'];?></td>
								<td><a href="funkcije/admin-brisanje-oglasa.php?idOglasa=<?php echo $rezultat2['idOglasa'];?>">
										<i class="fa fa-close" style="font-size:28px;color:red"></i>
									</a>
								</td>
							  </tr>

							  <?php } ?>
							  
							</table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		 <section class="course-one course-one__teacher-details">
            <div class="container">
                <div class="row">
                
                   <div class="col-lg-12">
                        <div class="course-one__single">
                            <h2>Gradovi</h2>
							<table border="1px solid black" style="text-align:center;">
							  <tr>
								<th>Id Grad</th>
								<th>Naziv Grada</th>
								<th>Obrišite grad </th>
							  </tr>
							  <?php
								$upit3 = mysqli_query($kon,"SELECT * FROM grad");
								
								while($rezultat3 = mysqli_fetch_array($upit3))
								{
							  ?>
							  <tr>
								<td><?php echo $rezultat3['idGrad'];?></td>
								<td><?php echo $rezultat3['nazivGrada'];?></td>
								
								<td><a href="funkcije/admin-brisi-grad.php?idGrad=<?php echo $rezultat3['idGrad'];?>">
										<i class="fa fa-close" style="font-size:28px;color:red"></i>
									</a>
								</td>
							  </tr>
							  <?php }?>
							  
							</table>
                        </div>
                    </div>
					
					<form action="funkcije/admin-dodaj-grad.php" method="POST">
                    <div class="row low-gutters" style="margin-left:0.2%;">
                        <div class="col-lg-6">
                            <input type="text" name="grad" id="grad" placeholder="Unesite naziv grada" required>
                        </div>
                        <div class="col-lg-6">
                            <div class="text-right">
                                <button type="submit" class="myButton" name="btnUnesiGrad" id="btnUnesiGrad">Dodaj grad</button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </section>
		<section class="course-one course-one__teacher-details">
            <div class="container">
                <div class="row">
                
                   <div class="col-lg-12">
                        <div class="course-one__single">
                            <h2>Kategorije</h2>
							<table border="1px solid black" style="text-align:center;">
							  <tr>
								<th>Id Kategorija</th>
								<th>Naziv kategorije</th>
								<th>Obrišite kategoriju </th>
							  </tr>
							  <?php
								$upit4 = mysqli_query($kon,"SELECT * FROM kategorija");
								
								while($rezultat4 = mysqli_fetch_array($upit4))
								{
							  ?>
							  <tr>
								<td><?php echo $rezultat4['idKategorija'];?></td>
								<td><?php echo $rezultat4['nazivKategorija'];?></td>
								
								<td><a href="funkcije/admin-obrisi-kategoriju.php?idKategorija=<?php echo $rezultat4['idKategorija'];?>">
										<i class="fa fa-close" style="font-size:28px;color:red"></i>
									</a>
								</td>
							  </tr>
							  <?php }?>
							  
							</table>
                        </div>
                    </div>
					<form action="funkcije/admin-dodaj-kategoriju.php" method="POST">
                    <div class="row low-gutters" style="margin-left:0.2%;">
                        <div class="col-lg-6">
                            <input type="text" name="kategorija" id="kategorija" placeholder="Unesite kategoriju" required>
                        </div>
                        <div class="col-lg-6">
                            <div class="text-right">
                                <button type="submit" class="myButton" name="btnUnesiKategoriju" id="btnUnesiKategoriju">Dodaj kategoriju</button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </section>
		
		
		<section class="course-one course-one__teacher-details">
            <div class="container">
                <div class="row">
                
                   <div class="col-lg-12">
                        <div class="course-one__single">
                            <h2>Poruke</h2>
							<table border="1px solid black" style="text-align:center;">
							  <tr>
								<th>Id Poruka </th>
								<th>Ime korisnika </th>
								<th>Email korisnika </th>
								<th>Poruka </th>
								<th>Obrišite poruku </th>
							  </tr>
							  <?php
								$upit5 = mysqli_query($kon,"SELECT * FROM porukeadmin");
								
								while($rezultat5 = mysqli_fetch_array($upit5))
								{
							  ?>
							  <tr>
								<td><?php echo $rezultat5['idPorukaAdmin'];?></td>
								<td><?php echo $rezultat5['ime'];?></td>
								<td><?php echo $rezultat5['emailKorisnik'];?></td>
								<td><?php echo $rezultat5['poruka'];?></td>
								
								<td><a href="funkcije/admin-brisanje-poruka.php?idPorukaAdmin=<?php echo $rezultat5['idPorukaAdmin'];?>">
										<i class="fa fa-close" style="font-size:28px;color:red"></i>
									</a>
								</td>
							  </tr>
							  <?php }?>
							  
							</table>
                        </div>
                    </div>
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
