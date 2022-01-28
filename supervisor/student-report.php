<?php
session_start();
if(isset($_SESSION['User'])){
    $User = $_SESSION['User'];
}else{
    header("location:/studfyp/login.php");
}

/* CONNECTION DATABASE */
require_once('includes/config.php');
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Student Record</title>
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
                        <h1 class="page-head-line">Student Record  </h1>
                    </div>
                </div>
                <div class="row" >
            
                <div class="col-md-12">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        Student Record
                        </div>
                       
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                                <th>Student Name </th>
                                                <th>Student Matric no </th>
                                            <th>Course Name </th>
                                            <th>Faculty </th>
                                                <th>Semester</th>
                                             <th>Enrollment Date</th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql=mysqli_query($bd, "select * from student");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                              <td><?php echo htmlentities($row['sname']);?></td>
                                            <td><?php echo htmlentities($row['student_id']);?></td>
                                            <td><?php echo htmlentities($row['courname']);?></td>
                                            <td><?php echo htmlentities($row['dept']);?></td>
                                          
                                            <td><?php echo htmlentities($row['sem']);?></td>
                                             <td><?php echo htmlentities($row['edate']);?></td>
                                            <td>
                                            <a href="print.php?id=<?php echo $row['cid']?>" target="_blank">
<button class="btn btn-primary"><i class="fa fa-print "></i> Print</button> </a>
                                                


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

