<?php 

class Target 
{
    public PDO $pdo;
    public INT $id_target;
    public string $last_name;
    public string $first_name;
    public string $date_of_birth;
    public string $code_name_target;
    public string $nationality;

    public function __construct($pdo, $id_target, $last_name, $first_name, $date_of_birth, $code_name_target, $nationality) {
    $this->id_target = $id_target;
    $this->last_name = $last_name;
    $this->first_name = $first_name;
    $this->date_of_birth = $date_of_birth;
    $this->code_name_target = $code_name_target;
    $this->nationality = $nationality;
    }
     
    public function addTarget($pdo, $last_name, $first_name, $date_of_birth, $code_name_target, $nationality) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO targets (last_name, first_name, date_of_birth, code_name_target, nationality) 
                                        VALUES (:last_name, :first_name, :date_of_birth, :code_name_target, :nationality)");
            $stmt->bindValue(':last_name', $last_name, $pdo::PARAM_STR);
            $stmt->bindValue(':first_name', $first_name, $pdo::PARAM_STR);
            $stmt->bindValue(':date_of_birth', $date_of_birth, $pdo::PARAM_STR);
            $stmt->bindValue(':code_name_target', $code_name_target, $pdo::PARAM_STR);
            $stmt->bindValue(':nationality', $nationality, $pdo::PARAM_STR);
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

    public function getTargetDetails($id_target) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM targets WHERE id_target = :id_target");
            $stmt->bindValue(":id_target", $id_target, PDO::PARAM_INT);
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

    public function updateTargetInfo($pdo, $last_name, $first_name, $date_of_birth, $code_name_target, $nationality) {
        try {
            $stmt = $this->pdo->prepare("UPDATE targets SET last_name = :last_name, first_name = :first_name, date_of_birth = :date_of_birth, 
                                        code_name_target = :code_name_target, nationality = :nationality WHERE id_target = :id_target");
            $stmt->bindValue(':last_name', $last_name, $pdo::PARAM_STR);
            $stmt->bindValue(':first_name', $first_name, $pdo::PARAM_STR);
            $stmt->bindValue(':date_of_birth', $date_of_birth, $pdo::PARAM_STR);
            $stmt->bindValue(':code_name_target', $code_name_target, $pdo::PARAM_STR);
            $stmt->bindValue(':nationality', $nationality, $pdo::PARAM_STR);
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

    public function deleteTarget(PDO $pdo, INT $id_target) {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM targets WHERE id_target = :id_target");
            $stmt->bindValue(':id_target', $id_target, $pdo::PARAM_INT);
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
