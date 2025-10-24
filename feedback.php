<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Feedback</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
  body {
    margin:0;
    font-family:'Poppins',sans-serif;
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
    background:linear-gradient(135deg,#f3e5f5,#e1f5fe);
  }

  section {
    background:white;
    padding:40px 25px;
    border-radius:20px;
    box-shadow:0 4px 25px rgba(0,0,0,0.08);
    max-width:500px;
    width:90%;
    text-align:left;
    transition:transform 0.3s ease;
  }

  section h2 {
    font-size:2rem;
    font-weight:600;
    color:#333;
    position:relative;
    display:inline-block;
    text-align:center;
    width:100%;
    margin-bottom:20px;
  }

  section h2::after {
    content:'';
    position:absolute;
    bottom:-10px;
    left:50%;
    width:80px;
    height:3px;
    background:#ff80ab;
    transform:translateX(-50%);
    border-radius:5px;
  }

  label {
    display:block;
    margin-top:15px;
    font-weight:500;
  }

  input[type=radio] {
    margin-right:5px;
    margin-left:10px;
  }

  textarea {
    width:100%;
    padding:10px;
    margin-top:5px;
    border-radius:10px;
    border:1px solid #ccc;
    font-size:1rem;
    resize:none;
  }

  button {
    width:100%;
    margin-top:20px;
    background:#ff80ab;
    color:white;
    border:none;
    padding:12px;
    border-radius:30px;
    font-size:1rem;
    cursor:pointer;
    box-shadow:0 4px 10px rgba(0,0,0,0.1);
    transition:0.3s;
  }

  button:hover {
    transform:scale(1.03);
  }

  #feedbackMessage {
    display:none;
    margin-top:15px;
    font-weight:500;
    text-align:center;
    padding:10px;
    border-radius:10px;
  }

  #feedbackMessage.error {
    background:#ffe0e0;
    color:#d32f2f;
  }

  #feedbackMessage.success {
    background:#e0ffe0;
    color:#388e3c;
  }
</style>
</head>
<body>

<section>
  <h2>App Feedback 💬</h2>

  <form id="feedbackForm">
    <!-- Question 1 -->
    <label>1. How easy is it to use the app?</label>
    <div>
      <input type="radio" name="q1" value="1">1
      <input type="radio" name="q1" value="2">2
      <input type="radio" name="q1" value="3">3
      <input type="radio" name="q1" value="4">4
      <input type="radio" name="q1" value="5">5
    </div>

    <!-- Question 2 -->
    <label>2. How helpful is the app content?</label>
    <div>
      <input type="radio" name="q2" value="1">1
      <input type="radio" name="q2" value="2">2
      <input type="radio" name="q2" value="3">3
      <input type="radio" name="q2" value="4">4
      <input type="radio" name="q2" value="5">5
    </div>

    <!-- Question 3 -->
    <label>3. How likely are you to recommend the app?</label>
    <div>
      <input type="radio" name="q3" value="1">1
      <input type="radio" name="q3" value="2">2
      <input type="radio" name="q3" value="3">3
      <input type="radio" name="q3" value="4">4
      <input type="radio" name="q3" value="5">5
    </div>

    <!-- Question 4 -->
    <label>4. How satisfied are you with the app?</label>
    <div>
      <input type="radio" name="q4" value="1">1
      <input type="radio" name="q4" value="2">2
      <input type="radio" name="q4" value="3">3
      <input type="radio" name="q4" value="4">4
      <input type="radio" name="q4" value="5">5
    </div>

    <!-- Question 5 -->
    <label>5. Overall experience?</label>
    <div>
      <input type="radio" name="q5" value="1">1
      <input type="radio" name="q5" value="2">2
      <input type="radio" name="q5" value="3">3
      <input type="radio" name="q5" value="4">4
      <input type="radio" name="q5" value="5">5
    </div>

    <!-- Optional comments -->
    <label>Additional Comments:</label>
    <textarea id="comments" placeholder="Write your feedback..."></textarea>

    <button type="button" onclick="submitFeedback()">Submit Feedback</button>
  </form>

  <div id="feedbackMessage"></div>
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

  if(!q1 || !q2 || !q3 || !q4 || !q5){
    msg.className = 'error';
    msg.textContent = '❌ Please answer all questions before submitting.';
    msg.style.display = 'block';
    return;
  }

  // Save or send data via PHP/AJAX if needed
  console.log("Feedback Submitted:", {q1,q2,q3,q4,q5,comments});

  // Clear form and show success message
  form.reset();
  form.style.display = 'none';
  msg.className = 'success';
  msg.textContent = '💖 Thank you! Your feedback has been submitted.';
  msg.style.display = 'block';
}
</script>

</body>
</html>
