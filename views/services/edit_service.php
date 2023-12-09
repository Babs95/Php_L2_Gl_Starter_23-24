<?php
require('../../actions/services/editServiceAction.php');
$service = true;
include_once '../../header.php';

?>

<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">Modication Service</h1>
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
    <?php if(isset($libelle)): ?>
    <form class="row g-3" method="POST">
      <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Libelle</label>
        <input type="text" class="form-control" name="libelle" value="<?= $libelle; ?>">
      </div>
      <div class="col-12">
        <button type="submit" name='envoyer' class="btn btn-primary">Modifier</button>
      </div>
    </form>
    <?php endif ?>
  </div>
</main>

<?php
include_once '../../footer.php'
?>