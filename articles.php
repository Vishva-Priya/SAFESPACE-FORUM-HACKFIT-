<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SafeSpaceForum Articles</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <style>
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
        .article-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 15px;
            margin: 15px;
            width: 300px;
            display: inline-block;
            vertical-align: top;
            transition: transform 0.3s;
        }

        .article-card:hover {
            transform: translateY(-5px);
        }

        .article-card img {
            width: 100%;
            border-radius: 10px;
        }

        .article-card .quote {
            font-style: italic;
            margin: 10px 0;
            color: #6a1b9a;
        }

        .article-card .short-desc {
            margin-bottom: 10px;
        }

        .card-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-actions a,
        .card-actions button {
            padding: 6px 10px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
        }

        .card-actions a.read-more {
            background: #8e24aa;
            color: #fff;
        }

        .card-actions button.add-favorite {
            background: #f1f1f1;
            color: #e53935;
        }

        /* Container for the grid */
        .articles-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            padding: 2rem;
            justify-items: center;
        }

        /* Individual article card styling */
        .article-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 100%;
            max-width: 320px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            text-align: center;
            padding-bottom: 1rem;
        }

        /* Hover effect */
        .article-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        /* Image styling */
        .article-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
        }

        /* Quote and description */
        .article-card .quote {
            font-style: italic;
            color: #555;
            margin: 1rem 0 0.5rem;
            padding: 0 10px;
        }

        .article-card .short-desc {
            color: #333;
            font-size: 0.95rem;
            padding: 0 15px;
        }

        /* Card actions */
        .card-actions {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin-top: 1rem;
        }

        .card-actions a.read-more {
            background: linear-gradient(135deg, #6a5acd, #8a2be2);
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-weight: 500;
            transition: background 0.3s;
        }

        .card-actions a.read-more:hover {
            background: linear-gradient(135deg, #5a4dbd, #7a1bd2);
        }

        .card-actions button.add-favorite {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1.2rem;
        }

        .card-actions .comment-count {
            font-size: 0.9rem;
            color: #777;
        }
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
<nav>
  <div class="nav-left">
      <img src="media/image1.jpeg" alt="SafeSpace Logo" class="logo">

  </div>
  <div class="nav-links">
  <a class="text-white me-4" style="position:right"><b>SafeSpace</b></a>
    <a class="navbar-brand" href="home.php">Home</a>
    <a class="navbar-brand" href="articles.php">Articles</a>
    <a class="navbar-brand" href="forum1.php">Forum</a>
    <a class="navbar-brand" href="feedback.php">Feedback & Contact</a>
    <a class="navbar-brand" href="bookpeer.php">Private Chat</a>
  </div>
</nav>

<h1 style="text-align: center;">Articles</h1>

    <div class="articles-grid">
        <div class="article-card" data-title="Overcoming Addiction: My Journey"
            data-short="A personal story of struggling with addiction, loss, and finally finding the courage to change..."
            data-quote="I learnt that you sometimes need darkness to see the stars."
            data-img="https://via.placeholder.com/300x180?text=Addiction+Journey">
            <img src="media/article1.jpg" alt="Overcoming Addiction" />
            <p class="quote">"I learnt that you sometimes need darkness to see the stars."</p>
            <p class="short-desc">A personal story of struggling with addiction, loss, and finally finding the courage
                to change...</p>
            <div class="card-actions">
                <a href="article.php?title=<?php echo urlencode('Overcoming Addiction: My Journey'); ?>"
                    class="read-more">Read More</a>
                <button class="add-favorite">❤️ Favorite</button>

            </div>
        </div>

        <div class="article-card" data-title="Retirement from Farming: Finding a New Chapter"
            data-short="Exploring how farmers can navigate the emotional and practical journey of retirement."
            data-quote="The land you’ve cared for so diligently deserves your rest, and you deserve to enjoy the peace that comes with it."
            data-img="media/article2.jpg">
            <img src="media/article2.jpg" alt="Retirement from Farming Image" />
            <p class="quote">"The land you’ve cared for so diligently deserves your rest, and you deserve to enjoy the
                peace that comes with it."</p>
            <p class="short-desc">Exploring how farmers can navigate the emotional and practical journey of retirement.
            </p>
            <div class="card-actions">
                <a href="article.php?title=<?php echo urlencode('Retirement from Farming: Finding a New Chapter'); ?>"
                    class="read-more">Read More</a>
                <button class="add-favorite">❤️ Favorite</button>

            </div>
        </div>
        <div class="article-card" data-title="Showing Up: A Day in the Life"
            data-short="A powerful reflection on the quiet courage it takes to keep going, even when life feels heavy."
            data-quote="Even on the hardest days, showing up is an act of courage." data-img="images/article3.jpg">
            <img src="media/article3.jpg" alt="Showing Up Article Image" />
            <p class="quote">"Even on the hardest days, showing up is an act of courage."</p>
            <p class="short-desc">A powerful reflection on the quiet courage it takes to keep going, even when life
                feels heavy.</p>
            <div class="card-actions">
                <a href="article.php?title=<?php echo urlencode('Showing Up: A Day in the Life'); ?>"
                    class="read-more">Read More</a>
                <button class="add-favorite">❤️ Favorite</button>

            </div>
        </div>
    </div>
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

    <script>
        // Favorite button toggle
        document.querySelectorAll('.add-favorite').forEach(btn => {
            btn.addEventListener('click', function () {
                if (this.textContent.includes('❤️')) {
                    this.textContent = '♡ Favorite';
                } else {
                    this.textContent = '❤️ Favorite';
                }
            });
        });
    </script>

</body>

</html>