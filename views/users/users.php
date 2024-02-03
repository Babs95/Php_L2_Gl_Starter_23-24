<?php

$user = true;

include_once '../../header.php';

include_once '../../navbar.php';
require_once '../../Database/utilisateur_db.php';

$users = getAllUsers();

?>

<!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Utilisateurs</h1>
        <?php if($_SESSION['profil'] == 1): ?>
        <a href="create_user.php">
            <button type="button" class="float-end mb-2 btn btn-primary">
                Nouveau
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                </svg>
            </button>
        </a>
        <table id="myDataTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Avatar</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($user = $users->fetch(PDO::FETCH_OBJ)) : ?>
                    <tr>
                        <td>
                            <?php
                                ?>
                                <img src="<?= FETCH_IMAGES_AVATAR.$user->avatar_name ?>" style="width: 35px;">
                                <?php
                            ?>
                            </td>
                        <td><?= $user->nom ?></td>
                        <td><?= $user->prenom ?></td>
                        <td><?= $user->email ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php endif ?>

        <?php if($_SESSION['profil'] == 2): ?>
            <h1 class="mt-5">Vous devez être Administrateur pour accéder à cette page</h1>
        <?php endif ?>
    </div>
</main>

<?php
include_once '../../footer.php'
?>