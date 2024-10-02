<?php
    session_start();

    unset($_SESSION['idKorisnik']);
    unset($_SESSION['korisnickoIme']);
    unset($_SESSION['email']);
    unset($_SESSION['ime']);
    unset($_SESSION['prezime']);
    unset($_SESSION['idUloga']);

    header('Location:../logovanje.php');
?>
