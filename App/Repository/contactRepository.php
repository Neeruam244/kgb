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

    public function AddContact()
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('INSERT INTO contact (last_name, first_name, date_of_birth, nationality, code_name_contact) 
            VALUES (:last_name, :first_name, :date_of_birth, :nationality, :code_name_contact)');

        $query->execute();
        $contact = $query->fetch($pdo::FETCH_ASSOC);
        $contactEntity = new contact();

        foreach ($contact as $key => $value) {
            $contactEntity->{'set'.StringTools::toPascalCase($key) }($value);
        }

        return $contactEntity;
    }

    public function UpdateContact(int $id_contact)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('UPDATE contact SET last_name = :last_name, first_name = :first_name, date_of_birth = :date_of_birth, nationality = :nationality, 
            code_name_contact = :code_name_contact WHERE id_contact = :id_contact');
        $query->bindValue(':id_contact', $id_contact, $pdo::PARAM_INT);
        $query->execute();
        $contact = $query->fetch($pdo::FETCH_ASSOC);
        $contactEntity = new contact();

        foreach ($contact as $key => $value) {
            $contactEntity->{'set'.StringTools::toPascalCase($key) }($value);
        }

        return $contactEntity;
    }

    public function DeleteContact(int $id_contact)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('DELETE FROM contact WHERE id_contact = :id_contact');
        $query->bindValue(':id_contact', $id_contact, $pdo::PARAM_INT);
        $query->execute();
        $contact = $query->fetch($pdo::FETCH_ASSOC);
        $contactEntity = new contact();

        foreach ($contact as $key => $value) {
            $contactEntity->{'set'.StringTools::toPascalCase($key) }($value);
        }

        return $contactEntity;
    }
}