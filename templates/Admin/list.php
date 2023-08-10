<?php  require_once _ROOTPATH_.'\templates\header.php'; ?>

<h2 class="ms-5">Liste des administrateurs</h2>
    <div class="table-responsive">
        <table class="w-75 m-5 p-5 table table-bordered text-center align-middle">
            <thead class="align-middle">
                <tr>
                <th scope="col" >ID</th>
                    <th scope="col" >Nom</th>
                    <th scope="col" >Prénom</th>
                    <th scope="col" >Email</th>
                    <th scope="col" >Mot de passe</th>
                    <th scope="col" >Date de création</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach ($admin as $a) : ?>
                <tr>  
                <th scope="row"><?=$a['id_admin']; ?></th>
                        <td><?=$a['last_name']; ?></td>
                        <td><?=$a['first_name']; ?></td>
                        <td><?=$a['email']; ?></td>
                        <td class="text-white"><?=$a['password']; ?></td>
                        <td><?=$a['creation_date']; ?></td>
                </tr> 
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php  require_once _ROOTPATH_.'\templates\footer.php'; ?>