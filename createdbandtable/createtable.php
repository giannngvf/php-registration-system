<?php
    // Open the xampp and run the apache and mysql. After that, paste the link below to create your table:
    // Note: You can change the name of the table to whatever you want
    // http://127.0.0.1/php-session/createdbandtable/createtable.php
    $conn = mysqli_connect('localhost', 'root', '', 'user_registration');

    if (mysqli_connect_error()) {
        echo 'MySQL Error: ' . mysqli_connect_error();
    } else {
        $query = 'CREATE TABLE users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(50) NOT NULL,
            lastname VARCHAR(50) NOT NULL,
            email VARCHAR(100) NOT NULL UNIQUE,
            phone_number VARCHAR(11) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            region VARCHAR(100) NOT NULL,
            city VARCHAR(100) NOT NULL,
            birthday DATE,
            gender ENUM("Male", "Female"),
            registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )';

        if (mysqli_query($conn, $query)) {
            echo 'Table created successfully.';
        } else {
            echo 'MySQL Error: Table not created!';
        }
    }
?>