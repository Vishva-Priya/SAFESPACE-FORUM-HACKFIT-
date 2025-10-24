<?php


include 'db.php'; // Load posts from session/simulated database

// Define the colors from the suggested palette
$COLOR_PRIMARY_BG = '#fff9f9ff';     // Light Gray
$COLOR_SECONDARY_CARD = '#dcd8d8ff'; // Soft Lavender
$COLOR_CTA_UPLIFT = '#e85353ff';     // Soft Peach
$COLOR_TEXT = '#3C473B';           // Dark Moss Green
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SafeSpace – Speak Freely</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color:
                <?php echo $COLOR_PRIMARY_BG; ?>
            ;
            color:
                <?php echo $COLOR_TEXT; ?>
            ;
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

        @import url('https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap');
        @media all {
            body {
                font-family: sans-serif;
                font-weight: 400;
                text-transform: none;
                font-size: 17px;
                line-height: 1.5;
            }
        }

        body {
            color: #0f0f0f;
            font-weight: 400;
            font-size: 19px;
            line-height: 1.7;
        }

        @media all {
            * {
                box-sizing: inherit;
            }

            .grid-container {
                margin-left: auto;
                margin-right: auto;
                max-width: 1200px;
            }
        }

        .grid-container {
            max-width: 1280px;
        }

        @media all {
            body {
                margin: 0;
                padding: 0;
                border: 0;
            }

            body {
                font-family: -apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
                font-weight: 400;
                text-transform: none;
                font-size: 17px;
                line-height: 1.5;
            }
        }

        body {
            background-color: #f7f8f9;
            color: #0f0f0f;
        }

        body {
            font-weight: 400;
            font-size: 19px;
        }

        body {
            line-height: 1.7;
        }

        @media all {
            html {
                margin: 0;
                padding: 0;
                border: 0;
            }

            html {
                font-family: sans-serif;
                -webkit-text-size-adjust: 100%;
                -ms-text-size-adjust: 100%;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
            }

            html {
                box-sizing: border-box;
            }
        }

        :root {
            --wp--preset--color--contrast: var(--contrast);
            --wp--preset--color--contrast-2: var(--contrast-2);
            --wp--preset--color--contrast-3: var(--contrast-3);
            --wp--preset--color--base: var(--base);
            --wp--preset--color--base-2: var(--base-2);
            --wp--preset--color--base-3: var(--base-3);
            --wp--preset--color--accent: var(--accent);
        }

        :root {
            --contrast: #003E4A;
            --contrast-2: #383f49;
            --contrast-3: #62707c;
            --base: #526e7c;
            --base-2: #f7f8f9;
            --base-3: #ffffff;
            --accent: #e5e7eb;
        }

        :root {
            --gp-search-modal-bg-color: var(--base-3);
            --gp-search-modal-text-color: var(--contrast);
        }

        @media all {
            .inside-header {
                padding: 20px 40px;
            }

            .inside-header {
                display: flex;
                align-items: center;
            }
        }

        .inside-header {
            padding: 10px 20px 10px 20px;
        }

        @media all {

            *,
            :after,
            :before {
                box-sizing: inherit;
            }

            .site-logo {
                display: inline-block;
                max-width: 100%;
            }

            .main-navigation {
                z-index: 100;
                padding: 0;
                clear: both;
                display: block;
            }

            .mobile-menu-control-wrapper {
                display: none;
                margin-left: auto;
                align-items: center;
            }
        }

        .main-navigation {
            background-color: var(--contrast);
        }

        @media all {
            #site-navigation {
                margin-left: auto;
            }

            a {
                transition: color .1s ease-in-out, background-color .1s ease-in-out;
            }

            a {
                text-decoration: none;
            }
        }

        a {
            color: #002acc;
        }

        .site-header a {
            color: var(--contrast-3);
        }

        a:hover {
            text-decoration: underline;
        }

        a:hover,
        a:active {
            color: #004999;
        }

        @media all {
            .main-navigation .menu-bar-items {
                display: flex;
                align-items: center;
                font-size: 15px;
            }
        }

        .main-navigation .menu-bar-items {
            font-family: Roboto, sans-serif;
            text-transform: capitalize;
            font-size: 18px;
        }

        .main-navigation .menu-bar-items {
            color: var(--accent);
        }

        @media all {
            button {
                font-family: inherit;
                font-size: 100%;
                margin: 0;
            }

            button {
                font-family: -apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
                font-weight: 400;
                text-transform: none;
                font-size: 17px;
                line-height: 1.5;
            }

            button {
                background: #55555e;
                color: #fff;
                border: 1px solid transparent;
                cursor: pointer;
                -webkit-appearance: button;
                padding: 10px 20px;
            }

            button {
                transition: color .1s ease-in-out, background-color .1s ease-in-out;
            }
        }

        button {
            font-weight: 400;
            font-size: 19px;
        }

        button {
            color: #ffffff;
            background-color: var(--contrast);
        }

        @media all {
            .menu-toggle {
                display: none;
            }

            .menu-toggle {
                padding: 0 20px;
                line-height: 60px;
                margin: 0;
                font-weight: 400;
                text-transform: none;
                font-size: 15px;
                cursor: pointer;
            }
        }

        .menu-toggle {
            line-height: 30px;
        }

        @media all {
            button.menu-toggle {
                background-color: transparent;
                flex-grow: 1;
                border: 0;
                text-align: center;
            }
        }

        .main-navigation .menu-toggle {
            font-family: Roboto, sans-serif;
            text-transform: capitalize;
            font-size: 18px;
        }

        .mobile-menu-control-wrapper .menu-toggle {
            background-color: rgba(0, 0, 0, 0.02);
        }

        .main-navigation .menu-toggle {
            color: var(--accent);
        }

        button:hover {
            color: #ffffff;
            background-color: var(--contrast-3);
        }

        @media all {

            button.menu-toggle:active,
            button.menu-toggle:hover {
                background-color: transparent;
            }
        }

        button.menu-toggle:hover {
            color: var(--accent);
        }

        .mobile-menu-control-wrapper .menu-toggle,
        .mobile-menu-control-wrapper .menu-toggle:hover {
            background-color: rgba(0, 0, 0, 0.02);
        }

        @media all {
            .inside-navigation {
                position: relative;
            }

            .main-navigation .inside-navigation {
                display: flex;
                align-items: center;
                flex-wrap: wrap;
                justify-content: space-between;
            }

            img {
                height: auto;
                max-width: 100%;
            }

            .header-image {
                vertical-align: middle;
            }
        }

        .header-image {
            width: 100px;
        }

        @media all {
            .main-navigation .menu-bar-item {
                position: relative;
            }

            .main-navigation .menu-bar-item.search-item {
                z-index: 20;
            }
        }

        .mobile-menu-control-wrapper .menu-toggle,
        .mobile-menu-control-wrapper .menu-toggle:hover,
        .mobile-menu-control-wrapper .menu-toggle:focus,
        .has-inline-mobile-toggle #site-navigation.toggled {
            background-color: rgba(0, 0, 0, 0.02);
        }

        @media all {
            .gp-icon {
                display: inline-flex;
                align-self: center;
            }

            .screen-reader-text {
                border: 0;
                clip-path: inset(50%);
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
                width: 1px;
                word-wrap: normal !important;
            }

            .screen-reader-text {
                border: 0;
                clip: rect(1px, 1px, 1px, 1px);
                clip-path: inset(50%);
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: 0;
                position: absolute !important;
                width: 1px;
                word-wrap: normal !important;
            }
        }

        .navigation-search {
            position: absolute;
            left: -99999px;
            pointer-events: none;
            visibility: hidden;
            z-index: 20;
            width: 100%;
            top: 0;
            transition: opacity 100ms ease-in-out;
            opacity: 0;
        }

        @media all {
            .has-menu-bar-items button.menu-toggle {
                flex-grow: 0;
            }

            .main-navigation a {
                display: block;
                text-decoration: none;
                font-weight: 400;
                text-transform: none;
                font-size: 15px;
            }
        }

        .main-navigation a {
            text-decoration: none;
        }

        .main-navigation a {
            font-family: Roboto, sans-serif;
            text-transform: capitalize;
            font-size: 18px;
        }

        @media all {
            .main-navigation .menu-bar-items a {
                color: inherit;
            }

            .main-navigation .menu-bar-item>a {
                padding-left: 20px;
                padding-right: 20px;
                line-height: 60px;
            }
        }

        .main-navigation .menu-bar-item>a {
            line-height: 30px;
        }

        .main-navigation .menu-bar-item:hover>a {
            color: var(--base-3);
        }

        @media all {
            .gp-icon svg {
                height: 1em;
                width: 1em;
                top: .125em;
                position: relative;
                fill: currentColor;
            }

            .icon-menu-bars svg:nth-child(2) {
                display: none;
            }

            input {
                font-family: inherit;
                font-size: 100%;
                margin: 0;
            }

            input {
                font-family: -apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
                font-weight: 400;
                text-transform: none;
                font-size: 17px;
                line-height: 1.5;
            }

            input {
                transition: color .1s ease-in-out, background-color .1s ease-in-out;
            }
        }

        input {
            font-weight: 400;
            font-size: 19px;
        }

        @media all {
            [type="search"] {
                -webkit-appearance: textfield;
                outline-offset: -2px;
            }

            input[type="search"] {
                border: 1px solid;
                border-radius: 0;
                padding: 10px 15px;
                max-width: 100%;
            }
        }

        input[type="search"] {
            color: #666666;
            background-color: #fafafa;
            border-color: #cccccc;
        }

        .navigation-search input[type="search"] {
            outline: 0;
            border: 0;
            vertical-align: bottom;
            line-height: 1;
            opacity: 0.9;
            width: 100%;
            z-index: 20;
            border-radius: 0;
            -webkit-appearance: none;
            height: 60px;
        }

        .navigation-search input[type="search"] {
            color: var(--contrast-2);
            background-color: var(--base-3);
            opacity: 1;
        }

        .navigation-search input[type="search"] {
            height: 30px;
        }

        @media all {
            ul {
                box-sizing: border-box;
            }

            ul {
                margin: 0;
                padding: 0;
                border: 0;
            }

            ul {
                margin: 0 0 1.5em 3em;
            }

            ul {
                list-style: disc;
            }

            .main-navigation ul {
                list-style: none;
                margin: 0;
                padding-left: 0;
            }

            .main-navigation .main-nav>ul {
                display: flex;
                flex-wrap: wrap;
                align-items: center;
            }

            li {
                margin: 0;
                padding: 0;
                border: 0;
            }

            .main-navigation li {
                position: relative;
            }
        }

        .main-navigation .main-nav ul li:not([class*="current-menu-"]):hover>a,
        .main-navigation .main-nav ul li:not([class*="current-menu-"]):focus>a,
        .main-navigation .main-nav ul li.sfHover:not([class*="current-menu-"])>a,
        .main-navigation .menu-bar-item:hover>a,
        .main-navigation .menu-bar-item.sfHover>a {
            color: var(--base-3);
        }

        @media all {
            .icon-search svg:nth-child(2) {
                display: none;
            }

            .main-navigation .main-nav ul li a {
                padding-left: 20px;
                padding-right: 20px;
                line-height: 60px;
            }
        }

        .main-navigation .main-nav ul li a {
            color: var(--accent);
        }

        .main-navigation .main-nav ul li a {
            line-height: 30px;
        }

        @media all {
            .main-navigation .main-nav ul li.menu-item-has-children>a {
                padding-right: 0;
                position: relative;
            }

            li>ul {
                margin-bottom: 0;
                margin-left: 1.5em;
            }

            .main-navigation ul ul {
                display: block;
                box-shadow: 1px 1px 0 rgba(0, 0, 0, .1);
                float: left;
                position: absolute;
                left: -99999px;
                opacity: 0;
                z-index: 99999;
                width: 200px;
                text-align: left;
                top: auto;
                transition: opacity 80ms linear;
                transition-delay: 0s;
                pointer-events: none;
                height: 0;
                overflow: hidden;
            }
        }

        .main-navigation ul ul {
            background-color: var(--contrast);
        }

        .main-navigation ul ul {
            background-color: var(--contrast-2);
        }

        .main-navigation ul ul {
            width: 220px;
        }

        @media all {
            .menu-item-has-children .dropdown-menu-toggle {
                display: inline-block;
                height: 100%;
                clear: both;
                padding-right: 20px;
                padding-left: 10px;
            }

            .main-navigation ul ul li {
                width: 100%;
            }

            .main-navigation ul ul a {
                display: block;
            }

            .main-navigation .main-nav ul ul li a {
                line-height: normal;
                padding: 10px 20px;
                font-size: 14px;
            }
        }

        .main-navigation .main-nav ul ul li a {
            color: var(--base-3);
        }

        .main-navigation .main-nav ul ul li a {
            padding: 12px 20px 12px 20px;
        }

        .main-navigation .main-nav ul ul li:not([class*="current-menu-"]):hover>a {
            color: var(--accent);
            background-color: var(--contrast-3);
        }

        @media all {
            .main-navigation ul ul ul {
                top: 0;
            }

            .main-navigation:not(.toggled) ul li:hover>ul {
                left: auto;
                opacity: 1;
                transition-delay: 150ms;
                pointer-events: auto;
                height: auto;
                overflow: visible;
            }

            .menu-item-has-children ul .dropdown-menu-toggle {
                padding-top: 10px;
                padding-bottom: 10px;
                margin-top: -10px;
            }
        }

        .menu-item-has-children ul .dropdown-menu-toggle {
            padding-top: 12px;
            padding-bottom: 12px;
            margin-top: -12px;
        }

        @media all {
            nav ul ul .menu-item-has-children .dropdown-menu-toggle {
                float: right;
            }
        }



        .post-card {
            background-color:
                <?php echo $COLOR_SECONDARY_CARD; ?>
            ;
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }

        .cta-button {
            background-color:
                <?php echo $COLOR_CTA_UPLIFT; ?>
                !important;
            border-color:
                <?php echo $COLOR_CTA_UPLIFT; ?>
                !important;
            color: #fff;
            /* White text for contrast */
            font-weight: bold;
        }

        .tag-pill {
            background-color: #163e9aff;
            /* Muted Aqua for a calming accent */
            color:white;
                <?php echo $COLOR_TEXT; ?>
            ;
        }

        .header-title {
            color:
                <?php echo $COLOR_TEXT; ?>
            ;
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

/* Communities Section */
.communities {
  background-color: #fff9f9ff;
}

.community-card {
  border-radius: 15px;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.community-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 6px 14px rgba(0, 0, 0, 0.1);
}
.community-card {
  border-radius: 15px;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.community-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 6px 14px rgba(0, 0, 0, 0.1);
}

.cta-button {
  background-color: #e85353ff;
  color: white;
  border-radius: 10px;
  border: none;
  transition: 0.3s ease;
}

.cta-button:hover {
  background-color: #c83c3c;
}




    </style>
</head>

<body>
    <nav>
  <div class="nav-left">
      <img src="media/image1.jpeg" alt="SafeSpace Logo" class="logo">
<h4>
  </div>
  <div class="nav-links">
  <a class="text-white me-4" style="position:right"><b>SafeSpace</b></a>
    <a class="navbar-brand" href="home.php">Home</a>
    <a class="navbar-brand" href="articles.php">Articles</a>
    <a class="navbar-brand" href="forum.php">Forum</a>
    <a class="navbar-brand" href="#">Feedback & Contact</a>
    <a class="navbar-brand" href="#">AI Assistance</a>
  </div>
</nav>

       <div class="container py-5">
    <h1 class="text-center mb-5 fw-bold">🫂 SafeSpace Forum</h1>

    <div class="row">
      <!-- Post Form -->
      <div class="col-md-4 mb-4">
        <div class="p-4 post-card">
          <h5 class="mb-3">Start a Discussion Anonymously</h5>
          <form>
            <div class="mb-3">
              <label for="post_title" class="form-label">Title (e.g., "Feeling overwhelmed")</label>
              <input type="text" class="form-control" id="post_title" required>
            </div>
            <div class="mb-3">
              <label for="post_content" class="form-label">Your Post/Thoughts</label>
              <textarea class="form-control" id="post_content" rows="4" required></textarea>
            </div>
            <div class="mb-3">
              <label for="post_tag" class="form-label">Optional Tag</label>
              <select class="form-select" id="post_tag">
                <option value="Mental Health">Mental Health</option>
                <option value="Academics">Academics</option>
                <option value="Relationships">Relationships</option>
                <option value="Stress">Stress</option>
                <option value="General">General</option>
              </select>
            </div>
            <button type="submit" class="btn cta-button w-100">Post Anonymously</button>
          </form>

          <hr class="my-4">
          <h6 class="fw-bold mb-3">📝 Your Previous Posts</h6>
          <ul class="list-group small">
            <li class="list-group-item">Feeling anxious about exams</li>
            <li class="list-group-item">How do you deal with homesickness?</li>
            <li class="list-group-item">I can’t focus lately — tips?</li>
          </ul>
        </div>
      </div>

      <!-- Forum Posts -->
      <div class="col-md-8">

        <!-- Static Post 1 -->
        <div class="card post-card p-4">
          <div class="d-flex justify-content-between align-items-start">
            <h5 class="card-title fw-bold">Feeling overwhelmed with classes</h5>
            <span class="badge rounded-pill tag-pill">Academics</span>
          </div>
          <p class="card-text mt-2">Lately, I’ve been struggling to keep up with assignments. I feel like everyone else is managing better than me.</p>
          <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
            <small class="anon-user">Anonymous #1024</small>
            <div>
              <span class="badge bg-light text-dark me-2" title="You're not alone">❤️ 3</span>
              <button class="btn btn-sm" style="background-color: #169a2cff; color: #fff;">Reply</button>
            </div>
          </div>

          <!-- Replies -->
          <div class="reply-box mt-3">
            <strong>Anonymous #2031:</strong> You're not alone — I’ve been feeling the same. Maybe we can share study tips?
          </div>
          <div class="reply-box">
            <strong>Anonymous #1820:</strong> Try breaking your tasks into smaller chunks. It really helps with focus.
          </div>
        </div>

        <!-- Static Post 2 -->
        <div class="card post-card p-4">
          <div class="d-flex justify-content-between align-items-start">
            <h5 class="card-title fw-bold">Feeling distant from my friends</h5>
            <span class="badge rounded-pill tag-pill">Relationships</span>
          </div>
          <p class="card-text mt-2">I feel like my friends have become distant lately. Maybe it’s just me overthinking, but it’s been bothering me a lot.</p>
          <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
            <small class="anon-user">Anonymous #1156</small>
            <div>
              <span class="badge bg-light text-dark me-2" title="You're not alone">❤️ 2</span>
              <button class="btn btn-sm" style="background-color: #169a2cff; color: #fff;">Reply</button>
            </div>
          </div>

          <!-- Replies -->
          <div class="reply-box mt-3">
            <strong>Anonymous #2901:</strong> You’re not overthinking — it happens. Maybe try reaching out first?
          </div>
        </div>

        <!-- Static Post 3 -->
        <div class="card post-card p-4">
          <div class="d-flex justify-content-between align-items-start">
            <h5 class="card-title fw-bold">Struggling to sleep due to stress</h5>
            <span class="badge rounded-pill tag-pill">Mental Health</span>
          </div>
          <p class="card-text mt-2">My mind just won’t stop racing at night. Any advice to calm it down before sleeping?</p>
          <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
            <small class="anon-user">Anonymous #1873</small>
            <div>
              <span class="badge bg-light text-dark me-2" title="You're not alone">❤️ 4</span>
              <button class="btn btn-sm" style="background-color: #169a2cff; color: #fff;">Reply</button>
            </div>
          </div>

          <!-- Replies -->
          <div class="reply-box mt-3">
            <strong>Anonymous #1920:</strong> Try journaling before bed — it clears your thoughts.
          </div>
          <div class="reply-box">
            <strong>Anonymous #1349:</strong> Guided meditation helped me. There are some great ones on YouTube.
          </div>
        </div>

      </div>
    </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome for icons -->
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
/>

<!-- All Communities Section -->
<section class="all-communities py-5" style="background-color: #fdfdfd;">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="fw-bold" style="color:#e85353ff;">Explore All Communities</h2>
      <input type="text" id="communitySearch" class="form-control w-50" placeholder="Search communities... (e.g. stress, academic)">
    </div>

    <div class="row" id="communityList">

      <!-- Community 1 -->
      <div class="col-md-6 col-lg-4 mb-4 community-item" data-tags="mental wellness health stress anxiety burnout">
        <div class="card border-0 shadow-sm p-4 community-card h-100">
          <div class="d-flex align-items-center mb-3">
            <i class="fa-solid fa-brain fa-2x me-3"></i>
            <h5 class="mb-0">Mental Wellness</h5>
          </div>
          <p class="text-muted small">Focus on self-care, anxiety, and emotional support.</p>
          <div class="border-top pt-3">
            <p class="mb-1"><strong>🔥 Famous discussion:</strong> “How to deal with panic attacks before exams?”</p>
            <p class="mb-1"><strong>🕒 Recent:</strong> “Coping with semester burnout.”</p>
          </div>
          <a href="#" class="btn btn-sm mt-3 cta-button w-100">View Community</a>
        </div>
      </div>

      <!-- Community 2 -->
      <div class="col-md-6 col-lg-4 mb-4 community-item" data-tags="academics study motivation focus productivity">
        <div class="card border-0 shadow-sm p-4 community-card h-100">
          <div class="d-flex align-items-center mb-3">
            <i class="fa-solid fa-graduation-cap fa-2x me-3"></i>
            <h5 class="mb-0">Academic Support</h5>
          </div>
          <p class="text-muted small">Find study partners and share academic resources.</p>
          <div class="border-top pt-3">
            <p class="mb-1"><strong>🔥 Famous discussion:</strong> “How do you manage last-minute submissions?”</p>
            <p class="mb-1"><strong>🕒 Recent:</strong> “Group study vs solo study – which works better?”</p>
          </div>
          <a href="#" class="btn btn-sm mt-3 cta-button w-100">View Community</a>
        </div>
      </div>

      <!-- Community 3 -->
      <div class="col-md-6 col-lg-4 mb-4 community-item" data-tags="relationships friendship love trust social life">
        <div class="card border-0 shadow-sm p-4 community-card h-100">
          <div class="d-flex align-items-center mb-3">
            <i class="fa-solid fa-heart fa-2x me-3"></i>
            <h5 class="mb-0">Relationships</h5>
          </div>
          <p class="text-muted small">A safe space to talk about friendship, love, and social balance.</p>
          <div class="border-top pt-3">
            <p class="mb-1"><strong>🔥 Famous discussion:</strong> “Dealing with feeling left out.”</p>
            <p class="mb-1"><strong>🕒 Recent:</strong> “Long-distance friendship advice.”</p>
          </div>
          <a href="#" class="btn btn-sm mt-3 cta-button w-100">View Community</a>
        </div>
      </div>

      <!-- Community 4 -->
      <div class="col-md-6 col-lg-4 mb-4 community-item" data-tags="mindfulness growth meditation peace self improvement gratitude">
        <div class="card border-0 shadow-sm p-4 community-card h-100">
          <div class="d-flex align-items-center mb-3">
            <i class="fa-solid fa-spa fa-2x me-3" ></i>
            <h5 class="mb-0">Mindfulness & Growth</h5>
          </div>
          <p class="text-muted small">For mindfulness routines, gratitude, and personal growth tips.</p>
          <div class="border-top pt-3">
            <p class="mb-1"><strong>🔥 Famous discussion:</strong> “How to stay calm during chaos.”</p>
            <p class="mb-1"><strong>🕒 Recent:</strong> “30-day gratitude challenge update!”</p>
          </div>
          <a href="#" class="btn btn-sm mt-3 cta-button w-100">View Community</a>
        </div>
      </div>

      <!-- Community 5 -->
      <div class="col-md-6 col-lg-4 mb-4 community-item" data-tags="career goals planning resume internship success">
        <div class="card border-0 shadow-sm p-4 community-card h-100">
          <div class="d-flex align-items-center mb-3">
            <i class="fa-solid fa-briefcase fa-2x me-3"></i>
            <h5 class="mb-0">Career Talks</h5>
          </div>
          <p class="text-muted small">Talk about future goals, internships, and building confidence.</p>
          <div class="border-top pt-3">
            <p class="mb-1"><strong>🔥 Famous discussion:</strong> “How to prepare for your first interview.”</p>
            <p class="mb-1"><strong>🕒 Recent:</strong> “Balancing career prep and studies.”</p>
          </div>
          <a href="#" class="btn btn-sm mt-3 cta-button w-100">View Community</a>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- Communities Section -->
<section class="communities py-5" style="background-color: #fff;">
  <div class="container text-center">
    <h2 class="mb-4 fw-bold" style="color: <?php echo $COLOR_TEXT; ?>;">Join a Community</h2>
    <p class="text-muted mb-5">Find your circle — connect with students who share your experiences.</p>
    
    <div class="row justify-content-center">
      <!-- Community Card 1 -->
      <div class="col-md-3 col-sm-6 mb-4">
        <div class="card border-0 shadow-sm p-4 community-card h-100">
          <i class="fa-solid fa-brain fa-2x mb-3" style="color:#e85353ff;"></i>
          <h5>Mental Wellness</h5>
          <p class="text-muted small">Talk about mental health, anxiety, burnout, or self-care.</p>
          <a href="#" class="btn btn-sm cta-button">Join</a>
        </div>
      </div>

      <!-- Community Card 2 -->
      <div class="col-md-3 col-sm-6 mb-4">
        <div class="card border-0 shadow-sm p-4 community-card h-100">
          <i class="fa-solid fa-graduation-cap fa-2x mb-3" style="color:#e85353ff;"></i>
          <h5>Academic Support</h5>
          <p class="text-muted small">Get tips, motivation, or help with your academic journey.</p>
          <a href="#" class="btn btn-sm cta-button">Join</a>
        </div>
      </div>

      <!-- Community Card 3 -->
      <div class="col-md-3 col-sm-6 mb-4">
        <div class="card border-0 shadow-sm p-4 community-card h-100">
          <i class="fa-solid fa-heart fa-2x mb-3" style="color:#e85353ff;"></i>
          <h5>Relationships</h5>
          <p class="text-muted small">A safe space to talk about love, friendship, and connections.</p>
          <a href="#" class="btn btn-sm cta-button">Join</a>
        </div>
      </div>

      <!-- Community Card 4 -->
      <div class="col-md-3 col-sm-6 mb-4">
        <div class="card border-0 shadow-sm p-4 community-card h-100">
          <i class="fa-solid fa-spa fa-2x mb-3" style="color:#e85353ff;"></i>
          <h5>Mindfulness & Growth</h5>
          <p class="text-muted small">Share mindfulness routines, gratitude, and growth habits.</p>
          <a href="#" class="btn btn-sm cta-button">Join</a>
        </div>
      </div>
    </div>
  </div>
</section>


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
        <li><a href="/about">About Us</a></li>
        <li><a href="/team">Meet the Team</a></li>
        <li><a href="/privacy">Privacy & Safety</a></li>
        <li><a href="/terms">Terms of Use</a></li>
        <li><a href="/accessibility">Accessibility</a></li>
        <li><a href="/feedback">Send Feedback</a></li>
      </ul>
    </div>

    <!-- Right: Contact + Socials -->
    <div class="footer-right">
      <h4>Contact Us</h4>
      <p><a href="mailto:support@anonconnect.org">Safespace@gmail.com</a></p>

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
  const searchInput = document.getElementById("communitySearch");
  const communityItems = document.querySelectorAll(".community-item");

  searchInput.addEventListener("keyup", function () {
    const query = this.value.toLowerCase();
    communityItems.forEach(item => {
      const tags = item.getAttribute("data-tags").toLowerCase();
      const text = item.innerText.toLowerCase();
      if (tags.includes(query) || text.includes(query)) {
        item.style.display = "block";
      } else {
        item.style.display = "none";
      }
    });
  });
</script>

</body>

</html>