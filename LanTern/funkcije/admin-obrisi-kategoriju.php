<?php
	session_start();
	include("../config/konekcija.php");

	$kategorija = $_GET['idKategorija'];
	$upit="delete from kategorija where idKategorija='$kategorija'";
	
	if(mysqli_query($kon,$upit))
	{
		header('location: ../admin.php');
	}
	else
	{
		echo "Greska: " . $upit . " " . mysqli_error($kon);
	}
?>