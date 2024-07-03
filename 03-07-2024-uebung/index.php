<?php

session_start();

require_once 'RegistrationController.php';
require_once 'LandingPageController.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

$registrationController = new RegistrationController();
$landingPageController = new LandingPageController();

if ($action === 'register') {
    $registrationController->register();
    exit();
} elseif ($action === 'register_view') {
    $registrationController->show();
    exit();
} elseif ($action === 'login_view') {
    echo "login nicht implementiert";
    exit();
} elseif ($action === 'logout') {
    $landingPageController->logout();
    $landingPageController->show();
    exit(); 
}
elseif ($action === '') {
    $landingPageController->show();
    exit();
}

?>