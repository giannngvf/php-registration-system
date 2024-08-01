<?php
session_start();

if (!isset($_SESSION['email'])) {
    $_SESSION['error'] = 'You must sign in first.';
    header("Location: signin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="styles/display.css">
</head>
<body>
    <div class="sign-out">
        <a href="signout.php">Sign out</a>
    </div>
    <div class="user">
        <div class="header">
            <h1>Hello, <?php echo $_SESSION['full-name']; ?>!</h1>
        </div>
        <div class="info">
            <div class="personal-info">
                <h3>Personal Information:</h3>
                <p><i class="fas fa-user"></i> <?php echo $_SESSION['gender']; ?></p>
                <p><i class="fas fa-cake"></i> <?php echo $_SESSION['birthday']; ?></p>
            </div>
            <div class="contact-info">
                <h3>Contact Information:</h3>
                <p><i class="fas fa-location"></i> <?php echo $_SESSION['address']; ?></p>
                <p><i class="fas fa-phone"></i> <?php echo $_SESSION['phone-number']; ?></p>
                <p><i class="fas fa-envelope"></i> <?php echo $_SESSION['email']; ?></p>
            </div>
        </div>
    </div>
</body>
</html>