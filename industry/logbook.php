  <?php
  require 'db.php';

  session_start();
if(isset($_SESSION['User'])){
	$User = $_SESSION['User'];
}else{
	header("location:/studfyp/login.php");
}

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
	  $log_activity = $_POST["log_activity"];
	  $student_id = $_POST["student_id"];
	  $project_ID = $_POST["project_ID"];
	  $logbook_id = $_POST["logbook_id"];
	  $rating_id = $_POST["rating_id"];
	  $lecturer_ID = $_POST["lecturer_ID"];
	  
	// -------- Saving Log Book Feedback ------------
	$check_feedback = $connection->prepare('select * from rubric where logbook_id="'.$logbook_id.'"');
	$check_feedback->execute();
	$existing_rec = $check_feedback->fetch(PDO::FETCH_ASSOC); 
	if($existing_rec){
		$rs_logbook = $connection->prepare("update rubric set log_feedback='".$log_activity."' where logbook_id='".$logbook_id."'");
		$rs_logbook->execute();
	}else{
		$ins_logbook = "insert into rubric(`logbook_id`,`log_feedback`,`weekly_evaluation`) 
						values('".$logbook_id."','".$log_activity."','')";					
		$rs_logbook = $connection->prepare($ins_logbook);
		$rs_logbook->execute();   
	}
	if($rs_logbook->rowCount() > 0){
		header("Location: StudentList.php?act=success&student_id=".$student_id);
		exit;
	}else{
		print_r($rs_logbook->errorInfo());
		exit;
	}
  }
  $id = $_GET['id'];
  $fypst = $_GET['sID'];
	$sql2 = "select user.user_username,fyp_project.project_ID,logbook.logbook_id,fyp_project.rating_id,
				fyp_project.lecturer_ID,logbook.log_activity
					from user INNER JOIN fyp_project on user.user_username=fyp_project.student_id 
						INNER JOIN logbook on user.user_username=logbook.student_id 
						where user.user_username='".$fypst."'";

$statement2 = $connection->prepare($sql2);
$statement2->execute();
$row = $statement2->fetch(PDO::FETCH_OBJ); 
 

  ?>
  <!DOCTYPE html>

<!-- BCS 2243 WEB ENGINEERING
GROUP : 2B-2
PROJECT : UMP-FK FINAL YEAR PROJECT MANAGEMENT SYSTEM (StudFYP)
MODULE : No.3 (Student)
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
                    <div class="col-md-12"><h4 class="page-head-line">Student Logbook </h4></div>
                </div> 
                <form action="" method="post">
                <table class="table">
                	<tr>
                    	<td colspan="2">Student Name:  <strong><?php echo $row->user_username;?></strong></td>
                    </tr>
                    <tr>
                    	<td>Activity</td>
                        <td><?php echo nl2br($row->log_activity);?></td>
                    </tr>
                	<tr>
                        <td width="20%">Please Enter Marks:</td>
                        <td><textarea name="log_activity" id="log_activity" class="form-control"></textarea></td>
                    </tr>
                </table>
                <input type="hidden" name="project_ID" id="project_ID" value="<?php echo $row->project_ID?>"/>
                <input type="hidden" name="logbook_id" id="logbook_id" value="<?php echo $row->logbook_id?>"/>
                 <input type="hidden" name="rating_id" id="rating_id" value="<?php echo $row->rating_id?>"/>
                 <input type="hidden" name="student_id" id="student_id" value="<?php echo $fypst?>"/>
                <input type="hidden" name="lecturer_ID" id="lecturer_ID" value="<?php echo $row->lecturer_ID?>"/>
                <span style="color:red;" > 
     <button type="submit" class="btn btn-info rounded-pill">Save Marks</button>

              </span>
                </form>
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
