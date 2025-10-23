<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | SafeSpace</title>

  <style>
    /* ===== RESET ===== */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body, html {
      height: 100%;
      overflow: hidden;
    }

    /* ===== HERO-LIKE BACKGROUND VIDEO ===== */
    .login-hero {
      position: relative;
      width: 100%;
      height: 100vh;
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
      border-bottom-left-radius: 40px;
      border-bottom-right-radius: 40px;
    }

    .login-hero video {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: 0;
      border-bottom-left-radius: 40px;
      border-bottom-right-radius: 40px;
    }

    .login-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(255, 255, 255, 0.68);
      z-index: 1;
    }

    /* ===== LOGIN CONTENT (like hero text) ===== */
    .login-content {
      position: relative;
      z-index: 2;
      text-align: center;
      background: rgba(255, 255, 255, 0.85);
      padding: 40px 35px;
      border-radius: 25px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.15);
      max-width: 380px;
      width: 90%;
      backdrop-filter: blur(8px);
      animation: fadeInUp 1s ease;
    }

    .login-content h1 {
      font-size: 2.2rem;
      font-weight: 700;
      color: #9575cd;
      margin-bottom: 15px;
    }

    .login-content p {
      font-size: 1rem;
      color: #4f4f4f;
      margin-bottom: 25px;
    }

    /* ===== INPUTS ===== */
    form input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 10px;
      font-size: 1rem;
      outline: none;
      transition: all 0.3s ease;
    }

    form input:focus {
      border-color: #e85353ff;
      box-shadow: 0 0 5px rgba(232, 83, 83, 0.4);
    }

    /* ===== BUTTON ===== */
    .btn-main {
      display: inline-block;
      background: #9575cd;
      color: #fff;
      border: none;
      border-radius: 25px;
      padding: 12px 25px;
      font-size: 1.1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      width: 100%;
      margin-top: 10px;
    }

    .btn-main:hover {
      background-color: #c43f3f;
      transform: scale(1.05);
    }

    /* ===== SIGNUP LINK ===== */
    .signup-link {
      display: block;
      margin-top: 15px;
      font-size: 0.95rem;
      color: #3C473B;
      text-decoration: none;
    }

    .signup-text {
      color: #e85353ff;
      font-weight: 600;
    }

    .signup-link:hover .signup-text {
      text-decoration: underline;
    }

    /* ===== ERROR MESSAGE ===== */
    .error {
      color: #e85353ff;
      font-weight: 500;
      background: rgba(232, 83, 83, 0.1);
      border-radius: 8px;
      padding: 10px;
      margin-bottom: 10px;
    }

    /* ===== ANIMATIONS ===== */
    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(25px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
      .login-content {
        padding: 30px 20px;
      }
      .login-content h1 {
        font-size: 1.8rem;
      }
    }
  </style>
</head>

<body>

  <section class="login-hero">
    <video autoplay muted loop playsinline>
      <source src="media/video2.mp4" type="video/mp4">
      Your browser does not support HTML5 video.
    </video>

    <div class="login-overlay"></div>

    <div class="login-content">
      <h1>Welcome to SafeSpace</h1>
      <p>Speak Freely. Stay Anonymous. Feel Heard.</p>

      <?php
        session_start();
        if (isset($_SESSION['error'])) {
            echo "<p class='error'>" . $_SESSION['error'] . "</p>";
            unset($_SESSION['error']);
        }
      ?>

      <form method="POST" action="login_process.php">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" class="btn-main" name="login">Login</button>
      </form>

      <a href="register.php" class="signup-link">
        Don’t have an account? <span class="signup-text">Sign up here</span>
      </a>
    </div>
  </section>

</body>
</html>
