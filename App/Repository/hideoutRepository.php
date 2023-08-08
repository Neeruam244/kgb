<?php 

namespace App\Repository; 

use App\Entity\Hideout;
use App\Db\Mysql;
use App\Tools\StringTools;


class hideoutRepository
{
    public function findOneById(int $id_hideout)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();

        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('SELECT * FROM hideout WHERE id_hideout = :id_hideout');
        $query->bindValue(':id_hideout', $id_hideout, $pdo::PARAM_INT);
        $query->execute();
        $hideout = $query->fetch($pdo::FETCH_ASSOC);
        $hideoutEntity = new Hideout();

        foreach ($hideout as $key => $value) {
            $hideoutEntity->{'set'.StringTools::toPascalCase($key) }($value);
        }

        return $hideoutEntity;
    }
}