<?php
require('../../actions/auth/loginAction.php');
$login = true;
include_once '../../header.php';
?>
<main class="flex-shrink-0 ">
    <div class="container">
        <h1 class="mt-5">AUTHENTIFICATION</h1>
        <?php
        if (isset($errorMessage)) {
        ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?= $errorMessage ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        ?>
        <form class="container" method="POST">
            <div class="mb-3">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label for="inputAdresse" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="password">
            </div>
       
            <div class="col-12">
                <button type="submit" name="send" class="btn btn-primary">Se Connecter</button>
            </div>
        </form>
</main>