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

    public function AddMission($missionData)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('INSERT INTO missions (title, description, name_code_mission, country, type_of_mission, statut, number_of_hideout, speciality, start_date, end_date, identication_code, 
            code_name_contact, code_name_target, id_admin, adress) VALUES (:title, :description, :name_code_mission, :country, :type_of_mission, :statut, :number_of_hideout, :speciality, :start_date, :end_date, 
            :identication_code, :code_name_contact, :code_name_target, :id_admin, :adress)');
        $query->bindValue(':title', $missionData['title']);
        $query->bindValue(':description', $missionData['description']);
        $query->bindValue(':name_code_mission', $missionData['name_code_mission']);
        $query->bindValue(':number_of_hideout', $missionData['number_of_hideout']);
        $query->bindValue(':adress', $missionData['adress']);
        $query->bindValue(':country', $missionData['country']);
        $query->bindValue(':speciality', $missionData['speciality']);
        $query->bindValue(':statut', $missionData['statut']);
        $query->bindValue(':start_date', $missionData['start_date']);
        $query->bindValue(':end_date', $missionData['end_date']);
        $query->bindValue(':id_admin', $missionData['id_admin']);
        $query->bindValue(':identification_code', $missionData['identification_code']);
        $query->bindValue(':code_name_contact', $missionData['code_name_contact']);
        $query->bindValue(':code_name_target', $missionData['code_name_target']);
        $query->execute();

        return $query->rowCount() > 0;
    }

    public function UpdateMission(int $id_mission)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();

        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('UPDATE missions SET title = :title, description = :description, name_code_mission = :name_code_mission, country = :country, type_of_missions = :type_of_missions,
            statut = :statut, number_of_hideout = :number_of_hideout, speciality = :speciality, start_date = :start_date, end_date = :end_date, identication_code = :identification_code,
            code_name_contact = :code_name_contact, code_name_target = :code_name_target, adress = :adress, id_admin = :id_admin WHERE id_mission = :id_mission');
        $query->bindValue(':id_mission', $id_mission, $pdo::PARAM_INT);
        $query->execute();
        $mission = $query->fetch($pdo::FETCH_ASSOC);
        $missionEntity = new Missions();

        foreach ($mission as $key => $value) {
            $missionEntity->{'set'.StringTools::toPascalCase($key) }($value);
        }

        return $missionEntity;
    }

    public function DeleteMission(int $id_mission)
    {
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('DELETE FROM missions WHERE id_mission = :id_mission');
        $query->bindValue(':id_mission', $id_mission, $pdo::PARAM_INT);
        $query->execute();

        // Vérifier le nombre de lignes affectées pour confirmer la suppression
        $rowsAffected = $query->rowCount();
        if ($rowsAffected > 0) {
            // La suppression s'est bien déroulée
            return true;
        } else {
            // Aucune ligne supprimée, la mission n'existait peut-être pas
            return false;
        }
    }
}