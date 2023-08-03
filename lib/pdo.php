<?php

// Paramètres de connexion à la base de données
$dbHost = 'localhost';
$dbName = '_DB_NAME_';
$dbUser = '_DB_USER_';
$dbPass = '_DB_PASSWORD_';

// Initialisation de la connexion PDO
try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
    // Activer les erreurs PDO pour faciliter le débogage
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
