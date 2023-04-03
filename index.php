<?php require_once "header.php"; ?>


<body>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

if(isset($_POST['btn_add_post']))
{
    $Post_Text = $_POST['post_text'];

    if ($Post_Text != ""){

        $sql = "INSERT INTO posts (post_text,post_date) VALUES('$Post_Text', now())";
    $result = mysqli_query($con,$sql);
    }
}
?>

<div class="grid-container">
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
</div>

<?php require_once "rechts-sidebar.php"; ?>

<?php
if(isset($_GET['del']))
{
    $Del_ID = $_GET['del'];
    $sql = "DELETE FROM posts WHERE post_id='$Del_ID'";
    $post_query = mysqli_query($con,$sql);

    if ($post_query)
    {
        header("location: index.php");
        exit(); // Add exit() after the header to prevent further execution of the code
    }
}
