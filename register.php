<?php
session_start();
include 'db.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $dob = $_POST['dob'];
    $gender = $_POST['gender'] ?? '';
    $country = trim($_POST['country']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    if (empty($username) || empty($dob) || empty($gender) || empty($country) || empty($password) || empty($confirm)) {
        $error = "Please fill in all fields.";
    } elseif ($password !== $confirm) {
        $error = "Passwords do not match.";
    } else {
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $error = "Username already taken.";
        } else {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt_insert = $conn->prepare("INSERT INTO users (username, dob, gender, country, password) VALUES (?, ?, ?, ?, ?)");
            $stmt_insert->bind_param("sssss", $username, $dob, $gender, $country, $hashed);

            if ($stmt_insert->execute()) {
                // Redirect to login page after 2 seconds
                $success = "Account created successfully. Redirecting to login page...";
                header("Refresh:2; url=login.php");
            } else {
                $error = "Something went wrong. Please try again.";
            }
            $stmt_insert->close();
        }
        $stmt->close();
    }
}

$countries = [
    "United States", "India", "Canada", "Australia", "United Kingdom",
    "Germany", "France", "Brazil", "Japan", "China",
    "South Korea", "Mexico", "Italy", "Spain", "Russia",
    "South Africa", "New Zealand", "Argentina", "Netherlands", "Sweden"
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>SafeSpaceSignup</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
<style>
   body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #fce4ec, #e1bee7);
    height: 100vh;
    margin: 0;
    display: flex;
    align-items: center;  /* Vertical centering */
    justify-content: center; /* Horizontal centering */
    min-height: 100vh;   /* Ensure it fills viewport height */
}


   .register-card {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    padding: 40px 35px;
    width: 400px;
    max-width: 100%;
    max-height: 90vh;   /* important! */
    overflow-y: auto;   /* allow scrolling if too tall */
    text-align: center;
    backdrop-filter: blur(15px);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}



    .register-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.25);
    }

    h2 {
        color: #6a1b9a;
        margin-bottom: 30px;
        font-weight: 600;
        font-size: 26px;
    }

    input[type="text"],
    input[type="date"],
    input[type="password"],
    select {
        width: 100%;
        padding: 12px;
        margin: 10px 0 20px 0;
        border: 1px solid #ccc;
        border-radius: 12px;
        font-size: 15px;
        box-sizing: border-box;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    input:focus, select:focus {
        border-color: #6a1b9a;
        box-shadow: 0 0 8px rgba(106, 27, 154, 0.2);
        outline: none;
    }

    button {
        width: 100%;
        padding: 14px;
        margin-top: 10px;
        border: none;
        border-radius: 12px;
        background-color: #8e24aa;
        color: white;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    button:hover {
        background-color: #6a1b9a;
        transform: scale(1.05);
    }

    a {
        display: block;
        margin-top: 15px;
        color: #6a1b9a;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
    }

    a:hover {
        text-decoration: underline;
    }

    .error {
        color: #d32f2f;
        margin-bottom: 15px;
        font-weight: 600;
    }

    .success {
        color: #388e3c;
        margin-bottom: 15px;
        font-weight: 600;
    }

    .gender-group {
        margin-bottom: 20px;
        display: flex;
        justify-content: center;
        gap: 40px;
    }

    .gender-option {
        display: flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
        font-weight: 500;
        color: #6a1b9a;
        font-size: 15px;
        user-select: none;
    }

    .gender-option input[type="radio"] {
        display: none;
    }

    .checkmark {
        width: 22px;
        height: 22px;
        border-radius: 50%;
        border: 2px solid #8e24aa;
        display: inline-block;
        position: relative;
        transition: all 0.3s ease;
    }

    .gender-option input:checked + .checkmark {
        background-color: #8e24aa;
    }

    .checkmark::after {
        content: '';
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: white;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(0);
        transition: transform 0.2s ease;
    }

    .gender-option input:checked + .checkmark::after {
        transform: translate(-50%, -50%) scale(1);
    }
</style>
</head>
<body>
<div class="register-card">
    <h2>SafeSpace Signup</h2>

    <?php if ($error): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <?php if ($success): ?>
        <p class="success"><?php echo $success; ?></p>
    <?php endif; ?>

    <form method="POST" action="">
    <!-- Username -->
    <p style="font-weight:600; color:#6a1b9a; margin-bottom:5px; text-align:left;">Username</p>
    <input type="text" name="username" placeholder="Enter your username" 
        value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>" 
        required autofocus />

    <!-- Date of Birth -->
    <p style="font-weight:600; color:#6a1b9a; margin-bottom:5px; text-align:left;">Date of Birth</p>
    <input type="date" name="dob" 
        value="<?php echo isset($dob) ? htmlspecialchars($dob) : ''; ?>" 
        required />

    <!-- Gender -->
    <p style="font-weight:600; color:#6a1b9a; margin-bottom:8px; text-align:left;">Select Gender</p>
    <div class="gender-group">
        <label class="gender-option">
            <input type="radio" name="gender" value="Male" <?php if (isset($gender) && $gender === 'Male') echo 'checked'; ?> required />
            <span class="checkmark"></span> Male
        </label>
        <label class="gender-option">
            <input type="radio" name="gender" value="Female" <?php if (isset($gender) && $gender === 'Female') echo 'checked'; ?> />
            <span class="checkmark"></span> Female
        </label>
    </div>

    <!-- Country -->
    <p style="font-weight:600; color:#6a1b9a; margin-bottom:5px; text-align:left;">Country</p>
    <select name="country" required>
        <option value="">Select Country</option>
        <?php foreach ($countries as $c): ?>
            <option value="<?php echo $c; ?>" <?php echo (isset($country) && $country === $c) ? 'selected' : ''; ?> >
                <?php echo $c; ?>
            </option>
        <?php endforeach; ?>
    </select>

    <!-- Password -->
    <p style="font-weight:600; color:#6a1b9a; margin-bottom:5px; text-align:left;">Password</p>
    <input type="password" name="password" placeholder="Enter your password" required />

    <!-- Confirm Password -->
    <p style="font-weight:600; color:#6a1b9a; margin-bottom:5px; text-align:left;">Confirm Password</p>
    <input type="password" name="confirm_password" placeholder="Re-enter your password" required />

    <button type="submit">Sign Up</button>
</form>


    <a href="login.php">Already have an account? Login here.</a>
</div>
</body>
</html>
