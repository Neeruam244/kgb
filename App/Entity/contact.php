<?php 

class Contact
{
    public PDO $pdo;
    public INT $id_contact;
    public string $last_name;
    public string $first_name;
    public string $date_of_birth;
    public string $code_name_contact;
    public string $nationality;

    public function __construct($pdo, $id_contact, $last_name, $first_name, $date_of_birth, $code_name_contact, $nationality) {
    $this->id_contact = $id_contact;
    $this->last_name = $last_name;
    $this->first_name = $first_name;
    $this->date_of_birth = $date_of_birth;
    $this->code_name_contact = $code_name_contact;
    $this->nationality = $nationality;
    }

    public function addContact($pdo, $last_name, $first_name, $date_of_birth, $code_name_contact, $nationality) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO contact (last_name, first_name, date_of_birth, code_name_contact, nationality) 
                                        VALUES (:last_name, :first_name, :date_of_birth, :code_name_contact, :nationality)");
            $stmt->bindValue(':last_name', $last_name, $pdo::PARAM_STR);
            $stmt->bindValue(':first_name', $first_name, $pdo::PARAM_STR);
            $stmt->bindValue(':date_of_birth', $date_of_birth, $pdo::PARAM_STR);
            $stmt->bindValue(':code_name_contact', $code_name_contact, $pdo::PARAM_STR);
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

    public function getContactDetails($id_contact) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM contact WHERE id_contact = :id_contact");
            $stmt->bindValue(":id_contact", $id_contact, PDO::PARAM_INT);
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

    public function updateContactInfo($pdo, $last_name, $first_name, $date_of_birth, $code_name_contact, $nationality) {
        try {
            $stmt = $this->pdo->prepare("UPDATE contact SET last_name = :last_name, first_name = :first_name, date_of_birth = :date_of_birth, 
                                        code_name_contact = :code_name_contact, nationality = :nationality WHERE id_contact = :id_contact");
            $stmt->bindValue(':last_name', $last_name, $pdo::PARAM_STR);
            $stmt->bindValue(':first_name', $first_name, $pdo::PARAM_STR);
            $stmt->bindValue(':date_of_birth', $date_of_birth, $pdo::PARAM_STR);
            $stmt->bindValue(':code_name_contact', $code_name_contact, $pdo::PARAM_STR);
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

    public function deleteContact(PDO $pdo, INT $id_contact) {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM contact WHERE id_contact = :id_contact");
            $stmt->bindValue(':id_contact', $id_contact, $pdo::PARAM_INT);
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