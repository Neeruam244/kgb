<?php 

require_once __DIR__ . "/lib/config.php";
require_once __DIR__ . "/lib/session.php";

require_once __DIR__ . "/templates/header.php"; 
?> 
    <div class="btndeco d-flex justify-content-end align-items-center">
        <button class="btn btn-secondary w-20 py-2" type="submit">Déconnexion</button>
    </div>

    <h1 class="title-bo">Back-office administrateur</h1>

        <div class="tableaux">
            <table>
                <thead>
                    <tr>
                        <th colspan="2">Agent</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Nom</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Prénom</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Date de naissance</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Nationalité</th>
                        <td></td>
                    </tr>
                    <tr class="codeagent">
                        <th>Code d'identification</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Spécialités</th>
                        <td></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2">Ajouter</td>
                    </tr>
                    <tr>
                        <td colspan="2">Modifier</td>
                    </tr>
                    <tr>
                        <td colspan="2">Supprimer</td>
                    </tr>
                </tfoot>
            </table>
        
            <table>
                <thead>
                    <tr>
                        <th colspan="2">Contact</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Nom</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Prénom</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Date de naissance</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Nationalité</th>
                        <td></td>
                    </tr>
                    <tr class="codecontact">
                        <th>Nom de code</th>
                        <td></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2">Ajouter</td>
                    </tr>
                    <tr>
                        <td colspan="2">Modifier</td>
                    </tr>
                    <tr>
                        <td colspan="2">Supprimer</td>
                    </tr>
                </tfoot>
            </table>
    
            <table>
                <thead>
                    <tr>
                        <th colspan="2">Cible</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Nom</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Prénom</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Date de naissance</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Nationalité</th>
                        <td></td>
                    </tr>
                    <tr class="codecible">
                        <th>Nom de code</th>
                        <td></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2">Ajouter</td>
                    </tr>
                    <tr>
                        <td colspan="2">Modifier</td>
                    </tr>
                    <tr>
                        <td colspan="2">Supprimer</td>
                    </tr>
                </tfoot>
            </table>

            <table>
                <thead>
                    <tr>
                        <th colspan="2">Planque</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Adresse</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Pays</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Type de planque</th>
                        <td></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2">Ajouter</td>
                    </tr>
                    <tr>
                        <td colspan="2">Modifier</td>
                    </tr>
                    <tr>
                        <td colspan="2">Supprimer</td>
                    </tr>
                </tfoot>
            </table>

            <table>
                <thead>
                    <tr>
                        <th colspan="2">Missions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Titre</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Nom de code de la mission</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Pays</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Statut</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Nombre de planque</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Spécialité</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Date de début</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Date de fin</th>
                        <td></td>
                    </tr>
                    <tr class="codeagent">
                        <th>Code d'identification de l'agent</th>
                        <td></td>
                    </tr>
                    <tr class="codecontact">
                        <th>Nom de code du contact</th>
                        <td></td>
                    </tr>
                    <tr class="codecible">
                        <th>Nom de code de la cible</th>
                        <td></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2">Ajouter</td>
                    </tr>
                    <tr>
                        <td colspan="2">Modifier</td>
                    </tr>
                    <tr>
                        <td colspan="2">Supprimer</td>
                    </tr>
                </tfoot>
            </table>

            <table>
                <thead>
                    <tr>
                        <th colspan="2">Statut des missions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="inprep">
                        <th>En préparation</th>
                        <td></td>
                    </tr>
                    <tr class="inprogress">
                        <th>En cours</th>
                        <td></td>
                    </tr>
                    <tr class="ended">
                        <th>Terminé</th>
                        <td></td>
                    </tr>
                    <tr class="failure">
                        <th>Echec</th>
                        <td></td>
                    </tr>
                </tbody>
            </table>

<?php require_once __DIR__ . "/templates/footer.php"; ?>