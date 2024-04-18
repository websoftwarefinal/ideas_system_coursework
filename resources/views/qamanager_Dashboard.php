
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/resources/assets/css/reset.css"> <!-- source of reset style sheet www.css-tricks.com -->
    <link rel="stylesheet" href="/resources/assets/css/main.css">
    <link rel="stylesheet" href="/resources/assets/css/qaStats.css"> 
    <title>Controls</title>
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
            <li><a class="active" href="qamanager_Statistics.php">DASHBOARD</a></li>
            <li><a href="qamanager_Controls.php">CONTROLS</a></li>
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


<!-- Statistics BOX -->
 <div class="statistics box">
    <h2>Statistics</h2>

        <div id="myChart"></div>
        <div class="statsTable">
                <table>
                    <thead>
                        <tr>
                            <th>Department</th>
                            <th>Ideas</th>
                            <th>Contributors</th>
                        </tr>
                    </thead>

                    <tr>
                        <td>Computer Science</td>
                        <td>5</td> 
                        <td>3</td>
                    </tr>

                    <tr>
                        <td>Engineering</td>
                        <td>5</td> 
                        <td>3</td>
                    </tr>

                    <tr>
                        <td>Medicine</td>
                        <td>5</td> 
                        <td>3</td>
                    </tr>


                    <tr>
                        <td>Law</td>
                        <td>5</td> 
                        <td>3</td>
                    </tr>
                </table>

            </div>

    </div> 
    



<!-- Exceptions BOX -->
        <div class="exceptions box">

            <h2>Exceptions</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Ideas without Comments</th>
                            <th>Anonymous Ideas</th>
                            <th>Anonymous Comments</th>
                        </tr>
                    </thead>

                    <tr>
                        <td>07</td>
                        <td>05</td> 
                        <td>03</td>
                    </tr>
                </table>
        </div>



</div>

</main>



<!-- Scripts -->
<script src="/resources/assets/js/dropDown.js"></script>
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script src="/resources/assets/js/Menu.js"></script>
<script src="/resources/assets/js/chartsGoogle.js"></script>
</body>
</html>