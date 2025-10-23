<?php
// post.php - Handles anonymous post submission

include 'db1.php'; // Include the simulated database/session handler

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['post_title']);
    $content = trim($_POST['post_content']);
    $tag = trim($_POST['post_tag']);

    // Basic validation
    if (!empty($title) && !empty($content)) {
        add_post($title, $content, $tag);
    }
}

// Redirect back to the main page to show the updated list
header("Location: index.php");
exit;
?>