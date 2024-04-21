<?php 
include 'newdbconnect.php'; 
$department_tot=0;
$email_tot=0;
$idea_tot=0;

//Department Count
$sql01 = "SELECT count(department_id) department_tot FROM department"; 
$sth01 = $dbh->prepare($sql01);   
$result01 = $sth01->execute(array());
while ($row = $sth01->fetch(PDO::FETCH_ASSOC))  
{
   $department_tot=$row['department_tot'];
}

//Notification Count
$sql02 = "SELECT count(email_address) email_tot FROM staff"; 
$sth02 = $dbh->prepare($sql02);   
$result02 = $sth02->execute(array());
while ($row = $sth02->fetch(PDO::FETCH_ASSOC))  
{
   $email_tot=$row['email_tot'];
}

//Idea Count
$sql03 = "SELECT count(idea_id) idea_tot FROM idea"; 
$sth03 = $dbh->prepare($sql03);   
$result03 = $sth03->execute(array());
while ($row = $sth03->fetch(PDO::FETCH_ASSOC))  
{
   $idea_tot=$row['idea_total'];
}

if ($idea_tot===null)
{
$idea_tot=0;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>EWSD University - View Notifications</title>
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
 <link href="assets/css/style.css" rel="stylesheet">
 <!-- Custom CSS -->
 <style type="text/css">
<!--
.style1 {color: #000000}
-->
 </style>
</head>
<body>
   <?php include 'indexheaders.php'; ?>
   <main id="main">
   <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="section-title" style="padding-top: 30px; padding-bottom: 10px;">
          <h2>WELCOME TO THE UNIVERSITY OF EWSD</h2>
        </div>

        <div class="row content">
<form  method="post" action="">

<table width="1317" border="4" bordercolor="#000000">
  <tr align="left" valign="top">
    <td width="346" bordercolor="#000000" colsspan="3"><div align="center"><span class="style1">Departments</span></span></div></td>
    <td width="629" bordercolor="#000000" colsspan="3"><div align="center"><span class="style1">Ideas from Departments</span></span></div></td>
    <td width="314" bordercolor="#000000" colsspan="3"><div align="center"><span class="style1">Email Notifications</span></span></div></td>
  </tr>

   <tr align="left" valign="top">
    <td width="346" bordercolor="#000000" colsspan="3"><div align="center"><span class="style1"><?php echo $department_tot; ?></span></span></div></td>
    <td width="629" bordercolor="#000000" colsspan="3"><div align="center"><span class="style1"><?php echo $email_tot; ?></span></span></div></td>
    <td width="314" bordercolor="#000000" colsspan="3"><div align="center"><span class="style1"><?php echo $idea_tot ?></span></span></div></td>
  </tr> 
</table>

<table id="ratio_table" class="table table-striped table-hover" cellspacing="0" width="100%">
<strong><i><H5>
<?php echo "EWD University - View Notifications "; ?> 
</H5></i></strong>
<tr>
<tr style="font-size: 12px; border: 1px solid black;  
box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);padding: 3px;"> 
  <td colspan="2" align="center" bgcolor="#A7A8AA"><strong></strong></td>     
  <td bgcolor="#A7D8A8"><strong>Date</strong></td> 
   <td bgcolor="#A7D8A8"><strong>Staff Names</strong></td> 
  <td bgcolor="#A7D8A8"><strong>Idea Id</strong></td>      
  <td bgcolor="#A7D8A8"><strong>Title </strong></td>      
  <td bgcolor="#A7D8A8"><strong>Notifications </strong></td>      
  <td bgcolor="#A7D8A8"><strong>Anonymous </strong></td>   
  <td bgcolor="#A7D8A8"><strong>Supporting Document </strong></td>  
  <td bgcolor="#A7D8A8"><strong>Email </strong></td>   
         
 </tr>
<tbody>
<?php

// Show impounded record by date range and who has to assess
$sql04 = "SELECT 
		idea_id, 
		title, 
		description, 
		idea_date, 
		anonymous, 
		staff.staff_id as staff_id,
		CONCAT(first_name,' ',last_name) as names,
		supporting_document, 
		email 
	FROM idea,staff 
	WHERE idea.staff_id=staff.staff_id
	ORDER BY staff.staff_id"; 
	
$sth04 = $dbh->prepare($sql04);   
$result04 = $sth04->execute(array());
if ($result04) {
    if ($sth04->rowCount() > 0) {
        while ($row = $sth04->fetch(PDO::FETCH_ASSOC))  
        {
        ?>
            <tr style="font-size: 14px;"> 
             <td align="centr">
              <a HREF="update_idea.php?idea_id=
                  <?php print($row['idea_id']); ?>" class="btn btn-primary">Update</a> 
              </td>
              <td>
              <a HREF="delete_idean.php?idea_id=
                  <?php print($row['idea_id']); ?>" class="btn btn-danger">Delete</a> 
                </td>
                <td><?php print($row['idea_date']); ?></td>
				<td><?php print($row['names']); ?></td>
                <td><?php print($row['idea_id']);?></td>
                <td><?php print($row['title']);?></td>
                <td><?php print($row['description']); ?></td>
                <td><?php print($row['anonymous']); ?></td>
                <td><?php print($row['supporting_document']); ?></td>
                <td><?php print($row['email']); ?></td>
				
             </tr>
        <?php
        }
    } else {
        echo "Not found";
        // Handle the case when no rows are found
    }
} else {
    // Handle query execution error
    echo "Error executing the query";
}

?>
</tbody>
</table>
</form>
</div>
</div>
  <?php // include 'footer.php'; ?> 

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</section>
</main>
</body>
</html>
