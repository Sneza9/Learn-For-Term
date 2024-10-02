<?php
	session_start();
	include("../config/konekcija.php");

	$oglas = $_GET['idOglasa'];
	$korisnik = $_SESSION['idKorisnik'];
	$upit="INSERT INTO omiljenioglas(idOmiljeniOglas,idOglas,idKorisnik) VALUES('',$oglas,$korisnik)";
	
	if(mysqli_query($kon,$upit))
	{
		header('location: ../omiljeni-oglasi.php');
	}
	else
	{
		echo "Greska: " . $upit . " " . mysqli_error($kon);
	}
?>