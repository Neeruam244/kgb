<?php 

class Administrator 
{
    public PDO $pdo;
    public INT $id_admin;
    public string $last_name;
    public string $first_name;
    public string $mail;
    private string $password;
    public string $creation_date;

    public function __construct($pdo, $id_admin, $last_name, $first_name, $mail, $password, $creation_date) {
    $this->id_admin = $id_admin;
    $this->last_name = $last_name;
    $this->first_name = $first_name;
    $this->mail = $mail;
    $this->password = $password;
    $this->creation_date = $creation_date;
    }

    public function addAdmin($pdo, $last_name, $first_name, $mail, $password, $creation_date) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO administrator (last_name, first_name, mail, password, creation_date) 
                                        VALUES (:last_name, :first_name, :mail, :password, :creation_date)");
            $stmt->bindValue(':last_name', $last_name, $pdo::PARAM_STR);
            $stmt->bindValue(':first_name', $first_name, $pdo::PARAM_STR);
            $stmt->bindValue(':mail', $mail, $pdo::PARAM_STR);
            $stmt->bindValue(':password', $password, $pdo::PARAM_STR);
            $stmt->bindValue(':creation_date', $creation_date, $pdo::PARAM_STR);
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

    public function getAdminDetails($id_admin) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM administrator WHERE id_admin = :id_admin");
            $stmt->bindValue(":id_admin", $id_admin, PDO::PARAM_INT);
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

    public function updateAdminInfo($pdo, $last_name, $first_name, $mail, $password, $type) {
        try {
            $stmt = $this->pdo->prepare("UPDATE administrator SET last_name = :last_name, first_name = :first_name, mail = :mail, 
                                        password = :password, type = :type WHERE id_admin = :id_admin");
            $stmt->bindValue(':last_name', $last_name, $pdo::PARAM_STR);
            $stmt->bindValue(':first_name', $first_name, $pdo::PARAM_STR);
            $stmt->bindValue(':mail', $mail, $pdo::PARAM_STR);
            $stmt->bindValue(':password', $password, $pdo::PARAM_STR);
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

    public function deleteAdmin(PDO $pdo, INT $id_admin) {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM administrator WHERE id_admin = :id_admin");
            $stmt->bindValue(':id_admin', $id_admin, $pdo::PARAM_INT);
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