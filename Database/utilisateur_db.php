<?php
require('db_connection.php');

function getUserByEmail($email){
    global $connexion;

    $query = "SELECT * FROM utilisateurs WHERE email = ?";
    $stmt = $connexion->prepare($query);
    $stmt->execute(array($email));
    return $stmt;
}