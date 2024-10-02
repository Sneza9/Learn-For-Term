<?php
	session_start();
	include("../config/konekcija.php");

	$korisnik = $_GET['idKorisnik'];
	$upit="delete from korisnici where idKorisnik='$korisnik'";

	if(mysqli_query($kon,$upit))
	{
		header('location: ../admin.php');
	}
	else
	{
		echo "Greska: " . $upit . " " . mysqli_error($kon);
	}
?>