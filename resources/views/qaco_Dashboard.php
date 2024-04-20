
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/resources/assets/css/reset.css"> <!-- source of reset style sheet www.css-tricks.com -->
    <link rel="stylesheet" href="/resources/assets/css/main.css">
    <link rel="stylesheet" href="/resources/assets/css/qacoDashboard.css"> 
    <title>QA Coordinator Dashboard</title>
</head>
<body>

  <!--HEADER/NAV-->
<header>
<nav>


    <div class=logo>
        <img src="/storage/images/logo.png" alt="University Logo.">
        <p>Coordinator Dashboard</p>
    </div>

    <?php require_once __DIR__ . '/layouts/account_dropdown.php'; ?>
</nav>
</header>


<!--MAIN BODY-->
<main class="main">
<div class="wrapper flexbox">

<div class="heading box">
    <h2>QA Coordinator Dashboard</h2>
</div>

    <!-- Main stats BOX -->
    <div class="box">
            <h2>Department: <span>Department Name</span> </h2>
                <table>
                    <thead>
                        <tr>
                            <th>Members in Department</th>
                            <th>Ideas from Department</th>
                            <th>Contributors</th>
                        </tr>
                    </thead>

                    <tr>
                        <td>07</td>
                        <td>05</td> 
                        <td>03</td>
                    </tr>
                </table>

        </div>



        <!-- Main stats BOX -->
    <div class="box">
        <h2>Top Contributors</h2>
            <table class="rankings">
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>User</th>
                        <th>Contributions</th>
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

                <tr>
                    <td>4</td>
                    <td>someone@gmail.com</td> 
                    <td>12313</td>
                </tr>

                <tr>
                    <td>5</td>
                    <td>someone@gmail.com</td> 
                    <td>12313</td>
                </tr>
            </table>

    </div>




</div>

</main>



<!-- Scripts -->
<script src="/resources/assets/js/dropDown.js"></script>
</body>
</html>