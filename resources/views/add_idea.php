
<?php
    require_once __DIR__ . '/../../Helpers/SessionManager.php';

    $session = new SessionManager();
    $session->sessionProtection();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/resources/assets/css/reset.css"> <!-- source of reset style sheet www.css-tricks.com -->
    <link rel="stylesheet" href="/resources/assets/css/main.css">
    <link rel="stylesheet" href="/resources/assets/css/addIdea.css">
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
<!-- ADD IDEA FORM -->

    <form id="addIdea" method="POST" action="/Controller/IdeasController.php" enctype="multipart/form-data">

    <div class="headingContainer">
        <h1>Add Idea</h1>
        <a class="backButton" href="Ideas.php">Back</a>
    </div>
    
    <div class="inputWrapper">
        <label for="idea">Idea:*</label>
        <input maxlength="100" type="text" name="title" id="idea" placeholder="Write your idea in brief here" required>
    </div>

    <div class="inputWrapper">
        <label for="details">Details:*</label>
        <textarea maxlength="400" name="description" id="details" cols="30" rows="10" placeholder="Describe your idea in more detail" required></textarea>
    </div>

    <div class="inputWrapper">
        <label for="category">Category:*</label>
        <select name="category" id="category" form="addIdea" required> 
            <option value="" disabled selected hidden>Select Category</option>
            <option value="">Creative</option>
            <option value="">Social</option>
            <option value="">Technological</option>
            <option value="">Philosophical</option>
        </select>
    </div>


    <div class="inputWrapper">
        <label for="file">Add File(optional):</label>
        <input type="file" name="supporting_document" id="file">
    </div>


    <div class="checkboxWrapper">
        <input type="checkbox" name="tandc" id="tandc" value="accepted" required>
        <label for="tandc">I have accepted the terms and conditions*</label>
    </div>

    <div class="checkboxWrapper">
        <input type="checkbox" name="anonymous" id="anonymous" value="1">
        <label for="anonymous">Post anonymously</label>
    </div>
  
    <button type="submit">submit</button>

    <!-- YOU CAN USE THIS FOR ANY ERROR HANDLING -->
    <p class="errorMessage">*please fill in all details</p>
</form>

</div>
</main>



<!-- Scripts -->
<script src="/resources/assets/js/dropDown.js"></script>
</body>
</html>