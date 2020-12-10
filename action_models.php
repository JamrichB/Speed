<?php
   session_start();
   include 'config.php';

   $update=false;
   $id="";
   $znacka="";
   $model="";
   $one="";
   $two="";
   $three="";
   $four="";
   $photo="";

   //  ADD
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
   //  /ADD

   //  DELETE
    if(isset($_GET['delete'])){
        $id=$_GET['delete'];

        $sql="SELECT photo FROM modely WHERE id=?";
        $stmt2=$conn->prepare($sql);
        $stmt2->bind_param("i",$id);
        $stmt2->execute();
        $result2=$stmt2->get_result();
        $row=$result2->fetch_assoc();

        $imagepath=$row['photo'];
        unlink($imagepath);

        $query="DELETE FROM modely WHERE id=?";
        $stmt=$conn->prepare($query);
        $stmt->bind_param("i",$id);
        $stmt->execute();

        header('location:admin.php');
       $_SESSION['response']="Úspešne odstránené z databázy";
       $_SESSION['res_type']="danger";
    }
    //  /DELETE

    //  EDIT
    if(isset($_GET['edit'])){
        $id=$_GET['edit'];
        $update=true;

        $query="SELECT * FROM modely WHERE id=?";
        $stmt=$conn->prepare($query);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result=$stmt->get_result();
        $row=$result->fetch_assoc();

        $id=$row['id'];
        $znacka=$row['znacka'];
        $model=$row['model'];
        $one=$row['1-4'];
        $two=$row['5-10'];
        $three=$row['11-20'];
        $four=$row['21-30'];
        $photo=$row['photo']; 
    }
    //  /EDIT

    //  UPDATE
    if(isset($_POST['update'])){
        $id=$_POST['id'];
        $znacka=$_POST['znacka'];
        $model=$_POST['model'];
        $one=$_POST['1-4'];
        $two=$_POST['5-10'];
        $three=$_POST['11-20'];
        $four=$_POST['21-30'];
        $newimage=$_FILES['photo']['name'];
        $upload2="img/".$newimage;

        move_uploaded_file($_FILES['photo']['tmp_name'], $upload2);
            
        $query="UPDATE `modely` SET `znacka`=?,`model`=?,`photo`=?,`1-4`=?,`5-10`=?,`11-20`=?,`21-30`=? WHERE id=?";
        $stmt=$conn->prepare($query);
        $stmt->bind_param("sssssssi",$znacka,$model,$upload2,$one,$two,$three,$four,$id);
        $stmt->execute();
        $_SESSION['response']="Úspešne upravený záznam";
        $_SESSION['res_type']="primary";
        header('location:admin.php');
    }
    //   /UPDATE

    //   VIEW DETAILS
    if(isset($_GET['details'])){
        $id=$_GET['details'];

        $query="SELECT * FROM modely WHERE id=?";
        $stmt=$conn->prepare($query);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result=$stmt->get_result();
        $row=$result->fetch_assoc();

        $id=$row['id'];
        $znacka=$row['znacka'];
        $model=$row['model'];
        $one=$row['1-4'];
        $two=$row['5-10'];
        $three=$row['11-20'];
        $four=$row['21-30'];
        $photo=$row['photo'];
    }
    //   /VIEW DETAILS
    
   ?>
 