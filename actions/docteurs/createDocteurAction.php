<?php
require ('../../Database/docteur_db.php');

if(isset($_POST['envoyer'])){
    if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email'])
        && !empty($_POST['adresse']) && !empty($_POST['tel']) && !empty($_POST['service_id'])) {
            if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                extract($_POST);
                addDocteur($nom, $prenom, $email, $adresse, $tel, $service_id);
                $message = "Le docteur a été ajoutée avec succès!";
                header("Location:docteurs.php?message=" . $message);
            }else{
                $errorMessage = "Veuillez saisir un email valide !";
            }
    }else{
        $errorMessage = "Veuillez remplir les champs obligatoires !";
    }
}