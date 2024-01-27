<?php
require('actions/services/searchServiceAction.php');
    $index = true;
    include_once './header.php';
    include_once 'navbar.php';
?>

<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">Dalal Ak Diam</h1>
    <form method="GET">
      <div class="form-group row">
        <div class="col-8">
          <input type="search" placeholder="Rechercher un service" name="search" class="form-control">
        </div>
        <div class="col-4">
          <button class="btn btn-success">Rechercher</button>
        </div>
      </div>
    </form>

    <br>
    <div class="container text-center">
      <div class="row">
        <?php
        if ($searchResults && $searchResults->rowCount() > 0) {
          while ($result = $searchResults->fetch()) {
        ?>
            <div class="col">
              <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title"> <?= $result['nom'] . ' ' . $result['prenom'] ?></h5>
                  <p class="card-text">Service: <?= $result['service_libelle'] ?></p>
                  <a data-bs-toggle="modal" data-bs-target="#detailsModalDocteur<?= $result['id'] ?>" class="btn btn-primary">Voir Détail</a>
                </div>
              </div>
              <br>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="detailsModalDocteur<?= $result['id'] ?>" tabindex="-1" aria-labelledby="deleteModalServiceLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteModalServiceLabel">Détails Docteur</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="grid text-center">
                      <div class="g-col-6 g-col-md-4">
                        <strong>Nom:</strong> <?= $result['nom'] ?>
                      </div>

                      <div class="g-col-6 g-col-md-4">
                        <strong>Prénom:</strong> <?= $result['prenom'] ?>
                      </div>

                      <div class="g-col-6 g-col-md-4">
                        <strong>Tel:</strong> <?= $result['tel'] ?>
                      </div>

                      <div class="g-col-6 g-col-md-4">
                        <strong>Email:</strong> <?= $result['email'] ?>
                      </div>

                      <div class="g-col-6 g-col-md-4">
                        <strong>Adresse:</strong> <?= $result['adresse'] ?>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                  </div>
                </div>
              </div>
            </div>
          <?php
          }
        } elseif(isset($word)) {
          ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              Aucun résultat trouvé !
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php
        }

        ?>
      </div>
    </div>

  </div>
</main>


<?php
    include_once './footer.php'
?>