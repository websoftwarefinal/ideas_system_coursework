<?php
    include __DIR__ . './../../Helpers/Config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/resources/assets/css/reset.css"> <!-- source of reset style sheet www.css-tricks.com -->
    <link rel="stylesheet" href="/resources/assets/css/main.css">
    <link rel="stylesheet" href="/resources/assets/css/index.css">
    <title>Home</title>
</head>
<body>

  <!--HEADER/NAV-->
<header>
<nav>
<div class=logo>
    <img src="/storage/images/logo.png" alt="University Logo.">
    <p>UNIVERSITY OF EWSD</p>
</div>
    <ul>
        <li><a href="">ACADEMICS</a></li>
        <li><a href="">ABOUT US</a></li>
        <li><a href="">APPLY</a></li>
    </ul>

<div class="burgerMenu">
    <span class="bar"></span>
    <span class="bar"></span>
    <span class="bar"></span>
</div>
</nav>
</header>


<!--MAIN BODY-->
<main class="main">
<div class="wrapper flexbox">
    <div class="intro">
        <h1>WELCOME TO<br>THE UNIVERSITY<br>OF EWSD</h1>
    </div>


 <!-- NOTE TO CODERS: IM LEAVING THE ATTRIBUTES EMPTY FOR YOU GUYS TO CHOOSE YOURSELVES -->
 <!-- SIGN IN FORM -->
    <form class="signIn" action="./Controller/Authentications.php" method="post">
        <h2>SIGN IN</h2>
        <br>
        <div class="inputWrapper">
            <label for="Username">Username:</label>
            <input type="text" name="username" id="Username" placeholder="Enter Email Address" required>
        </div>

        <div class="inputWrapper">
            <label for="Password">Password:</label>
            <input type="password" name="password" id="Password" placeholder="Enter Password" required>
        </div>
        <button type="submit">Login</button>
        <a href="">Forgot Password?</a>
        <p class="errorMessage"><?php echo $session->get('error') ; ?></p>
    </form>
</div>
</main>

<!-- Scripts -->
<script src="/resources/assets/js/Menu.js"></script>

</body>
</html>