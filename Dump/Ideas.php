
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/reset.css"> <!-- source of reset style sheet www.css-tricks.com -->
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="stylesheet" href="CSS/ideas.css">
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
            <a href="CreateAccount.php" class="addIdea">Add Idea</a>
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

    
   
    <a href=""class="idea">
        <div class="box">
            <h3>By User</h3>
            <p>Date: 12/12/12 12:12</p>
        </div>

        <p class="content"> A chocolate fountain</p>


        <div class="box2">
            <div class="iconContainer">
                <div class="icon">
                    <img src="Images/like.png" alt="">
                    <p>123</p>
                </div>

                <div class="icon">
                    <img src="Images/dislike.png" alt="">
                    <p>12</p>
                </div>

                <div class="icon">
                    <img src="Images/message.png" alt="">
                    <p>13</p>
                </div>

                <div class="icon">
                    <img src="Images/views.png" alt="">
                    <p>124 views</p>
                </div>
            </div>

            <p>Category: Name</p>
           
        </div>

        <hr>

            <div class="box2">
                <h3>Latest Comment</h3>
                <p>Date: 12/12/12 12:12</p>
            </div>

            <h3>From User</h3>
            <p>What the hell is this!?</p>

   
    </a>
    

    </div>

    <div class="box3">
        <a href="">Previous Page</a>
        <a href="">Next Page</a>
    </div>

    
</div>
</main>



<!-- Scripts -->
<script src="JS/dropDown.js"></script>
</body>
</html>