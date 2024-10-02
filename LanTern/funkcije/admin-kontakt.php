<?php 
	session_start();
	include("../config/konekcija.php");

	$ime=$_POST['ime'];
    $email=$_POST['email'];
    $poruka=$_POST['poruka'];

	$upit = "INSERT INTO porukeadmin(idPorukaAdmin,ime,emailKorisnik,poruka) VALUES('','$ime','$email','$poruka')";
	
	if (mysqli_query($kon, $upit)) 
	{
		header('Location:../kontakt.php');
	} 
	else 
	{
		echo "Greska: " . $upit . " " . mysqli_error($kon);
	}
?>