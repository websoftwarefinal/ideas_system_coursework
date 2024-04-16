<?php 
    require_once __DIR__ . '/../../../Helpers/SessionManager.php';
    require_once __DIR__ . '/../../../Models/User.php';
    $session = new SessionManager();

    $staff = new User;
    $staff_id = $session->get('staff_id');

    $staff_login = $staff->lastStaffLogin($staff_id);
?>

<div class="user">
    <img src="/storage/images/user_badge.png" alt="">

    <div class="dropDown">
        <img src="/storage/images/user_badge.png" alt="">
        <div class="userInfo">
            <h2>Welcome <?php echo $session->get('first_name'); ?></h2>
            <p class="email"><?php echo $session->get('username'); ?></p>
            <p class="lastLogin">Last Login: <?php echo $staff_login['date_time']; ?></p>

            <form action="/Controller/Authentications.php" method="post" style="width:100%;">
                <input type="hidden" name="logout" id="logout">
                <button type="submit"  class="logoutButton" style="width: 100%;">Logout</button>
            </form>
            <!-- <a href="" class="logoutButton">LOG OUT</a> -->
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="/resources/assets/js/dropDown.js"></script>