<?php  require_once _ROOTPATH_.'\templates\header.php'; 

?>

<div class="container mt-4">

    <h1 class="mb-4">Modifier une planque</h1>

    <form method="post" action="/hideout/edit">

      <div class="mb-3">
        <label for="adress" class="form-label">Adresse :</label>
        <input type="text" name="adress" required class="form-control" value="<?php echo $hideout->getAdress();?>">
      </div>

      <div class="mb-3">
        <label for="country" class="form-label">Pays :</label>
        <input type="text" name="country" required class="form-control" value="<?php echo $hideout->getCountry();?>">
      </div>

      <div class="mb-3">
        <label for="dateofbirth" class="form-label">Type de planque :</label>
        <input type="text" name="typehideout" required class="form-control" value="<?php echo $hideout->getTypeOfHideout();?>">
      </div>

      <div class="mx-auto p-2" style="width: 200px;">
        <button type="submit" class="btn btn-outline-warning p-3 m-4">Modifier</button>
      </div>

    </form>

</div>

<?php  require_once _ROOTPATH_.'\templates\header.php'; ?>