
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/reset.css"> <!-- source of reset style sheet www.css-tricks.com -->
    <link rel="stylesheet" href="../../CSS/main.css">
    <link rel="stylesheet" href="../../CSS/admin.css">
    <title>Administrator Controls</title>
</head>
<body>

  <!--HEADER/NAV-->
<header>
<nav>
    <p class="heading">Administrator Controls</p>

    <div class="user">
            <img src="../../storage/images/user_badge.png" alt="">

            <div class="dropDown">
                <img src="../../storage/images/user_badge.png" alt="">
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


<!-- ACCOUNT MANAGEMENT BOX---------------------------- -->
    <div class="accountManagement box">
        <div class="accountContainer">
            <h2>Account Management</h2>
            <a href="CreateAccount.php" class="createAccount">Add Account</a>
        </div>

        <div class="accounts">
            add table section here
        </div>
    </div>

    
    <div class="container">


<!-- DEADLINE MANAGEMENT BOX---------------------------- -->
        <div class="deadlineManagement box">

        <!-- DEADLINE VIEWS---------------------------- -->
            <h2>Deadlines</h2>

            <div>   
            <p>Final Deadline: <span class="finalDeadline">12/12/12</span></p>
            <p>Ideas Submission Deadline: <span class="ideasDeadline">11/12/12</span></p>
            </div>

        
        <!-- UPDATE DEADLINES--------------------------- -->
          
            <h3>Update</h3>
            <form action="" class="changeFinalDeadline">
                <label for="">Final Deadline:</label>
                <input type="date" name="" id="">
                <button>update</button>
            </form>

            <form action="" class="changeIdeasDeadline">
                <label for="">Ideas Deadline:</label>
                <input type="date" name="" id="">
                <button>update</button>
            </form>


        </div>


<!-- STATISTICS BOX---------------------------- -->
        <div class="statistics box">
            <h2>Statistics</h2>
           
        <!-- BROWSER INFORMATION -->
            <div class="browsers">
                 <h3>Browsers Used</h3>   
                <canvas id="myChart"></canvas>   
            </div>
               

            <div>

          <!-- ACTIVE USERS---------------------------- -->
            <div class="activeUser">
                <h3>Most Active User</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>User</th>
                            <th>Time</th>
                        </tr>
                    </thead>

                    <tr>
                        <td>1</td>
                        <td>someone@gmail.com</td> 
                        <td>12313</td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>someone@gmail.com</td> 
                        <td>12313</td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td>someone@gmail.com</td> 
                        <td>12313</td>
                    </tr>
                </table>

            </div>



        <!-- MOST VIEWED PAGE---------------------------- -->
            <div class="viewedPage">
                <h3>Most Viewed Page</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Page</th>
                            <th>View Count</th>
                        </tr>
                    </thead>

                    <tr>
                        <td>1</td>
                        <td>Idea</td> 
                        <td>12313</td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>Idea</td> 
                        <td>12313</td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td>Idea</td> 
                        <td>12313</td>
                    </tr>
                </table>

            </div>
            </div>
            
        </div>
    </div>

</div>
</main>



<!-- Scripts -->
<script src="../../JS/dropDown.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<script src="../../JS/chartscript.js"></script>
</body>
</html>