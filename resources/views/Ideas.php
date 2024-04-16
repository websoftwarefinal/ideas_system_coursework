<?php
    require_once __DIR__ . '/../../Helpers/SessionManager.php';
    require_once __DIR__ . '/../../Controller/IdeasController.php';

    $session = new SessionManager();
    $session->sessionProtection();

    $ideas = new IdeasController;

    $page = isset($_GET['page']) && $_GET['page'] != '' ? $_GET['page'] : 1;

    $filter = isset($_GET['filter']) ? $_GET['filter'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/resources/assets/css/reset.css"> <!-- source of reset style sheet www.css-tricks.com -->
    <link rel="stylesheet" href="/resources/assets/css/main.css">
    <link rel="stylesheet" href="/resources/assets/css/createAccount.css">
    <link rel="stylesheet" href="/resources/assets/css/ideas.css">
    <title>Ideas</title>
</head>
<body>

  <!--HEADER/NAV-->
<header>
<nav>
    <div class=logo>
        <img src="/storage/images/logo.png" alt="">
        <p>Ideas</p>
    </div>

    <div class="user">
            <img src="/storage/images/User_Badge.png" alt="">

            <div class="dropDown">
                <img src="/storage/images/User_Badge.png" alt="">
                <div class="userInfo">
                    <h2>Welcome User</h2>
                    <p class="email"> someone@gmail.com</p>
                    <p class="lastLogin">Last Login: 12/12/12</p>
                    <a href="" class="logoutButton">LOG OUT</a>
                </div>
            </div>
    </div>
 
</nav>
</header>


<!--MAIN BODY-->
<main class="main">
<div class="wrapper flexbox">

    <div class="deadline">
            <h2>Deadlines</h2>
            <p>Final: 12/12/12</p>
            <p>Ideas: 12/12/12</p>
    </div>

    <div class="heading">
            <h2>Ideas</h2>
            <a href="/add-idea" class="addIdea">Add Idea</a>
    </div>

    <div class="ideas">
     <div class="container">
        <p>List By:</p>
        <select onchange="redirectToPage(this.value)" value="<?php echo $filter; ?>" id="listBy">
            <option value="" disabled selected hidden>None</option>
            <option value="most-popular" <?php echo $filter == 'most-popular' ? 'selected' : ''; ?>>Most Popular</option>
            <option value="most-viewed" <?php echo ($filter == 'most-viewed') ? 'selected' : ''; ?>>Most Viewed</option>
            <option value="latest" <?php echo ($filter == 'latest') ? 'selected' : ''; ?>>Latest</option>
            <option value="oldest" <?php echo ($filter == 'oldest') ? 'selected' : ''; ?>>Oldest</option>
        </select>
    </div>

    
   <?php foreach($ideas->index($page, $filter) as $idea) { ?>
        <a href="/idea-details?idea_id=<?php echo $idea['idea_id']; ?>" class="idea">
            <div class="box">
                <h3>By User</h3>
                <p>Date: <?php echo date('Y-m-d H:i:s', strtotime($idea['date'])); ?></p>
            </div>

            <p class="content"><?php echo $idea['title']; ?></p>


            <div class="box2">
                <div class="statsContainer">
                    <div class="stats">
                        <p>Popularity: </p>
                        <p>123</p>
                    </div>

                    <div class="stats">
                        <p>Views:</p> 
                        <p>124</p>
                    </div>
                </div>

                <p>Category: Name</p>
            
            </div>

            <hr>

            <!-- <div class="comment">
                <div class="box2">
                    <h3>Latest Comment</h3>
                    <p>Date: 12/12/12 12:12</p>
                </div>

                <h3>From User</h3>
                <p>What the hell is this!?</p>
                
            </div>  -->
        </a>
    <?php } ?>
    

    </div>

    <div class="box3">
        <a href="/ideas?page=<?php if($page > 1) echo $page - 1; else echo 1;  ?><?php if($filter) echo "&filter=" . $filter; else ""; ?>">Previous Page</a>
        <a href="/ideas?page=<?php if($page < $ideas->total_pages) echo $page + 1; else echo $ideas->total_pages;  ?><?php if($filter) echo "&filter=" . $filter; else ""; ?>">Next Page</a>
    </div>
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
        window.location.href = '/ideas?page=1&filter=' + value;
    }
</script>
</body>
</html>