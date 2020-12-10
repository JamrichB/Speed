<?php 
include 'action_models.php';
include 'action_reservation.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;1,400;1,500&family=Montserrat:ital,wght@0,500;0,600;1,500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/admin_style.css">
    </head>
    
    <body>
       <header>
        <nav class="navbar">
            <p>Admin prostredie Speed.sk</p>
            <a href="index.html">odhlásiť sa</a>
        </nav>
    </header> 
    
    <div class="container">
      <?php
        $query="SELECT * FROM modely";
        $stmt=$conn->prepare($query);
        $stmt->execute();
        $result=$stmt->get_result();
        ?>
        <h2>Modely áut</h2>
        <p>Aktuálne ponúkané modely áut:</p>            
        <table class="table table-condensed">
          <thead>
            <tr>
              <th>Obrázok</th>
              <th>Značka</th>
              <th>Model</th>
              <th>1-4dni</th>
              <th>5-10dní</th>
              <th>11-20dní</th>
              <th>21-30dní</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php while($row=$result->fetch_assoc()){ ?>
            <tr>
              <td><img src="<?= $row['photo']; ?>" width="200" height="100" class="img-thumbnail"></td>
              <td><?= $row['znacka']; ?></td>
              <td><?= $row['model']; ?></td>
              <td><?= $row['1-4']; ?></td>
              <td><?= $row['5-10']; ?></td>
              <td><?= $row['11-20']; ?></td>
              <td><?= $row['21-30']; ?></td>
              <td>
                  <a href="details_models.php?details=<?= $row['id']; ?>" class="badge badge-primary">Details</a> |
                  <a href="admin.php?edit=<?= $row['id']; ?>" class="badge badge-success">Edit</a> |
                  <a href="action_models.php?delete=<?= $row['id']; ?>" class="badge badge-danger" onclick="return confirm('Chcete naozaj vymazať daný záznam?');">Delete</a> 
            </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>

      <?php if (isset($_SESSION['response'])){ ?>
        <div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;
      </button> 
      <?=$_SESSION['response']; ?>
      </div>
      <?php } unset($_SESSION['response']); ?>
      

     <form action="action_models.php" method="POST" enctype="multipart/form-data">
     <input type="hidden" name="id" value="<?= $id; ?>">
      <div class="add-edit-cars">
        <div class="components">
            <h2>pridať nový model</h2>
            <div class="textbox">
                <input type="text" name="znacka" value="<?= $znacka; ?>" placeholder="Značka" required>
            </div>
            <div class="textbox">
                <input type="text" name="model" value="<?= $model; ?>" placeholder="Model" required>
            </div> 
            <div class="textbox">
                <input type="text" name="1-4" value="<?= $one; ?>" placeholder="1-4dni" required>
            </div> 
            <div class="textbox">
                <input type="text" name="5-10" value="<?= $two; ?>" placeholder="5-10dní" required>
            </div> 
            <div class="textbox">
                <input type="text" name="11-20" value="<?= $three; ?>" placeholder="11-20dní" required>
            </div> 
            <div class="textbox">
                <input type="text" name="21-30" value="<?= $four; ?>" placeholder="21-30dní" required>
            </div> 
            <div class="textbox">
                <input type="hidden" name="oldimage" value="<?= $photo; ?>">
                <input type="file" name="photo" class="custom-file" required>
            </div> 
            <?php if($update==true){ ?>
              <input type="submit" class="button" name="update" value="Upraviť">
            <?php } else { ?>
               <input type="submit" class="button" name="add" value="Odoslať">
            <?php } ?>
        </div>
      </div>
    </form>

      <div class="container">
      <?php
        $query="SELECT * FROM rezervacie";
        $stmt=$conn->prepare($query);
        $stmt->execute();
        $result=$stmt->get_result();
        ?>
        <h2>Rezervácie</h2>
        <p>Aktuálne rezervácie jednotlivých modelov áut:</p>            
        <table class="table table-condensed">
          <thead>
            <tr>
              <th>Meno</th>
              <th>Priezvisko</th>
              <th>Telefónne číslo</th>
              <th>Auto</th>
              <th>Od</th>
              <th>Do</th>
              <th>Miesto prevzatia</th>
              <th>Miesto odovzdania</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php while($row=$result->fetch_assoc()){ ?>
            <tr>
              <td><?= $row['meno']; ?></td>
              <td><?= $row['priezvisko']; ?></td>
              <td><?= $row['phone']; ?></td>
              <td><?= $row['auto']; ?></td>
              <td><?= $row['od']; ?></td>
              <td><?= $row['do']; ?></td>
              <td><?= $row['miestoPrevzatia']; ?></td>
              <td><?= $row['miestoOdovzdania']; ?></td>
              <td>
                  <a href="details_reservation.php?details=<?= $row['id']; ?>" class="badge badge-primary">Details</a> |
                  <a href="admin.php?edit2=<?= $row['id']; ?>" class="badge badge-success">Edit</a> |
                  <a href="action_reservation.php?delete=<?= $row['id']; ?>" class="badge badge-danger" onclick="return confirm('Chcete naozaj vymazať daný záznam?');">Delete</a> 
            </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>

      <?php if (isset($_SESSION['response'])){ ?>
        <div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;
      </button> 
      <?=$_SESSION['response']; ?>
      </div>
      <?php } unset($_SESSION['response']); ?>


    <form action="action_reservation.php" method="POST" enctype="multipart/form-data">
     <input type="hidden" name="id" value="<?= $id; ?>">
      <div class="add-edit-reservation">
        <div class="components">
            <h2>pridať novú rezerváciu</h2>
            <div class="textbox">
                <input type="text" name="meno" value="<?= $meno; ?>" placeholder="Meno" required>
            </div>
            <div class="textbox">
                <input type="text" name="priezvisko" value="<?= $priezvisko; ?>" placeholder="Priezvisko" required>
            </div> 
            <div class="textbox">
                <input type="text" name="phone" value="<?= $phone; ?>" placeholder="Telefónne číslo" required>
            </div> 
            <div class="textbox">
            <input type="text" name="auto" value="<?= $auto; ?>" placeholder="Auto" required>
            </div> 
            <div class="textbox">
                <input type="date" name="od" value="<?= $od; ?>" placeholder="Od" required>
            </div> 
            <div class="textbox">
                <input type="date" name="do" value="<?= $do; ?>" placeholder="Do" required>
            </div> 
            <div class="textbox">
                <input type="text" name="miestoPrevzatia" value="<?= $miestoP; ?>" placeholder="Miesto prevzatia" required>
            </div> 
            <div class="textbox">
                <input type="text" name="miestoOdovzdania" value="<?= $miestoO; ?>" placeholder="Miesto odovzdania" required>
            </div> 
            <?php if($update2==true){ ?>
              <input type="submit" class="button" name="update2" value="Upraviť">
            <?php } else { ?>
               <input type="submit" class="button" name="add" value="Odoslať">
            <?php } ?>
        </div>
      </div> 
    </form>
    </body>     
</html>