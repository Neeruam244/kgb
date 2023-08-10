<?php 

namespace App\Repository; 

use App\Entity\Statut;
use App\Db\Mysql;
use App\Tools\StringTools;


class StatutRepository
{
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

    public function UpdateStatut(int $id_statut)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('UPDATE statut SET in_preparation = :in_preparation, in_progress = :in_progress, ended = :ended, failure = :failure, 
            id_missions = :id_missions WHERE id_statut = :id_statut');
        $query->bindValue(':id_statut', $id_statut, $pdo::PARAM_INT);
        $query->execute();
        $statut = $query->fetch($pdo::FETCH_ASSOC);
        $statutEntity = new Statut();

        foreach ($statut as $key => $value) {
            $statutEntity->{'set'.StringTools::toPascalCase($key) }($value);
        }

        return $statutEntity;
    }
}