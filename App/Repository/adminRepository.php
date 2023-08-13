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

    public function AddAdmin(string $last_name, string $first_name, string $email, string $password, $creation_date, $role = "user")
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $sql = "INSERT INTO `administrator` (`last_name`, `first_name`, `email`, `password`, `creation_date`, `role`) 
            VALUES (:last_name, :first_name; :email, :password, :creation_date, :role);";
        $query = $pdo->prepare($sql);

        $password = password_hash($password, PASSWORD_BCRYPT);
        $query->bindParam(':lastname', $last_name, $pdo::PARAM_STR);
        $query->bindParam(':firstname', $first_name, $pdo::PARAM_STR);
        $query->bindParam(':email', $email, $pdo::PARAM_STR);
        $query->bindParam(':password', $password, $pdo::PARAM_STR);
        $query->bindParam(':creation_date', $creation_date, $pdo::PARAM_STR);
        $query->bindParam(':role', $role, $pdo::PARAM_STR);

        $query->execute();
    }

    public function connexionTo ()
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare("SELECT * FROM administrator WHERE email = :email AND password = :password");
        $query->bindParam(':email', $email, $pdo::PARAM_STR);
        $query->bindParam(':password', $password, $pdo::PARAM_STR);
        $query->execute();
        $user = $query->fetch();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }

}

/* public function findByEmailAndPassword(string $email, string $password)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare('SELECT * FROM administrator WHERE email = :email AND password = :password');
        $query->bindValue(':email', $email, $pdo::PARAM_STR);
        $query->bindValue(':password', $password, $pdo::PARAM_STR);

        $query->execute(array(':email' => $email, ':password' => $password));
        return $query->rowCount() == 1;
    }

    public function verifyEmailLoginPassword(string $email, string $password)
    {
        //Appel BDD
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        $query = $pdo->prepare("SELECT * FROM administrator WHERE email = :email");
        $query->bindParam(':email', $email, $pdo::PARAM_STR);
        $query->execute();
        $user = $query->fetch();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false;
        }

    }
*/