<?php
    session_start();
?>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["login-email"];
        $password = $_POST["login-password"];

        $conn = mysqli_connect('localhost', 'root', '', 'user_registration');

        if (mysqli_connect_error()) {
            echo 'MySQL Error: ' . mysqli_connect_error();
        }

        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $storedPassword = $row['password'];

            if (password_verify($password, $storedPassword)) {
                $_SESSION['email'] = $row['email'];
                $_SESSION['full-name'] = $row['firstname'] . ' ' . $row['lastname'];
                $_SESSION['phone-number'] = $row['phone_number'];
                $_SESSION['address'] = $row['city'] . ', ' . $row['region'];
                $_SESSION['birthday'] = $row['birthday'];
                $_SESSION['gender'] = $row['gender'];

                header("Location: display.php");
                exit;
            } else {
                $error[] = 'Invalid email or password.';
            }
        } else {
            $error[] = 'Invalid email or password.';
        }
        
        mysqli_close($conn);
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <script src="https://kit.fontawesome.com/20e1153877.js" crossorigin="anonymous"></script>
    <title>Sign In</title>
</head>
<body>
    <div class="box">
        <div class="container">

            <div class="top">
                <header>Sign In</header>
            </div>

            <form action="" method="post">
                <div class="input-field">
                    <?php
                        if (isset($_SESSION['error'])) {
                            echo '<span id="error">'.$_SESSION['error'].'</span>';
                            session_destroy();
                        }
                    ?>

                    <?php
                        if(isset($error)){
                            foreach($error as $error){
                                echo '<span id="error">'.$error.'</span>';
                            };
                        };
                    ?>
                    <input type="email" name="login-email" id="login-email" class="input" placeholder="Email" required onkeyup="validateLoginForm()">
                </div>
                <div class="input-field">
                    <span id="login-password-error error"></span>
                    <div class="password-container">
                        <input type="password" name="login-password" id="login-password" class="input" placeholder="Password" required onkeyup="validateLoginForm()">
                        <i class="password-toggle-icon fa-solid fa-eye" id="password-toggle"></i>
                    </div>
                </div>
                <div class="input-field">
                    <input type="submit" name="submit" id="submit" class="submit" value="Sign In">
                </div>
            </form>

            <div class="bottom">
                <span><a href="signup.php">Create an account.</a></span>
            </div>
            
        </div>
    </div>
    <script src="scripts/validation.js"></script>
    <script src="scripts/signinpasswordtoggle.js"></script>
</body>
</html>
