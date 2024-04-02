<?php 
require_once __DIR__ . '/../../Helpers/SessionManager.php';

require_once __DIR__ . '/../../Models/User.php';

$users = new User();

foreach($users->get('Staff') as $user){
    echo $user['first_name'] . ' ' . $user['last_name'] . '<br />';
}

$session = new SessionManager();
$session->sessionProtection();
?>


<form action="./Controller/Authentications.php" method="post">
    <input type="hidden" name="logout" id="logout">
    <button type="submit">Logout</button>
</form>