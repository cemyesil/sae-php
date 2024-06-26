<?php

require_once 'RegistrationController.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

$controller = new RegistrationController();

if ($action === 'register') {
    $controller->register();
    exit();
} else {
    $controller->show();
    exit();
}

?>