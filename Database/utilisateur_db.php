<?php
require('db_connection.php');

define("UPLOAD_IMAGES_AVATAR", $_SERVER['DOCUMENT_ROOT'].'/uploads/images/avatars/');
define("FETCH_IMAGES_AVATAR", "http://php_l2_gl_starter.test".'/uploads/images/avatars/');

function getAllUsers(){
    global $connexion;
    $query = "SELECT * FROM utilisateurs";
    $resultat = $connexion->query($query);
    return $resultat;
}

function getUserByEmail($email){
    global $connexion;

    $query = "SELECT * FROM utilisateurs WHERE email = ?";
    $stmt = $connexion->prepare($query);
    $stmt->execute(array($email));
    return $stmt;
}

function addUser($nom, $prenom, $email, $password, $avatar_name, $profil_id) {
    global $connexion;

    $query = "INSERT INTO utilisateurs(nom, prenom, email, password, avatar_name, profil_id) VALUES(?,?,?,?,?,?)";
    $stmt = $connexion->prepare($query);
    $stmt->execute(array($nom, $prenom, $email, $password, $avatar_name, $profil_id));
    $stmt->closeCursor();
}