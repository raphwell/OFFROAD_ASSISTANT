<?php

$username="garcia";
$password="motdepasse";
$dbname="garcia";


$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// Connexion a MySQL server

//try {
//    define('RACINE',__DIR__);
//        include_once('config/conf.php');
//        include_once (INCLUDE_PATH . 'connect.inc.php');
//        $connexion = connexion();
//} catch (Exception $ex) {
//    echo 'impossible de se connecter';
//}


try {
    $connexion= new PDO('mysql:host=localhost;dbname=garcia', $username, $password);
    } catch (PDOException $ex) {
        throw new Exception('Connexion impossible');
    }

// Select des positions voulues
try {
        $pseudo = filter_input(INPUT_GET, 'pseudo', FILTER_SANITIZE_STRING);
        $sql ="SELECT X,Y,HORODATAGE ";
        $sql.="FROM position inner join position_inscrit on ";
        $sql.="position.idpoint=position_inscrit.idpoint ";
        $sql.="inner join inscrit on position_inscrit.idinscrit=inscrit.idinscrit ";
        $sql.="inner join utilisateur on inscrit.idutilisateur=utilisateur.idutilisateur ";
        $sql.="where utilisateur.pseudo = :input  ";
        $res=$connexion->prepare($sql);
        $res->bindValue(':input', $pseudo);
        $res->execute();
    
    } catch (PDOException $ex) {
    throw new Exception('requete impossible');
	}


header("Content-type: text/xml");

   

while ($row = $res->fetch()){
  // ADD TO XML DOCUMENT NODE
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("lat", $row['X']);
  $newnode->setAttribute("lng", $row['Y']);
  $newnode->setAttribute("date", $row['HORODATAGE']);
  
}

echo $dom->saveXML();

