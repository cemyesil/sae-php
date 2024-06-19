<?php
session_start();
if (isset($_SESSION['success'])) {
    $success = $_SESSION['success'];
}
else {
    $success = false;
}

if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
}
else {
    $errors = [];
}

unset($_SESSION['success']);
unset($_SESSION['errors']);

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formular</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="form-container">
        <h2>Registrierung</h2>
        <?php if (!empty($errors)): ?>
            <div class="error">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
        
        <?php elseif ($success): ?>
        <div class="success">
            <p>Das Formular wurde erfolgreich übermittelt!</p>
        </div>
        <?php endif; ?>
        <form action="registration_handler.php" method="POST">
            <div class="form-group">
                <label for="username">Nutzername:</label>
                <input type="text" id="username" name="username" value="Cem_SAE" required>
            </div>

            <div class="form-group">
                <label for="email">E-Mail Adresse:</label>
                <input type="email" id="email" name="email" value="cem.yesil@sae.at" required>
            </div>

            <div class="form-group">
                <label for="password">Passwort:</label>
                <input type="password" id="password" name="password" value="Abc1234sdfjl$#" required>
            </div>

            <div class="form-group">
                <label>Geschlecht:</label>
                <input type="radio" id="male" name="gender" checked value="male" required>
                <label for="male">Männlich</label>
                <input type="radio" id="female" name="gender" value="female">
                <label for="female">Weiblich</label>
            </div>

            <div class="form-group">
                <label for="country">Länderauswahl:</label>
                <select id="country" name="country" required>
                    <option value="">Bitte wählen</option>
                    <option value="DE" selected>Deutschland</option>
                </select>
            </div>

            <div class="form-group">
                <input type="checkbox" id="terms" name="terms" value="accepted" checked required>
                <label for="terms">AGBs akzeptieren</label>
            </div>

            <button type="submit">Absenden</button>
        </form>
    </div>
</body>
</html>