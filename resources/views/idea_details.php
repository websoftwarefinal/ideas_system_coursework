
<?php
    require_once __DIR__ . './../../Helpers/SessionManager.php';
    require_once __DIR__ . './../../Controller/IdeasController.php';
    require_once __DIR__ . './../../Controller/CommentsController.php';

    $session = new SessionManager();
    $session->sessionProtection();

    $ideas = new IdeasController;
    $idea = null;

    $idea_id = null;
    if(isset($_GET['idea_id']) && $_GET['idea_id'] != ''){
        $idea_id = $_GET['idea_id'];
        $idea = $ideas->show($_GET['idea_id']);
    }

    $ideas->updatePopularity($idea_id);

    $filter = isset($_GET['filter']) ? $_GET['filter'] : '';

    $com = new CommentsController;
    $comments = $com->index($idea_id, $filter);

    // Getting the hostname for the application
    $hostname = $_SERVER['HTTP_HOST'];
    $port = $_SERVER['SERVER_PORT'];

    $host_name_with_port = $hostname;

    if($hostname == 'localhost'){
        $host_name_with_port = $hostname . ':' . $port;
    }

    $likes_count = $ideas->likesCount($idea_id);

    $dislikes_count = $ideas->dislikesCount($idea_id);

    $reports_count = $ideas->reportsCount($idea_id);
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
            <img src="/storage/images/logo.png" alt="University Logo.">
            <a href="/ideas">IDEAS</a>
        </div>
        <?php require_once __DIR__ . '/layouts/account_dropdown.php'; ?>
    </nav>
</header>


<!--MAIN BODY-->
<main class="main">

<div class="wrapper flexbox">

<!-- IDEA Details-->

<div id="idea">
    <div class="headingContainer">
        <h2>By <?php echo $idea['anonymous'] != '1' ? $idea['first_name'] . ' ' . $idea['last_name'] : 'Anonymous'; ?>
        <br><span>Date: <?php echo date('Y-m-d H:i:s', strtotime($idea['date'])); ?></span>
        </h2>
        <a class="backButton" href="/ideas">Back</a>
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
            <form action="/Controller/LikesController.php" method="POST">
                <div>
                    <input type="hidden" name="idea_id" value="<?php echo $idea_id; ?>" />
                    <button class="like"> 
                    Like</button>
                    <p><?php echo $likes_count; ?></p>
                </div>
            </form>

            <form action="/Controller/DislikesController.php" method="POST">
                <div>
                    <input type="hidden" name="idea_id" value="<?php echo $idea_id; ?>" />
                    <button class="dislike"> 
                    Dislike</button>
                    <p><?php echo $dislikes_count; ?></p>
                </div>
            </form>

            <form action="/Controller/ReportsController.php" method="POST">
                <input type="hidden" name="idea_id" value="<?php echo $idea_id; ?>" />
                <button class="report" style="width: 300px;">
                    Report <?php echo $reports_count; ?>
                </button>
            </form>
        </div>     
    </div>
</div>

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
        <p>List By: </p>
        <select name="listBy" onchange="redirectToPage(this.value)" value="<?php echo $filter; ?>" class="listBy">
            <option value="" disabled selected hidden>None</option>
            <option value="latest" <?php echo $filter == 'latest' ? 'selected' : ''; ?>>Latest</option>
            <option value="oldest" <?php echo $filter == 'oldest' ? 'selected' : ''; ?>>Oldest</option>
        </select>
    </div>


    <?php foreach($comments as $comment) { ?>
        <div class="commentBox" style="border-bottom: 1px solid #d0d0d0; padding-bottom: 0px !important;">
            <div class="headingContainer">
                <h2>By: <?php echo $comment['anonymous'] == '1' ? 'anonymous' : $comment['first_name'] . ' ' . $comment['last_name']; ?></h2>
                <h2><?php echo timeDifference($comment['date']); ?></h2>
                <!-- <a class="backButton" href="Ideas.php">Back</a> -->
            </div>

            <p class="commentDetails"><?php echo $comment['text']; ?></p>
        
            <div class="box2">
                <div class="iconContainer">
                <form action="" method="POST">
                    <input type="hidden" name="" value="" />
                    <button class="reportComment" style="width: 300px;">
                        Report 
                    </button>
                </form>
                </div>          
            </div>
    
        </div>
    <?php } ?>

</div>
   
</main>



<!-- Scripts -->
<script src="/resources/assets/js/dropDown.js"></script>
<script>
    function redirectToPage(value) {
        // Get the selected value
        let selectedValue = value;

        let urlParams = new URLSearchParams(window.location.search);
        let page = urlParams.get('page');

        // Redirect to the selected page
        window.location.href = '/idea-details?idea_id=15&filter=' + value;
    }
</script>

</body>
</html>