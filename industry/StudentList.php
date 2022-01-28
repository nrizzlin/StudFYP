<?php

session_start();
if(isset($_SESSION['User'])){
	$User = $_SESSION['User'];
}else{
	header("location:/studfyp/login.php");
}
  require 'db.php';
  $sql = 'SELECT user.User_ID,student.stud_name, student.student_id,student.enroll_status 
  FROM user
  INNER JOIN student ON user.User_ID = student.User_ID
  WHERE user.User_ID >0 ' ;

  $statement = $connection->prepare($sql);
  $statement->execute();
  $studfyp = $statement->fetchAll(PDO::FETCH_OBJ);

   ?>
<!DOCTYPE html>

<!-- BCS 2243 WEB ENGINEERING
GROUP : 2B-2
PROJECT : UMP-FK FINAL YEAR PROJECT MANAGEMENT SYSTEM (StudFYP)
MODULE : No.5 (EVALUATOR)
NAME : KHALED AHMED BAMAJBOUR 
MATRIC NO : CB19129 -->

<html xmlns="http://www.w3.org/1999/xhtml">
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
                    <div class="col-md-12"><h4 class="page-head-line">Student List </h4></div>
                </div>
                <?php 
					if(array_key_exists('act',$_GET) && $_GET['act'] == 'success'){
						echo '<div class="alert alert-success">Record Updates successfully.</div>';
					}elseif(array_key_exists('act',$_GET) && $_GET['act'] != 'success'){
						echo '<div class="alert alert-danger">Record Updates successfully.</div>';
					}else{
						// do noting...
					}
				?>
                <span style="color:red;" >
      <table class="table">          
    <thead> 
      <tr>
        <th colspan="5">Student details</th> 
      </tr>
      <tr>
      	<th>S#</th>
        <th>Student Name</th>
        <th>Matric Roll No</th>
        <th>Enroll Status</th>
        <th></th>
      </tr> 
      </thead>
	 <?php 
	 $sno = 1;
	 foreach($studfyp as $UserID) {
       $id = $UserID->User_ID;
      $fypst = $UserID->student_id;?>
      <tr> 
      	<td><?php echo $sno++;?></td>
       <td>  <?= $UserID->stud_name; ?> </td> 
        <td> <?= $UserID->student_id; ?>  </td>
         <td> <?php  $Status=$UserID->enroll_status; 
					if($Status==1){
					echo "FYP1";
				}else{
					echo "FYP2";}?>
		  </td>
 		<td><button type="button" class="btn btn-info rounded-pill" onclick="location.href='evaluatest.php?id=<?php echo $id  ?>&sID=<?php echo $fypst?>'">Evaluation</button>
        &nbsp;&nbsp;&nbsp; 
        <button type="button" class="btn btn-info rounded-pill" onclick="location.href='logbook.php?id=<?php echo $id  ?>&sID=<?php echo $fypst?>'">LogBook</button>
        </td>
     </tr>
     <?php }?>

     </table>
     <button type="button" class="btn btn-info rounded-pill" onclick="location.href='Report.php'">Report</button>

              </span>
                
            </div>
        </div>
       
  </div>
  <body>



  </main>
    
        <!-- FOOTER SECTION -->
        <?php include('includes/footer.php');?>

        <!-- SCRIPT SECTION -->
        <script src="assets/js/jquery-1.11.1.js"></script>
        <script src="assets/js/bootstrap.js"></script>
    </body>
</html>

