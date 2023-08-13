<?php  require_once _ROOTPATH_.'\templates\header.php'; 

?>

<div class="container mt-4">

    <h1 class="mb-4">Ajouter un nouvel administrateur</h1>

    <form method="post" action="/admin/add">

      <div class="mb-3">
        <label for="lastname" class="form-label">Nom :</label>
        <input type="text" name="lastname" required class="form-control">
      </div>

      <div class="mb-3">
        <label for="firstname" class="form-label">Prénom :</label>
        <input type="text" name="firstname" required class="form-control">
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email :</label>
        <input type="text" name="email" required class="form-control">
      </div>

      <div class="mb-3">
        <label for="mot de passe" class="form-label">Mot de passe:</label>
        <input type="text" name="mot de passe" required class="form-control">
      </div>

      <div class="mb-3">
        <label for="creationdate" class="form-label">Créée le  :</label>
        <input type="text" name="creationdate" required class="form-control">
      </div>

      <div class="mx-auto p-2" style="width: 200px;">
        <button type="submit" class="btn btn-outline-success p-3 m-4">Ajouter</button>
      </div>

    </form>

</div>

<?php  require_once _ROOTPATH_.'\templates\footer.php'; ?>