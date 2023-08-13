<?php  require_once _ROOTPATH_.'\templates\header.php'; ?>

<div class="px-4 py-1 my-5 text-center">
  <h1 class="display-5 fw-bold text-body-emphasis">Détail des planques</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Ces informations sont strictement confidentiel ! Si une personne extérieur venait à l'apprendre, la mission peut être compromis et peut mettre en danger les agents ainsi que leur contact. Si vous avez le moindre doute, n'hésitez pas à en faire à votre supérieur.</p>
    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
</div>

<table class="w-75 m-5 p-5 table table-bordered text-center align-middle">
            <thead>
                <tr>
                    <th scope="col" >ID</th>
                    <th scope="col" >Adresse</th>
                    <th scope="col" >Pays</th>
                    <th scope="col" >Type de planque<th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    <th scope="row"><?=$hideout->getIdHideout(); ?></th>
                        <td><?=$hideout->getAdress(); ?></td>
                        <td><?=$hideout->getCountry(); ?></td>
                        <td><?=$hideout->getTypeOfHideout(); ?></td>
                </tr>
            </tbody>
</table>

    <!-- Bouton pour supprimer la mission -->
    <a href="/hideout/delete?id=<?php $hideout->getIdHideout(); ?>" onclick="return confirm('Voulez-vous vraiment supprimer cette planque ?')" class="btn btn-outline-danger">Supprimer</a>

<?php  require_once _ROOTPATH_.'\templates\footer.php'; ?>