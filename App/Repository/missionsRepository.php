<?php

namespace App\Repository;

use App\Entity\Missions;

class missionsRepository 
{
    public function findOneById(int $id)
    {
        //Appel BDD
        $mission = ['id_missions' => 1, 'title' => 'Assasinat du général Dreykov', 'description' => 'Infiltration dans le reprère de la Chambre rouge, élimination de la cible NI66R - si possible libération des veuves', 'name_code_mission' => 'AS-NI66R-2B' , 'country' => 'Russie', 'type_of_mission' => 'Assasinat', 
        'statut' => 'En cours', 'number_of_hideout' => 1, 'speciality' => 'assasinat', 'start_date' => '2023-08-02', 'end_date' => '']; 

        $missionEntity = new Missions();
        $missionEntity->setIdMissions($mission['id_missions']);
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

        //foreach ($mission as $key => $value) {
        //    $missionsRepository->{'set'}($value);
        //}

        return $missionEntity;
    }
}