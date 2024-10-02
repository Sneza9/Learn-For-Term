<?php
session_start();
include("../config/konekcija.php");
	
	$idOglas= $_GET['idOglas'];
    $naslov=$_GET['naslov'];
    $opis=$_GET['opis'];
    $cena=$_GET['cena'];
	$idKategorija=$_GET['idKategorija'];
	$idGrad=$_GET['idGrad'];
	
	$upit = "UPDATE oglasi SET naslov = '".$naslov."', opis = '".$opis."', cena = '".$cena."',idKategorija = '".$idKategorija."',idGrad = '".$idGrad."' WHERE idOglasa='".$idOglas."'";
	
	if (mysqli_query($kon, $upit)) 
	{
		header('Location:../moji-oglasi.php');
	} 
	else 
	{
		echo "Greska: " . $upit . "<br/>  " . mysqli_error($kon);
	}	
?>