<?php

namespace App\Controller;

use App\Repository\contactRepository;

class contactController extends Controller
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
                $contactRepository = new contactRepository();
                $contact = $contactRepository->findOneById($id);


                $this->render('contact/show', [
                    'contact' => $contact
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
            $contactRepository = new contactRepository();
            $contact = $contactRepository->findAll();


            $this->render('contact/list', [
                'contact' => $contact
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
                $requiredFields = ['last_name', 'first_name', 'date_of_birth', 'nationality', 'code_name_contact'];
    
                $missingFields = [];
                foreach ($requiredFields as $field) {
                    if (!isset($_POST[$field])) {
                        $missingFields[] = $field;
                    }
                }
    
                if (empty($missingFields)) {
                    // Récupération des données du formulaire POST
                    $contact = [
                        'last_name' => $_POST['last_name'],
                        'first_name' => $_POST['first_name'],
                        'date_of_birth' => $_POST['date_of_birth'],
                        'nationalityt' => $_POST['nationality'],
                        'code_name_contact' => $_POST['code_name_contact'],
                    ];
    
                    // Appel au repository pour ajouter la mission
                    $contactRepository = new ContactRepository();
                    $success = $contactRepository->addContact($contact);
    
                    if ($success) {
                        // Redirection après succès
                        header('Location: /contact/list');
                        exit();
                    } else {
                        // Gérer l'erreur d'ajout de mission dans le repository
                        $this->render('errors/default', [
                            'error' => "Echec pour ajouter un contact dans le repository."
                        ]);
                    }
                } else {
                    // Gérer les erreurs de données manquantes
                    $this->render('contact/add', [
                        'error' => 'Il manque des informations: ' . implode(', ', $missingFields)
                    ]);
                }
            } else {
                // Afficher le formulaire d'ajout de mission
                $this->render('contact/add');
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
                $contactRepository = new ContactRepository();
                $contact = $contactRepository->findOneById($id);

                if ($contact) {
                    // Afficher le formulaire d'édition avec les données de la mission
                    $this->render('contact/edit', [
                        'contact' => $contact
                    ]);
                } else {
                    throw new \Exception("Contact non trouvée");
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

                $contactRepository = new ContactRepository();
                $success = $contactRepository->deleteContact($id);

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