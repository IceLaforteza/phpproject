<?php
<<<<<<< Updated upstream
// Include the database connection code
include('db.php');

// Check if a user ID is specified in the URL
if (isset($_GET['user_id'])) {
    // Sanitize the user ID input
    $user_id = filter_input(INPUT_GET, 'user_id', FILTER_SANITIZE_NUMBER_INT);

    // Query the user data from the database
=======
include('db.php');

if (isset($_GET['user_id'])) {
    $user_id = filter_input(INPUT_GET, 'user_id', FILTER_SANITIZE_NUMBER_INT);

>>>>>>> Stashed changes
    $stmt = $pdo->prepare('SELECT * FROM users WHERE id = 1');
    $stmt->execute([$user_id]);
    $user = $stmt->fetch();

    if ($user) {
<<<<<<< Updated upstream
        // User data found, display the profile page
=======
>>>>>>> Stashed changes
        $username = $user['username'];
        $bio = $user['bio'];
        $email = $user['email'];
        $profile_picture = $user['profile_picture'];

<<<<<<< Updated upstream
        // Query the user's tweets from the database
=======
>>>>>>> Stashed changes
        $stmt = $pdo->prepare('SELECT * FROM tweets WHERE user_id = ? ORDER BY created_at DESC');
        $stmt->execute([$user_id]);
        $tweets = $stmt->fetchAll();
    } else {
<<<<<<< Updated upstream
        // User not found, display an error message
=======

>>>>>>> Stashed changes
        echo 'User not found.';
        exit;
    }
} else {
<<<<<<< Updated upstream
    // No user ID specified in the URL, redirect to the home page
=======

>>>>>>> Stashed changes
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $username; ?></title>
    <link rel="stylesheet" href="profilepage.css">
</head>
<body>
<div class="profile-header">
    <div class="profile-picture">
        <img src="<?php echo $profile_picture; ?>" alt="Profile Picture">
        <form action="upload.php?user_id=<?php echo $user_id; ?>" method="post" enctype="multipart/form-data">
<<<<<<< Updated upstream
        <input type="file" name="fileToUpload" id="fileToUpload">
=======
            <input type="file" name="fileToUpload" id="fileToUpload">
>>>>>>> Stashed changes
            <input type="submit" value="Upload Image" name="submit">
        </form>
    </div>
    <h1><?php echo $username; ?></h1>
    <p><?php echo $bio; ?></p>
    <p><?php echo $email; ?></p>
</div>

<div class="tweets">
    <?php if (count($tweets) > 0) { ?>
        <?php foreach ($tweets as $tweet) { ?>
            <div class="tweet">
                <p><?php echo $tweet['content']; ?></p>
                <span><?php echo $tweet['created_at']; ?></span>
            </div>
        <?php } ?>
    <?php } else { ?>
        <p>No tweets found.</p>
    <?php } ?>
</div>
</body>
</html>

<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
