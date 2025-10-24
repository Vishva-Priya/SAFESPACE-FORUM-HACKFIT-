<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>About Us | SafeSpace</title>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Open+Sans&display=swap" rel="stylesheet" />

<!-- Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" />

<style>
 * {
   margin: 0;
   padding: 0;
   box-sizing: border-box;
 }

 body {
   font-family: 'Poppins', sans-serif;
   background: #f9f9f9;
   color: #2e2f36;
   overflow-x: hidden;
   min-height: 100vh;
 }

/* Navbar minimized */
nav {
  background-color: #0ea8ea;
  color: white;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0.5rem 1.5rem;
  box-shadow: 0 3px 10px rgba(0,0,0,0.1);
  height: 100px;
}

nav h1 {
  font-size: 1.5rem;
  letter-spacing: 0.4px;
  color: white;
}

nav a {
  color: white;
  text-decoration: none;
  margin-left: 12px;
  font-weight: 500;
  font-size: 0.9rem;
  transition: opacity 0.2s;
}

nav a:hover {
  opacity: 0.8;
}

/* For smaller logos if any */
.logo {
  height: 45px;
  transition: transform 0.3s ease;
}

.about-container {
  max-width: 1000px;
margin: 80px auto 80px;
  padding: 0 20px;
  display: flex;
  flex-direction: column;
  gap: 40px;
}

/* Heading */
.about-header {
  text-align: center;
  margin-bottom: 10px;
}
.about-header h1 {
  font-size: 2.9rem;
  font-weight: 800;
  color: #1e6fc5;
  text-shadow: 1px 1px 5px rgba(30, 111, 197, 0.4);
}

/* Our Purpose - Full width rectangular */
.purpose-container {
  background: white;
  border-radius: 20px;
  box-shadow: 0 8px 30px rgba(0,0,0,0.1);
  padding: 32px 36px;
  border-top: 5px solid #1e6fc5;
}
.purpose-container h3 {
  color: #333;
  font-weight: 700;
  font-size: 1.7rem;
  margin-bottom: 20px;
  display: flex;
  align-items: center;
  gap: 14px;
}
.purpose-container h3 .bi {
  font-size: 1.8rem;
  color: #1e6fc5;
}
.purpose-container ul {
  list-style-type: disc;
  padding-left: 26px;
  color: #555;
  font-size: 1.1rem;
  line-height: 1.65;
}

/* Grid for Core Features and Core Beliefs */
.grid-container {
  display: grid;
  grid-template-columns: repeat(auto-fit,minmax(280px,1fr));
  gap: 35px;
}
.card {
  background: white;
  border-radius: 20px;
  box-shadow: 0 8px 30px rgba(0,0,0,0.1);
  padding: 28px 32px;
  border-top: 5px solid #1e6fc5;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.card:hover {
  transform: translateY(-6px);
  box-shadow: 0 14px 40px rgba(30, 111, 197, 0.2);
}
.card h3 {
  color: #333;
  font-weight: 700;
  margin-bottom: 14px;
  display: flex;
  align-items: center;
  gap: 12px;
  font-size: 1.4rem;
}
.card h3 .bi {
  font-size: 1.5rem;
  color: #1e6fc5;
}
.card p,
.card ul {
  font-size: 1rem;
  color: #555;
  line-height: 1.6;
}
.card ul {
  padding-left: 22px;
}

/* Separate containers below */
.single-container {
  background: white;
  border-radius: 20px;
  box-shadow: 0 8px 30px rgba(0,0,0,0.1);
  padding: 30px 34px;
  border-top: 5px solid #1e6fc5;
}
.single-container h3 {
  color: #333;
  font-weight: 700;
  margin-bottom: 15px;
  display: flex;
  align-items: center;
  gap: 12px;
  font-size: 1.5rem;
}
.single-container h3 .bi {
  font-size: 1.5rem;
  color: #1e6fc5;
}
.single-container p,
.single-container ul {
  font-size: 1rem;
  color: #555;
  line-height: 1.6;
  margin-top: 0.3rem;
}
.single-container ul {
  padding-left: 22px;
}

