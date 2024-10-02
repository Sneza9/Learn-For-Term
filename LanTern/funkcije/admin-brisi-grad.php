<?php
	session_start();
	include("../config/konekcija.php");

	$grad = $_GET['idGrad'];
	$upit="delete from grad where idGrad='$grad'";
	
	if(mysqli_query($kon,$upit))
	{
		header('location: ../admin.php');
	}
	else
	{
		echo "Greska: " . $upit . " " . mysqli_error($kon);
	}
?>