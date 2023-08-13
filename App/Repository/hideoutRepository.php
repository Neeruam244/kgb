<?php 

namespace App\Repository; 

use App\Entity\Hideout;
use App\Db\Mysql;
use App\Tools\StringTools;


class hideoutRepository
{
    public function findOneById(int $id_hideout)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();

        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('SELECT * FROM hideout WHERE id_hideout = :id_hideout');
        $query->bindValue(':id_hideout', $id_hideout, $pdo::PARAM_INT);
        $query->execute();
        $hideout = $query->fetch($pdo::FETCH_ASSOC);
        $hideoutEntity = new Hideout();

        foreach ($hideout as $key => $value) {
            $hideoutEntity->{'set'.StringTools::toPascalCase($key) }($value);
        }

        return $hideoutEntity;
    }

    public function findAll()
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('SELECT * FROM hideout');
        $query->execute();
        $hideout = $query->fetchAll($pdo::FETCH_ASSOC);

        return $hideout;
    }

    public function AddHideout(array $hideout)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('INSERT INTO hideout (adress, country, type_of_hideout) VALUES (:adress, :country, :type_of_hideout)');

        $query->bindValue(':adress', $hideout['adress']);
        $query->bindValue(':country', $hideout['country']);
        $query->bindValue(':type_of_hideout', $hideout['type_of_hideout']);

        $query->execute();
    }

    public function UpdateHideout(int $id_hideout, array $hideout)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('UPDATE hideout SET adress = :adress, country = :country, type_of_hideout = :type_of_hideouth WHERE id_hideout = :id_hideout');

        $query->bindValue(':id_hideout', $id_hideout, $pdo::PARAM_INT);
        $query->bindValue(':adress', $hideout['adress']);
        $query->bindValue(':countrye', $hideout['country']);
        $query->bindValue(':type_of_hideout', $hideout['type_of_hideout']);
        
        $query->execute();

    }

    public function DeleteHideout(int $id_hideout):bool
    {
        try {
            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();
    
            $query = $pdo->prepare('DELETE FROM hideout WHERE id_hideout = :id_hideout');
            $query->bindValue(':id_hideout', $id_hideout, $pdo::PARAM_INT);
    
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
        };
    }
}