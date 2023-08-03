<?php 

class Missions
{
    public PDO $pdo;
    public INT $id_mission;
    public string $title;
    public string $description;
    public string $name_code_mission;
    public string $country;
    public string $type_of_mission;
    public string $statut;
    public INT $number_of_hideout;
    public string $speciality;
    public string $start_date;
    public string $end_date;

    public function __construct($pdo, $id_mission, $title, $description, $name_code_mission, $country, $type_of_mission, $statut, $number_of_hideout, $speciality, $start_date, $end_date) {
    $this->id_mission = $id_mission;
    $this->title = $title;
    $this->description = $description;
    $this->name_code_mission = $name_code_mission;
    $this->country = $country;
    $this->type_of_mission = $type_of_mission;
    $this->statut = $statut;
    $this->number_of_hideout = $number_of_hideout;
    $this->speciality= $speciality;
    $this->start_date = $start_date;
    $this->end_date = $end_date;
    }

    public function addMissions($pdo, $title, $description, $name_code_mission, $country, $type_of_mission, $statut, $number_of_hideout, $speciality, $start_date, $end_date) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO missions (title, description, name_code_mission, country, type_of_mission, statut, number_of_hideout, speciality, start_date, end_date) 
                                        VALUES (:title, :description, :name_code_mission, :country, :type_of_mission, :statut, :number_of_hideout, :speciality, :start_date, :end_date)");
            $stmt->bindValue(':title', $title, $pdo::PARAM_STR);
            $stmt->bindValue(':description', $description, $pdo::PARAM_STR);
            $stmt->bindValue(':name_code_mission', $name_code_mission, $pdo::PARAM_STR);
            $stmt->bindValue(':country', $country, $pdo::PARAM_STR);
            $stmt->bindValue(':type_of_mission', $type_of_mission, $pdo::PARAM_STR);
            $stmt->bindValue(':statut', $statut, $pdo::PARAM_STR);
            $stmt->bindValue(':number_of_hideout', $number_of_hideout, $pdo::PARAM_INT);
            $stmt->bindValue(':speciality', $speciality, $pdo::PARAM_STR);
            $stmt->bindValue(':start_date', $start_date, $pdo::PARAM_STR);
            $stmt->bindValue(':end_date', $end_date, $pdo::PARAM_STR);
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

    public function getTargetDetails($id_mission) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM missions WHERE id_mission = :id_mission");
            $stmt->bindValue(":id_mission", $id_mission, PDO::PARAM_INT);
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

    public function updateTargetInfo($pdo, $title, $description, $name_code_mission, $country, $type_of_mission, $statut, $number_of_hideout, $speciality, $start_date, $end_date) {
        try {
            $stmt = $this->pdo->prepare("UPDATE missions SET title = :title, description = :description, name_code_mission = :name_code_mission, country = :country, type_of_missions = :type_of_missions,
                             statut = :statut, number_of_hideout = :number_of_hideout, speciality = :speciality, start_date = :start_date, end_date = :end_date WHERE id_mission = :id_mission");
            $stmt->bindValue(':title', $title, $pdo::PARAM_STR);
            $stmt->bindValue(':description', $description, $pdo::PARAM_STR);
            $stmt->bindValue(':name_code_mission', $name_code_mission, $pdo::PARAM_STR);
            $stmt->bindValue(':country', $country, $pdo::PARAM_STR);
            $stmt->bindValue(':type_of_mission', $type_of_mission, $pdo::PARAM_STR);
            $stmt->bindValue(':statut', $statut, $pdo::PARAM_STR);
            $stmt->bindValue(':number_of_hideout', $number_of_hideout, $pdo::PARAM_INT);
            $stmt->bindValue(':speciality', $speciality, $pdo::PARAM_STR);
            $stmt->bindValue(':start_date', $start_date, $pdo::PARAM_STR);
            $stmt->bindValue(':end_date', $end_date, $pdo::PARAM_STR);
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

    public function deleteMission(PDO $pdo, INT $id_mission) {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM missions WHERE id_mission = :id_mission");
            $stmt->bindValue(':id_mission', $id_mission, $pdo::PARAM_INT);
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