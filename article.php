<?php
session_start();

$articles = [
    "Overcoming Addiction: My Journey" => [
        "img" => "media/article1.jpg",
        "quote" => "I learnt that you sometimes need darkness to see the stars.",
        "full" => "I'm sure many can relate to this and I hope it helps someone struggling with what I struggled with for nearly a decade.
Addiction is hard to explain no matter what causes it. It corrupts your soul even if you are a good person inside with a strong moral compass. It's a struggle which is stigmatised and frowned upon. With nowhere to turn it becomes just you and it, chattering back and forth. It knows your every weakness and preys on your insecurities.
For me the change came when I lost the one person I truly loved because of it. After that I finally learnt that coexisting with an addiction is incompatible with life. I learnt that you sometimes need darkness to see the stars.
Changing was no easy feat. I was filled with grief, sadness, anger, despair, anxiety, fear and apathy. I also learnt that some things happen for a reason and maybe you're seeing this for a reason and just think about the advice which follows.
Tell someone, your closest friend, coworker or priest and tell them your struggle because the addiction feeds on fear of exposure. Once you tell someone else, that fear is gone. It's in the open for better or worse. You can finally let out the suppressed emotions which have burdened your mind for years.
That's the only thing that worked, it took for me to be at breaking point for it to work but it did. If you are feeling what I felt I urge you to speak to someone. Change happens when the pain of staying the same is greater than the pain of changing, if you are at this point then just think about what I've said.
I want to finish by saying that I understand what you are experiencing and that I am not preaching or moralising it but telling you how I broke the cycle.
Wishing you all the best and I hope this makes a difference for whom this resonates with."
    ],
   "Retirement from Farming: Finding a New Chapter" => [
        "img" => "media/article2.jpg",
        "quote" => "The land you’ve cared for so diligently deserves your rest, and you deserve to enjoy the peace that comes with it.",
        "full" => "This article was written by a Qwell mental health writer and contains the following themes: retirement, transitions.

Retirement is often seen as a time to relax, enjoy family, and take life a little slower. But for many farmers across the UK, stepping away from the land isn’t always straightforward. Farming isn’t just a job for many, it’s a way of life that’s woven into the fabric of daily existence, often for generations.

Unlike office workers or those in industries who can clock off and leave their work behind, UK farmers live with the rhythms of the seasons and the needs of their livestock every day. The fields don’t stop growing, and the animals still need care, no matter the time of day or year. Because of this, retiring from farming can feel less like a clear-cut decision and more like an ongoing responsibility.

If you or someone you know is thinking about retiring from farming, here are a few tips to make the journey smoother:

Plan ahead
Early planning is crucial. Talk openly with family members about who might take on the farm and what that transition might look like. Succession planning can help avoid uncertainty and ease emotional strain.

Seek advice
There are organisations ready to support you. The Royal Agricultural Benevolent Institution (RABI) provides confidential advice, financial support, and guidance for farmers and rural workers who are struggling or worried about retirement.

Explore flexible options
Sometimes full retirement isn’t possible or desirable. You might want to consider part-time work, leasing land, or working alongside the next generation as they take over. This can ease the shift without losing connection to the land.

Take care of your wellbeing
Farming can be physically and mentally demanding. Don’t hesitate to reach out for support with mental health or stress, especially during challenging seasons or transitions. That might be talking to a supportive friend, family member, or professional support through your GP, or digital mental health organisations like Qwell.

Connect with your community
Many rural communities have groups and networks where retired farmers share experiences, advice, and companionship. These connections can be a lifeline during change.

Retirement from farming isn’t always a tidy farewell. It’s often a gradual, deeply personal process. But with planning, support, and understanding, it can also be a rewarding new chapter. The land you’ve cared for so diligently deserves your rest, and you deserve to enjoy the peace that comes with it.

If you’re struggling or uncertain about retirement, don’t hesitate to contact RABI or similar rural support organisations. Help is available, and you’re not alone on this journey.

And remember, you can always reach out to the Qwell team for support, no matter how you are feeling."
   ],
    "Showing Up: A Day in the Life" => [
    "img" => "media/article3.jpg",
    "quote" => "Even on the hardest days, showing up is an act of courage.",
    "full" => "Showed up today.

When my alarm woke me and my heart sank at the thought of another day.
I showed up.

It’s not a good day.

I showed up for the school run. Other parents. Happy. Chatting. Together.
“Hi!”
“How’re you?”
“Oh, I’m fine, thank you!”
I’m not fine.

I showed up for the commute.
Alone.
In my head.
My thoughts.
My awful thoughts.
Trying. Trying not to think negatively. Trying not to compare myself to others. Always falling short.
Trying not to feel guilty.
Trying not to think about everyone on their pointless commute. To their pointless jobs. My pointless commute.
Pointless job.
Pointless life.

I showed up to work. Hate this place.
“Hi everyone!”
Smiling. Happy. Upbeat. Pleasantries.
I’m okay. I got this. It’s not that bad.
It is that bad.

I showed up for lunch break. Sitting with my colleagues. Everyone.
Chatting. Happy. Sociable.
I don’t fit in. I feel sad. I feel lonely. Depressed.
Try not to feel left out. Try make small talk.
Don’t let them see your sadness.
Listening to their stories of the fun things they’ve done. Are going to do.
Try not to feel angry. Angry at them because of their fun lives. More angry at me for being my miserable self.

Self loathing kicking in.
I hate myself.
Smile & laugh anyway.
I’m okay.
I’m not okay.

I showed up for home time. Picking the kids up. After school clubs. Homework. Squabbling. Making dinner. Sorting uniforms. Suppertime. Bedtime. Put on your happy face.
Everything’s fine.

I showed up for ‘me time’.
Whatever that is.
I don’t enjoy much anymore.
Don’t know how to relax.
Who am I?!
Why don’t I enjoy life?!
I must like doing something?!
Bored.
Boring.

I showed up today.

I’ll show up again tomorrow."
]

];

