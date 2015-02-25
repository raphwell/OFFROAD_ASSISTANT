<?php

//require("./includes/connect.inc.php");

// Start XML file, create parent node


$username="garcia";
$password="garcia";
$database="offroad";

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// Connexion a MySQL server
try {
    $connexion= new PDO('mysql:host=localhost;dbname=offroad', $username, $password);
    } catch (PDOException $ex) {
        throw new Exception('Connexion impossible');
    }

// Select all the rows in the markers table
try {
        $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_STRING);
        $sql ="SELECT X,Y ";
        $sql.="FROM position inner join position_inscrit on ";
        $sql.="position.idpoint=position_inscrit.idpoint ";
        $sql.="inner join inscrit on position_inscrit.idinscrit=inscrit.idinscrit ";
        $sql.="inner join utilisateur on inscrit.idutilisateur=utilisateur.idutilisateur ";
        $sql.="where utilisateur.pseudo = :nt  ";
        $res=$connexion->prepare($sql);
        $res->bindValue(':nt', $pseudo);
        $res->execute();
    
//    $sql="select X, Y from position";
//    $res=$connexion->query($sql);
//    while ($row = $res->fetch()) {
//        echo $row['X']."-".$row['Y'];
//    }
    } catch (PDOException $ex) {
    throw new Exception('requete impossible');
	}


header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each
//while ($row = mysql_fetch_row($res)) {
    

while ($row = $res->fetch()){
  // ADD TO XML DOCUMENT NODE
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("lat", $row['X']);
  $newnode->setAttribute("lng", $row['Y']);
  
}

echo $dom->saveXML();

?>