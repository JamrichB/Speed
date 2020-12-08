<?php
   $conn= new mysqli("localhost","root","","speed");

   if($conn->connect_error){
       die("Nepodarilo sa pripojiť k databáze.".$conn->connect_error);
   }
?>