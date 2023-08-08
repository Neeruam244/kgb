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

    public function getAllMissions()
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('SELECT * FROM missions');
        $query->execute();
        $mission = $query->fetch($pdo::FETCH_ASSOC);
        $missionEntity = new Missions();

        /*$missionEntity->setIdMission($mission['id_mission']);
        $missionEntity->setIdAdmin($mission['id_admin']);
        $missionEntity->setTitle($mission['title']);
        $missionEntity->setDescription($mission['description']);
        $missionEntity->setNameCodeMission($mission['name_code_mission']);
        $missionEntity->setCountry($mission['country']);
        $missionEntity->setTypeOfMission($mission['type_of_mission']);
        $missionEntity->setStatut($mission['statut']);
        $missionEntity->setNumberOfHideout($mission['number_of_hideout']);
        $missionEntity->setSpeciality($mission['speciality']);
        $missionEntity->setStartDate($mission['start_date']);
        $missionEntity->setEndDate($mission['end_date']);
        $missionEntity->setIdentificationCode($mission['identification_code']);
        $missionEntity->setCodeNameContact($mission['code_name_contact']);
        $missionEntity->setCodeNameTarget($mission['code_name_target']);
        $missionEntity->setAdress($mission['adress']);*/

        foreach ($mission as $key => $value) {
            $missionEntity->{'set'.StringTools::toPascalCase($key) }($value);
        }

        return $missionEntity;
    }

    public function AddMission()
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('INSERT INTO missions (title, description, name_code_mission, country, type_of_mission, statut, number_of_hideout, speciality, start_date, end_date, identication_code, 
            code_name_contact, code_name_target, id_admin, adress) VALUES (:title, :description, :name_code_mission, :country, :type_of_mission, :statut, :number_of_hideout, :speciality, :start_date, :end_date, 
            :identication_code, :code_name_contact, :code_name_target, :id_admin, :adress)');

        $query->execute();
        $mission = $query->fetch($pdo::FETCH_ASSOC);
        $missionEntity = new Missions();

        foreach ($mission as $key => $value) {
            $missionEntity->{'set'.StringTools::toPascalCase($key) }($value);
        }

        return $missionEntity;
    }

    public function UpdateMission(int $id_mission)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('UPDATE missions SET title = :title, description = :description, name_code_mission = :name_code_mission, country = :country, type_of_missions = :type_of_missions,
            statut = :statut, number_of_hideout = :number_of_hideout, speciality = :speciality, start_date = :start_date, end_date = :end_date, identication_code = :identification_code,
            code_name_contact = :code_name_contact, code_name_target = :code_name_target, adress = :adress, id_admin = :id_admin WHERE id_mission = :id_mission");');
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
        //Appel BDD
        $mysql = Mysql::getInstance();
        
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('DELETE FROM missions WHERE id_mission = :id_mission');
        $query->bindValue(':id_mission', $id_mission, $pdo::PARAM_INT);
        $query->execute();
        $mission = $query->fetch($pdo::FETCH_ASSOC);
        $missionEntity = new Missions();

        foreach ($mission as $key => $value) {
            $missionEntity->{'set'.StringTools::toPascalCase($key) }($value);
        }

        return $missionEntity;
    }
}