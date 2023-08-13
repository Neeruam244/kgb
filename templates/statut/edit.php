<?php  require_once _ROOTPATH_.'\templates\header.php'; 

?>

<div class="container mt-4">

    <h1 class="mb-4">Modifier le statut d'une mission'</h1>

    <form method="post" action="/statut/edit">

      <div class="mb-3">
        <label for="inprep" class="form-label">Mission en préparartion :</label>
        <input type="text" name="inprep" required class="form-control" value="<?php echo $statut->getInPreparation();?>">
      </div>

      <div class="mb-3">
        <label for="inprog" class="form-label">Mission en cours :</label>
        <input type="text" name="inprog" required class="form-control" value="<?php echo $statut->getInProgress();?>">
      </div>

      <div class="mb-3">
        <label for="ended" class="form-label">Mission terminée :</label>
        <input type="text" name="ended" required class="form-control" value="<?php echo $statut->getEnded();?>">
      </div>

      <div class="mb-3">
        <label for="failure" class="form-label">Mission échouée :</label>
        <input type="text" name="failure" required class="form-control" value="<?php echo $statut->getFailure();?>">
      </div>

      <div class="mb-3">
        <label for="idmission" class="form-label">ID mission :</label>
        <input type="text" name="idmission" required class="form-control" value="<?php echo $statut->getNameCodeMissions();?>">
      </div>

      <div class="mx-auto p-2" style="width: 200px;">
        <button type="submit" class="btn btn-outline-warning p-3 m-4">Modifier</button>
      </div>

    </form>

</div>

<?php  require_once _ROOTPATH_.'\templates\header.php'; ?>