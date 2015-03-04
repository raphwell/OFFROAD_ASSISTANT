<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Preparer une rando</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css" />
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="../javascript/trouverParcours.js"></script>
    </head>
    <body onload="initialize()">
        
        <?php include('../includes/menu.php'); ?>
        
        <h1></h1>
        
        <section id="localisation">
            <form> 
            <label for="ville">Veuillez indiquer la ville :</label>
            <input type="text" id="ville" name="ville"  size="35" pattern="^[a-zA-Z\s\-]+$" />
            <br><br>
            
            <input type="button" id="selectionner" name="selectionner" value="Choisir!"/>
            <a id="selection" href="../newmapparcours.php"></a>
            <br>
            </form>
        </section>
        
        <br>

    </body>
</html>





