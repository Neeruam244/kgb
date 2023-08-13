<?php

namespace App\Controller;

use App\Repository\statutRepository;

class statutController extends Controller
{
    public function route(): void
    {
        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'list':
                        // appeler méthode list()
                        $this->list();
                        break;
                    case 'edit':
                        // appeler méthode edit()
                        $this->edit();
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
        try{
            if (isset($_GET['id'])) {

                $id = (int)$_GET['id'];
                // Charger la mission par un appel au repository
                $statutRepository = new StatutRepository();
                $statut = $statutRepository->findOneById($id);


                $this->render('statut/show', [
                    'statut' => $statut
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
            $statutRepository = new statutRepository();
            $statut = $statutRepository->findAll();


            $this->render('statut/list', [
                'statut' => $statut
            ]);

        } catch(\Exception $e) {
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
                // Charger la mission par un appel au repository
                $statutRepository = new StatutRepository();
                $statut = $statutRepository->findOneById($id);

                if ($statut) {
                    // Afficher le formulaire d'édition avec les données de la mission
                    $this->render('statut/edit', [
                        'statut' => $statut
                    ]);
                } else {
                    throw new \Exception("Statut non trouvée");
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
}