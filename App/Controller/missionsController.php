<?php

namespace App\Controller;

use App\Entity\Missions;
use App\Repository\missionsRepository;

class missionsController extends Controller
{
    public function route(): void
    {
        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'show':
                        // appeler méthode show()
                        $this->show();
                        break;
                    case 'list':
                        // appeler méthode list()
                        $this->list();
                        break;
                    case 'edit':
                        // appeler méthode edit()
                        $this->edit();
                        break;
                    case 'add':
                        // appeler méthode add()
                        $this->add();
                        break;
                    case 'delete':
                        // appeler méthode delete()
                        $this->delete();
                        break;
                    default:
                        throw new \Exception("Cette action n'existe pas : ".$_GET['action']);
                        break;
                }
            } else {
                throw new \Exception("Aucune action détectée");
            }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }


    }

    protected function show()
    {
        try {
            if (isset($_GET['id'])) {

                $id = (int)$_GET['id'];
                // Charger la mission par un appel au repository
                $missionsRepository = new missionsRepository();
                $mission = $missionsRepository->findOneById($id);


                $this->render('missions/show', [
                    'mission' => $mission
                ]);
            } else {
                throw new \Exception("L'id est manquant");
            }
        } catch(\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }

    protected function list()
    {
        try {
            $missionsRepository = new missionsRepository();
            $missions = $missionsRepository->findAll();


            $this->render('missions/list', [
                'missions' => $missions
            ]);

        } catch(\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }

    protected function add()
    {
         try {
             if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                 // Vérification des données POST
                 $requiredFields = ['title', 'description', 'name_code_mission', 'number_of_hideout', 'adress', 'country', 'speciality', 'statut', 'start_date', 'end_date', 'id_admin', 'identification_code', 'code_name_contact', 'code_name_target'];

                 $missingFields = [];
                 foreach ($requiredFields as $field) {
                     if (!isset($_POST[$field])) {
                         $missingFields[] = $field;
                     }
                 }

                 if (empty($missingFields)) {
                     // Récupération des données du formulaire POST
                     $missions = [
                         'title' => $_POST['title'],
                         'description' => $_POST['description'],
                         'name_code_mission' => $_POST['name_code_mission'],
                         'number_of_hideout' => $_POST['number_of_hideout'],
                         'adress' => $_POST['adress'],
                         'country' => $_POST['country'],
                         'speciality' => $_POST['speciality'],
                         'statut' => $_POST['statut'],
                         'start_date' => $_POST['start_date'],
                         'end_date' => $_POST['end_date'],
                         'id_admin' => $_POST['id_admin'],
                         'identification_code' => $_POST['identification_code'],
                         'code_name_contact' => $_POST['code_name_contact'],
                         'code_name_target' => $_POST['code_name_target'],
                     ];

                     // Appel au repository pour ajouter la mission
                     $missionsRepository = new MissionsRepository();
                     $success = $missionsRepository->addMission($missions);

                     if ($success) {
                         // Redirection après succès
                         header('Location: /missions/list');
                         exit();
                     } else {
                         // Gérer l'erreur d'ajout de mission dans le repository
                         $this->render('errors/default', [
                             'error' => "Echec pour ajouter une mission dans le repository."
                         ]);
                     }
                 } else {
                     // Gérer les erreurs de données manquantes
                     $this->render('missions/add', [
                         'error' => 'Il manque des informations: ' . implode(', ', $missingFields)
                     ]);
                 }
             } else {
                 // Afficher le formulaire d'ajout de mission
                 $this->render('missions/add');
             }
         } catch (\Exception $e) {
             // Gérer les erreurs génériques
             $this->render('errors/default', [
                 'error' => "Erreur: " . $e->getMessage()
             ]);
         }
    }

    protected function edit()
    {
        try {
            if (isset($_GET['id'])) {
                $id = (int)$_GET['id'];
                // Charger la mission par un appel au repository
                $missionsRepository = new MissionsRepository();
                $mission = $missionsRepository->findOneById($id);

                if ($mission) {
                    // Afficher le formulaire d'édition avec les données de la mission
                    $this->render('missions/edit', [
                        'mission' => $mission
                    ]);
                } else {
                    throw new \Exception("Mission non trouvée");
                }
            } else {
                throw new \Exception("L'id est manquant");

            }

        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }

    protected function delete()
    {
        try {
            if (isset($_GET['id'])) {
                $id = (int)$_GET['id'];

                $missionsRepository = new MissionsRepository();
                $success = $missionsRepository->deleteMission($id);

                if ($success) {
                    // Rediriger vers la liste des missions après la suppression réussie
                    header("Location: /index.php");
                    exit;
                } else {
                    // Gérer l'échec de la suppression, par exemple, afficher un message d'erreur
                    include 'templates/errors/delete_failed.php';
                }
            } else {
                // L'ID est manquant, gérer cela en conséquence
                $this->render('errors/default', [
                    'error' => "L'ID est manquant"
                ]);
            }
        } catch (\Exception $e) {
            // Gérer d'autres exceptions, journaliser l'erreur, etc.
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }
}