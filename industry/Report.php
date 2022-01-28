<?php
  require 'db.php';

  session_start();
  if(isset($_SESSION['User'])){
    $User = $_SESSION['User'];
  }else{
    header("location:/studfyp/login.php");
  }


  $where = '1 = 1';
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
	  
	  if(array_key_exists('stud_name',$_POST) && $_POST['stud_name'] != ''){
	  		$where .= " and student.stud_name like '%".$_POST["stud_name"]."%'";
	  }
	  if(array_key_exists('student_id',$_POST) && $_POST['student_id'] != ''){
	  		$where .= " and student.student_id like '%".$_POST["student_id"]."%'";
	  }
	  if(array_key_exists('enroll_status',$_POST) && $_POST['enroll_status'] != ''){
	  		$where .= " and student.enroll_status ='".$_POST["enroll_status"]."'";
	  }
	  if(array_key_exists('stud_program',$_POST) && $_POST['stud_program'] != ''){
	  		$where .= " and student.stud_program like '%".$_POST["stud_program"]."%'";
	  }
	  
  } 
	 $sql = 'SELECT user.User_ID,student.stud_name, student.student_id,student.enroll_status,student.stud_program
			  FROM user
			  INNER JOIN student ON user.User_ID = student.User_ID
			  WHERE user.User_ID >0  and '.$where ;
	 	
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
      <div class="col-md-12">
        <h4 class="page-head-line">Student Report </h4>
      </div>
    </div>
    <form action="" method="post">
      <table class="table"> 
        <thead>
          <tr>
            <th colspan="6">Student details</th>
          </tr>
          <tr>
            <th>S#</th>
            <th>Student Name</th>
            <th>Matric Roll No</th>
            <th>Enroll Status</th>
            <th>Program</th> 
            <th></th>
          </tr>
        </thead>
        <tr>
        	<td></td>
        	<td><input type="text" name="stud_name" id="stud_name" /></td>
            <td><input type="text" name="student_id" id="student_id" /></td>
            <td><select name="enroll_status" id="enroll_status">
            	<option value=""></option>
            	<option value="1">FYP1</option>
                <option value="2">FYP2</option>
            </select></td>
            <td><input type="text" name="stud_program" id="stud_program" /></td>
            <td>
            <input type="submit" class="btn btn-info" value="Search">
            </td>
        </tr>
        <?php 
	 $sno = 1;
	 foreach($studfyp as $UserID) {
       $id = $UserID->User_ID;
      $fypst = $UserID->student_id;?>
        <tr>
          <td><?php echo $sno++;?></td>
          <td><?= $UserID->stud_name; ?></td>
          <td><?= $UserID->student_id; ?></td>
          
          <td><?php  $Status=$UserID->enroll_status; 
					if($Status==1){
					echo "FYP1";
				}else{
					echo "FYP2";}?></td>
           <td><?= $UserID->stud_program; ?></td>         
          <td></td>
        </tr>
        <?php }?>
      </table>
      </span>
    </form>
  </div>
</div>
<nav>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="">industry Staff Profile </a></li>
  </ol>
</nav>
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
