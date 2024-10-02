<?php
	session_start();
	include("../config/konekcija.php");

	$oglas = $_GET['idOglasa'];
	$upitOmiljeni="delete from omiljenioglas where idOglas=$oglas";
	
	$rezultat1 = mysqli_query($kon, $upitOmiljeni); 

	if($rezultat1)
	{
		$upit="delete from oglasi where idKorisnik='".$_SESSION['idKorisnik']."' and idOglasa=$oglas";
		$rezultat2 = mysqli_query($kon, $upit);

    	if ($rezultat2) {
			// Ako oba upita uspeju
			header('location: ../moji-oglasi.php');
		}
		else
		{
			echo "Greska: " . $upit . " " . mysqli_error($kon);
		}
	}	
?>