<?php


function AfficheToutesPositions($unObjetPDO){//pour un nom de parcours donné
    $sql = "select * ";
    $sql .= "from POSITION ";
    $sql .= "inner join contient on position.idpoint = contient.idpoint ";
    $sql .= "inner join parcours on contient.idparcours=parcours.idparcours ";
    $sql .= "where parcours.nom='faron'";
    $lignes = $unObjetPDO->query($sql); // on va configurer le mode objet our la lisibilite du code
    $lignes->setFetchMode(PDO::FETCH_OBJ);
    while($unePosition = $lignes->fetch()){
        echo " " . $unePosition->X . " " . $unePosition->Y . "<br>";
    }
}



