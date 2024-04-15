
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
        <a href="Ideas.php">Ideas</a>
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

<!-- IDEA Details-->

<form id="idea" action="">
    <div class="headingContainer">
                <h2>by User</h2>
                <h2>Date:12/12/12</h2>
                <!-- <a class="backButton" href="Ideas.php">Back</a> -->
    </div>
    <h1>Idea Title</h1>
    <p>Description of Idea loren ipsum</p>
    <button class="download">Download Attachment</button>

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

<form id="comment" action="">
    <h2>Add Comment</h2>

    <input maxlength="100" type="text" name="comment" id="commentText" placeholder="Write your comment here" required>

    <div class="inputWrapper">
        <button class="submitComment">Submit</button>
        <div class="checkboxWrapper">
            <input type="checkbox" name="anonymous" id="anonymous" value="anonymous">
            <label for="anonymous">Post anonymously</label>
        </div>
    </div>
</form>



<!-- Comments List -->

<div class="commentsList">
    <div class="inputWrapper">
            <h2>Comments</h2>
            <p>125 comments</p>
    </div>

    <div class="container">
        <p>List By:</p>
        <select name="listBy" class="listBy">
        <option value="" disabled selected hidden>None</option>
        <option value="latest">Latest</option>
        <option value="oldest">Oldest</option>
        </select>
    </div>


    <div class="commentBox">
        <div class="headingContainer">
                    <h2>by User</h2>
                    <h2>Date:12/12/12</h2>
                    <!-- <a class="backButton" href="Ideas.php">Back</a> -->
        </div>

        <p class="commentDetails">what the hell is this?</p>
    


                <div class="box2">
                    <div class="iconContainer">
                        <div>
                            <button class="likeComment"> 
                            Like</button>
                            <p>123</p>
                        </div>

                        <div>
                            <button class="dislikeComment"> 
                            Dislike</button>
                            <p>12</p>
                        </div>

                    <button class="reportComment">
                        Report
                    </button>
                    </div> 
                    
                </div>       
                
        <hr>


</div>

</div>

</div>
   
</main>



<!-- Scripts -->
<script src="/resources/assets/js/dropDown.js"></script>
</body>
</html>