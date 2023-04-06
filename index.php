<?php require_once "header.php"; ?>


<body>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "twitter-clone-project";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if (isset($_POST['btn_add_post'])) {
    $post_text = $_POST['post_text'];

    if (!empty($post_text)) {
        $sql = "INSERT INTO posts (post_text, post_date) VALUES (:post_text, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':post_text', $post_text);

        if ($stmt->execute()) {
            // Post was successfully added to the database
            header("Location: index.php"); // Redirect to homepage or wherever you want to go
            exit();
        } else {
            // There was an error adding the post
            $error_msg = "There was an error adding your post. Please try again.";
        }
    } else {
        $error_msg = "Please enter some text for your post.";
    }
}
?>



<div class="grid-container">
    <?php require_once "links-sidebar.php"; ?>
    <div class="main">
        <p class="page_title">Home</p>

        <div class="tweet_box tweet_add">
            <div class="tweet_links">
                <img src="Fotos/wp4915566.jpg" alt="">
            </div>


            <div class="tweet_lichaam">
                <form method="post" enctype="multipart/form-data">
                    <textarea name="post_text" id="" cols="100%" rows="3" placeholder="Wat is er gebeurd?"></textarea>

                    <div class="tweet_icons-wrapper">
                        <div class="tweet_icons-add">
                            <i class="far fa-image"></i>
                            <i class="fa fa-chart-bar"></i>
                            <i class="far fa-smile"></i>
                            <i class="far fa-calendar-alt"></i>
                        </div>

                        <button class="button_tweet" type="submit" name="btn_add_post">Tweet</button>
                    </div>
                </form>
            </div>

        </div>

        <?php require_once "tweet.php"; ?>
    </div>
    <?php require_once "rechts-sidebar.php"; ?>
</div>


<?php
if(isset($_GET['del']))
{
    $Del_ID = $_GET['del'];
    $sql = "DELETE FROM posts WHERE post_id=?";
    $stmt =$conn->prepare($sql);
    $stmt->execute([$Del_ID]);

    if ($stmt->rowCount() > 0)
    {
        header("location: index.php");
        exit(); // Add exit() after the header to prevent further execution of the code
    }
}
?>


