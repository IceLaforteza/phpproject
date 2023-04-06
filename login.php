<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
include("db.php");

$username = $_POST["username"];
$password = $_POST["password"];

$stmt = $conn->prepare("SELECT * FROM users WHERE username=:un AND password=:pw");

$stmt->execute([":un"=>$username, ":pw"=>$password]);

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(Isset($data[0]["id"])){
    $_SESSION["ingelogdALS"] = $data[0]["id"];
} else {
    echo "Gebruikersnaam of wachtwoord onbekend";
}

if(isset($data [0]["id"])){
    header("location:https://www.youtube.com/");
}
