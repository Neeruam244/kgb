<?php  require_once _ROOTPATH_.'\templates\header.php'; ?>

<h2 class="ms-5">Liste des agents</h2>
    <div class="table-responsive">
        <table class="w-75 m-5 p-5 table table-bordered text-center align-middle">
            <thead class="align-middle">
                <tr>
                <th scope="col" >ID</th>
                    <th scope="col" >Nom</th>
                    <th scope="col" >Prénom</th>
                    <th scope="col" >Date de naissance</th>
                    <th scope="col" >Nationalité</th>
                    <th scope="col" >Code d'identification</th>
                    <th scope="col" >Spécialités</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach ($agents as $a) : ?>
                <tr>  
                <th scope="row"><?=$a['id_agent']; ?></th>
                        <td><?=$a['last_name']; ?></td>
                        <td><?=$a['first_name']; ?></td>
                        <td><?=$a['date_of_birth']; ?></td>
                        <td><?=$a['nationality']; ?></td>
                        <td><?=$a['identification_code']; ?></td>
                        <td><?=$a['specialities']; ?></td>
                </tr> 
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php  require_once _ROOTPATH_.'\templates\footer.php'; ?>