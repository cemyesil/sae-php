<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <?php if (isset($_SESSION['username'])): ?>
            <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
            <form action="index.php?action=logout" method="post">
                <button type="submit">Logout</button>
            </form>
        <?php else: ?>
            <h2>Welcome!</h2>
            <div class="form-group">
                <a href="index.php?action=login_view"><button>Login</button></a>
            </div>
            <div class="form-group">
                <a href="index.php?action=register_view"><button>Register</button></a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
