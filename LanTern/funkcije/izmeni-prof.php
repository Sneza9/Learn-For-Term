 <?php
	session_start();
	include ('../config/konekcija.php');

    $idKorisnik=$_GET['idKorisnik'];
	$ime=$_GET['ime'];
    $prezime=$_GET['prezime'];
    $email=$_GET['email'];
    $korisnickoIme=$_GET['korisnickoIme'];
    $lozinka=$_GET['lozinka'];
    $telefon=$_GET['telefon'];

	$upit = "UPDATE korisnici SET ime = '".$ime."', prezime = '".$prezime."', korisnickoIme = '".$korisnickoIme."',email = '".$email."',lozinka = '".$lozinka."',telefon = '".$telefon."' WHERE idKorisnik='".$idKorisnik."'";
	
	if (mysqli_query($kon, $upit)) 
	{
	
	header('Location: ../izmeni-profil.php');
	} 
	else 
	{
	echo "Greska: " . $upit . "<br/> " . mysqli_error($kon);
	}
?>