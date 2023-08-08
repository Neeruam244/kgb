<?php 

namespace App\Repository; 

use App\Entity\Targets;
use App\Db\Mysql;
use App\Tools\StringTools;


class targetRepository
{
    public function findOneById(int $id_target)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();

        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('SELECT * FROM targets WHERE id_target = :id_target');
        $query->bindValue(':id_target', $id_target, $pdo::PARAM_INT);
        $query->execute();
        $target = $query->fetch($pdo::FETCH_ASSOC);
        $targetEntity = new Targets();

        foreach ($target as $key => $value) {
            $targetEntity->{'set'.StringTools::toPascalCase($key) }($value);
        }

        return $targetEntity;
    }
}