<?php
    // Open the xampp and run the apache and mysql. After that, paste the link below to create your database:
    // Note: You can change the name of the database to whatever you want
    // http://127.0.0.1/php-session/createdbandtable/createdb.php
    $conn = mysqli_connect('localhost','root');
    if(mysqli_connect_error()) {
        echo 'MySQL Error: ' . mysqli_connect_error();
    }
    else {
        $query = 'CREATE DATABASE user_registration';
        if(mysqli_query($conn, $query)) {
            echo 'Database created successfully.';
        }
        else {
            echo 'MySQL Error: Database not created!';
        }
    }
?>