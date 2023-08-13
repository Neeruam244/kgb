<?php  require_once _ROOTPATH_.'\templates\header.php'; 

?>

<div class="container mt-4">

    <h1 class="mb-4">Ajouter une nouvelle planque</h1>

    <form method="post" action="/missions/add">

      <div class="mb-3">
        <label for="adresse" class="form-label">Adresse:</label>
        <input type="text" name="adresse" required class="form-control">
      </div>

      <div class="mb-3">
        <label for="country" class="form-label">Pays :</label>
        <input type="text" name="country" required class="form-control">
      </div>

      <div class="mb-3">
        <label for="type" class="form-label">Type de planque :</label>
        <input type="text" name="type" required class="form-control">
      </div>

      <div class="mb-3">
        <label for="idmission" class="form-label">ID mission:</label>
        <input type="text" name="idmission" required class="form-control">
      </div>

      <div class="mx-auto p-2" style="width: 200px;">
        <button type="submit" class="btn btn-outline-success p-3 m-4">Ajouter</button>
      </div>

    </form>

</div>



<?php  require_once _ROOTPATH_.'\templates\header.php'; ?>