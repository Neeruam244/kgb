<?php 

require_once __DIR__ . "/lib/config.php";
require_once __DIR__ . "/lib/session.php";

require_once __DIR__ . "/templates/header.php"; 
?> 

<div class="container d-flex justify-content-center align-items-center">
    <div class="contain-form">
        <form>
            <h1 class="h3 mb-3 fw-normal" id="title">Se connecter</h1>

            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">E-mail</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Mot de passe</label>
            </div>
            <div class="btnlogin d-flex justify-content-center align-items-center">
                <button class="btn btn-secondary w-50 py-2" type="submit" >Se connecter</button>
            </div>
        </form>
    </div>
</div>

<?php require_once __DIR__ . "/templates/footer.php"; ?>