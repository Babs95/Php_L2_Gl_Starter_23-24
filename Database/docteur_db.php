<?php
require('db_connection.php');

function getAllDocteurs(){
    global $connexion;
    $query = "SELECT * FROM docteurs";
    $resultat = $connexion->query($query);
    return $resultat;
}