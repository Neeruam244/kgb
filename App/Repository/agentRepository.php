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

    
    public function AddAgent(array $agent)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('INSERT INTO agent (last_name, first_name, date_of_birth, nationality, identification_code, specialities) 
            VALUES (:last_name, :first_name, :date_of_birth, :nationality, :identification_code, :specialities)');

        $query->bindValue(':last_name', $agent['last_name']);
        $query->bindValue(':first_name', $agent['first_name']);
        $query->bindValue(':date_of_birth', $agent['date_of_birth']);
        $query->bindValue(':nationality', $agent['nationality']);
        $query->bindValue(':identification_code', $agent['identification_code']);
        $query->bindValue(':specialities', $agent['specialities']);

        $query->execute();
    }

    public function UpdateAgent(int $id_agent, array $agent)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('UPDATE agent SET last_name = :last_name, first_name = :first_name, date_of_birth = :date_of_birth, nationality = :nationality, identification_code = :identification_code,
            specialities = :specialities WHERE id_agent = :id_agent');

        $query->bindValue(':id_agent', $id_agent, $pdo::PARAM_INT);
        $query->bindValue(':last_name', $agent['last_name']);
        $query->bindValue(':first_name', $agent['first_name']);
        $query->bindValue(':date_of_birth', $agent['date_of_birth']);
        $query->bindValue(':nationality', $agent['nationality']);
        $query->bindValue(':identification_code', $agent['identification_code']);
        $query->bindValue(':specialities', $agent['specialities']);
        
        $query->execute();

    }

    public function DeleteAgent(int $id_agent):bool
    {
        try {
            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();
    
            $query = $pdo->prepare('DELETE FROM agent WHERE id_agent = :id_agent');
            $query->bindValue(':id_agent', $id_agent, $pdo::PARAM_INT);
    
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
