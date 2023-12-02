<?php
require('../../Database/docteur_db.php');
$docteur = true;
include_once '../../header.php';

$docteurs = getAllDocteurs();
?>

<!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Docteurs</h1>
        <table id="myDataTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Adresse</th>
                    <th>Tel</th>
                </tr>
            </thead>
            <tbody>
                <?php while($docteur = $docteurs->fetch(PDO::FETCH_OBJ)) :?>
                <tr>
                    <td><?= $docteur->id ?></td>
                    <td><?= $docteur->nom ?></td>
                    <td><?= $docteur->prenom ?></td>
                    <td><?= $docteur->email ?></td>
                    <td><?= $docteur->adresse ?></td>
                    <td><?= $docteur->tel ?></td>
                </tr>
                <?php endwhile;?>
            </tbody>
        </table>
    </div>
</main>

<?php
include_once '../../footer.php'
?>