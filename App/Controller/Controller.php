<?php

namespace App\Controller;

class Controller 
{
    public function route(): void
    {
        try{
            if (isset ($_GET['controller'])){
                switch ($_GET['controller']) {
                    case 'page': 
                        // charger le controller page 
                        $pageController = new PageController();
                        $pageController->route();
                        break;
                    case 'missions': 
                        $pageController = new missionsController();
                        $pageController->route();
                        break;
                    case 'agent':
                        $pageController = new agentController();
                        $pageController->route();
                        break; 
                    case 'contact':
                        $pageController = new contactController();
                        $pageController->route();
                        break;
                    case 'target':
                        $pageController = new targetController();
                        $pageController->route();
                        break;   
                    case 'hideout':
                        $pageController = new hideoutController();
                        $pageController->route();
                        break; 
                    case 'statut':
                        $pageController = new statutController();
                        $pageController->route();
                        break;  
                    case 'admin':
                        $pageController = new adminController();
                        $pageController->route();
                        break;
                    default : 
                        throw new \Exception("Le controleur n'existe pas");
                        break;
                }
            } else {
                // chargement de la page d'accueil si pas de controller dans l'url
                $pageController = new PageController();
                $pageController->home();
            }
        } catch (\Exception $e){
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
       
    }

    protected function render(string $path, array $params = []): void
    {
        $filePath = _ROOTPATH_.'/templates/'.$path.'.php';

        try{
            if (!file_exists($filePath)){
                //Générer erreur
                throw new \Exception("Fichier non trouvé :".$filePath);

            } else {
                extract($params);
                require_once $filePath;
            }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }

}

//router : analyse l'url et la renvoie vers tel ou tel controller 
/*render() - son rôle est de passer des paramètres et de gérer un affichage d'une page, 
de tester si le template existe, on l'utilise sur tout les controller*/
//index.php?controller=page
//charger une class qui n'est pas dans le namespace, donc back slash car il est à la racine 