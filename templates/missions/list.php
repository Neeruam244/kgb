<?php  require_once _ROOTPATH_.'\templates\header.php'; ?>

<h2 class="ms-5">Liste des missions</h2>
    
    <div class="table-responsive">
        <table class="w-75 m-4 table table-bordered text-center align-middle">
            <thead class="align-middle">
                <tr>
                    <th scope="col" >ID</th>
                    <th scope="col" >Titre</th>
                    <th scope="col" >Description</th>
                    <th scope="col" >Nom de code</th>
                    <th scope="col" >Nombre de planque</th>
                    <th scope="col" >Adresse</th>
                    <th scope="col" >Pays</th>
                    <th scope="col" >Spécialité</th>
                    <th scope="col" >Statut</th>
                    <th scope="col" >Date de début</th>
                    <th scope="col" >Date de fin</th>
                    <th scope="col" >ID admin</th>
                    <th scope="col" >Nom de code de l'agent</th>
                    <th scope="col" >Nom de code du contact</th>
                    <th scope="col" >Nom de code de la cible</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr> 
                    <?php foreach ($missions as $m) : ?>
                <th scope="row"><?=$m['id_mission']; ?></th>
                        <td><?=$m['title']; ?></td>
                        <td><?=$m['description']; ?></td>
                        <td><?=$m['name_code_mission']; ?></td>
                        <td><?=$m['number_of_hideout']; ?></td>
                        <td><?=$m['adress']; ?></td>
                        <td><?=$m['country']; ?></td>
                        <td><?=$m['speciality']; ?></td>
                        <td><?=$m['statut']; ?></td>
                        <td><?=$m['start_date']; ?></td>
                        <td><?=$m['end_date']; ?></td>
                        <td><?=$m['id_admin']; ?></td>
                        <td><?=$m['identification_code']; ?></td>
                        <td><?=$m['code_name_contact']; ?></td>
                        <td><?=$m['code_name_target']; ?></td> 
                </tr> 
                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php  require_once _ROOTPATH_.'\templates\footer.php'; ?>