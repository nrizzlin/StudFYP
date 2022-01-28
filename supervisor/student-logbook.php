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
    <title>Student Logbook</title>
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
                        <h1 class="page-head-line">Student Logbook</h1>
                    </div>
                </div>
                <div class="row" >
            
                <div class="col-md-12">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        Student Logbook
                        </div>
                       
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                                
                                                    <th>Student Matric no </th>
                                            <th>IP  </th>
                                            <th>Login Time </th>
                                            
                                                <th>Logout Time</th>
                                             <th>Status</th>
                                    
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
                                              <td><?php echo htmlentities($row['student_id']);?></td>
                                            <td><?php echo htmlentities($row['userip']);?></td>
                                            <td><?php echo htmlentities($row['loginTime']);?></td>
                                            <td><?php echo htmlentities($row['logout']);?></td>
                                            <td><?php echo htmlentities($row['status']);?></td>
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

