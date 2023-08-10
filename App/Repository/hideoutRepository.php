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

    public function AddHideout()
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('INSERT INTO hideout (adress, country, type_of_hideout) 
            VALUES (:adress, :country, :type_of_hideout)');

        $query->execute();
        $hideout = $query->fetch($pdo::FETCH_ASSOC);
        $hideoutEntity = new hideout();

        foreach ($hideout as $key => $value) {
            $hideoutEntity->{'set'.StringTools::toPascalCase($key) }($value);
        }

        return $hideoutEntity;
    }

    public function UpdateHideout(int $id_hideout)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('UPDATE hideout SET adress = :adress, country = :country, type_of_hideout = :type_of_hideout');
        $query->bindValue(':id_hideout', $id_hideout, $pdo::PARAM_INT);
        $query->execute();
        $hideout = $query->fetch($pdo::FETCH_ASSOC);
        $hideoutEntity = new hideout();

        foreach ($hideout as $key => $value) {
            $hideoutEntity->{'set'.StringTools::toPascalCase($key) }($value);
        }

        return $hideoutEntity;
    }

    public function DeleteHideout(int $id_hideout)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('DELETE FROM hideout WHERE id_hideout = :id_hideout');
        $query->bindValue(':id_hideout', $id_hideout, $pdo::PARAM_INT);
        $query->execute();
        $hideout = $query->fetch($pdo::FETCH_ASSOC);
        $hideoutEntity = new hideout();

        foreach ($hideout as $key => $value) {
            $hideoutEntity->{'set'.StringTools::toPascalCase($key) }($value);
        }

        return $hideoutEntity;
    }
}