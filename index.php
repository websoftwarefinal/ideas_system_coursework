<?php

require_once __DIR__ . '/Helpers/Database.php';

$user = new Database('users');

$users = $user->select(['first_name', 'last_name', 'email']);

foreach($users as $item){
    echo $item['first_name'] . ' ' . $item['last_name'] . '<br />'; 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/reset.css"> <!-- source of reset style sheet www.css-tricks.com -->
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="stylesheet" href="CSS/index.css">
    <title>Home</title>
</head>
<body>

  <!--HEADER/NAV-->
<header>
<nav>
<div class=logo>
    <img src="Images/logo.png" alt="">
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
    <form class="signIn" action="">
        <h2>SIGN IN</h2>
        <br>
        <input type="text" name="Username" id="Username" placeholder="Username">
        <input type="password" name="Password" id="Password" placeholder="Password">
        <button type="submit">Login</button>
        <a href="">Forgot Password?</a>
        <p class="errorMessage">Error Message</p>
    </form>
</div>
</main>



<!-- Scripts -->
<script src="JS/Menu.js"></script>

</body>
</html>