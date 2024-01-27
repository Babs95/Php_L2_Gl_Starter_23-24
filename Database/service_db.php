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

function getOneService($id) {
    global $connexion;

    $query = "SELECT * FROM services WHERE id = $id";
    $stmt = $connexion->prepare($query);
    $stmt->execute();
    return $stmt;
}

function getOneService2($id) {
    global $connexion;

    $query = "SELECT * FROM services WHERE id = :id";
    $stmt = $connexion->prepare($query);
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    return $stmt;
}

function updateService($id, $libelle) {
    global $connexion;

    $query = "UPDATE services SET libelle = ? WHERE id = ?";
    $stmt = $connexion->prepare($query);
    $stmt->execute(array($libelle, $id));
    $stmt->closeCursor();
}

function deleteService($id) {
    global $connexion;

    $query = "DELETE FROM services WHERE id = ?";
    $stmt = $connexion->prepare($query);
    $stmt->execute(array($id));
    $stmt->closeCursor();
}

function getOneServiceAllDocteurs($id) {
    global $connexion;

    $query = "SELECT docteurs.id, docteurs.nom, docteurs.prenom
    FROM services
    INNER JOIN docteurs ON services.id = docteurs.service_id
    WHERE services.id = $id";
    $stmt = $connexion->prepare($query);
    $stmt->execute();

    return $stmt;
}

function searchServiceByWord($word) {
    global $connexion;

    $query = 'SELECT docteurs.id, docteurs.nom, docteurs.prenom, docteurs.email, docteurs.adresse, docteurs.tel
    , services.libelle as service_libelle
    FROM services 
    INNER JOIN docteurs ON services.id = docteurs.service_id
    WHERE services.libelle LIKE "%'.$word.'%" ORDER BY id DESC';
    $stmt = $connexion->prepare($query);
    $stmt->execute();
    return $stmt;
}