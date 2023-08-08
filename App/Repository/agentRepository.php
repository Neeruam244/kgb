<?php 

namespace App\Repository; 

use App\Entity\Agent;
use App\Db\Mysql;
use App\Tools\StringTools;


class AgentRepository {

    public function findOneById(int $id_agent)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('SELECT * FROM agent WHERE id_agent = :id_agent');
        $query->bindValue(':id_agent', $id_agent, $pdo::PARAM_INT);
        $query->execute();
        $agent = $query->fetch($pdo::FETCH_ASSOC);
        $agentEntity = new Agent();

        foreach ($agent as $key => $value) {
            $agentEntity->{'set'.StringTools::toPascalCase($key) }($value);
        }

        return $agentEntity;
    }

    /*public function index() {
        // Afficher tous les agents
        $agents = Agent::getAllAgents();
        require 'views/agent/index.php';
    }

    public function addAgent() {
        // Ajouter un nouvel agent
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Traitement des données du formulaire et ajout dans la base de données
            $agent_data = $_POST; // (Assure-toi de valider et de nettoyer les données)
            Agent::addAgent($last_name, $first_name, $date_of_birth, $identification_code, $nationality, $specialities);
            header('Location: index.php');
        } else {
            require 'views/agent/add.php';
        }
    }

    public function updateAgentInfo() {
        // Ajouter un nouvel agent
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Traitement des données du formulaire et ajout dans la base de données
            $agent_data = $_POST; // (Assure-toi de valider et de nettoyer les données)
            Agent::updateAgentInfo($last_name, $first_name, $date_of_birth, $identification_code, $nationality, $specialities);
            header('Location: index.php');
        } else {
            require 'views/agent/edit.php';
        }
    }

    public function deleteAgent() {
        // Ajouter un nouvel agent
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Traitement des données du formulaire et ajout dans la base de données
            $agent_data = $_POST; // (Assure-toi de valider et de nettoyer les données)
            Agent::deleteAgent($id_agent);
            header('Location: index.php');
        } else {
            require 'views/agent/add.php';
        }
    }*/
}
