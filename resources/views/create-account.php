<?php
    require_once __DIR__ . './../../Helpers/SessionManager.php';
    require_once __DIR__ . './../../Models/Model.php';

    $session = new SessionManager();
    $session->sessionProtection();

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

    $model = new Model;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/resources/assets/css/reset.css"> <!-- source of reset style sheet www.css-tricks.com -->
    <link rel="stylesheet" href="/resources/assets/css/main.css">
    <link rel="stylesheet" href="/resources/assets/css/createAccount.css">

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

<!-- CREATE ACCOUNT FORM -->

<!-- NOTE TO DEVS: USING REQUIRED IS NOT BEST PRACTISE BUT IVE PUT FOR YOU TO SPEED UP THE PROCESS. 
YOU CAN CHOOSE TO USE OTHER METHOD IF YOU WANT -->

<form id="createAccount" action="/Controller/AccountsController.php" method="POST">

    <div class="accountContainer">
        <h1>Create Account</h1>
        <a class="backButton" href="/admin-controls">Back</a>
    </div>
    
    <div class="inputWrapper">
    <label for="lastName">Last Name:*</label>
    <input type="text" name="first_name" id="lastName" placeholder="Enter Last Name" required>
    </div>

    <div class="inputWrapper">
    <label for="firstName">First Name:*</label>
    <input type="text" name="last_name" id="firstName" placeholder="Enter First Name" required>
    </div>

    <div class="inputWrapper">
    <label for="number">Phone Number:*</label>
    <input type="tel" name="phone_number" id="number" placeholder="Enter Phone Number" required>
    </div>


    <div class="inputWrapper">
    <label for="email">E-Mail:*</label>
    <input type="email" name="email" id="email" placeholder="Enter E-Mail" required>
    </div>

    <div class="inputWrapper">
    <label for="role">Role:*</label>
    <select name="role_id" id="role" required> 
        <option value="" disabled selected hidden>Select Position</option>
        <?php foreach($model->get('Roles') as $role) { ?>
            <option value="<?php echo $role['role_id']; ?>"><?php echo $role['role_name']; ?></option>
        <?php } ?>
    </select>
    </div>

    <!-- i havent set any departments since we havent yet chosen what those will be -->
    <div class="inputWrapper">
    <label for="department">Department:*</label>
    <select name="department_id" id="department" required> 
        <option value="" disabled selected hidden>Select Department</option>
        <?php foreach($model->get('Department') as $department) { ?>
            <option value="<?php echo $department['department_id']; ?>"><?php echo $department['department_name']; ?></option>
        <?php } ?>
    </select>
    </div>


    <div class="inputWrapper">
    <label for="pwd">Password:*</label>
    <input type="password" name="password" id="pwd" placeholder="Enter Password" required>
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
<script src="/resources/assets/js/dropDown.js"></script>
</body>
</html>