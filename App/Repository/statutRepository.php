<?php 

namespace App\Repository; 

use App\Entity\Statut;
use App\Db\Mysql;
use App\Tools\StringTools;


class StatutRepository
{
    public function findOneById(int $id_statut)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('SELECT * FROM statut WHERE id_statut = :id_statut');
        $query->bindValue(':id_statut', $id_statut, $pdo::PARAM_INT);
        $query->execute();
        $statut = $query->fetch($pdo::FETCH_ASSOC);
        $statutEntity = new Statut();

        foreach ($statut as $key => $value) {
            $statutEntity->{'set'.StringTools::toPascalCase($key) }($value);
        }

        return $statutEntity;
    }

    public function findAll()
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('SELECT * FROM statut');
        $query->execute();
        $statut = $query->fetchAll($pdo::FETCH_ASSOC);

        return $statut;
    }

    public function UpdateStatut(int $id_statut, array $statut)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('UPDATE statut SET in_preparation = :in_preparation, in_progress = :in_progress, ended = :ended, failure = :failure, 
        name_code_mission = :name_code_mission WHERE id_statut = :id_statut');

        $query->bindValue(':id_statut', $id_statut, $pdo::PARAM_INT);
        $query->bindValue(':in_preparation', $statut['in_preparation']);
        $query->bindValue(':in_progress', $statut['in_progress']);
        $query->bindValue(':ended', $statut['ended']);
        $query->bindValue(':failure', $statut['failure']);
        $query->bindValue(':name_code_mission', $statut['name_code_mission']);
        
        $query->execute();

    }
}