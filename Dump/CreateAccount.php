
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/reset.css"> <!-- source of reset style sheet www.css-tricks.com -->
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="stylesheet" href="CSS/createAccount.css">
    <title>Administrator Controls</title>
</head>
<body>

  <!--HEADER/NAV-->
<header>
<nav>
    <p class="heading">Administrator Controls</p>


   
    <div class="user">
            <img src="Images/User_Badge.png" alt="">
            <div class="dropDown">
                <img src="Images/User_Badge.png" alt="">
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

<!-- CREATE ACCOUNT FORM -->

<!-- NOTE TO DEVS: USING REQUIRED IS NOT BEST PRACTISE BUT IVE PUT FOR YOU TO SPEED UP THE PROCESS. 
YOU CAN CHOOSE TO USE OTHER METHOD IF YOU WANT -->

<form class="createAccount" action="">

<div class="accountContainer">
            <h1>Create Account</h1>
            <a class="backButton" href="adminControls.php">Back</a>
</div>
    
    <div class="inputWrapper">
    <label for="lastName">Last Name:*</label>
    <input type="text" name="lastName" id="lastName" placeholder="Enter Last Name" required>
    </div>

    <div class="inputWrapper">
    <label for="firstName">First Name:*</label>
    <input type="text" name="firstName" id="firstName" placeholder="Enter First Name" required>
    </div>

    <div class="inputWrapper">
    <label for="number">Phone Number:*</label>
    <input type="number" name="number" id="number" placeholder="Enter Phone Number" required>
    </div>

    <div class="inputWrapper">
    <label for="position">Position:*</label>
    <select name="position" id="position" required> 
        <option value="admin">Administrator</option>
        <option value="" disabled selected hidden>Select Position</option>
        <option value="qaCoordinator">QA Coordinator</option>
        <option value="qaMananger">QA Manager</option>
        <option value="staff">General</option>
    </select>
    </div>

    <div class="inputWrapper">
    <label for="email">E-Mail:*</label>
    <input type="email" name="email" id="email" placeholder="Enter E-Mail" required>
    </div>

    <div class="inputWrapper">
    <label for="pwd">Password:*</label>
    <input type="password" name="pwd" id="pwd" placeholder="Enter Password" required>
    </div>

    <div class="inputWrapper">
    <label for="confirmPwd">Confirm Password:*</label>
    <input type="password" name="confirmPwd" id="confirmPwd" placeholder="Confirm Password" required>
    </div>

    <button type="submit">Create</button>

    <!-- YOU CAN USE THIS FOR ANY ERROR HANDLING -->
    <p class="errorMessage">*please fill in all details</p>
</form>

</div>
</main>



<!-- Scripts -->
<script src="JS/dropDown.js"></script>
</body>
</html>