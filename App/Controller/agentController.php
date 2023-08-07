<?php
require_once __DIR__ . "/models/agent.php"; 

class AgentController {
    public function index() {
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
    }
}
