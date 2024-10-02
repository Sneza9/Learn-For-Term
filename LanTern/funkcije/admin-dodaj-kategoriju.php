<?php
	session_start();
	include("../config/konekcija.php");

	$kategorija=$_POST['kategorija'];
	$upit = "INSERT INTO kategorija(idKategorija,nazivKategorija) VALUES('','$kategorija')";

	if (mysqli_query($kon, $upit)) 
	{
		header('Location:../admin.php');
	} 
	else 
	{
		echo "Greska: " . $upit . " " . mysqli_error($kon);
	}
?>