<?php  require_once _ROOTPATH_.'\templates\header.php'; ?>

<!-- missions/edit.php -->
<form method="post" action="/missions/edit?id=<?php echo $mission['id']; ?>">
    <!-- Les champs du formulaire pour modifier une mission -->
    <!-- Assurez-vous que les noms des champs correspondent aux clés des données attendues dans la méthode "edit" du contrôleur -->
    <label for="title">Titre :</label>
    <input type="text" name="title" value="<?php echo $mission['title']; ?>" required>
    
    <label for="description">Description :</label>
    <textarea name="description" required><?php echo $mission['description']; ?></textarea>
    
    <!-- Autres champs du formulaire -->

    <button type="submit">Modifier</button>
</form>



<?php  require_once _ROOTPATH_.'\templates\footer.php'; ?>