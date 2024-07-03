<?php

class RegistrationController {

    public function show() {
        header("Location: RegistrationView.php");
    }

    public function register() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $errors = [];

        if (empty($username) || strlen($username) < 4 || strlen($username) > 16) {
            $errors[] = "Username darf nicht leer sein. Muss mindestens 4 Zeichen haben und maximal 16 Zeichen haben.";
        }

        $password = $_POST['password'];
        if (strlen($password) < 8 ||
            !preg_match('/[a-z]/', $password) ||
            !preg_match('/[A-Z]/', $password) ||
            !preg_match('/\d/', $password) ||
            !preg_match('/[\W]/', $password) ||
            strpos($password, ' ') !== false) {
            $errors[] = "Das Passwort muss mindestens 8 Zeichen lang sein, mindestens einen Kleinbuchstaben, einen Großbuchstaben, eine Zahl und ein Sonderzeichen enthalten und darf keine Leerzeichen haben.";
        }

        $email = $_POST['email'];
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$email) {
            $errors[] = "Bitte geben Sie eine gültige E-Mail-Adresse ein.";
        }

        $_SESSION['errors'] = $errors;
        if (empty($errors)) {
            $_SESSION['success'] = true;
            $_SESSION['username'] = $username;
            header("Location: index.php");
            // TODO user in der datenbank anlegen
        }
        else {
            header("Location: RegistrationView.php");
            exit();
        }
    }
}

?>