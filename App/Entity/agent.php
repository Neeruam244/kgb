<?php 

require_once __DIR__ . "/lib/config.php";

class Agent 
{
    public INT $id_agent;
    public string $last_name;
    public string $first_name;
    public string $date_of_birth;
    public string $identification_code;
    public string $nationality;
    public string $specialities;

    public function __construct($id_agent, $last_name, $first_name, $date_of_birth, $identification_code, $nationality, $specialities) {
    $this->id_agent = $id_agent;
    $this->last_name = $last_name;
    $this->first_name = $first_name;
    $this->date_of_birth = $date_of_birth;
    $this->identification_code = $identification_code;
    $this->nationality = $nationality;
    $this->specialities = $specialities;
    }

    public function getAllAgents() {
        // Récupérer tous les agents depuis la base de données
        $conn = new PDO('mysql:host=' . _DB_HOST_ . ';dbname=' . _DB_NAME_, _DB_USER_, _DB_PASSWORD_);
        $stmt = $conn->prepare('SELECT * FROM agent');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function addAgent($last_name, $first_name, $date_of_birth, $identification_code, $nationality, $specialities) {
        // Ajouter un nouvel agent dans la base de données
        $conn = new PDO('mysql:host=' . _DB_HOST_ . ';dbname=' . _DB_NAME_, _DB_USER_, _DB_PASSWORD_);
        $stmt = $conn->prepare('INSERT INTO agent (last_name, first_name, date_of_birth, identification_code, nationality, speciality) 
            VALUES (:last_name, :first_name, :date_of_birth, :identification_code, :nationality, :specialities)');
            $stmt->bindValue(':last_name', $last_name::PARAM_STR);
            $stmt->bindValue(':first_name', $first_name::PARAM_STR);
            $stmt->bindValue(':date_of_birth', $date_of_birth::PARAM_STR);
            $stmt->bindValue(':identification_code', $identification_code::PARAM_STR);
            $stmt->bindValue(':nationality', $nationality::PARAM_STR);
            $stmt->bindValue(':specialities', $specialities::PARAM_STR);
        $stmt->execute([$last_name['nom'], $first_name['prenom'], $date_of_birth['date_de_naissance'], $identification_code['code_d\'identifcation'], $nationality['nationalité'], $specialities['spécialités']]);
    }

    public static function updateAgentInfo($last_name, $first_name, $date_of_birth, $identification_code, $nationality, $specialities) {
        // Ajouter un nouvel agent dans la base de données
        $conn = new PDO('mysql:host=' . _DB_HOST_ . ';dbname=' . _DB_NAME_, _DB_USER_, _DB_PASSWORD_);
        $stmt = $conn->prepare('INSERT INTO agent (last_name, first_name, date_of_birth, identification_code, nationality, speciality) 
            VALUES (:last_name, :first_name, :date_of_birth, :identification_code, :nationality, :specialities)');
        $stmt->bindValue(':last_name', $last_name::PARAM_STR);
        $stmt->bindValue(':first_name', $first_name::PARAM_STR);
        $stmt->bindValue(':date_of_birth', $date_of_birth::PARAM_STR);
        $stmt->bindValue(':identification_code', $identification_code::PARAM_STR);
        $stmt->bindValue(':nationality', $nationality::PARAM_STR);
        $stmt->bindValue(':specialities', $specialities::PARAM_STR);
        $stmt->execute([$last_name['nom'], $first_name['prenom'], $date_of_birth['date_de_naissance'], $identification_code['code_d\'identifcation'], $nationality['nationalité'], $specialities['spécialités']]);
    }

    public static function deleteAgent($id_agent) {
        // Ajouter un nouvel agent dans la base de données
        $conn = new PDO('mysql:host=' . _DB_HOST_ . ';dbname=' . _DB_NAME_, _DB_USER_, _DB_PASSWORD_);
        $stmt = $conn->prepare('DELETE FROM agent WHERE id_agent = id_agent');
        $stmt->bindValue(':id_agent', $id_agent::PARAM_INT);
        $stmt->execute();
    }
}

