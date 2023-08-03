<?php

require_once __DIR__ . "/lib/config.php";
require_once __DIR__ . "/lib/pdo.php";
require_once "agent.php"; // Inclure le modèle

class AgentController {
    private $agentModel;

    public function __construct($pdo) {
        $this->agentModel = new Agent(56, "Piveteau", "Maureen", "1999-10-24", "mavmav", "française", "blabla"); // Instancier le modèle avec la connexion PDO
    }

    // Méthode pour afficher la vue des détails de l'agent
    public function showAgentDetailsView($id_agent) {
        $agentDetails = $this->agentModel->getAgentDetails($id_agent); // Récupérer les détails de l'agent
        // Ici, vous pouvez afficher la vue HTML pour les détails de l'agent en utilisant les informations récupérées
        // par exemple, en utilisant un moteur de templates comme Twig ou directement en incluant un fichier HTML
    }

    // ... Autres méthodes du contrôleur pour gérer les actions liées aux agents ...
}




// Exemple d'utilisation de la classe Agent
$agent1 = new Agent(56, "Piveteau", "Maureen", "1999-10-24", "mavmav", "française", "blabla");

// Afficher les détails de l'agent
$agent1->getAgentDetails($id_agent);

// Mettre à jour les informations de l'agent
$agent1->updateAgentInfo(
    8,
    "Smith",
    "Jane",
    "1985-05-15",
    "XYZ789",
    "UK",
    "Infiltration"
);

// Afficher les détails mis à jour de l'agent
$agent1->getAgentDetails($id_agent);


