<?php 
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
        <link rel="stylesheet" href="css/details_reservation_style.css">
    </head>
    <body>
    <header>
        <nav class="navbar">
            <p>Admin prostredie Speed.sk</p>
            <a href="index.html">odhlásiť sa</a>
        </nav>
    </header> 
        
    <div class="container">
        <h2>Detail záznamu</h2>
        <div class="text">
            <h3>Meno___</h3>
            <p><?= $meno; ?></p>
            <h3>Priezvisko___</h3>
            <p><?= $priezvisko; ?></p>
            <h3>Kontakt___</h3>
            <p><?= $phone; ?></p>
            <h3>Auto___</h3>
            <p><?= $auto; ?></p>
            <h3>Od___</h3>
            <p><?= $od; ?></p>
            <h3>Do___</h3>
            <p><?= $do; ?></p>
            <h3>Miesto prevzatia___</h3>
            <p><?= $miestoP; ?></p> 
            <h3>Miesto odovzdania___</h3>
            <p><?= $miestoO; ?></p>
        </div>
    </div>
    </body>
</html>