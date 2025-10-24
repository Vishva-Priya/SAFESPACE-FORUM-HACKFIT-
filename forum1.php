<?php
session_start();

// --- Database Connection ---
$host = "localhost";
$user = "root";
$pass = "";
$db   = "safespaceforum";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// --- Handle New Post ---
if (isset($_POST['post_submit'])) {
  $title = $_POST['post_title'];
  $content = $_POST['post_content'];
  $tag = $_POST['post_tag'];

  $stmt = $conn->prepare("INSERT INTO posts (title, content, tag, likes) VALUES (?, ?, ?, 0)");
  $stmt->bind_param("sss", $title, $content, $tag);
  $stmt->execute();
  $stmt->close();

  header("Location: " . $_SERVER['PHP_SELF']);
  exit();
}

// --- Handle Likes ---
if (isset($_POST['like_submit'])) {
  $post_id = $_POST['post_id'];
  $conn->query("UPDATE posts SET likes = likes + 1 WHERE id = $post_id");
  header("Location: " . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] ?? 1));
  exit();
}

// --- Handle Replies ---
if (isset($_POST['reply_submit'])) {
  $post_id = $_POST['post_id'];
  $reply_content = $_POST['reply_content'];

  $stmt = $conn->prepare("INSERT INTO replies (post_id, content) VALUES (?, ?)");
  $stmt->bind_param("is", $post_id, $reply_content);
  $stmt->execute();
  $stmt->close();

  header("Location: " . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] ?? 1));
  exit();
}

// --- Pagination ---
$postsPerPage = 3;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$offset = ($page - 1) * $postsPerPage;

$totalPostsResult = $conn->query("SELECT COUNT(*) as total FROM posts");
$totalPosts = $totalPostsResult->fetch_assoc()['total'];
$totalPages = ceil($totalPosts / $postsPerPage);

$sql = "SELECT * FROM posts ORDER BY created_at DESC LIMIT $postsPerPage OFFSET $offset";
$posts = $conn->query($sql);

// Color variables
$COLOR_PRIMARY_BG = '#fff9f9ff';
$COLOR_SECONDARY_CARD = '#dcd8d8ff';
$COLOR_CTA_UPLIFT = '#e85353ff';
$COLOR_TEXT = '#3C473B';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SafeSpace Forum</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

<style>
body {
  background-color: <?php echo $COLOR_PRIMARY_BG; ?>;
  color: <?php echo $COLOR_TEXT; ?>;
  font-family: 'Poppins', sans-serif;
}
  nav h1 {
      font-size: 1.5rem;
      letter-spacing: 0.5px;
    }
/* ---------- NAVBAR ---------- */
nav {
  background-color: #0ea8eaff;
  color: white;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0.8rem 2rem;
  box-shadow: 0 3px 10px rgba(0,0,0,0.1);
}
nav h1 {
  font-size: 1.6rem;
  font-weight: 600;
}
nav a {
  color: white;
  text-decoration: none;
  margin-left: 20px;
  font-weight: 500;
}
nav a:hover {
  opacity: 0.8;
}

/* ---------- POST STYLING ---------- */
.post-card {
  background-color: <?php echo $COLOR_SECONDARY_CARD; ?>;
  border: none;
  border-radius: 15px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.05);
  margin-bottom: 20px;
}
.tag-pill {
  background-color: #163e9a;
  color: white;
  font-size: 0.8rem;
  padding: 3px 10px;
  border-radius: 15px;
}
.reply-box {
  background: #f0f4f8;
  padding: 10px;
  border-radius: 10px;
  margin-top: 8px;
}
.cta-button {
  background-color: <?php echo $COLOR_CTA_UPLIFT; ?>;
  color: #fff;
  font-weight: bold;
  border: none;
  border-radius: 8px;
}
.cta-button:hover {
  opacity: 0.9;
}

/* ---------- PAGINATION ---------- */
.pagination .page-item.active .page-link {
  background-color: <?php echo $COLOR_CTA_UPLIFT; ?>;
  border-color: <?php echo $COLOR_CTA_UPLIFT; ?>;
  color: #fff;
}
.pagination .page-link {
  color: <?php echo $COLOR_CTA_UPLIFT; ?>;
}

