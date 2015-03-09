<?php

$username = "garcia";
$password = "garcia";
$database = "garcia";

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// Connexion a MySQL server
try {
    $connexion = new PDO('mysql:host=localhost;dbname=offroad', $username, $password);
} catch (PDOException $ex) {
    throw new Exception('Connexion impossible');
}

// Select des positions voulues
try {
    $pseudo = filter_input(INPUT_GET, 'departement', FILTER_SANITIZE_STRING);
    $sql = "select X,Y ";
    $sql .= "from POSITION inner join CONTIENT on position.idpoint = contient.idpoint ";
    $sql .= "inner join PARCOURS on contient.idparcours=parcours.idparcours ";
    $sql .= "where parcours.departement= :input  ";
    $res = $connexion->prepare($sql);
    $res->bindValue(':input', $departement);
    $res->execute();
    
} catch (PDOException $ex) {
    throw new Exception('requete impossible');
}


header("Content-type: text/xml");


// Création du xml

while ($row = $res->fetch()){
  // ADD TO XML DOCUMENT NODE
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("lat", $row['X']);
  $newnode->setAttribute("lng", $row['Y']);
}

echo $dom->saveXML();

