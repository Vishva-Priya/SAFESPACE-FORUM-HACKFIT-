<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AnonConnect Feedback</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Open+Sans&display=swap" rel="stylesheet">
<style>
  body {
    font-family:'Poppins',sans-serif;
    background:linear-gradient(135deg,#e3f2fd,#fce4ec);
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
    margin:0;
  }
  section {
    background:white;
    padding:60px 30px;
    border-radius:20px;
    box-shadow:0 4px 25px rgba(0,0,0,0.08);
    max-width:600px;
    width:90%;
    text-align:center;
    transition:transform 0.3s ease;
  }
  section:hover {
    transform:scale(1.01);
  }
  h2 {
    font-size:2rem;
    font-weight:600;
    color:#333;
    position:relative;
    display:inline-block;
  }
  h2::after {
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
  p {
    font-family:'Open Sans',sans-serif;
    font-size:1.1rem;
    color:#555;
    margin:30px auto 40px;
    line-height:1.6;
    max-width:500px;
  }
  #emojis span {
    cursor:pointer;
    margin:0 10px;
    font-size:2.5rem;
    transition:transform 0.2s ease, filter 0.2s ease;
  }
  #emojis span:hover {
    transform:scale(1.3);
    filter:drop-shadow(0 0 8px #ff80ab);
  }
  button {
    background:#ff80ab;
    color:white;
    border:none;
    padding:12px 35px;
    border-radius:30px;
    font-size:1rem;
    cursor:pointer;
    box-shadow:0 4px 10px rgba(0,0,0,0.1);
    transition:0.3s;
  }
  button:hover {
    transform:scale(1.05);
    box-shadow:0 6px 15px rgba(0,0,0,0.15);
  }
  #thankyou {
    display:none;
    margin-top:25px;
    color:#333;
    font-weight:500;
  }
</style>
</head>

<body>

<section>
  <h2>How Was Your Day? </h2>
  <p>Choose the emoji that best describes your day and share your feelings anonymously 💬</p>

  <div id="emojis">
    <span onclick="selectEmoji(this)">😞</span>
    <span onclick="selectEmoji(this)">😐</span>
    <span onclick="selectEmoji(this)">😊</span>
    <span onclick="selectEmoji(this)">😄</span>
    <span onclick="selectEmoji(this)">🤩</span>
  </div>

  <button onclick="submitFeedback()">Submit Feedback</button>
  <p id="thankyou">💖 Thanks for sharing your mood today!</p>
</section>

<script>
let selectedEmoji = null;

function selectEmoji(el) {
  document.querySelectorAll('#emojis span').forEach(e => {
    e.style.transform = '';
    e.style.filter = '';
  });
  el.style.transform = 'scale(1.5)';
  el.style.filter = 'drop-shadow(0 0 10px #ff80ab)';
  selectedEmoji = el.textContent;
}

function submitFeedback() {
  if (!selectedEmoji) {
    alert('Please select an emoji 😊');
    return;
  }
  document.getElementById('thankyou').style.display = 'block';
  console.log("Feedback submitted:", selectedEmoji);
}
</script>

</body>
</html>
