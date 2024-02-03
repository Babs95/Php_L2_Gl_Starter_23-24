<?php
require('db_connection.php');

function getAllProfils() {
    global $connexion;
    $query = "SELECT * FROM profils";
    $resultat = $connexion->query($query);
    return $resultat;
}