$title = $_GET['title'] ?? '';
if (!isset($articles[$title])) {
    echo "<p>Article not found. <a href='articles.php'>Back to Articles</a></p>";
    exit;
}

$article = $articles[$title];

if (!isset($_SESSION['comments'][$title])) {
    $_SESSION['comments'][$title] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty(trim($_POST['comment']))) {
    $comment = htmlspecialchars(trim($_POST['comment']));
    $_SESSION['comments'][$title][] = $comment;
    header("Location: article.php?title=".urlencode($title));
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo htmlspecialchars($title); ?></title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
body {
    font-family: 'Poppins', sans-serif;
    background: #fafafa;
    color: #333;
    margin: 0;
    padding: 0;
}
.container {
    max-width: 850px;
    margin: 50px auto;
    background: #fff;
    border-radius: 15px;
    padding: 40px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
}
h1 {
    text-align: center;
    color: #4A148C;
    font-size: 28px;
    margin-bottom: 25px;
}
.article-img {
    display: block;
    width: 100%;
    border-radius: 12px;
    margin-bottom: 20px;
}
.quote {
    font-style: italic;
    color: #6A1B9A;
    background: #f3e5f5;
    padding: 15px;
    border-left: 5px solid #6A1B9A;
    border-radius: 6px;
    margin: 25px 0;
}
.article-content p {
    line-height: 1.8;
    margin-bottom: 18px;
    text-align: justify;
}
.comment-section {
    margin-top: 40px;
    border-top: 2px solid #eee;
    padding-top: 25px;
}
.comment-section h3 {
    color: #4A148C;
    margin-bottom: 15px;
}
.comment-section ul {
    list-style: none;
    padding-left: 0;
}
.comment-section li {
    background: #f9f9f9;
    padding: 10px 15px;
    border-radius: 8px;
    margin-bottom: 10px;
}
.comment-section form {
    display: flex;
    gap: 10px;
    margin-top: 15px;
}
.comment-section input {
    flex: 1;
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #ccc;
}
.comment-section button {
    background: #6A1B9A;
    color: #fff;
    border: none;
    padding: 10px 18px;
    border-radius: 6px;
    cursor: pointer;
}
.comment-section button:hover {
    background: #4A148C;
}
.back-link {
    display: inline-block;
    margin-top: 30px;
    text-decoration: none;
    background: #EDE7F6;
    color: #4A148C;
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: 600;
}
.back-link:hover {
    background: #D1C4E9;
}
</style>
</head>
<body>

<div class="container">
    <h1><?php echo htmlspecialchars($title); ?></h1>
    <img src="<?php echo $article['img']; ?>" alt="<?php echo htmlspecialchars($title); ?>" class="article-img">
    <p class="quote">"<?php echo htmlspecialchars($article['quote']); ?>"</p>

    <div class="article-content">
        <?php
        $paragraphs = explode("\n", trim($article['full']));
        foreach ($paragraphs as $para) {
            if (trim($para) !== '') {
                echo "<p>" . htmlspecialchars($para) . "</p>";
            }
        }
        ?>
    </div>

    <div class="comment-section">
        <h3>Comments (<?php echo count($_SESSION['comments'][$title]); ?>)</h3>
        <ul>
            <?php foreach ($_SESSION['comments'][$title] as $comment): ?>
                <li><?php echo $comment; ?></li>
            <?php endforeach; ?>
        </ul>
        <form method="post">
            <input type="text" name="comment" placeholder="Add a comment..." required>
            <button type="submit">Comment</button>
        </form>
    </div>

    <a href="articles.php" class="back-link">← Back to Articles</a>
</div>

</body>
</html>
