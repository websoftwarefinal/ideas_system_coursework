
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/resources/assets/css/reset.css"> <!-- source of reset style sheet www.css-tricks.com -->
    <link rel="stylesheet" href="/resources/assets/css/main.css">
    <link rel="stylesheet" href="/resources/assets/css/qaControls.css"> 
    <title>Statistics</title>
</head>
<body>

  <!--HEADER/NAV-->
<header>
<nav>

        <div class="burgerMenu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>

    <div class=logo>
        <img src="/storage/images/logo.png" alt="">
        
        <ul>
            <li><a href="/qa-manager-controls">CONTROLS</a></li>
            <li><a href="/qa-manager-statistics">STATISTICS</a></li>
        </ul>
    </div>

    

   
    <div class="user">
            <img src="/storage/images/User_Badge.png" alt="">
            <div class="dropDown">
                <img src="/storage/images/User_Badge.png" alt="">
                <h2>Welcome QA Manager</h2>
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


<!-- Download BOX -->
 <div class="download box">
    <h2>Download Center</h2>
    <p>You may download all files in a csv after the submission date has passed. <br><br> All attachments documents will be downloaded as a zip file.</p>
    <button class="download">Download Files</button>
    <p class="errorMessage">Error Message</p>
</div> 
    



<!-- Categories BOX -->
        <div class="categories box">
            <h2>Categories</h2>
            <div class="categoryList">
                <p>List of Categories</p>
                <ul>
                    <li>Category</li>
                </ul>
            </div>

            <form id="updateCategory" action="">

                <div class="inputWrapper">
                    <label for="categoryInput">Insert Category:</label>
                    <input type="text" name="categoryInput" id="categoryInput" placeholder="Insert category to add or remove" required>
                </div>

                <button class="addCategory">Add</button>
                <button class="removeCategory">Remove</button>
                <p class="errorMessage">Error Message</p>
            </form>

            
        </div>


<!-- Account blocking BOX -->
<div class="accountBan box">
            <h2>Account Banning</h2>
           
            <form id="ban" action="">
                <div class="inputWrapper">
                    <label for="userBan">Insert User's Email:</label>
                    <input type="text" name="userBan" id="userBan" placeholder="Insert email" required>
                </div>

                <div class="checkboxWrapper">
                    <input type="checkbox" name="hidePosts" id="hidePosts" value="true">
                    <label for="hidePosts">Hide all posts by the user</label>
                </div>

                <button class="ban">Ban User</button>
                <button class="unban">Unban User</button>
            </form>

            <p class="errorMessage">Error Message</p>
        </div>



</div>

</main>



<!-- Scripts -->
<script src="/resources/assets/js/dropDown.js"></script>
<script src="/resources/assets/js/Menu.js"></script>
</body>
</html>