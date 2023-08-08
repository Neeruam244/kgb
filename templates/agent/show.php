<?php  require_once _ROOTPATH_.'\templates\header.php'; ?>

<div class="px-4 py-1 my-5 text-center">
  <h1 class="display-5 fw-bold text-body-emphasis">Détail des agents</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Ces informations sont strictement confidentiel ! Si une personne extérieur venait à l'apprendre, l'agent peut être compromis et peut mettre la mission en danger ainsi que leur contact. Si vous avez le moindre doute, n'hésitez pas à en faire à votre supérieur.</p>
    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
</div>

<table class="w-75 m-5 p-5 table table-bordered text-center align-middle">
            <thead>
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
                <tr>
                    <th scope="row"><?=$agent->getIdAgent(); ?></th>
                        <td><?=$agent->getLastName(); ?></td>
                        <td><?=$agent->getFirstName(); ?></td>
                        <td><?=$agent->getDateOfBirth(); ?></td>
                        <td><?=$agent->getNationality(); ?></td>
                        <td><?=$agent->getIdentificationCode(); ?></td>
                        <td><?=$agent->getSpecialities(); ?></td>
                </tr>
            </tbody>
</table>

<?php  require_once _ROOTPATH_.'\templates\footer.php'; ?>