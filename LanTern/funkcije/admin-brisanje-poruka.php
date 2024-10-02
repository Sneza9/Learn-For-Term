<?php
	session_start();
	include("../config/konekcija.php");

	$poruka = $_GET['idPorukaAdmin'];
	$upit="delete from porukeadmin where idPorukaAdmin='$poruka'";
	
	if(mysqli_query($kon,$upit))
	{
		header('location: ../admin.php');
	}
	else
	{
		echo "Greska: " . $upit . " " . mysqli_error($kon);
	}
?>