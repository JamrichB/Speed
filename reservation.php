<?php 
include 'action_main_reservation.php';
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
        <link rel="stylesheet" href="css/reservation_style.css">
    </head>
    <body>
        <header>
            <nav class="navbar">
                <ul class="nav_components">
                    <li><a href="index.html">O nás</li>
                    <li><a href="models.php">Modely</a></li>
                    <li>Rezervácia</li>
                    <li><a href="contact.html">Kontakt</a></li>
                </ul>
            </nav>
        </header>

    <form action="action_reservation.php" method="POST" enctype="multipart/form-data">
     <input type="hidden" name="id" value="<?= $id; ?>">
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
                <input type="text" name="phone" placeholder="Telefónne číslo" required>
            </div> 
            <div class="textbox">
            <input type="text" name="auto" placeholder="Auto" required>
            </div> 
            <div class="textbox">
                <input type="date" name="od" placeholder="Od" required>
            </div> 
            <div class="textbox">
                <input type="date" name="do" placeholder="Do" required>
            </div> 
            <div class="textbox">
                <input type="text" name="miestoPrevzatia" placeholder="Miesto prevzatia" required>
            </div> 
            <div class="textbox">
                <input type="text" name="miestoOdovzdania" placeholder="Miesto odovzdania" required>
            </div> 
               <input type="submit" class="button" name="add3" value="Odoslať">
        </div>
      </div> 
    </form>
    </body>
</html>