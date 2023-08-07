<?php 

class Hideout
{
    public PDO $pdo;
    public INT $id_hideout;
    public string $adress;
    public string $country;
    public string $type;

    public function __construct($pdo, $id_hideout, $adress, $country, $type) {
    $this->id_hideout = $id_hideout;
    $this->adress = $adress;
    $this->country = $country;
    $this->type = $type;
    }

    public function addHideout($pdo, $adress, $country, $type) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO hideout (adress, country, type) 
                                        VALUES (:adress, :country, :type)");
            $stmt->bindValue(':adress', $adress, $pdo::PARAM_STR);
            $stmt->bindValue(':country', $country, $pdo::PARAM_STR);
            $stmt->bindValue(':type', $type, $pdo::PARAM_STR);
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

    public function getHideoutDetails($id_hideout) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM hideout WHERE id_hideout = :id_hideout");
            $stmt->bindValue(":id_hideout", $id_hideout, PDO::PARAM_INT);
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

    public function updateHideoutInfo($pdo, $adress, $country, $type) {
        try {
            $stmt = $this->pdo->prepare("UPDATE hideout SET adress = :adress, country = :country, type = :type WHERE id_hideout = :id_hideout");
            $stmt->bindValue(':adress', $adress, $pdo::PARAM_STR);
            $stmt->bindValue(':country', $country, $pdo::PARAM_STR);
            $stmt->bindValue(':type', $type, $pdo::PARAM_STR);
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

    public function deleteHideout(PDO $pdo, INT $id_hideout) {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM hideout WHERE id_hideout = :id_hideout");
            $stmt->bindValue(':id_hideout', $id_hideout, $pdo::PARAM_INT);
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