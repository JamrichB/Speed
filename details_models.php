<?php 
include 'action_models.php';
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
        <link rel="stylesheet" href="css/details_models_style.css">
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
        <img src="<?= $photo; ?>" width="400" height=200 class="img-thumbnail">
        <div class="text">
        <p>Značka___   <?= $znacka; ?></p>
        <p>Model___   <?= $model; ?></p>
        <p>1-4dni___   <?= $one; ?></p>
        <p>5-10dní___   <?= $two; ?></p>
        <p>11-20dní___   <?= $three; ?></p>
        <p>21-30dní___   <?= $four; ?></p>  
        </div>
    </div>
    </body>
</html>