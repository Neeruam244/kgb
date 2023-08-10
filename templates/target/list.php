<?php  require_once _ROOTPATH_.'\templates\header.php'; ?>

<h2 class="ms-5">Liste des cibles</h2>
    <div class="table-responsive">
        <table class="w-75 m-5 p-5 table table-bordered text-center align-middle">
            <thead class="align-middle">
                <tr>
                <th scope="col" >ID</th>
                    <th scope="col" >Nom</th>
                    <th scope="col" >Prénom</th>
                    <th scope="col" >Date de naissance</th>
                    <th scope="col" >Nationalité</th>
                    <th scope="col" >Nom de code</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach ($target as $t) : ?>
                <tr>  
                <th scope="row"><?=$t['id_target']; ?></th>
                        <td><?=$t['last_name']; ?></td>
                        <td><?=$t['first_name']; ?></td>
                        <td><?=$t['date_of_birth']; ?></td>
                        <td><?=$t['nationality']; ?></td>
                        <td><?=$t['code_name_target']; ?></td>
                </tr> 
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php  require_once _ROOTPATH_.'\templates\footer.php'; ?>