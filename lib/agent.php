<?php 

class Agent 
{
    private PDO $pdo;
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

    // Méthode pour ajouter un nouvel agent à la base de données
    public function addAgent($pdo, $last_name, $first_name, $date_of_birth, $identification_code, $nationality, $specialities) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO agent (last_name, first_name, date_of_birth, identification_code, nationality, speciality) 
                                        VALUES (:last_name, :first_name, :date_of_birth, :identification_code, :nationality, :specialities)");
            $stmt->bindValue(':last_name', $last_name, $pdo::PARAM_STR);
            $stmt->bindValue(':first_name', $first_name, $pdo::PARAM_STR);
            $stmt->bindValue(':date_of_birth', $date_of_birth, $pdo::PARAM_STR);
            $stmt->bindValue(':identification_code', $identification_code, $pdo::PARAM_STR);
            $stmt->bindValue(':nationality', $nationality, $pdo::PARAM_STR);
            $stmt->bindValue(':specialities', $specialities, $pdo::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Gestion des erreurs
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
        } catch (Exception $e) {
            // Gestion des exceptions générales
            echo "Une erreur s'est produite : " . $e->getMessage();
        }
    }

    // Méthode pour récupérer les détails d'un agent à partir de son ID
    public function getAgentDetails($id_agent) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM agent WHERE id_agent = :id_agent");
            $stmt->bindValue(":id_agent", $id_agent, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gestion des erreurs
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
        } catch (Exception $e) {
            // Gestion des exceptions générales
            echo "Une erreur s'est produite : " . $e->getMessage();
        }
    }

    // Méthode pour mettre à jour les informations de l'agent
    public function updateAgentInfo($pdo, $last_name, $first_name, $date_of_birth, $identification_code, $nationality, $specialities) {
        try {
            $stmt = $this->pdo->prepare("UPDATE agent SET last_name = :last_name, first_name = :first_name, date_of_birth = :date_of_birth, 
                                        identification_code = :identification_code, nationality = :nationality, specialities = :specialities WHERE id_agent = :id_agent");
            $stmt->bindValue(':last_name', $last_name, $pdo::PARAM_STR);
            $stmt->bindValue(':first_name', $first_name, $pdo::PARAM_STR);
            $stmt->bindValue(':date_of_birth', $date_of_birth, $pdo::PARAM_STR);
            $stmt->bindValue(':identification_code', $identification_code, $pdo::PARAM_STR);
            $stmt->bindValue(':nationality', $nationality, $pdo::PARAM_STR);
            $stmt->bindValue(':specialities', $specialities, $pdo::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Gestion des erreurs
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
        } catch (Exception $e) {
            // Gestion des exceptions générales
            echo "Une erreur s'est produite : " . $e->getMessage();
        }
    }

    // Méthode pour supprimer un agent de la base de données
    public function deleteAgent(PDO $pdo, INT $id_agent) {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM agent WHERE id_agent = id_agent");
            $stmt->bindValue(':id_agent', $id_agent, $pdo::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Gestion des erreurs
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
        } catch (Exception $e) {
            // Gestion des exceptions générales
            echo "Une erreur s'est produite : " . $e->getMessage();
        }
    }
}