/* ---------- FOOTER ---------- */
.footer {
  background: #1e1f29;
  color: #ffffff;
  padding: 25px 0;
}
.footer-container {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  max-width: 900px;
  margin: 0 auto;
}
.footer-left h2 { font-size: 1.8rem; }
.footer-center a, .footer-right a {
  color: white;
  text-decoration: none;
}
.footer-bottom {
  text-align: center;
  margin-top: 15px;
  border-top: 1px solid #333;
  padding-top: 8px;
  color: #ccc;
}
/* Logo image */
.logo {
  height: 80px;             /* fixes height so nav won’t expand too big */
  width: auto;              /* keep aspect ratio */
  display: block;           /* avoid inline whitespace surprises */
  margin-right: 0.5rem;     /* spacing between logo and the heading */
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
  </div>
</nav>

  <!-- Forum Body -->
  <div class="container py-5">
    
    <h1 class="text-center mb-5 fw-bold">SafeSpace Forum</h1>
    <div class="row">
      <!-- Left: Post Form -->
      <div class="col-md-4 mb-4">
        <div class="p-4 post-card">
          <h5 class="mb-3 fw-bold">Start a Discussion Anonymously</h5>
          <form method="POST">
            <div class="mb-3">
              <label for="post_title" class="form-label">Title</label>
              <input type="text" class="form-control" name="post_title" required>
            </div>
            <div class="mb-3">
              <label for="post_content" class="form-label">Your Post/Thoughts</label>
              <textarea class="form-control" name="post_content" rows="4" required></textarea>
            </div>
            <div class="mb-3">
              <label for="post_tag" class="form-label">Optional Tag</label>
              <select class="form-select" name="post_tag">
                <option>Select option</option>
                <option value="Mental Health">Mental Health</option>
                <option value="Academics">Academics</option>
                <option value="Relationships">Relationships</option>
                <option value="Stress">Stress</option>
                <option value="General">General</option>
              </select>
            </div>
            <button type="submit" name="post_submit" class="btn cta-button w-100">Post Anonymously</button>
          </form>
        </div>
      </div>

      <!-- Right: Display Posts -->
      <div class="col-md-8">
        <?php
        if ($posts->num_rows > 0) {
          while ($post = $posts->fetch_assoc()) {
            echo '<div class="card post-card p-4 mb-4">';
            echo '<div class="d-flex justify-content-between align-items-start">';
            echo '<h5 class="fw-bold">'.htmlspecialchars($post['title']).'</h5>';
            echo '<span class="badge tag-pill">'.htmlspecialchars($post['tag']).'</span>';
            echo '</div>';
            echo '<p class="mt-2">'.nl2br(htmlspecialchars($post['content'])).'</p>';

            echo '<div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">';
            echo '<small class="anon-user">Anonymous #'.$post['id'].'</small>';
            echo '<form method="POST" style="display:inline-block;">
                    <input type="hidden" name="post_id" value="'.$post['id'].'">
                    <button type="submit" name="like_submit" class="btn btn-sm" style="color:#e85353; border:none; background:none;">❤ '.$post['likes'].'</button>
                  </form>';
            echo '</div>';

            // Replies
            $replySql = "SELECT * FROM replies WHERE post_id = ".$post['id']." ORDER BY created_at ASC";
            $replies = $conn->query($replySql);
            while ($reply = $replies->fetch_assoc()) {
              echo '<div class="reply-box mt-2"><strong>Anonymous #'.$reply['id'].':</strong> '.htmlspecialchars($reply['content']).'</div>';
            }

            echo '<form method="POST" class="mt-3">
                    <input type="hidden" name="post_id" value="'.$post['id'].'">
                    <div class="input-group">
                      <input type="text" name="reply_content" class="form-control" placeholder="Write a reply..." required>
                      <button type="submit" name="reply_submit" class="btn btn-sm cta-button">Reply</button>
                    </div>
                  </form>';
            echo '</div>';
          }
        } else {
          echo '<p>No posts yet. Start the discussion!</p>';
        }
        ?>

        <!-- Pagination -->
        <?php if ($totalPages > 1): ?>
          <nav>
            <ul class="pagination justify-content-center mt-4">
              <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                  <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
              <?php endfor; ?>
            </ul>
          </nav>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <!-- Explore All Communities -->
  <section class="all-communities py-5" style="background-color: #fdfdfd;">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold" style="color:#e85353ff;">Explore All Communities</h2>
        <input type="text" id="communitySearch" class="form-control w-50" placeholder="Search communities... (e.g. stress, academic)">
      </div>

      <div class="row" id="communityList">

<!-- All Communities Section -->




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



        <!-- (Add the 5 large community cards here, same as your code) -->
        <!-- For brevity, the structure remains identical to your version -->
      </div>
    </div>
  </section>

  <!-- Join a Community -->
  

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


        <!-- 4 “Join” cards as before -->
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="footer-container">
      <div class="footer-left">
        <h2>SafeSpace</h2>
        <p>Empowering students to speak freely and support each other anonymously.</p>
      </div>
      <div class="footer-center">
        <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="forum.php">Forum</a></li>
          <li><a href="feedback.php">Feedback</a></li>
        </ul>
      </div>
      <div class="footer-right">
        <h4>Connect</h4>
        <div class="social-icons">
          <a href="#"><i class="fab fa-linkedin"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      © <?php echo date("Y"); ?> SafeSpace Forum. All rights reserved.
    </div>
  </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const searchInput = document.getElementById("communitySearch");
  const communityItems = document.querySelectorAll(".community-item");
  if (searchInput && communityItems.length) {
    searchInput.addEventListener("keyup", function () {
      const query = this.value.toLowerCase();
      communityItems.forEach(item => {
        const tags = item.getAttribute("data-tags").toLowerCase();
        const text = item.innerText.toLowerCase();
        item.style.display = (tags.includes(query) || text.includes(query)) ? "block" : "none";
      });
    });
  }
</script>
</body>
</html>
