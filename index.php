<?php 

define('_ROOTPATH_', __DIR__); //

spl_autoload_register();

use App\Controller\Controller;

$controller = new Controller();
$controller->route();



$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($action === 'delete') {
    // Inclure le fichier contenant la logique de suppression
    require_once 'missionsController.php';
    exit;
}


?>