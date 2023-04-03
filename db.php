<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

try {
    $conn = new PDO("mysql:host=$servername;dbname=inlogdatabase", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>