<?php 

namespace App\Repository; 

use App\Entity\Targets;
use App\Db\Mysql;
use App\Tools\StringTools;


class targetRepository
{
    public function findOneById(int $id_target)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();

        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('SELECT * FROM targets WHERE id_target = :id_target');
        $query->bindValue(':id_target', $id_target, $pdo::PARAM_INT);
        $query->execute();
        $target = $query->fetch($pdo::FETCH_ASSOC);
        $targetEntity = new Targets();

        foreach ($target as $key => $value) {
            $targetEntity->{'set'.StringTools::toPascalCase($key) }($value);
        }

        return $targetEntity;
    }

    public function findAll()
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('SELECT * FROM targets');
        $query->execute();
        $target = $query->fetchAll($pdo::FETCH_ASSOC);

        return $target;
    }

    public function AddTarget(array $target)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('INSERT INTO targets (last_name, first_name, date_of_birth, nationality, code_name_target) 
            VALUES (:last_name, :first_name, :date_of_birth, :nationality, :code_name_target)');

        $query->bindValue(':last_name', $target['last_name']);
        $query->bindValue(':first_name', $target['first_name']);
        $query->bindValue(':date_of_birth', $target['date_of_birth']);
        $query->bindValue(':nationality', $target['nationality']);
        $query->bindValue(':code_name_target', $target['code_name_target']);

        $query->execute();
    }

    public function UpdateTraget(int $id_target, array $target)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('UPDATE targets SET last_name = :last_name, first_name = :first_name, date_of_birth = :date_of_birth, nationality = :nationality, code_name_target = :code_name_target
            WHERE id_target = :id_target');

        $query->bindValue(':id_target', $id_target, $pdo::PARAM_INT);
        $query->bindValue(':last_name', $target['last_name']);
        $query->bindValue(':first_name', $target['first_name']);
        $query->bindValue(':date_of_birth', $target['date_of_birth']);
        $query->bindValue(':nationality', $target['nationality']);
        $query->bindValue(':code_name_target', $target['code_name_target']);
        
        $query->execute();

    }

    public function DeleteTarget(int $id_target):bool
    {
        try {
            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();
    
            $query = $pdo->prepare('DELETE FROM targets WHERE id_target = :id_mtargetn');
            $query->bindValue(':id_target', $id_target, $pdo::PARAM_INT);
    
            $success = $query->execute();
    
            if (!$success) {
                // Gérer l'échec de la suppression (peut-être en lançant une exception)
                throw new \Exception("Impossible de supprimer la mission");
            }
    
            return true; // La suppression a réussi
        } catch (\Exception $e) {
            // Gérer l'erreur, par exemple, journaliser l'erreur
            // Vous pouvez également relancer l'exception pour que le contrôleur puisse la capturer
            throw $e; // Laissez le contrôleur décider de la façon de gérer cette exception
        }
    }
}