<?php 
session_start(); 


$x=0; 


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

$x=0; 

$username=$_POST['username'];
$pw=$_POST['pw'];
$unhashed_password=$_POST['pw'];;


$sql = "SELECT username, password FROM staff WHERE username=:username AND password=:pw";
$sth = $dbh->prepare($sql);   
$result = $sth->execute(array(':username'=>$username, ':pw'=>$pw)); 
while ($row = $sth->fetch(PDO::FETCH_ASSOC))  
{
      	$x=1;
                  
}


   if ($x==1) {   
       include 'mainpage.php';
   }else{     
       include 'errorpage.php';
       exit;
   }
?>