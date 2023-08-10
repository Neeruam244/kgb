<?php  require_once _ROOTPATH_.'\templates\header.php'; ?>

<h2 class="ms-5">Liste des contact</h2>
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
                <?php foreach ($contact as $c) : ?>
                <tr>  
                <th scope="row"><?=$c['id_contact']; ?></th>
                        <td><?=$c['last_name']; ?></td>
                        <td><?=$c['first_name']; ?></td>
                        <td><?=$c['date_of_birth']; ?></td>
                        <td><?=$c['nationality']; ?></td>
                        <td><?=$c['code_name_contact']; ?></td>
                </tr> 
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php  require_once _ROOTPATH_.'\templates\footer.php'; ?>