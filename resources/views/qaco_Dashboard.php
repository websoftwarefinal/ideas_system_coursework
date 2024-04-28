<?php
    require_once __DIR__ . './../../Helpers/SessionManager.php';
    require_once __DIR__ . './../../Models/Model.php';
    require_once __DIR__ . './../../Models/Idea.php';
    require_once __DIR__ . './../../Models/User.php';

    $session = new SessionManager();
    $session->sessionProtection();

    $department_id = $session->get('department_id');

    $model = new Model;
    $department_staff_count = $model->count('Staff', $department_id, 'department_id');

    $idea = new Idea;
    $department_ideas_count = $idea->countIdeasInDepartment($department_id);

    $department_ideas = $idea->ideasInDepartment($department_id);

    $department = $model->find('Department', $department_id, 'department_id');

    $user = new User;
    $department_contributors_count = $user->departmentContributorCount($department_id);
?>

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


<div class="burgerMenu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>

<div class=logo>
        <img src="Images/logo.png" alt="university logo">
        
        <ul>
            <li><a class="active" href="/qa-coordinator">DASHBOARD</a></li>
            <li><a  href="/ideas">IDEAS</a></li>
         </ul>
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
            <h2>Department: <span><?php echo $department['department_name']; ?></span> </h2>
                <table>
                    <thead>
                        <tr>
                            <th>Members in Department</th>
                            <th>Ideas from Department</th>
                            <th>Contributors</th>
                        </tr>
                    </thead>

                    <tr>
                        <td><?php echo $department_staff_count; ?></td>
                        <td><?php echo $department_ideas_count; ?></td> 
                        <td><?php echo $department_contributors_count; ?></td>
                    </tr>
                </table>

        </div>



        <!-- Main stats BOX -->
    <div class="box">
        <h2>Department Ideas</h2>
            <table class="rankings">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Title</th>
                        <th>Idea</th>
                    </tr>
                </thead>

                <?php foreach($department_ideas as $idea) { ?>
                    <tr>
                        <td><?php echo $idea['first_name']; ?></td>
                        <td><?php echo $idea['last_name']; ?></td>
                        <td><?php echo $idea['title']; ?></td> 
                        <td><?php echo $idea['description']; ?></td>
                    </tr>
                <?php } ?>
            </table>

    </div>




</div>

</main>



<!-- Scripts -->
<script src="/resources/assets/js/dropDown.js"></script>
<script src="/resources/assets/js/Menu.js"></script>
</body>
</html>