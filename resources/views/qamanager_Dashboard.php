
<?php
    require_once __DIR__ . './../../Controller/CategoriesController.php';
    require_once __DIR__ . './../../Controller/QaManagerStatisticsController.php';
    
    $statistics = new QaManagerStatisticsController;

    $exceptions = $statistics->exceptions();
    $statistics = $statistics->statistics();

    $session = new SessionManager;

    $session->sessionProtection();

    $role = $session->get('role');

    if($role != 'QA Manager'){
        if($role == 'Staff'){
            header("Location: /ideas");
        }else if($role == 'Admin'){
            header("Location: /admin-controls");
        }else if($role == 'QA Cordinator'){
            header("Location: /qa-cordinator-controls");
        }
    }
?>

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

<div class="heading box">
    <h2>QA Manager Dashboard</h2>
</div>

<!-- Statistics BOX -->
 <div class="statistics box">
    <h2>Statistics</h2>

        <div id="myChart" alt="Statistics chart of ideas submitted."></div>
        <div class="statsTable">
                <table style="max-width: 300px;">
                    <thead>
                        <tr>
                            <th>Department</th>
                            <th>Ideas</th>
                            <th>Contributors</th>
                        </tr>
                    </thead>

                    <?php foreach($statistics as $statistic) { ?>
                        <tr>
                            <td><?php echo $statistic['department_name']; ?></td>
                            <td><?php echo $statistic['ideas']; ?></td> 
                            <td><?php echo $statistic['contributors']; ?></td>
                        </tr>
                    <?php } ?>
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
                        <td><?php echo $exceptions['ideas_without_comments']; ?></td>
                        <td><?php echo $exceptions['anonymous_ideas']; ?></td> 
                        <td><?php echo $exceptions['anonymous_comments']; ?></td>
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