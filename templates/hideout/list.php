<?php  require_once _ROOTPATH_.'\templates\header.php'; ?>

<h2 class="ms-5">Liste des planques</h2>
    <div class="table-responsive">
        <table class="w-75 m-5 p-5 table table-bordered text-center align-middle">
            <thead class="align-middle">
                <tr>
                <th scope="col" >ID</th>
                    <th scope="col" >Adresse</th>
                    <th scope="col" >Pays</th>
                    <th scope="col" >Type de planque</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach ($hideout as $h) : ?>
                <tr>  
                <th scope="row"><?=$h['id_hideout']; ?></th>
                        <td><?=$h['adress']; ?></td>
                        <td><?=$h['country']; ?></td>
                        <td><?=$h['type_of_hideout']; ?></td>
                </tr> 
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php  require_once _ROOTPATH_.'\templates\footer.php'; ?>