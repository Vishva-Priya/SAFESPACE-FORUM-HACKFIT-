<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Feedback</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
  /* Reset default styles */
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

body {
  font-family: 'Poppins', sans-serif;
  background: url('media/feedback.jpeg') no-repeat center center fixed;
  background-size: cover;
  overflow-x: hidden;
  min-height: 50vh; /* ensures full height for the image */
}


  /* -------------------- NAVBAR -------------------- */
  nav {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background-color: #0ea8ea;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.75rem 2rem;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    z-index: 1000;
  }

  .nav-left {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .logo {
    height: 55px;
    width: auto;
  }

  nav h1 {
    font-size: 1.5rem;
    font-weight: 600;
    margin: 0;
    white-space: nowrap;
  }

  .nav-links {
    display: flex;
    align-items: center;
  }

  .nav-links a {
    color: white;
    text-decoration: none;
    margin-left: 1.25rem;
    font-weight: 500;
    font-size: 1rem;
    white-space: nowrap;
    transition: opacity 0.25s ease;
  }

  .nav-links a:hover {
    opacity: 0.8;
  }

  /* -------------------- FEEDBACK CONTAINER -------------------- */
  section {
    background: white;
    padding: 40px 25px;
    border-radius: 20px;
    box-shadow: 0 4px 25px rgba(0, 0, 0, 0.08);
    max-width: 500px;
    width: 90%;
    margin: 120px auto 50px; /* pushes it below navbar */
    text-align: left;
    transition: transform 0.3s ease;
  }

  section h2 {
    font-size: 2rem;
    font-weight: 600;
    color: #333;
    text-align: center;
    margin-bottom: 20px;
    position: relative;
  }

  section h2::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    width: 80px;
    height: 3px;
    background: #ff80ab;
    transform: translateX(-50%);
    border-radius: 5px;
  }

  label {
    display: block;
    margin-top: 15px;
    font-weight: 500;
  }

  input[type=radio] {
    margin-right: 5px;
    margin-left: 10px;
  }

  textarea {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border-radius: 10px;
    border: 1px solid #ccc;
    font-size: 1rem;
    resize: none;
  }

  button {
    width: 100%;
    margin-top: 20px;
    background: #ff80ab;
    color: white;
    border: none;
    padding: 12px;
    border-radius: 30px;
    font-size: 1rem;
    cursor: pointer;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s;
  }

  button:hover {
    transform: scale(1.03);
  }

  #feedbackMessage {
    display: none;
    margin-top: 15px;
    font-weight: 500;
    text-align: center;
    padding: 10px;
    border-radius: 10px;
  }

  #feedbackMessage.error {
    background: #ffe0e0;
    color: #d32f2f;
  }

  #feedbackMessage.success {
    background: #e0ffe0;
    color: #388e3c;
  }

  @media (max-width: 768px) {
    nav {
      flex-direction: column;
      text-align: center;
      padding: 1rem;
    }

    .nav-links {
      margin-top: 10px;
      flex-wrap: wrap;
      justify-content: center;
    }

    .nav-links a {
      margin: 5px 10px;
    }

    section {
      margin-top: 130px;
    }
  }
</style>
</head>
<body>

<!-- Navbar -->
<nav>
  <div class="nav-left">
    <img src="media/image1.jpeg" alt="SafeSpace Logo" class="logo">
  </div>
  <div class="nav-links">
    <a><b>SafeSpace</b></a>
    <a href="home.php">Home</a>
    <a href="articles.php">Articles</a>
    <a href="forum1.php">Forum</a>
    <a href="feedback.php">Feedback & Contact</a>
    <a href="bookpeer.php">Private chat</a>
  </div>
</nav>

<!-- Feedback Section -->
<section>
  <h2>App Feedback 💬</h2>

  <form id="feedbackForm">
    <label>1. How easy is it to use the app?</label>
    <div>
      <input type="radio" name="q1" value="1">1
      <input type="radio" name="q1" value="2">2
      <input type="radio" name="q1" value="3">3
      <input type="radio" name="q1" value="4">4
      <input type="radio" name="q1" value="5">5
    </div>

    <label>2. How helpful is the app content?</label>
    <div>
      <input type="radio" name="q2" value="1">1
      <input type="radio" name="q2" value="2">2
      <input type="radio" name="q2" value="3">3
      <input type="radio" name="q2" value="4">4
      <input type="radio" name="q2" value="5">5
    </div>

    <label>3. How likely are you to recommend the app?</label>
    <div>
      <input type="radio" name="q3" value="1">1
      <input type="radio" name="q3" value="2">2
      <input type="radio" name="q3" value="3">3
      <input type="radio" name="q3" value="4">4
      <input type="radio" name="q3" value="5">5
    </div>

    <label>4. How satisfied are you with the app?</label>
    <div>
      <input type="radio" name="q4" value="1">1
      <input type="radio" name="q4" value="2">2
      <input type="radio" name="q4" value="3">3
      <input type="radio" name="q4" value="4">4
      <input type="radio" name="q4" value="5">5
    </div>

    <label>5. Overall experience?</label>
    <div>
      <input type="radio" name="q5" value="1">1
      <input type="radio" name="q5" value="2">2
      <input type="radio" name="q5" value="3">3
      <input type="radio" name="q5" value="4">4
      <input type="radio" name="q5" value="5">5
    </div>

    <label>Additional Comments:</label>
    <textarea id="comments" placeholder="Write your feedback..."></textarea>

    <button type="button" onclick="submitFeedback()">Submit Feedback</button>
  </form>
  


  <div id="feedbackMessage"></div>
  <div id="okButtonContainer" style="text-align:center; display:none; margin-top:15px;">
  <button id="okButton" style="
    background:#ff80ab;
    color:white;
    border:none;
    padding:8px 25px;
    border-radius:25px;
    cursor:pointer;
    font-weight:500;
    font-size:0.95rem;
    width:auto;
    box-shadow:0 3px 8px rgba(0,0,0,0.1);
    transition:background 0.3s ease, transform 0.2s ease;
  ">OK</button>
</div>
</section>


<script>
function submitFeedback(){
  const form = document.getElementById('feedbackForm');
  const q1 = form.q1.value;
  const q2 = form.q2.value;
  const q3 = form.q3.value;
  const q4 = form.q4.value;
  const q5 = form.q5.value;
  const comments = document.getElementById('comments').value.trim();
  const msg = document.getElementById('feedbackMessage');
  const okButtonContainer = document.getElementById('okButtonContainer');

  // Validation
  if(!q1 || !q2 || !q3 || !q4 || !q5){
    msg.className = 'error';
    msg.textContent = '❌ Please answer all questions before submitting.';
    msg.style.display = 'block';
    okButtonContainer.style.display = 'none';
    return;
  }

  // (Optional) Send feedback data via PHP/AJAX here
  console.log("Feedback Submitted:", {q1,q2,q3,q4,q5,comments});

  // Show success message
  form.reset();
  form.style.display = 'none';
  msg.className = 'success';
  msg.textContent = '💖 Thank you! Your feedback has been submitted.';
  msg.style.display = 'block';

  // Show the OK button below message
  okButtonContainer.style.display = 'block';

  // Redirect on click
  document.getElementById('okButton').onclick = () => {
    window.location.href = 'home.php';
  };
}
</script>


</body>
</html>
