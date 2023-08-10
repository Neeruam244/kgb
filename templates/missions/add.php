<?php  require_once _ROOTPATH_.'\templates\header.php'; ?>

<div class="container mt-4">
    <h1 class="mb-4">Ajouter une nouvelle mission</h1>
    <form method="post" action="/missions/add">
      <div class="mb-3">
        <label for="title" class="form-label">Titre :</label>
        <input type="text" name="title" required class="form-control">
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Description :</label>
        <textarea name="description" required class="form-control"></textarea>
      </div>
      <div class="mb-3">
        <label for="codenamemission" class="form-label">Nom de code de la mission :</label>
        <input type="text" name="codenamemission" required class="form-control">
      </div>
      <div class="mb-3">
        <label for="numberofhideout" class="form-label">Nombre de planque :</label>
        <input type="text" name="numberofhideout" required class="form-control">
      </div>
      <div class="mb-3">
        <label for="numberofhideout" class="form-label">Nombre de planque :</label>
        <input type="text" name="numberofhideout" required class="form-control">
      </div>
      <div class="mb-3">
        <label for="adresse" class="form-label">Adresse :</label>
        <input type="text" name="adresse" required class="form-control">
      </div>
      <div class="mb-3">
        <label for="country" class="form-label">Country :</label>
        <input type="text" name="country" required class="form-control">
      </div>
      <div class="mb-3">
        <label for="spe" class="form-label">Spécialité :</label>
        <input type="text" name="spe" required class="form-control">
      </div>
      <div class="mb-3">
        <label for="statut" class="form-label">Statut :</label>
        <input type="text" name="statut" required class="form-control">
      </div>
      <div class="mb-3">
        <label for="debut" class="form-label">Date de début :</label>
        <input type="text" name="debut" required class="form-control">
      </div>
      <div class="mb-3">
        <label for="fin" class="form-label">Date de fin :</label>
        <input type="text" name="fin" required class="form-control">
      </div>
      <div class="mb-3">
        <label for="idadmin" class="form-label">Id admin :</label>
        <input type="text" name="idadmin" required class="form-control">
      </div>
      <div class="mb-3">
        <label for="codenameagent" class="form-label">Nom de code de l'agent :</label>
        <input type="text" name="codenameagent" required class="form-control">
      </div>
      <div class="mb-3"> 
        <label for="codenamecontact" class="form-label">Nom de code du contact :</label>
        <input type="text" name="codenamecontact" required class="form-control">
      </div>
      <div class="mb-3">
        <label for="codenametarget" class="form-label">Nom de code de la cible :</label>
        <input type="text" name="codenametarget" required class="form-control">
      </div>
      <div class="mx-auto p-2" style="width: 200px;">
        <button type="submit" class="btn btn-outline-success p-3 m-4">Ajouter</button>
      </div>
    </form>
</div>



<?php  require_once _ROOTPATH_.'\templates\footer.php'; ?>