<?php
require 'db.php';

session_start();
if(isset($_SESSION['User'])){
	$User = $_SESSION['User'];
}else{
	header("location:/studfyp/login.php");
}
  $sql = 'SELECT `industry_representative`,`industry_company`,`industry_address`,`industry_phone`,`industry_email` FROM `industry` WHERE 1';

  $statement = $connection->prepare($sql);
  $statement->execute();
  $studfyp = $statement->fetchAll(PDO::FETCH_OBJ);?>
<!DOCTYPE html>

<!-- BCS 2243 WEB ENGINEERING
GROUP : 2B-2
PROJECT : UMP-FK FINAL YEAR PROJECT MANAGEMENT SYSTEM (StudFYP)
MODULE : No.5 (EVALUTOR)
NAME : KHALED AHMED BAMAJBOUR 
MATRIC NO : CB19129 -->

<html xmlns="http://www.w3.org/1999/xhtml%22%3E
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>UMP-FK Final Year Project Management System (StudFYP)</title>
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/css/style.css" rel="stylesheet" />
    </head>
    <body>
        <!-- HEADER SECTION -->
        <?php include('includes/header.php');?>
        <?php include('includes/menubar.php');?>
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"><h4 class="page-head-line">Profile Details</h4></div>
                </div>
                <span style="color:red;" ></span>

                    <div class="row" align="center">


                    <?php foreach($studfyp as $UserID) {?>
 
    
 

 <table class="table" name="table"> 
   <tr><td> Full Name
   </td><td><i><?= $UserID->industry_representative; ?></i> 
   </td> </tr> 

 
   <tr><td> Company
   </td><td><i><?= $UserID->industry_company; ?></i> 
   </td> </tr> 
   
   
 
   <tr><td> Address
   </td><td><i> <?= $UserID->industry_address; ?></i> 
   </td> </tr> 
 
   
 
   <tr><td> Contact Number
   </td><td><i> <?= $UserID->industry_phone; ?></i> 
   </td> </tr> 
 
  
   <tr><td> Email
   </td><td><i><?= $UserID->industry_email; ?></i> 
   </td> </tr> 

 
  
 
 

<?php } ?>
</table>


                    </div>

            </div>
        </div>

        <!-- FOOTER SECTION -->
        <?php include('includes/footer.php');?>

        <!-- SCRIPT SECTION -->
        <script src="assets/js/jquery-1.11.1.js"></script>
        <script src="assets/js/bootstrap.js"></script>
    </body>
</html>