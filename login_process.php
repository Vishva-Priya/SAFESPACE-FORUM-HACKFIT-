<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Anonymous login
    if (isset($_POST['anonymous'])) {
        $_SESSION['anon_id'] = 'anon_' . uniqid();
        header("Location: feed.php");
        exit();
    }

    // Normal login
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "Please fill in all fields.";
        header("Location: login.php");
        exit();
    }

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $stmt->close(); // <-- close BEFORE redirect
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;
            header("Location: home.php");
            exit();
        } else {
            $stmt->close(); // <-- close BEFORE redirect
            $_SESSION['error'] = "Invalid password.";
            header("Location: login.php");
            exit();
        }
    } else {
        $stmt->close(); // <-- close BEFORE redirect
        $_SESSION['error'] = "No account found with that username.";
        header("Location: login.php");
        exit();
    }
}
?>
