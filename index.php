<!DOCTYPE html>
    

<html>
    <head>
        <title>OffRoad Assistant</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <?php
    try {
        define('RACINE', __DIR__);
        include_once('config/conf.php');
        include('./includes/menu.php');
        include_once (INCLUDE_PATH . 'connect.inc.php');
        include(INCLUDE_PATH . 'traitements.inc.php');  
        $conn = connexion();
        ?>
    <body>
        <br><br>
        <p><?php //AfficheToutesPositions($conn); ?>
           
    </body>
     <?php
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }

    
   