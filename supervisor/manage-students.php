<?php
session_start();
if(isset($_SESSION['User'])){
    $User = $_SESSION['User'];
}else{
    header("location:/studfyp/login.php");
}

/* CONNECTION DATABASE */
require_once('includes/config.php');


if(isset($_GET['del']))
      {
              mysqli_query($bd, "DELETE FROM student WHERE student_id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="data record deleted !!";
      }
	
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Supervisor | Student List </title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
    <!-- HEADER SECTION -->
    <?php include('includes/header.php');?>
    <!--  SIDEBAR SECTION -->
    <?php include('includes/menubar.php');?>
    <!-- DASHBOARD SECTION -->
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Student List  </h1>
                    </div>
                </div>
                <div class="row" >
                 
                <font color="red" align="center"><?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?></font>
                <div class="col-md-12">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Student
                        </div>
                        
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Matric No </th>
                                            <th>Student Name </th>
                                            <th>Program<th>
                                            <th>Contact No<th>
                                            <th>Enroll Status<th>
                                            <th>Lecturer<th>
                                            <th>Industry<th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql=mysqli_query($bd, "select * from students");
                                        $cnt=1;
                                        while($row=mysqli_fetch_array($sql))
                                        {
                                        ?>


                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo htmlentities($row['student_id']);?></td>
                                            <td><?php echo htmlentities($row['stud_name']);?></td>
                                            <td><?php echo htmlentities($row['stud_program']);?></td>
                                            <td><?php echo htmlentities($row['stud_tel']);?></td>
                                            <td><?php echo htmlentities($row['enroll_status']);?></td>
                                            <td><?php echo htmlentities($row['lecturer_ID']);?></td>
                                            <td><?php echo htmlentities($row['industry_ID']);?></td>
                                            <td>              
<a href="manage-students.php?id=<?php echo $row['student_id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
<button class="btn btn-danger">Delete</button>
</a>
<a href="enroll-history.php?id=<?php echo $row['student_id']?>&del=delete" onClick="return confirm('View student?')">
<button class="btn btn-white">View</button>
</a>

                                            </td>
                                        </tr>
<?php 
$cnt++;
} ?>

                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>


        </div>
    </div>
    
  <?php include('includes/footer.php');?>
    
    <script src="assets/js/jquery-1.11.1.js"></script>
    
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>

