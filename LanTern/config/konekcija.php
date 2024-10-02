<?php
   $servername='localhost';
   $username='root';
   $password='';
   $baza = "lantern";

   $kon=mysqli_connect($servername,$username,$password,$baza);
   if(!$kon)
   {
      die('Losa konekcija sa bazom' .mysqli_error());
   }
?>