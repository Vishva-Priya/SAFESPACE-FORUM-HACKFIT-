<?php
// db.php - Simple array to simulate a database for storing posts
// In a real application, you would connect to MySQL/PostgreSQL here.

session_start();

// Initialize the array if it doesn't exist in the session
if (!isset($_SESSION['posts'])) {
    $_SESSION['posts'] = [
        [
            'title' => 'Feeling overwhelmed by exams',
            'content' => 'I just can\'t seem to focus. The pressure is getting to me. Has anyone else felt this way?',
            'user_anon_id' => 'Anon-Sun-101',
            'tag' => 'Academics'
        ],
        [
            'title' => 'Need advice on making new friends',
            'content' => 'I\'m new here and feeling isolated. What\'s the best way to meet people on campus?',
            'user_anon_id' => 'Anon-Star-25',
            'tag' => 'Relationships'
        ]
    ];
}

$posts = $_SESSION['posts'];

// Function to add a new post (used by post.php)
function add_post($title, $content, $tag) {
    // Generate a simple, non-traceable anonymous ID
    $anon_names = ['Moon', 'Star', 'Cloud', 'Pine', 'River', 'Sun', 'Wave', 'Rock'];
    $random_name = $anon_names[array_rand($anon_names)];
    $random_number = rand(100, 999);
    $anon_id = "Anon-{$random_name}-{$random_number}";

    $new_post = [
        'title' => htmlspecialchars($title),
        'content' => htmlspecialchars($content),
        'user_anon_id' => $anon_id,
        'tag' => htmlspecialchars($tag)
    ];

    $_SESSION['posts'][] = $new_post;
}
?>