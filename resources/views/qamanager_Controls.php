
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
        <img src="/storage/images/logo.png" alt="University Logo.">
        
        <ul>
            <li><a href="/qa-manager-dashboard">DASHBOARD</a></li>
            <li><a href="/qa-manager-controls">CONTROLS</a></li>
        </ul>
    </div>

    <?php require_once __DIR__ . '/layouts/account_dropdown.php'; ?>
</nav>
</header>


<!--MAIN BODY-->
<main class="main">
<div class="wrapper flexbox">


<!-- Download BOX -->
 <div class="download box">
    <h2>Download Center</h2>
    <p>You may download all files after the submission date has passed. <br><br> All documents will be downloaded as a zip file.</p>
    <button class="download">Download Files</button>
    <p class="errorMessage">Error Message</p>
</div> 
    



<!-- Categories BOX -->
<div class="categories box">
            <h2>Categories</h2>
            <form id="updateCategory" action="">

                <div class="inputWrapper">
                    <label for="categoryInput">Insert Category:</label>
                    <input type="text" name="categoryInput" id="categoryInput" placeholder="Insert category to add" required>
                </div>
                <button class="addCategory">Add</button>
                <p class="errorMessage">Error Message</p>

            </form>
            <table>
                <thead>
                    <tr>
                        <th>Categories</th>
                    </tr>
                </thead>

                <tr>
                    <td>name of category

                    <form id="removeCategory" action="">
                            <button class="removeCategory">Remove</button>
                        </form>
                    </td> 
                </tr>
            </table>

            
        </div>


<!-- Account blocking BOX -->
<div class="accountBan box">
            <h2>Account Banning</h2>
           
             
            <table>
                    <thead>
                        <tr>
                            <th>Accounts</th>
                        </tr>
                    </thead>

                    <tr>
                        <td>
                            
                        <p>account Name <span>Reports: 1</span></p>

                        <form id="ban" action="">
                        
                            <div class="checkboxWrapper">
                                <input type="checkbox" name="hidePosts" id="hidePosts" value="true">
                                <label for="hidePosts">Hide Posts</label>
                            </div>

                            <button class="ban">Ban </button>
                            <button class="unban">Unban</button>
                        </form>
                        </td> 
                    </tr>
                </table>
</div>



</div>

</main>



<!-- Scripts -->
<script src="/resources/assets/js/dropDown.js"></script>
<script src="/resources/assets/js/Menu.js"></script>
</body>
</html>