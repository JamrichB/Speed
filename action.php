<?php
   session_start();
   include 'config.php';

   if(isset($_POST['add'])){
       $znacka=$_POST['znacka'];
       $model=$_POST['model'];
       $one=$_POST['1-4'];
       $two=$_POST['5-10'];
       $three=$_POST['11-20'];
       $four=$_POST['21-30'];
       $photo=$_FILES['photo']['name'];
       $upload="img/".$photo;

       $query="INSERT INTO `modely`(`znacka`, `model`, `photo`, `1-4`, `5-10`, `11-20`, `21-30`)VALUES(?,?,?,?,?,?,?)";

       $stmt=$conn->prepare($query);
       $stmt->bind_param("sssssss",$znacka,$model,$upload,$one,$two,$three,$four);
       $stmt->execute();
       move_uploaded_file($_FILES['photo']['tmp_name'], $upload);

       header('location:admin.php');
       $_SESSION['response']="Úspešne pridané do databázy";
       $_SESSION['res_type']="success";

   }
        if(isset($_GET['delete'])){
            $id=$_GET['delete'];
            $query="DELETE FROM modely WHERE id=?";
            $stmt=$conn->prepare($query);
            $stmt->bind_param("i",$id);
            $stmt->execute();

            header('location:admin.php');
       $_SESSION['response']="Úspešne odstránené z databázy";
       $_SESSION['res_type']="danger";
        }
   ?>
 