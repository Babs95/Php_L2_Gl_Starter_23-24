<?php
require('db_connection.php');

function getAllServices(){
    global $connexion;
    $query = "SELECT * FROM services";
    $resultat = $connexion->query($query);
    return $resultat;
}

function addService($libelle) {
    global $connexion;

    $query = "INSERT INTO services(libelle) VALUES(:libelle)";
    $stmt = $connexion->prepare($query);
    $stmt->execute(['libelle' => $libelle]);
    $stmt->closeCursor();
}