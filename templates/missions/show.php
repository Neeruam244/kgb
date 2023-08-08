<?php  require_once _ROOTPATH_.'\templates\header.php'; 
/* @var $mission \App\Entity\Missions */
?>

<div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Détail de la mission</font></font></h1>
        <p class="lead text-body-secondary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cette mission est strictement confidentiel ! Si une personne extérieur venait à l'apprendre, la mission est compromise et peut mettre nos agents en danger ainsi que leur contact. Si vous avez le moindre doute, n'hésitez pas à en faire à votre supérieur.</font></font></p>
    </div>
</div>

<div class="album py-5 bg-body-tertiary">
    <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-1 g-1">
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="50" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Espace réservé&nbsp;: Vignette" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#55595c"></rect></svg>
            <div class="card-body">
            <div class="d-flex justify-content-end align-items-center">
                <small class="text-body-secondary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?=$mission->getNameCodeMission(); ?></font></font></small>
            </div>
            <p class="card-title"><?=$mission->getTitle(); ?></p>
            <p class="card-text"><?=$mission->getDescription(); ?></p>
            <p class="card-info">
                Agent : <?=$mission->getIdentificationCode(); ?> <br> 
                Contact : <?=$mission->getCodeNameContact(); ?> <br> 
                Planque : <?=$mission->getAdress(); ?> <?=$mission->getCountry(); ?> <br> 
                Type : <?=$mission->getTypeOfMission()?> <br>
                Spécialité : <?= $mission->getSpeciality(); ?><br>
                Date de début : <?=$mission->getStartDate(); ?> <br>
                Date de fin  : <?=$mission->getEndDate(); ?>
            </p>
              <div class="d-flex justify-content-end align-items-center">
                <small class="text-body-secondary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?=$mission->getStatut(); ?></font></font></small>
              </div>
            </div>
          </div>
        </div>
    </div>
    </div>
</div>


<?php  require_once _ROOTPATH_.'\templates\footer.php'; ?>