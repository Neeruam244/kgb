<?php

namespace App\Controller;

use App\Repository\hideoutRepository;

class hideoutController extends Controller
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
                        
                        break;
                    case 'edit': 
                        // appeler méthode edit()
                        
                        break;
                    case 'add': 
                            // appeler méthode add()
                            
                        break;
                    case 'delete': 
                        // appeler méthode delete()
                       
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
                $hideoutRepository = new hideoutRepository();
                $hideout = $hideoutRepository->findOneById($id);


                $this->render('hideout/show', [
                    'hideout' => $hideout
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

    
}