@media (max-width: 768px) {
  nav {
    flex-direction: column;
    align-items: flex-start;
    padding: 1rem 1.5rem;
  }
  .nav-links {
    margin-top: 8px;
    flex-wrap: wrap;
    gap: 1rem;
  }
  .nav-links a {
    font-size: 1.05rem;
  }
  .about-container {
    margin: 140px 15px 80px;
    gap: 30px;
  }
  .grid-container {
    grid-template-columns: 1fr;
    gap: 28px;
  }
}
</style>
</head>

<body>

<nav>
  <div class="nav-left">
    <img src="media/image1.jpeg" alt="SafeSpace logo" class="logo" />
  </div>
  <div class="nav-links" role="navigation" aria-label="Primary navigation">
    <a href="#" aria-current="page"><b>SafeSpace</b></a>
    <a href="home.php">Home</a>
    <a href="articles.php">Articles</a>
    <a href="forum1.php">Forum</a>
    <a href="feedback.php">Feedback & Contact</a>
    <a href="#" aria-disabled="true" tabindex="-1">AI Assistance</a>
  </div>
</nav>

<div class="about-container">

  <div class="about-header" tabindex="0">
    <h1>About Us — SafeSpace 🩵</h1>
  </div>

  <!-- Our Purpose full width container -->
  <section class="purpose-container" tabindex="0">
    <h3><i class="bi bi-lightbulb"></i> Our Purpose</h3>
    <ul>
      <li>Discuss personal, academic, or emotional struggles.</li>
      <li>Seek advice anonymously from peers and mentors.</li>
      <li>Share experiences & find emotional motivation.</li>
    </ul>
  </section>

  <!-- Grid: Core Features and Core Beliefs side by side -->
  <div class="grid-container" role="list">
    <section class="card" tabindex="0" role="listitem">
      <h3><i class="bi bi-gear"></i> Core Features</h3>
      <ul>
        <li><b>Anonymous Posting</b> with topic tags.</li>
        <li>Peer responses with empathy & advice.</li>
        <li>Reactions: 💬 I relate | 💡 Helpful | ❤ You’re not alone.</li>
        <li>AI moderation for a safe environment.</li>
        <li>Verified mentors & health resources.</li>
      </ul>
    </section>
    <section class="card" tabindex="0" role="listitem">
      <h3><i class="bi bi-heart"></i> Our Core Beliefs</h3>
      <ul>
        <li>Anonymity empowers honesty.</li>
        <li>Empathy creates healing.</li>
        <li>Every story matters.</li>
        <li>Together, we grow stronger.</li>
      </ul>
    </section>
  </div>

  <!-- Separate containers for Our Vision and Unique Value -->
  <section class="single-container" tabindex="0">
    <h3><i class="bi bi-eye"></i> Our Vision</h3>
    <p>Building a world where every student feels heard — emotional well-being valued alongside academic success.</p>
  </section>

  <section class="single-container" tabindex="0">
    <h3><i class="bi bi-stars"></i> Unique Value</h3>
    <ul>
      <li>Removes fear of identity exposure.</li>
      <li>Focuses on empathy over popularity.</li>
      <li>Encourages honest, healing conversations.</li>
      <li>Promotes understanding & emotional wellness.</li>
    </ul>
  </section>
</div>

<div class="message-box" tabindex="0" aria-label="Our message to users" style="background: linear-gradient(135deg, #1f17b579, #1b3c74ff); color: #fff; border-radius: 30px; padding: 50px 30px; box-shadow: 0 14px 44px rgba(0, 128, 128, 0.5); text-align: center; max-width: 800px; margin: 70px auto;">
  <h2>❤ Our Message to You</h2>
  <p>You’re not alone. Your feelings are valid. Your story deserves to be heard — even anonymously.</p>
  <p>Welcome to <b>SafeSpace</b>, a place to <i>speak freely, stay anonymous, and feel truly heard.</i></p>
</div>

</body>
</html>
