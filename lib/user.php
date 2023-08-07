<?php

function addUser(PDO $pdo, string $last_name, string $first_name, string $email, string $password, $creation_date, $role = "user") {
    $sql = "INSERT INTO `administrator` (`last_name`, `first_name`, `email`, `password`, `creation_date`, `role`) VALUES (:last_name, :first_name; :email, :password, :creation_date, :role);";
    $query = $pdo->prepare($sql);

    $password = password_hash($password, PASSWORD_BCRYPT);

    $query->bindParam(':lastname', $last_name, PDO::PARAM_STR);
    $query->bindParam(':firstname', $first_name, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->bindParam(':creation_date', $creation_date, PDO::PARAM_STR);
    $query->bindParam(':role', $role, PDO::PARAM_STR);
    
    return $query->execute();
}

function verifyUserLoginPassword(PDO $pdo, string $email, string $password) {
    $query = $pdo->prepare("SELECT * FROM administrator WHERE email = :email");
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch();

    if ($user && password_verify($password, $user['password'])) {
        return $user;
    } else {
        return false;
    }
}