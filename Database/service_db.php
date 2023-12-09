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