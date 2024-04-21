<?php
$localhost = 'localhost';
$superuser = 'root';
$superpw = '';
$db = 'ewd_database';
// Try using procedural and PDO connections
try {
   $dbh = new PDO("mysql:host=$localhost;dbname=$db", $superuser, $superpw); 
   $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch(PDOException $e) {
   echo $e->getMessage();
}

?>


