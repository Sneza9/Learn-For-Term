<?php
	session_start();
	include("../config/konekcija.php");

	$oglas = $_GET['idOglasa'];
	$upit="delete from omiljenioglas where idKorisnik='".$_SESSION['idKorisnik']."' and idOglas=$oglas";

	if(mysqli_query($kon,$upit))
	{
		header('location: ../omiljeni-oglasi.php');
	}
	else
	{
		echo "Greska: " . $upit . " " . mysqli_error($kon);
	}
?>