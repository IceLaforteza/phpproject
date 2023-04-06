
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registratie</title>
    <link rel="stylesheet" href="register.css"/>
</head>
<body>
<div class="loginBox">

    <img src="fotos/logo.png" class="logo">

    <h2>Sign in with Chirpify</h2>

    <button><img src="fotos/google.png">Sign in with Google</button>

    <button><img src="fotos/apple.png">Sign in with Apple</button>

    <hr>


    <span>Or</span>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');


require('db.php');
global $conn;

if (isset($_REQUEST['username'])) {
    $create_datetime = date("Y-m-d H:i:s");
    $query    = "INSERT into `users` (username, password, email, create_datetime)
                     VALUES (:username, :password, :email, :create_datetime)";

    $queryobject = $conn->prepare($query);
    $queryobject->execute(
            [
                    "username" => $_POST["username"],
                    "email" => $_POST["email"],
                    "create_datetime" => $create_datetime,
                    "password" => $_POST["password"]
            ]
    );

    $query    = "SELECT * FROM `users`";

    $queryobject = $conn->prepare($query);
    $queryobject->execute();


    $result = $queryobject->fetchAll(PDO::FETCH_ASSOC);
    //echo "<pre>".print_r($result, true)."</pre>";
  //  exit();
    if ($result) {
        echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.html'>Login</a></p>
                  </div>";
    } else {
        echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
    }
} else {
    ?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.html">Click to Login</a></p>
    </form>
    <?php
}
?>
</body>
</html><?php
