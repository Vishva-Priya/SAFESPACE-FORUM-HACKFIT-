<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>SAFESPACE FORUM | Anonymous Student Support Platform</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <style>
    /* -------------------- Base layout -------------------- */
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(120deg, #E3F2FD, #E8EAF6);
      color: #333;
      overflow-x: hidden;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }

       /* Navbar */
       nav {
      background-color: #0ea8eaff;
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 3rem;
      box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }

    nav h1 {
      font-size: 1.5rem;
      letter-spacing: 0.5px;
    }

    nav a {
      color: white;
      text-decoration: none;
      margin-left: 20px;
      font-weight: 500;
      transition: opacity 0.2s;
    }

    nav a:hover {
      opacity: 0.8;
    }

    .hero {
      text-align: center;
      padding: 100px 30px;
      background: linear-gradient(160deg, #C5CAE9, #E8EAF6);
      position: relative;
      overflow: hidden;
      border-bottom-left-radius: 40px;
      border-bottom-right-radius: 40px;
    }

    .hero h1 {
      font-size: 2.8rem;
      color: #2E3A59;
      font-weight: 700;
    }

    .hero p {
      font-size: 1.05rem;
      color: #555;
      margin-top: 10px;
    }

    .btn-main {
      background-color: #7986CB;
      color: white;
      border-radius: 25px;
      padding: 10px 25px;
      margin-top: 20px;
      border: none;
      transition: 0.25s;
    }

    .btn-main:hover { background-color: #5C6BC0; }

    .section-title {
      text-align: center;
      font-weight: 600;
      color: #2E3A59;
      margin-bottom: 24px;
    }

    /* -------------------- Vision & Mission -------------------- */
    .vision-mission {
      background-color: #F3F4FD;
      padding: 56px 20px;
    }

    .vision-card {
      background: #fff;
      border-radius: 14px;
      box-shadow: 0 10px 30px rgba(18, 38, 63, 0.06);
      padding: 28px;
      height: 100%;
      transition: transform .25s ease, box-shadow .25s ease;
    }

    .vision-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 16px 40px rgba(18, 38, 63, 0.09);
    }

    .vision-card h4 { color: #2E3A59; font-weight: 700; }
    .vision-card p { color: #555; line-height: 1.7; }

    /* -------------------- Echoes of the Community -------------------- */
    .discussion-card {
      background: white;
      border-radius: 18px;
      box-shadow: 0 6px 18px rgba(31, 41, 55, 0.08);
      padding: 22px;
      margin-bottom: 20px;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .discussion-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 12px 30px rgba(31, 41, 55, 0.12);
    }

    /* -------------------- Events Section (scrolling) -------------------- */
    .events-section {
      background-color: #F3F4FD;
      padding: 54px 0 100px;
      position: relative;
      overflow: hidden;
      /* bottom soft shadow for the whole section */
      box-shadow: 0 18px 40px rgba(22, 35, 70, 0.08);
    }

    /* subtle bottom gradient to emphasize shadow */
    .events-section::after {
      content: "";
      position: absolute;
      left: 0;
      right: 0;
      bottom: 0;
      height: 48px;
      background: linear-gradient(180deg, rgba(243,244,253,0) 0%, rgba(0,0,0,0.06) 100%);
      pointer-events: none;
    }

    .scroll-wrapper {
      width: 100%;
      overflow: hidden;
      position: relative;
      margin-top: 12px;
    }

    /* events-container will hold two copies of cards (for seamless looping) */
    .events-container {
      display: flex;
      gap: 20px;
      align-items: stretch;
      animation: scrollEvents 28s linear infinite;
      will-change: transform;
      padding-bottom: 10px;
    }

    /* pause on hover or when JS adds class 'paused' */
    .events-container:hover,
    .events-container.paused {
      animation-play-state: paused !important;
    }

    @keyframes scrollEvents {
      0% { transform: translateX(0); }
      100% { transform: translateX(-50%); } /* move full half (since we duplicate items) */
    }

    .event-card {
      flex: 0 0 300px;
      background: #fff;
      border-radius: 14px;
      padding: 14px;
      text-align: center;
      position: relative;
      cursor: pointer;
      transition: transform .28s cubic-bezier(.2,.9,.2,1), box-shadow .28s ease;
      box-shadow: 0 10px 22px rgba(18, 38, 63, 0.06);
    }

    .event-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 18px 40px rgba(18, 38, 63, 0.12);
    }

    .event-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      border-radius: 10px;
      margin-bottom: 12px;
      transition: transform .4s ease;
    }

    .event-card:hover img { transform: scale(1.05); }

    .event-card h5 { font-weight: 700; color: #2E3A59; margin-bottom: 6px; font-size: 1rem; }
    .event-card p { color: #666; font-size: .9rem; margin: 0; }

    /* small responsive tweaks */
    @media (max-width: 992px) {
      .event-card { flex: 0 0 260px; }
      .event-card img { height: 160px; }
      .events-container { gap: 16px; animation-duration: 36s; }
    }

    @media (max-width: 576px) {
      .event-card { flex: 0 0 220px; }
      .event-card img { height: 140px; }
      .hero { padding: 60px 16px; }
      .hero h1 { font-size: 1.6rem; }
    }

    /* Fade-in utility */
    .fade-in { opacity: 0; transform: translateY(18px); transition: all .6s ease-in-out; }
    .fade-in.visible { opacity: 1; transform: translateY(0); }
    nav {
  display: flex;
  align-items: center;     /* vertically center contents */
  justify-content: space-between;
  padding: 0.5rem 1rem;     /* adjust padding as desired */
  /* background-color, height etc as you like */
}

/* Logo image */
.logo {
  height: 80px;             /* fixes height so nav won’t expand too big */
  width: auto;              /* keep aspect ratio */
  display: block;           /* avoid inline whitespace surprises */
  margin-right: 0.5rem;     /* spacing between logo and the heading */
}

/* If the <h1> is too tall, reduce its size */
.nav-left h1 {
  margin: 0;
  font-size: 1.25rem;       /* adjust as needed */
  line-height: 1;           /* keep it tight */
}

/* Optional: ensure nav-links align vertically */
.nav-links a {
  text-decoration: none;
  margin-left: 1rem;
  line-height: 1;           /* so links are aligned with logo */
}

.footer {
  background: #1e1f29;
  color: #ffffff;
  padding: 25px 0 25px 0; /* reduced side padding */
  font-family: 'Inter', sans-serif;
}

/* Container with reduced max-width and tighter spacing */
.footer-container {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  flex-wrap: wrap;
  gap: 20px;
  max-width: 900px;
  margin: 0 auto;
  padding-left: 30px; /* moves everything slightly left */
}

/* Left Section */
.footer-left {
  margin-left: -90px; 
}
.footer-left h2 {
  font-size: 2.4rem;
  margin-bottom: 5px;
}
.footer-left p {
  font-size: 1rem;
  line-height: 1.3;
  color: #ffffff;
  max-width: 240px;
}

/* Middle Section */
.footer-center ul {
  list-style: none;
  padding: 0;
  margin: 0;
}
.footer-center li {
  margin-bottom: 5px;
}
.footer-center a {
  color: #ffffff;
  text-decoration: none;
  font-size: 1.2rem;
  transition: opacity 0.3s ease;
}
.footer-center a:hover {
  opacity: 0.7;
}

/* Right Section */
.footer-right h4 {
  font-size: 2rem;
  margin-bottom: 5px;
}
.footer-right p {
  margin: 0 0 10px;
  font-size: 1rem;
}
.footer-right a {
  color: #ffffff;
  text-decoration: none;
}
.footer-right a:hover {
  opacity: 0.8;
}

/* Social Icons */
.social-icons a {
  color: #ffffff;
  margin-right: 10px;
  font-size: 1rem;
  transition: opacity 0.3s ease;
}
.social-icons a:hover {
  opacity: 0.7;
}

/* Bottom Section */
.footer-bottom {
  text-align: center;
  margin-top: 15px;
  border-top: 1px solid #333;
  padding-top: 8px;
  font-size: 1rem;
  color: #ccc;
}

/* Responsive */
@media (max-width: 768px) {
  .footer-container {
    flex-direction: column;
    align-items: center;
    text-align: center;
    padding-left: 0; /* reset for mobile */
  }
  .footer-left {
    margin-left: 0; /* reset for mobile */
  }
  .footer-left p {
    margin: 0 auto;
  }
  .social-icons {
    margin-top: 5px;
  }
}
  </style>

  
</head>

<body>
  <!-- Navbar -->
  <nav>
  <div class="nav-left">
      <img src="media/image1.jpeg" alt="SafeSpace Logo" class="logo">
<h4>
  </div>
  <div class="nav-links">
  <a class="text-white me-4" style="position:right"><b>SafeSpace</b></a>
    <a class="navbar-brand" href="home.php">Home</a>
    <a class="navbar-brand" href="articles.php">Articles</a>
    <a class="navbar-brand" href="forum1.php">Forum</a>
    <a class="navbar-brand" href="feedback.php">Feedback & Contact</a>
    <a class="navbar-brand" href="bookpeer.php">Private Chats</a>
    <a href="login.php" class="text-white ms-3" style="font-size:1.5rem;">
      <i class="bi bi-person-circle"></i>
    </a>
  </div>
</nav>

  <!-- Hero -->
  <section class="hero position-relative">
    <video autoplay muted loop playsinline class="position-absolute w-100 h-100"
      style="object-fit:cover; top:0; left:0; z-index:0; border-bottom-left-radius:40px; border-bottom-right-radius:40px;">
      <source src="media/video1.mp4" type="video/mp4">
    </video>
    <div class="position-absolute w-100 h-100" style="background: rgba(255,255,255,0.68); top:0; left:0; z-index:1;"></div>

    <div class="position-relative text-center" style="z-index:2;">
      <h1>Speak Freely. Stay Anonymous. Feel Heard.</h1>
      <p>A safe student community to share your feelings, struggles, and thoughts — without revealing your identity.</p>
      <a href="aboutus.php" class="btn btn-main">Learn More</a>
    </div>
  </section>

  <!-- Vision & Mission -->
  <section class="vision-mission">
    <div class="container">
      <h2 class="section-title mb-4">Our Vision & Mission 🌟</h2>
      <div class="row justify-content-center g-4">
        <div class="col-md-5">
          <div class="vision-card fade-in" style="border-left:6px solid #7986CB;">
            <h4>Our Vision</h4>
            <p>
              To create a safe and empathetic digital environment where every student can freely express emotions,
              seek guidance, and find belonging — without fear of being judged or identified.
              <br><br><em>Because mental peace begins with being heard.</em>
            </p>
          </div>
        </div>

        <div class="col-md-5">
          <div class="vision-card fade-in" style="border-left:6px solid #5C6BC0;">
            <h4>Our Mission</h4>
            <p>
              To empower students to discuss their personal and emotional struggles anonymously, receive supportive
              peer advice, and build a compassionate online community driven by trust, positivity, and mental wellness.
              <br><br><em>Together, we make support accessible and stigma-free.</em>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- ✨ EVENTS SECTION -->
<section class="events-section position-relative py-5">
  <div class="container text-center">
    <h2 class="section-title mb-4">Our Events & Initiatives 🎉</h2>

    <div class="scroll-wrapper">
      <div class="events-container">
        <!-- Event 1 -->
        <div class="event-card" data-bs-toggle="tooltip"
          title="A guided meditation workshop helping students manage anxiety and stay mindful.">
          <img src="media/event1.jpg" alt="Mindfulness Workshop">
          <h5>Mindfulness Workshop</h5>
          <p>Relax and reconnect with inner calm.</p>
        </div>

        <!-- Event 2 -->
        <div class="event-card" data-bs-toggle="tooltip"
          title="An open sharing circle where students connect through shared experiences.">
          <img src="media/event2.jpeg" alt="Peer Support Meetup">
          <h5>Peer Support Meetup</h5>
          <p>Connect and share your story.</p>
        </div>

        <!-- Event 3 -->
        <div class="event-card" data-bs-toggle="tooltip"
          title="Join our yoga and laughter therapy sessions to release stress and refresh your energy.">
          <img src="media/events3.jpeg" alt="Stress Relief Session">
          <h5>Stress Relief Session</h5>
          <p>Unwind your mind through laughter.</p>
        </div>

        <!-- Event 4 -->
        <div class="event-card" data-bs-toggle="tooltip"
          title="A week-long celebration focusing on awareness, counseling, and kindness.">
          <img src="media/event4.jpeg" alt="Mental Health Week">
          <h5>Mental Health Week</h5>
          <p>Let’s end the stigma together.</p>
        </div>

        <!-- Event 5 -->
        <div class="event-card" data-bs-toggle="tooltip"
          title="Dedicated day to pamper your mind and soul through art, music, and calm.">
          <img src="media/event5.jpeg" alt="Self-Care Sunday">
          <h5>Self-Care Sunday</h5>
          <p>Focus on your peace and wellbeing.</p>
        </div>

        <!-- Duplicate set for seamless looping -->
        <div class="event-card" data-bs-toggle="tooltip" title="A guided meditation workshop helping students manage anxiety and stay mindful.">
          <img src="media/event1.jpg" alt="Mindfulness Workshop">
          <h5>Mindfulness Workshop</h5>
          <p>Relax and reconnect with inner calm.</p>
        </div>
        <div class="event-card" data-bs-toggle="tooltip" title="An open sharing circle where students connect through shared experiences.">
          <img src="media/event2.jpg" alt="Peer Support Meetup">
          <h5>Peer Support Meetup</h5>
          <p>Connect and share your story.</p>
        </div>
        <div class="event-card" data-bs-toggle="tooltip" title="Join our yoga and laughter therapy sessions to release stress and refresh your energy.">
          <img src="media/event3.jpeg" alt="Stress Relief Session">
          <h5>Stress Relief Session</h5>
          <p>Unwind your mind through laughter.</p>
        </div>
        <div class="event-card" data-bs-toggle="tooltip" title="A week-long celebration focusing on awareness, counseling, and kindness.">
          <img src="media/event4.jpg" alt="Mental Health Week">
          <h5>Mental Health Week</h5>
          <p>Let’s end the stigma together.</p>
        </div>
        <div class="event-card" data-bs-toggle="tooltip" title="Dedicated day to pamper your mind and soul through art, music, and calm.">
          <img src="media/event5.jpg" alt="Self-Care Sunday">
          <h5>Self-Care Sunday</h5>
          <p>Focus on your peace and wellbeing.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Shadow below the section -->
<section style="background:#f9f9f9; padding:50px 20px; font-family:'Poppins',sans-serif;">
  <div style="
    display:flex;
    flex-wrap:wrap;
    justify-content:center;
    gap:30px;
    max-width:1100px;
    margin:auto;
  ">

    <!-- Card 1: Why Anonymity Matters -->
    <div style="
      background:linear-gradient(135deg,#e3f2fd,#fce4ec);
      flex:1 1 450px;
      min-width:320px;
      max-width:500px;
      padding:40px 25px;
      border-radius:20px;
      box-shadow:0 4px 25px rgba(0,0,0,0.08);
      text-align:center;
    ">
      <h2 style="font-size:2rem; font-weight:600; color:#333; position:relative; display:inline-block;">
        Why Anonymity Matters 💬
        <span style="
          position:absolute;
          bottom:-10px;
          left:50%;
          width:80px;
          height:3px;
          background:#ff80ab;
          transform:translateX(-50%);
          border-radius:5px;
          display:block;
        "></span>
      </h2>
      <p style="font-family:'Open Sans',sans-serif; font-size:1.05rem; color:#555; margin-top:25px; line-height:1.6;">
        Many students hesitate to open up about personal struggles due to fear of judgment.
        <b>AnonConnect</b> breaks that barrier — giving you a safe, judgment-free space to express,
        reflect, and receive peer advice. Every voice here matters, and every message stays anonymous.
      </p>
    </div>

    <!-- Card 2: Feedback Card -->
    <div style="
      background:linear-gradient(135deg,#fce4ec,#e3f2fd);
      flex:1 1 450px;
      min-width:320px;
      max-width:500px;
      padding:40px 25px;
      border-radius:20px;
      box-shadow:0 4px 25px rgba(0,0,0,0.08);
      text-align:center;
      display:flex;
      flex-direction:column;
      justify-content:center;
    ">
      <h2 style="font-size:2rem; font-weight:600; color:#333; position:relative; display:inline-block;">
        How Was Your Day? 💬
        <span style="
          position:absolute;
          bottom:-10px;
          left:50%;
          width:80px;
          height:3px;
          background:#ff80ab;
          transform:translateX(-50%);
          border-radius:5px;
          display:block;
        "></span>
      </h2>

      <p id="feedbackText" style="font-family:'Open Sans',sans-serif; font-size:1.05rem; color:#555; margin-top:25px; line-height:1.6;">
        Choose the emoji that best describes your day 💬
      </p>

      <div id="emojis" style="margin-top:20px;">
        <span onclick="selectEmoji(this)" style="cursor:pointer;margin:0 10px;font-size:2.5rem;transition:0.2s;">😞</span>
        <span onclick="selectEmoji(this)" style="cursor:pointer;margin:0 10px;font-size:2.5rem;transition:0.2s;">😐</span>
        <span onclick="selectEmoji(this)" style="cursor:pointer;margin:0 10px;font-size:2.5rem;transition:0.2s;">😊</span>
        <span onclick="selectEmoji(this)" style="cursor:pointer;margin:0 10px;font-size:2.5rem;transition:0.2s;">😄</span>
        <span onclick="selectEmoji(this)" style="cursor:pointer;margin:0 10px;font-size:2.5rem;transition:0.2s;">🤩</span>
      </div>

      <button onclick="submitFeedback()" style="margin-top:25px; background:#ff80ab; color:white; border:none; padding:12px 30px; border-radius:30px; font-size:1rem; cursor:pointer; box-shadow:0 4px 10px rgba(0,0,0,0.1); transition:0.3s;">
        Submit
      </button>

      <div id="result" style="display:none;margin-top:25px;">
        <h3 id="chosenEmoji" style="font-size:2rem;"></h3>
        <p id="quote" style="color:#555;font-style:italic;margin-top:10px;"></p>
      </div>
    </div>

  </div>
</section>

<script>
let selectedEmoji = null;
let feedbackSubmitted = false;

const quotes = {
  "😞": "Even the darkest night will end and the sun will rise 🌅",
  "😐": "Every day may not be good, but there’s something good in every day 🌻",
  "😊": "Happiness is a journey, not a destination 🌈",
  "😄": "Your smile is contagious — keep spreading positivity ✨",
  "🤩": "You’re shining bright today — keep being amazing 💫"
};

function selectEmoji(el) {
  if (feedbackSubmitted) return;
  document.querySelectorAll('#emojis span').forEach(e => {
    e.style.transform = '';
    e.style.filter = '';
  });
  el.style.transform = 'scale(1.5)';
  el.style.filter = 'drop-shadow(0 0 10px #ff80ab)';
  selectedEmoji = el.textContent;
  document.querySelectorAll('#emojis span').forEach(e => e.style.pointerEvents = 'none');
}

function submitFeedback() {
  if (!selectedEmoji) {
    alert('Please select an emoji 😊');
    return;
  }
  feedbackSubmitted = true;
  document.getElementById('emojis').style.display = 'none';
  document.querySelector('button').style.display = 'none';
  document.getElementById('feedbackText').style.display = 'none';
  document.getElementById('chosenEmoji').textContent = selectedEmoji;
  document.getElementById('quote').textContent = quotes[selectedEmoji];
  document.getElementById('result').style.display = 'block';
}
</script>

</section>

  <!-- Footer -->
  <footer class="footer">
  <div class="footer-container">
    
    <!-- Left: Organization name -->
    <div class="footer-left">
      <h2>Safepace</h2>
      <p>A safe and anonymous platform for students to share and grow together.</p>
    </div>

    <!-- Middle: Important links -->
    <div class="footer-center">
      <ul>
        <li><a href="aboutus.php">About Us</a></li>
        <li><a href="/team">Meet the Team</a></li>
        <li><a href="/privacy">Privacy & Safety</a></li>
        <li><a href="/terms">Terms of Use</a></li>
        <li><a href="/accessibility">Accessibility</a></li>
        <li><a href="feedback.php">Send Feedback</a></li>
      </ul>
    </div>

    <!-- Right: Contact + Socials -->
    <div class="footer-right">
      <h4>Contact Us</h4>
      <p><a href="mailto:support@anonconnect.org">safespace@gmail.com</a></p>

      <div class="social-icons">
        <a href="#" title="LinkedIn"><i class="fa-brands fa-linkedin"></i></a>
        <a href="#" title="Twitter / X"><i class="fa-brands fa-x-twitter"></i></a>
        <a href="#" title="YouTube"><i class="fa-brands fa-youtube"></i></a>
        <a href="#" title="Facebook"><i class="fa-brands fa-facebook"></i></a>
        <a href="#" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <p>© 2025 Safespace — Created for students.</p>
  </div>
</footer>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      // Initialize tooltips
      const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
      tooltipTriggerList.forEach(el => new bootstrap.Tooltip(el));

      const eventsContainer = document.querySelector('.events-container');

      // Pause/resume helpers
      const pause = () => eventsContainer.classList.add('paused');
      const resume = () => eventsContainer.classList.remove('paused');

      // Desktop: pause when mouse over container
      eventsContainer.addEventListener('mouseenter', pause);
      eventsContainer.addEventListener('mouseleave', resume);

      // Pointer interactions (mousedown/up), improves behavior for click-and-hold
      eventsContainer.addEventListener('mousedown', pause);
      document.addEventListener('mouseup', resume);

      // Touch interactions for mobile: pause on touchstart, resume on touchend
      eventsContainer.addEventListener('touchstart', pause, { passive: true });
      eventsContainer.addEventListener('touchend', resume);

      // Accessibility: pause if user focuses inside container via keyboard, resume on blur
      eventsContainer.addEventListener('focusin', pause);
      eventsContainer.addEventListener('focusout', resume);

      // Small safety: if animation isn't supported, add basic manual scroll (fallback)
      const supportsAnimation = typeof window.getComputedStyle(eventsContainer).animationName !== 'undefined';
      if (!supportsAnimation) {
        // fallback — slowly auto-scroll using setInterval
        let px = 0;
        setInterval(() => {
          if (!eventsContainer.classList.contains('paused')) {
            px -= 0.5;
            eventsContainer.style.transform = `translateX(${px}px)`;
          }
        }, 16);
      }
    });

    // Fade-in on scroll
    document.addEventListener('scroll', () => {
      document.querySelectorAll('.fade-in').forEach(el => {
        const rect = el.getBoundingClientRect();
        if (rect.top < (window.innerHeight - 80)) el.classList.add('visible');
      });
    });

    // Also trigger on load to reveal already-visible elements
    window.addEventListener('load', () => {
      document.dispatchEvent(new Event('scroll'));
    });
  </script>
</body>
</html>
