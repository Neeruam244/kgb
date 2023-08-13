<?php  require_once _ROOTPATH_.'\templates\header.php'; ?>



<?php
    if (isset($error_message)) {
        echo '<p style="color: red;">' . $error_message . '</p>';
    }
?>

<div class="container d-flex justify-content-center align-items-center">
    <div class="contain-form">
    <h1 class="text-center">Connexion</h1>
        <form method="post" action="/Admin/bo-admin.php">
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="mail">
                <label for="floatingInput">E-mail</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Mot de passe</label>
            </div>
            <div class="btnlogin d-flex justify-content-center align-items-center">
                <input class="btn btn-secondary w-50 py-2" type="submit" value="Se connecter">
            </div>
        </form>
    </div>
</div>

<?php  require_once _ROOTPATH_.'\templates\footer.php'; ?>