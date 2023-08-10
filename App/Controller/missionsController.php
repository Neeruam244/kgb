<?php

namespace App\Controller;

use App\Repository\missionsRepository;

class missionsController extends Controller
{
    public function route(): void
    {
        try{
            if (isset ($_GET['action'])){
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
                    default : 
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
        try{
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
        try{
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
            // Vérifier si des données POST ont été soumises
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupérer les données du formulaire
                $missionData = $_POST;
            
                // Valider et traiter les données si nécessaire
            
                // Enregistrer la nouvelle mission en appelant le repository
                $missionsRepository = new missionsRepository();
                $newMissionId = $missionsRepository->AddMission($missionData);

                // Rediriger vers la page de détails de la nouvelle mission
                header("Location: /missions/show?id=$newMissionId");
                exit;
            } else {
                // Afficher le formulaire d'ajout
                $this->render('missions/add');
            }
            } catch (\Exception $e) {
                $this->render('errors/default', [
                    'error' => $e->getMessage()
                ]);
            }
    }

    
    protected function edit()
    {
        try {
            if (isset($_GET['id'])) {
                $id = (int)$_GET['id'];

                // Charger la mission à modifier
                $missionsRepository = new missionsRepository();
                $mission = $missionsRepository->findOneById($id);

                // Vérifier si des données POST ont été soumises
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Récupérer les données du formulaire
                    $missionData = $_POST;

                    // Valider et traiter les données si nécessaire
                
                    // Mettre à jour la mission en appelant le repository
                    $missionsRepository->UpdateMission($id, $missionData);

                    // Rediriger vers la page de détails de la mission mise à jour
                    header("Location: /missions/show?id=$id");
                    exit;
            } else {
                // Afficher le formulaire de modification
                $this->render('missions/edit', [
                    'mission' => $mission
                ]);
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

                // Supprimer la mission en appelant le repository
                $missionsRepository = new missionsRepository();
                $missionsRepository->deleteMission($id);

                // Rediriger vers la liste des missions après suppression
                header("Location: /missions/list");
                exit;
            } else {
                throw new \Exception("L'id est manquant");
            }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }
}

