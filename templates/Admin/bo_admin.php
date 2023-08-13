<?php  require_once _ROOTPATH_.'\templates\header.php'; 

?>



    <div class="btndeco d-flex justify-content-end align-items-center">
        <input class="btn btn-primary w-20 py-2" type="submit" value="Déconnexion" name="logoutUser" action="logout.php">
    </div>

    <h1 class="title-bo">Back-office administrateur</h1>

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

        <a href="index.php?controller=agent&action=add" class="btn btn-success m-5">Ajouter une mission</a>
        <a href="index.php?controller=agent&action=edit&id=<?=$a['id_agent']; ?>" class="btn btn-warning m-5">Modifier une mission</a>
        <a href="index.php?controller=agent&action=show&id=<?=$a['id_agent']; ?>" class="btn btn-danger m-5">Supprimer la mission</a>
        
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

        <a href="index.php?controller=cible&action=add" class="btn btn-success m-5">Ajouter une mission</a>
        <a href="index.php?controller=cible&action=edit&id=<?=$c['id_contact']; ?>" class="btn btn-warning m-5">Modifier une mission</a>
        <a href="index.php?controller=cible&action=show&id=<?=$c['id_contact']; ?>" class="btn btn-danger m-5">Supprimer la mission</a>


            
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

        <a href="index.php?controller=target&action=add" class="btn btn-success m-5">Ajouter une mission</a>
        <a href="index.php?controller=target&action=edit&id=<?=$t['id_target']; ?>" class="btn btn-warning m-5">Modifier une mission</a>
        <a href="index.php?controller=target&action=show&id=<?=$t['id_target']; ?>" class="btn btn-danger m-5">Supprimer la mission</a>


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

        <a href="index.php?controller=hideout&action=add" class="btn btn-success m-5">Ajouter une mission</a>
        <a href="index.php?controller=hideout&action=edit&id=<?=$h['id_hideout']; ?>" class="btn btn-warning m-5">Modifier une mission</a>
        <a href="index.php?controller=hideout&action=show&id=<?=$h['id_hideout']; ?>" class="btn btn-danger m-5">Supprimer la mission</a>

 
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

        <a href="index.php?controller=missions&action=add" class="btn btn-success m-5">Ajouter une mission</a>
        <a href="index.php?controller=missions&action=edit&id=<?=$m['id_mission']; ?>" class="btn btn-warning m-5">Modifier une mission</a>
        <a href="index.php?controller=missions&action=show&id=<?=$m['id_mission']; ?>" class="btn btn-danger m-5">Supprimer la mission</a>

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

        <a href="index.php?controller=statut&action=edit&id=<?=$s['id_statut']; ?>" class="btn btn-warning m-5">Modifier une mission</a>

<?php  require_once _ROOTPATH_.'\templates\footer.php'; ?>