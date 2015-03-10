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
        include(INCLUDE_PATH . 'menu.php');
        include_once (INCLUDE_PATH . 'connect.inc.php');
        $conn = connexion();
        ?>
    <body>
        <br><br>
        <br><br>
        <section id="principal">
            <article>
                <h2> Bienvenue sur le site Offroad Assistant</h2>
                <p> Sur ce site, vous allez pouvoir suivre des randonneurs lors de leur marche, </p>
                <p> grâce à l'application présente sur leur Smartphone, qui envoie en permanence leurs positions GPS. </p>
                <p> Il suffit pour cela de connaître leur Pseudo. </p>
                <p> Cliquer sur le lien "Suivre un randonneur" ci-dessus, indiquer le Pseudo et cliquer sur OK. </p>
                <p> Vous verrez alors apparaitre les positions en temps réel de ce randonneur. </p>
                <p> En cliquant sur les différents points représentés par une icône "marcheur", </p>
                <p> vous pourrez consulter le nom du marcheur, ses positions GPS, et son temps de parcours. </p>
                <p> Le lien "Préparer une randonnée" vous permettra de consulter un très grand nombre de parcours </p>
                <p> qui ont été enregistrés dans notre base de données par les randonneurs, </p> 
                <p> et de préparer votre circuit en connaissant les caractéristiques de chaque parcours. </p>
                <br>
                
            </article>
        </section>
           
    </body>
     <?php
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }

    
   