<?php
session_start();
if(!isset($_SESSION['auth']) && !$login){
    header('Location: ../../views/auth/login.php');
}