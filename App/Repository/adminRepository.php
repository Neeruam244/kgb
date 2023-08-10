<?php 

namespace App\Repository; 

use App\Entity\Administrator;
use App\Db\Mysql;
use App\Tools\StringTools;


class adminRepository
{
    public function findAll()
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('SELECT * FROM administrator');
        $query->execute();
        $admin = $query->fetchAll($pdo::FETCH_ASSOC);

        return $admin;
    }
}