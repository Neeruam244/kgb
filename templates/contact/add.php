<?php  require_once _ROOTPATH_.'\templates\header.php'; 

?>

<div class="container mt-4">

    <h1 class="mb-4">Ajouter un nouveau contact</h1>

    <form method="post" action="/contact/add">

      <div class="mb-3">
        <label for="lastname" class="form-label">Nom :</label>
        <input type="text" name="lastname" required class="form-control">
      </div>

      <div class="mb-3">
        <label for="firstname" class="form-label">Prénom :</label>
        <input type="text" name="firstname" required class="form-control">
      </div>

      <div class="mb-3">
        <label for="dateofbirth" class="form-label">Date de naissance :</label>
        <input type="text" name="dateofbirth" required class="form-control">
      </div>

      <div class="mb-3">
        <label for="nationality" class="form-label">Nationalité:</label>
        <input type="text" name="nationality" required class="form-control">
      </div>

      <div class="mb-3">
        <label for="identicationcode" class="form-label">Nom de code :</label>
        <input type="text" name="identicationcode" required class="form-control">
      </div>

      <div class="mx-auto p-2" style="width: 200px;">
        <button type="submit" class="btn btn-outline-success p-3 m-4">Ajouter</button>
      </div>

    </form>

</div>



<?php  require_once _ROOTPATH_.'\templates\header.php'; ?>