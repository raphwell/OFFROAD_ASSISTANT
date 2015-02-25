<?php

function connexion() {
    
$servername = "localhost";
$username = "garcia";
$password = "garcia";
$dbname = "offroad";

try {
    //$conn = "mysql:host=$servername;dbname=$dbname";
     $options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
     $options[pdo::MYSQL_ATTR_INIT_COMMAND] = "Set NAMES utf8";
     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, $options);
     return $conn;
     

} catch (PDOException $ex) {
		// on va intercepter la PDOException
		// on va rediriger l'erreur sur le script appelant
		throw new Exception('Connexion impossible');
	}

}  

    
     
     
    


