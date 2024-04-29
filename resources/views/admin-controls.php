<?php
    require_once __DIR__ . './../../Helpers/SessionManager.php';
    require_once __DIR__ . './../../Models/User.php';
    require_once __DIR__ . './../../Models/Deadline.php';

    $session = new SessionManager();
    $session->sessionProtection();

    $deadline = new Deadline;
    $current_deadline = $deadline->getCurrentDeadline();

    $deadline_date = isset($current_deadline['deadline_date']) ? explode(" ", $current_deadline['deadline_date'])[0] : '';

    $role = $session->get('role');

    if($role != 'Admin'){
        if($role == 'Staff'){
            header("Location: /ideas");
        }else if($role == 'QA Manager'){
            header("Location: /qa-manager-dashboard");
        }else if($role == 'QA Cordinator'){
            header("Location: /qa-cordinator-controls");
        }

        header("Location: /ideas");
    }

    $users = new User;
    $staffs = $users->getUsers();

    $most_active_users = $users->mostActiveUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/resources/assets/css/reset.css"> <!-- source of reset style sheet www.css-tricks.com -->
    <link rel="stylesheet" href="/resources/assets/css/main.css">
    <link rel="stylesheet" href="/resources/assets/css/admin.css">
    <title>Administrator Controls</title>
</head>
<body>

  <!--HEADER/NAV-->
<header>
<nav>
    <p class="heading">Administrator Controls</p>

    <?php require_once __DIR__ . '/layouts/account_dropdown.php'; ?>
</nav>
</header>


<!--MAIN BODY-->
<main class="main">
<div class="wrapper flexbox">


<!-- ACCOUNT MANAGEMENT BOX---------------------------- -->
    <div class="accountManagement box">
        <div class="accountContainer">
            <h2>Account Management</h2>
            <a href="/create-account" class="createAccount">Add Account</a>
        </div>

        <p>Number of Accounts: <span class="accountCount"><?php echo count($staffs); ?></span></p>

        <div class="accounts">
        <table>
                <thead>
                    <tr>
                        <th>Accounts</th>
                    </tr>
                </thead>

                <?php foreach($staffs as $staff) { ?>
                    <tr>
                        <td>
                            <div class="accountInfo">
                                <?php echo $staff['first_name'] . ' ' . $staff['last_name']; ?> <br>
                                <span>

                                <!-- Please check if this is correct -->
                                Email: <?php echo $staff['email_address']; ?>

                                <br>

                                Role: <?php echo $staff['role_name']; ?>
                                </span>
                            </div>

                          
                        </td> 
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>

    
    <div class="container">


<!-- DEADLINE MANAGEMENT BOX---------------------------- -->
        <div class="deadlineManagement box">

        <!-- DEADLINE VIEWS---------------------------- -->
            <h2>Deadlines</h2>

            <div>   
            <p>Final Deadline: <span class="finalDeadline"><?php echo $deadline_date; ?></span></p>
            <p>Ideas Submission Deadline: <span class="ideasDeadline"><?php echo $deadline_date; ?></span></p>
            </div>

        
        <!-- UPDATE DEADLINES--------------------------- -->
          
            <h3>Update</h3>
            <form action="/Controller/DeadlinesController.php" class="changeFinalDeadline" method="POST">
                <label for="">Final Deadline:</label>
                <input type="date" name="deadline_date" id="" placeholder="YYYY/MM/DD" value="<?php echo $deadline_date; ?>">
                <button>update</button>
            </form>

            <form action="/Controller/DeadlinesController.php" class="changeIdeasDeadline" method="POST">
                <label for="">Ideas Deadline:</label>
                <input type="date" name="deadline_date" id="" placeholder="YYYY/MM/DD" value="<?php echo $deadline_date; ?>">
                <button>update</button>
            </form>


        </div>


<!-- STATISTICS BOX---------------------------- -->
        <div class="statistics box">
            <h2>Statistics</h2>
           
        <!-- BROWSER INFORMATION -->
            <div class="browsers">
                 <h3>Browsers Used</h3>   
                <canvas id="myChart"  alt="Bar graph of browsers used."></canvas>   
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
                            <th>Last Login</th>
                        </tr>
                    </thead>
                    
                    <?php $count = 0; ?>
                    <?php foreach($most_active_users as $user) { ?>
                        <?php $count = $count + 1; ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $user['email_address']; ?></td> 
                            <td><?php echo $user['date_time']; ?></td>
                        </tr>
                    <?php } ?>
                </table>

            </div>



        <!-- MOST VIEWED PAGE---------------------------- -->
            <!--
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
            -->
            </div>
            
        </div>
    </div>

</div>
</main>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<script src="/resources/assets/js/chartscript.js"></script>
</body>
</html>