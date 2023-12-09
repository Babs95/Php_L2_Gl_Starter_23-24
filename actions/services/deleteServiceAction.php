<?php
require('../../Database/service_db.php');


if(isset($_GET['id']) AND !empty($_GET['id']) AND filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range' => 1))){
    $resultat = getOneService2($_GET['id']);

    if($resultat->rowCount() > 0){
        $service = $resultat->fetch();
        deleteService($service['id']);
        $message = "Le service a été supprimée avec succès!";
        header("Location:/views/services/services.php?message=" . $message);
    }else{
        $errorMessage =  'Ce service n\'existe pas!';
    }
}else{
    $errorMessage = "L'id du service doit être un entier valide supérieur ou égale à 1 !";
}