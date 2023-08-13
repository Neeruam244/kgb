<?php  require_once _ROOTPATH_.'\templates\header.php'; 
/* @var $mission \App\Entity\Missions */
?>

<div class="px-4 py-1 my-5 text-center">
  <h1 class="display-5 fw-bold text-body-emphasis">Détail de la mission</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Cette mission est strictement confidentiel ! Si une personne extérieur venait à l'apprendre, la mission est compromise et peut mettre nos agents en danger ainsi que leur contact. Si vous avez le moindre doute, n'hésitez pas à en faire à votre supérieur.</p>
    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
</div>



  <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-1 g-1">
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="50" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Espace réservé&nbsp;: Vignette" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#003566"></rect></svg>
              <div class="card-body">
                <div class="d-flex justify-content-end align-items-center">
                  <small class="text-body-secondary"><?=$mission->getNameCodeMission(); ?></small>
                </div>
                  <p class="card-title text-center"><?=$mission->getTitle(); ?></p>
                  <p class="text-start"><?=$mission->getDescription(); ?></p>
                  <p class="text-start">
                    Agent : <?=$mission->getIdentificationCode(); ?> <br> 
                    Contact : <?=$mission->getCodeNameContact(); ?> <br> 
                    Planque : <?=$mission->getAdress(); ?> <?=$mission->getCountry(); ?> <br> 
                    Type : <?=$mission->getTypeOfMission()?> <br>
                    Spécialité : <?= $mission->getSpeciality(); ?><br>
                  </p> 
                <div class="d-flex justify-content-end align-items-center">
                  <small class="text-body-secondary"><?=$mission->getStartDate();?> - <?=$mission->getEndDate(); ?> - <?=$mission->getStatut(); ?></small>
                </div>  
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- Bouton pour supprimer la mission -->
    <a href="/missions/delete?id=<?php $mission->getIdMission(); ?>" onclick="return confirm('Voulez-vous vraiment supprimer cette mission ?')" class="btn btn-outline-danger">Supprimer</a>



<?php  require_once _ROOTPATH_.'\templates\footer.php'; ?>