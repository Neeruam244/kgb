<?php 

namespace App\Repository; 

use App\Entity\Agent;
use App\Db\Mysql;
use App\Tools\StringTools;


class AgentRepository {

    public function findOneById(int $id_agent)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('SELECT * FROM agent WHERE id_agent = :id_agent');
        $query->bindValue(':id_agent', $id_agent, $pdo::PARAM_INT);
        $query->execute();
        $agent = $query->fetch($pdo::FETCH_ASSOC);
        $agentEntity = new Agent();

        foreach ($agent as $key => $value) {
            $agentEntity->{'set'.StringTools::toPascalCase($key) }($value);
        }

        return $agentEntity;
    }

    public function findAll()
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('SELECT * FROM agent');
        $query->execute();
        $agents = $query->fetchAll($pdo::FETCH_ASSOC);

        return $agents;
    }

    public function AddAgent()
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('INSERT INTO agent (last_name, first_name, date_of_birth, nationality, identification_code, specialities) 
            VALUES (:last_name, :first_name, :date_of_birth, :nationality, :identification_code, :specialities)');

        $query->execute();
        $agent = $query->fetch($pdo::FETCH_ASSOC);
        $agentEntity = new agent();

        foreach ($agent as $key => $value) {
            $agentEntity->{'set'.StringTools::toPascalCase($key) }($value);
        }

        return $agentEntity;
    }

    public function UpdateAgent(int $id_agent)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('UPDATE agent SET last_name = :last_name, first_name = :first_name, date_of_birth = :date_of_birth, nationality = :nationality, 
            identification_code = :identification_code, specialities = :specialities, WHERE id_agent = :id_agent');
        $query->bindValue(':id_agent', $id_agent, $pdo::PARAM_INT);
        $query->execute();
        $agent = $query->fetch($pdo::FETCH_ASSOC);
        $agentEntity = new Agent();

        foreach ($agent as $key => $value) {
            $agentEntity->{'set'.StringTools::toPascalCase($key) }($value);
        }

        return $agentEntity;
    }

    public function DeleteAgent(int $id_agent)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('DELETE FROM agent WHERE id_agent = :id_agent');
        $query->bindValue(':id_agent', $id_agent, $pdo::PARAM_INT);
        $query->execute();
        $agent = $query->fetch($pdo::FETCH_ASSOC);
        $agentEntity = new Agent();

        foreach ($agent as $key => $value) {
            $agentEntity->{'set'.StringTools::toPascalCase($key) }($value);
        }

        return $agentEntity;
    }
}
