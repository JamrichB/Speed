<?php 
include 'action.php';
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
        <link rel="stylesheet" href="css/admin-style.css">
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
              <td><img src="<?= $row['photo']; ?>" width="200" height="100"></td>
              <td><?= $row['znacka']; ?></td>
              <td><?= $row['model']; ?></td>
              <td><?= $row['1-4']; ?></td>
              <td><?= $row['5-10']; ?></td>
              <td><?= $row['11-20']; ?></td>
              <td><?= $row['21-30']; ?></td>
              <td>
                  <a href="details.php?details=<?= $row['id']; ?>" class="badge badge-primary">Details</a> |
                  <a href="admin.php?edit=<?= $row['id']; ?>" class="badge badge-success">Edit</a> |
                  <a href="action.php?delete=<?= $row['id']; ?>" class="badge badge-danger">Delete</a> 
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
      

     <form action="action.php" method="POST" enctype="multipart/form-data">
      <div class="add-edit-cars">
        <div class="components">
            <h2>pridať nový model</h2>
            <div class="textbox">
                <input type="text" name="znacka" placeholder="Značka" required>
            </div>
            <div class="textbox">
                <input type="text" name="model" placeholder="Model" required>
            </div> 
            <div class="textbox">
                <input type="text" name="1-4" placeholder="1-4dni" required>
            </div> 
            <div class="textbox">
                <input type="text" name="5-10" placeholder="5-10dní" required>
            </div> 
            <div class="textbox">
                <input type="text" name="11-20" placeholder="11-20dní" required>
            </div> 
            <div class="textbox">
                <input type="text" name="21-30" placeholder="21-30dní" required>
            </div> 
            <div class="textbox">
                <input type="file" name="photo" class="custom-file" required>
            </div> 
               <input type="submit" class="button" name="add" value="Odoslať">
        </div>
      </div>
    </form>

      <div class="container">
        <h2>Rezervácie</h2>
        <p>Aktuálne rezervácie jednotlivých modelov áut:</p>            
        <table class="table table-condensed">
          <thead>
            <tr>
              <th>Meno</th>
              <th>Priezvisko</th>
              <th>E-mail</th>
              <th>Telefónne číslo</th>
              <th>Od</th>
              <th>Do</th>
              <th>Miesto prevzatia</th>
              <th>Miesto odovzdania</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>John</td>
              <td>Doe</td>
              <td>john@example.com</td>
              <td>995217</td>
              <td>14.07</td>
              <td>09.08</td>
              <td>Bratislava</td>
              <th>Košice</th>
              <td>
                <a href="#" class="badge badge-primary">Details</a> |
                <a href="#" class="badge badge-success">Edit</a> |
                <a href="#" class="badge badge-danger">Delete</a> 
            </td>
            </tr>
            <tr>
              <td>Mary</td>
              <td>Moe</td>
              <td>mary@example.com</td>
              <td>995217</td>
              <td>14.07</td>
              <td>09.08</td>
              <td>Bratislava</td>
              <th>Košice</th>
              <td>
                <a href="#" class="badge badge-primary">Details</a> |
                <a href="#" class="badge badge-success">Edit</a> |
                <a href="#" class="badge badge-danger">Delete</a> 
            </td>
            </tr>
            <tr>
              <td>July</td>
              <td>Dooley</td>
              <td>july@example.com</td>
              <td>995217</td>
              <td>14.07</td>
              <td>09.08</td>
              <td>Bratislava</td>
              <th>Košice</th>
              <td>
                <a href="#" class="badge badge-primary">Details</a> |
                <a href="#" class="badge badge-success">Edit</a> |
                <a href="#" class="badge badge-danger">Delete</a> 
            </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="add-edit-reservation">
        <div class="components">
            <h2>pridať novú rezerváciu</h2>
            <div class="textbox">
                <input type="text" name="meno" placeholder="Meno" required>
            </div>
            <div class="textbox">
                <input type="text" name="priezvisko" placeholder="Priezvisko" required>
            </div> 
            <div class="textbox">
                <input type="email" name="email" placeholder="E-mail" required>
            </div> 
            <div class="textbox">
                <input type="text" name="phone" placeholder="Telefónne číslo" required>
            </div> 
            <div class="textbox">
                <input type="date" name="od" placeholder="Od" required>
            </div> 
            <div class="textbox">
                <input type="date" name="do" placeholder="Do" required>
            </div> 
            <div class="textbox">
                <input type="text" name="miestoPr" placeholder="Miesto prevzatia" required>
            </div> 
            <div class="textbox">
                <input type="text" name="miestoOd" placeholder="Miesto odovzdania" required>
            </div> 
            <input type="submit" class="button" name="add" value="Odoslať">
        </div>
      </div>
    </body>
</html>