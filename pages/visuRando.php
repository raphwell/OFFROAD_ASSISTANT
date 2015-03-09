<!DOCTYPE html>
<html>
    <head>
        <title>Suivre un randonneur</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css" />
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="../javascript/marqueursRando.js"></script>
        
    </head>
    <body onload="initialize()">
        
        <?php include('../includes/menu.php'); ?>
        
        <h1>Suivre un participant à une randonnée en cours</h1>
        
        <section id="localisation">
            <form  name="rando" > 
            <label for="pseudo">Veuillez indiquer le pseudo :</label>
            <input type="text" id="pseudo" name="pseudo"  size="35" pattern="^[a-zA-Z\s\-]+$" />
            <br><br>
            
            <input type="button" onclick="initialize()" value="  OK  "/>
            
            <br>
            </form>
        </section>
        
        
        <br>
        <div id="map"> </div>
        
    </body>
</html>