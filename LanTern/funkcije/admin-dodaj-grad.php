<?php
	session_start();
	include("../config/konekcija.php");

	$grad=$_POST['grad'];
	$upit = "INSERT INTO grad(idGrad,nazivGrada) VALUES('','$grad')";
	
	if (mysqli_query($kon, $upit)) 
	{
		header('Location:../admin.php');
	} 
	else 
	{
		echo "Greska: " . $upit . " " . mysqli_error($kon);
	}
?>