<?php

try {
    define('RACINE', __DIR__);
        include_once('config/conf.php');
        include_once (INCLUDE_PATH . 'connect.inc.php');
        $conn = connexion();
} catch (Exception $ex) {
    echo "impossible de se connecter";
}
        
	
try {
    $x = 			$_POST["x"];
	$y = 			$_POST["y"];
	$z = 			$_POST["z"];
	$type = 		$_POST["type"];
	$horodatage =           $_POST["horodatage"];
		
		
        $sql ="INSERT INTO POSITION VALUES (". $x .",". $y .",". $z .",". $type .",". $horodatage .")";
        $res=$conn->query($sql);
        $res->execute();
    
    } catch (PDOException $ex) {
		throw new Exception('requete impossible');
	}

echo "Les données ont bien été enregistrées.";