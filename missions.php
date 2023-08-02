<?php 

require_once __DIR__ . "/lib/config.php";
require_once __DIR__ . "/lib/session.php";

require_once __DIR__ . "/templates/header.php"; 
?> 

<div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Détail de la mission xx</font></font></h1>
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
                <small class="text-body-secondary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">AS-NI66-2B</font></font></small>
            </div>
            <p class="card-title">Assasinat du général Dreykov - NI66R</p>
            <p class="card-text">Infiltration dans le reprère de la Chambre rouge, élimination de la cible NI66R - si possible libération des veuves</p>
            <p class="card-info">
                Agent : Black Widow <br> 
                Contact : DV05BI <br> 
                Planque : 1 Chertanovskaya Ulitsa, Moskva 117208 - RUSSIE - appartement 24, 4ème étage <br> 
                Type et spécialité : Assasinat <br>
                Début : 2023-08-02
            </p>
              <div class="d-flex justify-content-end align-items-center">
                <small class="text-body-secondary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">En cours</font></font></small>
              </div>
            </div>
          </div>
        </div>
    </div>
    </div>
</div>

<?php require_once __DIR__ . "/templates/footer.php"; ?>