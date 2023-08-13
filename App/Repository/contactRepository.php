<?php 

namespace App\Repository; 

use App\Entity\Contact;
use App\Db\Mysql;
use App\Tools\StringTools;


class ContactRepository
{
    public function findOneById(int $id_contact)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();

        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('SELECT * FROM contact WHERE id_contact = :id_contact');
        $query->bindValue(':id_contact', $id_contact, $pdo::PARAM_INT);
        $query->execute();
        $contact = $query->fetch($pdo::FETCH_ASSOC);
        $contactEntity = new Contact();

        foreach ($contact as $key => $value) {
            $contactEntity->{'set'.StringTools::toPascalCase($key) }($value);
        }

        return $contactEntity;
    }

    public function findAll()
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('SELECT * FROM contact');
        $query->execute();
        $contact = $query->fetchAll($pdo::FETCH_ASSOC);

        return $contact;
    }

    public function AddContact(array $contact)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('INSERT INTO contact (last_name, first_name, date_of_birth, nationality, code_name_contact) 
            VALUES (:last_name, :first_name, :date_of_birth, :nationality, :code_name_contact)');

        $query->bindValue(':last_name', $contact['last_name']);
        $query->bindValue(':first_name', $contact['first_name']);
        $query->bindValue(':date_of_birth', $contact['date_of_birth']);
        $query->bindValue(':nationality', $contact['nationality']);
        $query->bindValue(':code_name_contact', $contact['code_name_contact']);

        $query->execute();
    }

    public function UpdateContact(int $id_contact, array $contact)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('UPDATE contact SET last_name = :last_name, first_name = :first_name, date_of_birth = :date_of_birth, nationality = :nationality, code_name_contact = :code_name_contact
            WHERE id_contact = :id_contact');

        $query->bindValue(':id_contact', $id_contact, $pdo::PARAM_INT);
        $query->bindValue(':last_name', $contact['last_name']);
        $query->bindValue(':first_name', $contact['first_name']);
        $query->bindValue(':date_of_birth', $contact['date_of_birth']);
        $query->bindValue(':nationality', $contact['nationality']);
        $query->bindValue(':code_name_contact', $contact['code_name_contact']);
        
        $query->execute();

    }

    public function DeleteContact(int $id_contact):bool
    {
        try {
            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();
    
            $query = $pdo->prepare('DELETE FROM contact WHERE id_contact = :id_contact');
            $query->bindValue(':id_contact', $id_contact, $pdo::PARAM_INT);
    
            $success = $query->execute();
    
            if (!$success) {
                // Gérer l'échec de la suppression (peut-être en lançant une exception)
                throw new \Exception("Impossible de supprimer la mission");
            }
    
            return true; // La suppression a réussi
        } catch (\Exception $e) {
            // Gérer l'erreur, par exemple, journaliser l'erreur
            // Vous pouvez également relancer l'exception pour que le contrôleur puisse la capturer
            throw $e; // Laissez le contrôleur décider de la façon de gérer cette exception
        }
    }
}