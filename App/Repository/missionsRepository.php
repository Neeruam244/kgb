<?php

namespace App\Repository;

use App\Entity\Missions;
use App\Db\Mysql;
use App\Tools\StringTools;

class missionsRepository
{
    public function findOneById(int $id_mission)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();

        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('SELECT * FROM missions WHERE id_mission = :id_mission');
        $query->bindValue(':id_mission', $id_mission, $pdo::PARAM_INT);
        $query->execute();
        $mission = $query->fetch($pdo::FETCH_ASSOC);
        $missionEntity = new Missions();

        foreach ($mission as $key => $value) {
            $missionEntity->{'set'.StringTools::toPascalCase($key) }($value);
        }

        return $missionEntity;
    }

    public function findAll()
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('SELECT * FROM missions');
        $query->execute();
        $missions = $query->fetchAll($pdo::FETCH_ASSOC);

        return $missions;
    }

    public function AddMission(array $missions)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('INSERT INTO missions (title, description, name_code_mission, country, type_of_mission, statut, number_of_hideout, speciality, start_date, end_date, identication_code, 
            code_name_contact, code_name_target, id_admin, adress) VALUES (:title, :description, :name_code_mission, :country, :type_of_mission, :statut, :number_of_hideout, :speciality, :start_date, :end_date, 
            :identication_code, :code_name_contact, :code_name_target, :id_admin, :adress)');

        $query->bindValue(':title', $missions['title']);
        $query->bindValue(':description', $missions['description']);
        $query->bindValue(':name_code_mission', $missions['name_code_mission']);
        $query->bindValue(':number_of_hideout', $missions['number_of_hideout']);
        $query->bindValue(':adress', $missions['adress']);
        $query->bindValue(':country', $missions['country']);
        $query->bindValue(':speciality', $missions['speciality']);
        $query->bindValue(':type_of_mission', $missions['type_of_mission']);
        $query->bindValue(':statut', $missions['statut']);
        $query->bindValue(':start_date', $missions['start_date']);
        $query->bindValue(':end_date', $missions['end_date']);
        $query->bindValue(':id_admin', $missions['id_admin']);
        $query->bindValue(':identification_code', $missions['identification_code']);
        $query->bindValue(':code_name_contact', $missions['code_name_contact']);
        $query->bindValue(':code_name_target', $missions['code_name_target']);

        $query->execute();
    }

    public function UpdateMission(int $id_mission, array $missions)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('UPDATE missions SET title = :title, description = :description, name_code_mission = :name_code_mission, country = :country, type_of_missions = :type_of_missions,
            statut = :statut, number_of_hideout = :number_of_hideout, speciality = :speciality, start_date = :start_date, end_date = :end_date, identication_code = :identification_code,
            code_name_contact = :code_name_contact, code_name_target = :code_name_target, adress = :adress, id_admin = :id_admin WHERE id_mission = :id_mission');

        $query->bindValue(':id_mission', $id_mission, $pdo::PARAM_INT);
        $query->bindValue(':title', $missions['title']);
        $query->bindValue(':description', $missions['description']);
        $query->bindValue(':name_code_mission', $missions['name_code_mission']);
        $query->bindValue(':number_of_hideout', $missions['number_of_hideout']);
        $query->bindValue(':adress', $missions['adress']);
        $query->bindValue(':country', $missions['country']);
        $query->bindValue(':speciality', $missions['speciality']);
        $query->bindValue(':type_of_mission', $missions['type_of_mission']);
        $query->bindValue(':statut', $missions['statut']);
        $query->bindValue(':start_date', $missions['start_date']);
        $query->bindValue(':end_date', $missions['end_date']);
        $query->bindValue(':id_admin', $missions['id_admin']);
        $query->bindValue(':identification_code', $missions['identification_code']);
        $query->bindValue(':code_name_contact', $missions['code_name_contact']);
        $query->bindValue(':code_name_target', $missions['code_name_target']);
        
        $query->execute();

    }

    public function DeleteMission(int $id_mission):bool
    {
        try {
            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();
    
            $query = $pdo->prepare('DELETE FROM missions WHERE id_mission = :id_mission');
            $query->bindValue(':id_mission', $id_mission, $pdo::PARAM_INT);
    
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