<?php
   include 'config.php';

   $update2=false;
   $id="";
   $meno="";
   $priezvisko="";
   $phone="";
   $auto="";
   $od="";
   $do="";
   $miestoP="";
   $miestoO="";

  

   //  ADD
   if(isset($_POST['add'])){
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

       header('location:admin.php');
       $_SESSION['response']="Úspešne pridané do databázy";
       $_SESSION['res_type']="success";
   }
   //  /ADD

   //  DELETE
    if(isset($_GET['delete'])){
        $id=$_GET['delete'];

        $query="DELETE FROM rezervacie WHERE id=?";
        $stmt=$conn->prepare($query);
        $stmt->bind_param("i",$id);
        $stmt->execute();

        header('location:admin.php');
       $_SESSION['response']="Úspešne odstránené z databázy";
       $_SESSION['res_type']="danger";
    }
    //  /DELETE

    //  EDIT
    if(isset($_GET['edit2'])){
        $id=$_GET['edit2'];
        $update2=true;

        $query="SELECT * FROM rezervacie WHERE id=?";
        $stmt=$conn->prepare($query);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result=$stmt->get_result();
        $row=$result->fetch_assoc();

        $id=$row['id'];
        $meno=$row['meno'];
        $priezvisko=$row['priezvisko'];
        $phone=$row['phone'];
        $auto=$row['auto'];
        $od=$row['od'];
        $do=$row['do'];
        $miestoP=$row['miestoPrevzatia'];
        $miestoO=$row['miestoOdovzdania']; 
    }
    //  /EDIT

    //  UPDATE
    if(isset($_POST['update2'])){
        $id=$_POST['id'];
        $meno=$_POST['meno'];
        $priezvisko=$_POST['priezvisko'];
        $phone=$_POST['phone'];
        $auto=$_POST['auto'];
        $od=$_POST['od'];
        $do=$_POST['do'];
        $miestoP=$_POST['miestoPrevzatia'];
        $miestoO=$_POST['miestoOdovzdania'];
        
            
        $query="UPDATE `rezervacie` SET `meno`='$meno',`priezvisko`='$priezvisko',`phone`='$phone',`auto`='$auto',`od`='$od',`do`='$do',`miestoPrevzatia`='$miestoP',`miestoOdovzdania`='$miestoO' WHERE id='$id'";
        $result=$conn->query($query);
        
        $_SESSION['response']="Úspešne upravený záznam";
        $_SESSION['res_type']="primary";
        header('location:admin.php');
    }
    //   /UPDATE

    //   VIEW DETAILS
    if(isset($_GET['details'])){
        $id=$_GET['details'];

        $query="SELECT * FROM rezervacie WHERE id=?";
        $stmt=$conn->prepare($query);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result=$stmt->get_result();
        $row=$result->fetch_assoc();

        $id=$row['id'];
        $meno=$row['meno'];
        $priezvisko=$row['priezvisko'];
        $phone=$row['phone'];
        $auto=$row['auto'];
        $od=$row['od'];
        $do=$row['do'];
        $miestoP=$row['miestoPrevzatia'];
        $miestoO=$row['miestoOdovzdania']; 
    }
    //   /VIEW DETAILS
    
   ?>
 