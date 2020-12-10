<?php
   include 'config.php';

   //  ADD
   if(isset($_POST['add3'])){
       $meno=$_POST['meno'];
       $priezvisko=$_POST['priezvisko'];
       $phone=$_POST['phone'];
       $auto=$_POST['auto'];
       $od = $_POST['od'];
       $do = $_POST['do'];
       $miestoP=$_POST['miestoPrevzatia'];
       $miestoO=$_POST['miestoOdovzdania'];

       $query="INSERT INTO `rezervacie`(`meno`, `priezvisko`, `phone`,`auto`, `od`, `do`, `miestoPrevzatia`, `miestoOdovzdania`)VALUES('$meno','$priezvisko','$phone','$auto','$od','$do','$miestoP','$miestoO')";
       $result=$conn->query($query);
       header('location:reservation.php');
       
   }
   //  /ADD
   ?>