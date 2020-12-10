<?php 
include 'config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Speed for you</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;1,400;1,500&family=Montserrat:ital,wght@0,500;0,600;1,500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/models_style.css">
    </head>
    <body>
        <header>
            <nav class="navbar">
                <ul class="nav_components">
                    <li><a href="index.html">O nás</li>
                    <li>Modely</li>
                    <li><a href="reservation.php">Rezervácia</a></li>
                    <li><a href="contact.html">Kontakt</a></li>
                </ul>
            </nav>
        </header>

        <div class="container">
      <?php
        $query="SELECT * FROM modely";
        $stmt=$conn->prepare($query);
        $stmt->execute();
        $result=$stmt->get_result();
        ?>
        <h2>Aktuálne modely v našej ponuke</h2>         
        <table class="table table-condensed">
          <thead>
            <tr>
              <th></th>
              <th>Značka</th>
              <th>Model</th>
              <th>1-4dni</th>
              <th>5-10dní</th>
              <th>11-20dní</th>
              <th>21-30dní</th>
              <th></th>
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
                  <a href="reservation.php" class="badge badge-primary">Rezervovať</a> 
            </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </body>
</html>