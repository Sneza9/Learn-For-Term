<?php
	session_start();
	include("../config/konekcija.php");

	$oglas = $_GET['idOglasa'];
	$upit="delete from oglasi where idOglasa='$oglas'";
	
	if(mysqli_query($kon,$upit))
	{
		header('location: ../admin.php');
	}
	else
	{
		echo "Greska: " . $upit . " " . mysqli_error($kon);
	}
?>