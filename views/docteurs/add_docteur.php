<?php
require('../../actions/docteurs/createDocteurAction.php');
$docteur = true;
include_once '../../header.php';
include_once '../../Database/service_db.php';
$services = getAllServices();
?>

<!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Nouveau Docteur</h1>
        <?php
        if (isset($errorMessage)) {
        ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?= $errorMessage; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        ?>
        <form class="row g-3" method="POST">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Prénom</label>
                <input type="text" class="form-control" name="prenom">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Adresse</label>
                <input type="text" class="form-control" name="adresse">
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">Téléphone</label>
                <input type="phone" class="form-control" name="tel">
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">Service</label>
                <select id="inputState" class="form-select" name="service_id">
                    <option selected value="0">Séléctionner...</option>
                    <?php while ($service = $services->fetch(PDO::FETCH_OBJ)) : ?>
                        <option value="<?= $service->id ?>"><?= $service->libelle ?></option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="envoyer">Créer</button>
            </div>
        </form>
    </div>
</main>

<?php
include_once '../../footer.php'
?>