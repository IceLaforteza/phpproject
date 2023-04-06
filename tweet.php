<?php

// Create a connection to the database
require("db.php");


$servername = "localhost";
$username = "root";
$password = "root";

try {
    $conn = new PDO("mysql:host=$servername;dbname=twitter-clone-project", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


// Execute the query
$sql = "SELECT * FROM posts ORDER BY post_id DESC";
$stmt = $conn ->prepare($sql);
$stmt->execute();

if (true) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $post_text = $row['post_text'];
        $post_date = $row['post_date'];
        ?>

        <div class="tweet_box">
            <div class="tweet_links">
                <img src="Fotos/xxaw.PNG" alt="">
            </div>
            <div class="tweet_body">
                <div class="tweet_header">
                    <p class="tweet_name">hazey boy</p>
                    <p class="tweet_username">@bigweenerhaze</p>
                    <p class="tweet_datum"><?php echo $post_date = date('M d'); ?></p>
                </div>

                <p class="tweet_text"><?php echo $post_text; ?></p>

                <div class="tweet_icons">
                    <a href=""><i class="far fa-comment"></i></a>
                    <a href=""><i class="fa fa-reply"></i></a>
                    <a href=""><i class="far fa-heart"></i></a>
                    <a href=""><i class="fa fa-upload"></i></a>
                    <a href=""><i class="far fa-chart-bar"></i></a>
                </div>
            </div>


            <div class="tweet_del">
                <div class="dropdown">
                    <button class="dropbtn"><span class="fa fa-ellipsis-h"></span></button>
                    <div class="dropdown-content">
                        <a href="index.php?del=<?php echo $row['post_id']; ?>"><i class="far fa-trash-alt"></i><span>Verwijderen</span></a>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }
}

// Close the database connection
$conn = null;
?>
