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
}