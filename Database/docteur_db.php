<?php
require('db_connection.php');

function getAllDocteurs() {
    global $connexion;
    $query = "SELECT docteurs.id, docteurs.nom, docteurs.prenom, docteurs.email,
    docteurs.adresse, docteurs.tel, services.libelle as service_libelle
    FROM docteurs
    INNER JOIN services ON services.id = docteurs.service_id";
    $resultat = $connexion->query($query);
    return $resultat;
}

function addDocteur($nom, $prenom, $email, $adresse, $tel, $service_id) {
    global $connexion;

    $query = "INSERT INTO docteurs(nom, prenom, email, adresse, tel, service_id) VALUES(?,?,?,?,?,?)";
    $stmt = $connexion->prepare($query);
    $stmt->execute(array($nom, $prenom, $email, $adresse, $tel, $service_id));
    $stmt->closeCursor();
}