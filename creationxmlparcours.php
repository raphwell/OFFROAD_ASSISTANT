<?php

require("./includes/connect.inc.php");

// Start XML file, create parent node


$username="garcia";
$password="garcia";
$database="offroad";

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// Connexion a MySQL server

$connection=mysql_connect ('localhost', $username, $password);
if (!$connection) {  die('Not connected : ' . mysql_error());}

// Selection de la base de données

$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

// Select des positions voulues

$sql = "select X,Y ";
$sql .= "from POSITION inner join contient on position.idpoint = contient.idpoint ";
$sql .= "inner join parcours on contient.idparcours=parcours.idparcours ";
$sql .= "where parcours.nom='faron'";
$result = mysql_query($sql);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");

// Création du xml

while ($row = @mysql_fetch_assoc($result)){
  
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("lat", $row['X']);
  $newnode->setAttribute("lng", $row['Y']);
  
}

echo $dom->saveXML();

