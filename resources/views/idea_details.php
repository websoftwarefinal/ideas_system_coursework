
<?php
    require_once __DIR__ . '/../../Helpers/SessionManager.php';
    require_once __DIR__ . '/../../Controller/IdeasController.php';
    require_once __DIR__ . '/../../Controller/CommentsController.php';

    $session = new SessionManager();
    $session->sessionProtection();

    $ideas = new IdeasController;
    $idea = null;

    $idea_id = null;
    if(isset($_GET['idea_id']) && $_GET['idea_id'] != ''){
        $idea_id = $_GET['idea_id'];
        $idea = $ideas->show($_GET['idea_id']);
    }

    $com = new CommentsController;
    $comments = $com->index($idea_id);

    // Getting the hostname for the application
    $hostname = $_SERVER['HTTP_HOST'];
    $port = $_SERVER['SERVER_PORT'];

    $host_name_with_port = $hostname;

    if($hostname == 'localhost'){
        $host_name_with_port = $hostname . ':' . $port;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/resources/assets/css/reset.css"> <!-- source of reset style sheet www.css-tricks.com -->
    <link rel="stylesheet" href="/resources/assets/css/main.css">
    <link rel="stylesheet" href="/resources/assets/css/ideaPage.css">
    <title>Add Idea</title>
</head>
<body>

  <!--HEADER/NAV-->
<header>
    <nav>
        <div class=logo>
            <img src="/storage/images/logo.png" alt="">
            <a href="/ideas">Ideas</a>
        </div>
        <?php require_once __DIR__ . '/layouts/account_dropdown.php'; ?>
    </nav>
</header>


<!--MAIN BODY-->
<main class="main">

<div class="wrapper flexbox">

<!-- IDEA Details-->

<form id="idea" action="">
    <div class="headingContainer">
        <h2>By <?php echo $session->get('first_name') . ' ' . $session->get('last_name'); ?></h2>
        <h2>Date: <?php echo date('Y-m-d H:i:s', strtotime($idea['date'])); ?></h2>
        <!-- <a class="backButton" href="Ideas.php">Back</a> -->
    </div>

    <h1><?php echo $idea['title']; ?></h1>
    <p><?php echo $idea['description']; ?></p>

    <?php if($idea['supporting_document'] != '') { ?>
        <a href="http://<?php echo $host_name_with_port . $idea['supporting_document']; ?>" download>
            <button type="button" class="download">
                Download Attachment
            </button>
        </a>
    <?php } ?>

    <div class="box2">
        <div class="iconContainer">
            <div>
                <button class="like"> 
                Like</button>
                <p>123</p>
            </div>

            <div>
                <button class="dislike"> 
                Dislike</button>
                <p>12</p>
            </div>

            <button class="report">
                Report
            </button>
        </div>     
    </div>
</form>

<!-- Add Comment -->

<form id="comment" action="/Controller/CommentsController.php" method="POST">
    <h2>Add Comment</h2>

    <input type="hidden" name="idea_id" value="<?php echo $idea_id; ?>" />
    <input maxlength="100" type="text" name="comment" id="commentText" placeholder="Write your comment here" required>

    <div class="inputWrapper">
        <button class="submitComment">Submit</button>
        <div class="checkboxWrapper">
            <input type="checkbox" name="anonymous" id="anonymous" value="1">
            <label for="anonymous">Post anonymously</label>
        </div>
    </div>
</form>

<!-- Comments List -->

<div class="commentsList">
    <div class="inputWrapper">
            <h2>Comments</h2>
            <p><?php echo count($comments); ?> comments</p>
    </div>

    <div class="container">
        <p>List By:</p>
        <select name="listBy" class="listBy">
        <option value="" disabled selected hidden>None</option>
        <option value="latest">Latest</option>
        <option value="oldest">Oldest</option>
        </select>
    </div>


    <?php foreach($comments as $comment) { ?>
        <div class="commentBox">
            <div class="headingContainer">
                <h2>By User</h2>
                <h2><?php echo timeDifference($comment['date']); ?></h2>
                <!-- <a class="backButton" href="Ideas.php">Back</a> -->
            </div>

            <p class="commentDetails"><?php echo $comment['text']; ?></p>
        
            <div class="box2">
                <div class="iconContainer">
                    <div>
                        <button class="likeComment"> 
                        Like</button>
                        <p>123</p>
                    </div>


                <div class="box2">
                    <div class="iconContainer">
                        <!-- <div>
                            <button class="likeComment"> 
                            Like</button>
                            <p>123</p>
                        </div>

                        <div>
                            <button class="dislikeComment"> 
                            Dislike</button>
                            <p>12</p>
                        </div> -->

                    <button class="reportComment">
                        Report
                    </button>
                    </div> 
                </div>          
            </div>
    
        </div><hr style="margin-top: 10px;">
        <?php } ?>

</div>
   
</main>



<!-- Scripts -->
<script src="/resources/assets/js/dropDown.js"></script>
</body>
</html>