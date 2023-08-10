<?php  require_once _ROOTPATH_.'\templates\header.php'; ?>

<h2 class="ms-5">Statut des missions</h2>
    <div class="table-responsive">
        <table class="w-75 m-5 p-5 table table-bordered text-center align-middle">
            <thead class="align-middle">
                <tr>
                <th scope="col" >ID</th>
                    <th scope="col" >Missions en préparation</th>
                    <th scope="col" >Missions en cours</th>
                    <th scope="col" >Missions terminées</th>
                    <th scope="col" >Missions échouées</th>
                    <th scope="col" >Noms de code de la mission</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach ($statut as $s) : ?>
                <tr>  
                <th scope="row"><?=$s['id_statut']; ?></th>
                        <td><?=$s['in_preparation']; ?></td>
                        <td><?=$s['in_progress']; ?></td>
                        <td><?=$s['ended']; ?></td>
                        <td><?=$s['failure']; ?></td>
                        <td><?=$s['name_code_missions']; ?></td>
                </tr> 
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php  require_once _ROOTPATH_.'\templates\footer.php'; ?>