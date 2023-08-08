<?php 

require_once __DIR__ . "/templates/header.php"; 
?> 
    <div class="btndeco d-flex justify-content-end align-items-center">
        <input class="btn btn-primary w-20 py-2" type="submit" value="Déconnexion" name="logoutUser" action="logout.php">
    </div>

    <h1 class="title-bo">Back-office administrateur</h1>

        <div class="tableaux">

            <h2 class="ms-5">Les agents </h2>
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
                    <th scope="row"></th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                </tr>
            </tbody>
        </table>
        <a href="#" class="btn btn-success m-5">Ajouter une mission</a>
        <a href="#" class="btn btn-warning m-5">Modifier une mission</a>
        <a href="#" class="btn btn-danger m-5">Supprimer la mission</a>
        
            <h2 class="ms-5"> Les contacts</h2>
        <table class="w-75 m-5 p-5 table table-bordered text-center align-middle">
            <thead>
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
                <tr>
                    <th scope="row">1</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                </tr>
            </tbody>
        </table>
            
            <h2 class="ms-5">Les cibles</h2>
        <table class="w-75 m-5 p-5 table table-bordered text-center align-middle">
            <thead>
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
                <tr>
                    <th scope="row">1</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                </tr>
            </tbody>
        </table>

            <h2 class="ms-5">Les planques</h2>
        <table class="w-75 m-5 p-5 table table-bordered text-center align-middle">
            <thead>
                <tr>
                    <th scope="col" >ID</th>
                    <th scope="col" >Adresse</th>
                    <th scope="col" >Pays</th>
                    <th scope="col" >Types de planque</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    <th scope="row">1</th>
                        <td></td>
                        <td></td>
                        <td></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                        <td></td>
                        <td></td>
                        <td></td>
                </tr>
            </tbody>
        </table>

            <h2 class="ms-5">Les missions</h2>
        <table class="w-75 m-5 p-5 table table-bordered text-center align-middle">
            <thead>
                <tr>
                    <th scope="col" >ID</th>
                    <th scope="col" >Titre</th>
                    <th scope="col" >Description</th>
                    <th scope="col" >Nom de code</th>
                    <th scope="col" >Pays</th>
                    <th scope="col" >Statut</th>
                    <th scope="col" >Nombre de planque</th>
                    <th scope="col" >Spécialité</th>
                    <th scope="col" >Date de début</th>
                    <th scope="col" >Date de fin</th>
                    <th scope="col" >Code d'identification de l'agent</th>
                    <th scope="col" >Nom de code du contact</th>
                    <th scope="col" >Nom de code de la cible</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    <th scope="row">1</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                </tr>
            </tbody>
        </table>

            <h2 class="ms-5">Les statuts des missions</h2>
            <table class="w-75 m-5 p-5 table table-bordered text-center align-middle">
            <thead>
                <tr>
                    <th scope="col" >ID de la missions</th>
                    <th scope="col" class="inprep">En préparation</th>
                    <th scope="col" class="inprogress">En cours</th>
                    <th scope="col" class="ended">Terminé</th>
                    <th scope="col" class="failure">Echec</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    <th scope="row">1</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                </tr>
            </tbody>
        </table>

<?php require_once __DIR__ . "/templates/footer.php"; ?>