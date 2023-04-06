<?php
$servername = "localhost";
$username = "root";
$password = "root";

try {
<<<<<<< HEAD
    $conn = new PDO("mysql:host=$servername;dbname=inlogdatabase", $username, $password);
=======
    $conn = new PDO("mysql:host=$servername;dbname=twitter-clone-project", $username, $password);
>>>>>>> master
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>