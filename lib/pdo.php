<?php

// Paramètres de connexion à la base de données
$dbHost = 'localhost';
$dbName = 'kgb';
$dbUser = 'root';
$dbPass = '';

// Initialisation de la connexion PDO
try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
    // Activer les erreurs PDO pour faciliter le débogage
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
