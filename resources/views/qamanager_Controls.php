
<?php
    require_once __DIR__ . './../../Controller/CategoriesController.php';
    require_once __DIR__ . './../../Models/User.php';
    require_once __DIR__ . './../../Helpers/SessionManager.php';

    $categories = new CategoriesController;

    $categories_list = $categories->index();

    $model = new User;
    $staffs = $model->getUsers();

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

<div class="heading box">
    <h2>QA Manager Controls</h2>
</div>

<!-- Download BOX -->
 <div class="download box">
    <h2>Download Center</h2>
    <p>You may download all files after the submission date has passed. <br><br> All documents will be downloaded as a zip file.</p>

    <div id="downloadsFormContainer">
        <form action="/Controller/QaManagersController.php" method="POST">
            <input type="hidden" name="_method" value="download_csv" />
            
            <button class="download">Download CSV</button>
        </form>

        <form action="/Controller/QaManagersController.php" method="POST">
            <input type="hidden" name="_method" value="download_files" />
            
            <button class="download">Download Files</button>
        </form>
    </div>

    <p class="errorMessage"><?php echo $session->get('down_file_error'); ?></p>
</div> 
    



<!-- Categories BOX -->
<div class="categories box">
            <h2>Categories</h2>
            <form id="updateCategory" action="/Controller/CategoriesController.php" method="POST">
                <div class="inputWrapper">
                    <label for="categoryInput">Insert Category:</label>
                    <input type="text" name="category_name" id="categoryInput" placeholder="Insert category to add" required>
                </div>
                <button class="addCategory">Add</button>
                <p class="errorMessage"><?php echo $session->get('categories_error'); ?></p>
            </form>
           
            <table>
                <thead>
                    <tr>
                        <th>Categories</th>
                    </tr>
                    
                </thead>

                <?php if($session->get('delete_category_error')){ ?>
                    <tr>
                        <td><p style="color: red; font-size: 16px;">*<?php echo $session->get('delete_category_error'); ?></p></td>
                    </tr>
                <?php } ?>

                <?php foreach($categories_list as $category) { ?>
                    <tr>
                        <td>
                            <?php echo $category['category_name']; ?>

                            <form id="removeCategory" action="/Controller/CategoriesController.php" method="POST">
                                <input type="hidden" name="_method" value="delete" />
                                <input type="hidden" name="category_id" value="<?php echo $category['category_id']; ?>" />
                                <button class="removeCategory">Remove</button>
                            </form>
                        </td> 
                    </tr>
                <?php } ?>
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

                    <?php foreach($staffs as $staff) { ?>
                    <tr>
                        <td>
                            
                        <p><?php echo $staff['first_name'] . ' ' . $staff['last_name']; ?> <span>Reports: <?php echo $model->count('report_idea', $staff['staff_id'], 'staff_id'); ?></span></p>

                        <form id="ban" action="/Controller/StaffsController.php" method="POST">
                            <input type="hidden" name="_method" value="update_status" />
                            <input type="hidden" name="staff_id" value="<?php echo $staff['staff_id']; ?>" />

                            <div class="checkboxWrapper">
                                <?php if($staff['posts_banned'] == 1) { ?>
                                    <input type="checkbox" name="posts_banned" id="hidePosts" value="1" checked>
                                <?php } ?>

                                <?php if($staff['posts_banned'] != 1) { ?>
                                    <input type="checkbox" name="posts_banned" id="hidePosts" value="1">
                                <?php } ?>

                                <label for="hidePosts">Hide Posts</label>
                            </div>
                            
                            <?php if($staff['account_status'] == 'banned') { ?>
                                <input type="hidden" name="status" value="active" />
                                <button class="ban">Unban</button>
                            <?php } ?>

                            <?php if($staff['account_status'] == 'active') { ?>
                                <input type="hidden" name="status" value="banned" />
                                <button class="ban">Ban </button>
                            <?php } ?>
                        </form>
                        </td> 
                    </tr>
                    <?php } ?>
                </table>
</div>



</div>

</main>

<?php 
    $session->unsetSession('delete_category_error');
    $session->unsetSession('down_file_error');
?>



<!-- Scripts -->
<script src="/resources/assets/js/dropDown.js"></script>
<script src="/resources/assets/js/Menu.js"></script>
</body>
</html>