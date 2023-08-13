<?php

namespace App\Controller;

use App\Repository\adminRepository;

class adminController extends Controller
{
    public function route(): void
    {
        try{
            if (isset ($_GET['action'])){
                switch ($_GET['action']) {
                    case 'list': 
                        // appeler méthode list()
                        $this->list();
                        break;
                    case 'add': 
                        // appeler méthode add()
                        $this->add();
                        break;
                    case 'connexion': 
                        // appeler méthode connexion()
                        $this->connexion();
                        break;
                    case 'bo_admin': 
                        // appeler méthode bo_admin()
                        $this->bo_admin();
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

    protected function list()
    {
        try{
            $adminRepository = new adminRepository();
            $admin = $adminRepository->findAll();


            $this->render('admin/list', [
                'admin' => $admin
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
                $requiredFields = ['last_name', 'first_name', 'email', 'password', 'creation_date'];
    
                $missingFields = [];
                foreach ($requiredFields as $field) {
                    if (!isset($_POST[$field])) {
                        $missingFields[] = $field;
                    }
                }
    
                if (empty($missingFields)) {
                    // Récupération des données du formulaire POST
                    $admin = [
                        'last_name' => $_POST['last_name'],
                        'first_name' => $_POST['first_name'],
                        'email' => $_POST['email'],
                        'password' => $_POST['password'],
                        'creation_date' => $_POST['creation_date'],
                    ];
    
                    // Appel au repository pour ajouter la mission
                    $adminRepository = new AdminRepository();
                    $success = $adminRepository->addAdmin($last_name, $first_name, $email, $password, $creation_date, $role);
    
                    if ($success) {
                        // Redirection après succès
                        header('Location: /admin/list');
                        exit();
                    } else {
                        // Gérer l'erreur d'ajout de mission dans le repository
                        $this->render('errors/default', [
                            'error' => "Echec pour ajouter un administrateur dans le repository."
                        ]);
                    }
                } else {
                    // Gérer les erreurs de données manquantes
                    $this->render('admin/add', [
                        'error' => 'Il manque des informations: ' . implode(', ', $missingFields)
                    ]);
                }
            } else {
                // Afficher le formulaire d'ajout de mission
                $this->render('admin/add');
            }
        } catch (\Exception $e) {
            // Gérer les erreurs génériques
            $this->render('errors/default', [
                'error' => "Erreur: " . $e->getMessage()
            ]);
        }
    }

    protected function connexion ()
    {
        try{
            $adminRepository = new adminRepository();
            $admin = $adminRepository->connexionTo();
            
            $this->render('admin/connexion', [
                'admin' => $admin
            ]);
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $email = $_POST['email'];
                $password = $_POST['password'];
            
                // Vérifier si l'utilisateur existe dans la base de données et si le mot de passe correspond
                if ($email && password_verify($password, $email['password'])) {
                    // Authentification réussie
                    // Vous pouvez effectuer des actions ici, comme rediriger vers la page sécurisée
                    header("Location: bo-admin.php");
                    echo "Redirection réussie";
                    exit;
                } else {
                    // Authentification échouée
                    // Rediriger vers le formulaire de connexion avec un message d'erreur, par exemple
                    header("Location: index.php?erreur=1");
                    echo "Redirection échoué";
                    exit;
                }
            }

            }    
         catch(\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }  
        
    }
}


