<?php

require('./Database/service_db.php');

if (isset($_GET['search']) AND !empty($_GET['search'])){
    $word = $_GET['search'];
    $searchResults = searchServiceByWord($word);
    /*var_dump($docteurs->fetch());
    die();*/
}else{
    $messageErreur = 'Veuillez saisir le service à rechercher!';
    $searchResults = null;
}