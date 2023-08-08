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

        //$mission = ['id_missions' => 1, 'title' => 'Assasinat du général Dreykov', 'description' => 'Infiltration dans le reprère de la Chambre rouge, élimination de la cible NI66R - si possible libération des veuves', 'name_code_mission' => 'AS-NI66R-2B' , 'country' => 'Russie', 'type_of_mission' => 'Assasinat', 
        //'statut' => 'En cours', 'number_of_hideout' => 1, 'speciality' => 'assasinat', 'start_date' => '2023-08-02', 'end_date' => '']; 

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
}