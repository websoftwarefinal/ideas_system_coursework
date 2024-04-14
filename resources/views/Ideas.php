<?php
    require_once __DIR__ . '/../../Helpers/SessionManager.php';

    $session = new SessionManager();
    $session->sessionProtection();
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
        <img src="Images/logo.png" alt="">
        <p>Ideas</p>
    </div>

    <div class="user">
            <img src="Images/User_Badge.png" alt="">

            <div class="dropDown">
                <img src="Images/User_Badge.png" alt="">
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
            <a href="AddIdea.php" class="addIdea">Add Idea</a>
    </div>

    <div class="ideas">
     <div class="container">
        <p>List By:</p>
        <select name="" id="listBy">
        <option value="" disabled selected hidden>None</option>
        <option value="mostPopular">Most Popular</option>
        <option value="mostViewed">Most Viewed</option>
        <option value="latest">Latest</option>
        <option value="oldest">Oldest</option>
        </select>
    </div>

    
   
    <a href="IdeaPage.php"class="idea">
        <div class="box">
            <h3>By User</h3>
            <p>Date: 12/12/12 12:12</p>
        </div>

        <p class="content"> A chocolate fountain</p>


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
    

    </div>

    <div class="box3">
        <a href="">Previous Page</a>
        <a href="">Next Page</a>
    </div>

    
</div>
</main>




<!-- Scripts -->
<script src="/resources/assets/js/dropDown.js"></script>
</body>
</html>