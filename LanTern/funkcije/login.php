<?php
	session_start();
	include("../config/konekcija.php");
	
	$email=$_GET['korisnickoEmail'];
	$lozinka=$_GET['lozinka'];

	$result=mysqli_query($kon,"SELECT * FROM korisnici WHERE (korisnickoIme='".$email."' OR email='".$email."') AND lozinka='".$lozinka."'");
	$row = mysqli_fetch_array($result);
	
	if($row['idUloga']=="1")
	{
		$_SESSION['idKorisnik']=$row['idKorisnik'];
		$_SESSION['ime']=$row['ime'];
		$_SESSION['prezime']=$row['prezime'];
		$_SESSION['email']=$row['email'];
		$_SESSION['idUloga']=$row['idUloga'];

		header('Location:../admin.php');
	}
	else if($row['idUloga']=="2")
	{
		$_SESSION['idKorisnik']=$row['idKorisnik'];	
		$_SESSION['ime']=$row['ime'];	
		$_SESSION['prezime']=$row['prezime'];	
		$_SESSION['email']=$row['email'];		
		$_SESSION['idUloga']=$row['idUloga'];
		
		header('Location:../oglasi.php');
	}
?>