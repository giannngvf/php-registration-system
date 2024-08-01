<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = $_POST["register-firstname"];
        $lastname = $_POST["register-lastname"];
        $email = $_POST["register-email"];
        $number = $_POST["register-number"];
        $password = $_POST["register-password"];
        $region = $_POST["register-region"];
        $city = $_POST["register-city"];
        $birthday = $_POST["register-birthday"];
        $gender = $_POST["register-gender"];

        $conn = mysqli_connect('localhost', 'root', '', 'user_registration');

        if (mysqli_connect_error()) {
            echo 'MySQL Error: ' . mysqli_connect_error();
        } else {
            $emailExistsQuery = "SELECT email FROM users WHERE email = '$email'";
            $numberExistsQuery = "SELECT phone_number FROM users WHERE phone_number = '$number'";
            
            $emailResult = mysqli_query($conn, $emailExistsQuery);
            $numberResult = mysqli_query($conn, $numberExistsQuery);

            if (mysqli_num_rows($emailResult) > 0) {
                $error[] = 'Email already exists.';
            } elseif (mysqli_num_rows($numberResult) > 0) {
                $error[] = 'Phone number already exists.';
            } else {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                $query = "INSERT INTO users (firstname, lastname, email, phone_number, password, region, city, birthday, gender) VALUES ('$firstname', '$lastname', '$email', '$number', '$hashedPassword', '$region', '$city', '$birthday', '$gender')";

                if (mysqli_query($conn, $query)) {
                    header("Location: signin.php");
                    exit();
                } else {
                    $error[] = "There's an error registering your account.";
                }
            }
            mysqli_close($conn);
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <script src="https://kit.fontawesome.com/20e1153877.js" crossorigin="anonymous"></script>
    <title>Sign Up</title>
</head>
<body>
    <div class="box">
        <div class="container">
            <div class="top">
                <header>Sign Up</header>
            </div>

            <form action="" method="post">
                <div class="input-field">
                    <?php
                        if(isset($error)){
                            foreach($error as $error){
                                echo '<span id="error">'.$error.'</span>';
                            };
                        };
                    ?>
                    <span id="full-name-error" class="error"></span>
                    <div class="two-input">
                        <input type="text" name="register-firstname" id="register-firstname" class="input" placeholder="First name" required onkeyup="validateName()">
                        <input type="text" name="register-lastname" id="register-lastname" class="input" placeholder="Last name" required onkeyup="validateName()">
                    </div>
                </div>
                <div class="input-field">
                    <span id="register-email-error" class="error"></span>
                    <input type="email" name="register-email" id="register-email" class="input" placeholder="Email" required onkeyup="validateEmail()">
                </div>
                <div class="input-field">
                    <span id="register-number-error" class="error"></span>
                    <input type="text" name="register-number" id="register-number" class="input" placeholder="Phone Number" maxlength="11" pattern="\d{11}" required onkeyup="validateNumber()">
                </div>
                <div class="input-field">
                    <span id="register-password-error" class="error"></span>
                    <div class="password-container">
                        <input type="password" name="register-password" id="register-password" class="input" placeholder="Password" required onkeyup="validatePassword()">
                        <i class="password-toggle-icon fa-solid fa-eye" id="password-toggle"></i>
                    </div>
                </div>
                <div class="input-field">
                    <span id="location-error" class="error"></span>
                    <div class="two-input">
                        <input type="text" name="register-region" id="register-region" class="input" placeholder="Region" required onkeyup="validateLocation()">
                        <input type="text" name="register-city" id="register-city" class="input" placeholder="City" required onkeyup="validateLocation()">
                    </div>
                </div>
                <div class="input-field">
                    <span id="register-birthday-error" class="error"></span>
                    <div class="two-field input">
                        <div class="field"><label for="register-birthday">Birthday:</label></div>
                        <div class="field"><input type="date" name="register-birthday" id="register-birthday" class="date-input" required onkeyup="validateBirthday()"></div>
                    </div>
                </div>
                <div class="input-field">
                    <span id="register-gender-error" class="error"></span>
                    <div class="two-field input">
                        <div class="field"><label>Gender:</label></div>
                        <div class="two-input-field">
                            <label for="male">Male</label>
                            <input type="radio" id="male" name="register-gender" value="Male" onchange="validateGender()" required>
                            <label for="female">Female</label>
                            <input type="radio" id="female" name="register-gender" value="Female" onchange="validateGender()" required>
                        </div>
                    </div>
                </div>
                <div class="input-field">
                    <input type="submit" name="submit" id="submit" class="submit" value="Sign Up">
                </div>
            </form>

            <div class="bottom">
                <span><a href="signin.php">Already have an account? Sign In.</a></span>
            </div>
        </div>
    </div>
    <script src="scripts/validation.js"></script>
    <script src="scripts/signuppasswordtoggle.js"></script>
</body>
</html>