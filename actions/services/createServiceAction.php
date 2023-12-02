<?php
require('../../Database/service_db.php');

if(isset($_POST['envoyer'])) {
    if(isset($_POST['libelle']) && !empty($_POST['libelle'])) {
        extract($_POST);
        addService($libelle);
        $message = "Le service a été ajoutée avec succès!";
        header("Location:services.php?message=" . $message);
    }else{
        $errorMessage = 'Le libelle est obligatoire !';
    }
}