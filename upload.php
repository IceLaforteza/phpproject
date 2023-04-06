<?php
// Include the database connection code
include('db.php');

// Check if a user ID is specified in the URL
if (isset($_GET['user_id'])) {
    // Sanitize the user ID input
    // Retrieve user_id from the URL query string
    $user_id = filter_input(INPUT_GET, 'user_id', FILTER_SANITIZE_NUMBER_INT);

// Perform file upload handling here...

// Redirect back to the user's profile page after the upload is complete
    header("Location: profile.php?user_id=$user_id");
    exit;


    // Query the user data from the database
    $stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
    $stmt->execute([$user_id]);
    $user = $stmt->fetch();

    if ($user) {
        // User data found, process the image upload
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Check if a file was uploaded
            if (isset($_FILES['fileToUpload'])) {
                // Define the target directory and file path
                $target_dir = 'uploads/';
                $target_file = $target_dir . basename($_FILES['fileToUpload']['name']);

                // Check if the file is an image
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
                if (!in_array($imageFileType, $allowed_extensions)) {
                    echo 'Only JPG, JPEG, PNG, and GIF files are allowed.';
                    exit;
                }

                // Check if the file already exists
                if (file_exists($target_file)) {
                    echo 'Sorry, file already exists.';
                    exit;
                }

                // Check if the file size is within the allowed limit
                $max_file_size = 500000;
                if ($_FILES['fileToUpload']['size'] > $max_file_size) {
                    echo 'Sorry, your file is too large.';
                    exit;
                }

                // Upload the file
                if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
                    // Update the user's profile picture in the database
                    $stmt = $pdo->prepare('UPDATE users SET profile_picture = ? WHERE id = ?');
                    $stmt->execute([$target_file, $user_id]);

                    // Redirect to the profile page
                    header("Location: profile.php?user_id=$user_id");
                    exit;
                } else {
                    echo 'Sorry, there was an error uploading your file.';
                    exit;
                }
            }
        }
    } else {
        // User not found, display an error message
        echo 'User not found.';
        exit;
    }
} else {
    // No user ID specified in the URL, redirect to the home page
    header('Location: index.php');
    exit;
}
?>
