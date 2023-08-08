<?php  require_once _ROOTPATH_.'\templates\header.php'; 
/* @var $mission \App\Entity\Missions */
?>

<h2 class="ms-5">Liste des missions</h2>
    <div class="table-responsive">
        <table class="w-75 m-5 p-5 table table-bordered text-center align-middle">
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
                    <th scope="row"><?=$mission->getIdMission(); ?></th>
                        <td><?=$mission->getTitle(); ?></td>
                        <td><?=$mission->getDescription(); ?></td>
                        <td><?=$mission->getNameCodeMission(); ?></td>
                        <td><?=$mission->getNumberOfHideout(); ?></td>
                        <td><?=$mission->getAdress(); ?></td>
                        <td><?=$mission->getCountry(); ?></td>
                        <td><?=$mission->getSpeciality(); ?></td>
                        <td><?=$mission->getStatut(); ?></td>
                        <td><?=$mission->getStartDate(); ?></td>
                        <td><?=$mission->getEndDate(); ?></td>
                        <td><?=$mission->getIdAdmin(); ?></td>
                        <td><?=$mission->getIdentificationCode(); ?></td>
                        <td><?=$mission->getCodeNameContact(); ?></td>
                        <td><?=$mission->getCodeNameTarget(); ?></td>
                </tr>
            </tbody>
        </table>
    </div>

        


<?php  require_once _ROOTPATH_.'\templates\footer.php'; ?>


