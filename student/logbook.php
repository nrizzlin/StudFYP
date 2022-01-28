<?php

/*
BCS 2243 WEB ENGINEERING
GROUP : 2B-2
PROJECT : UMP-FK FINAL YEAR PROJECT MANAGEMENT SYSTEM (StudFYP)
MODULE : No.3 (Student)
NAME : NUR IZZLIN BINTI AZMAN 
MATRIC NO : CB20012
*/

/* CONNECTION DATABASE */
include('includes/config.php');

/* SESSION */
session_start();
if(isset($_SESSION['User'])){
    $User = $_SESSION['User'];
}else{
    header("location:/studfyp/login.php");
}

/* DELETE LOGBOOK DATA FUNCTION */
if(isset($_GET['del']))
{
    mysqli_query($bd, "delete from logbook where logbook_id = '".$_GET['id']."'");
    $_SESSION['delmsg']="Student record deleted !!";
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Logbook | Student</title>
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
                    <div class="col-md-12"><h1 class="page-head-line">LOGBOOK FYP </h1></div>
                </div>
                <div class="row" >
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading"><center>SEARCH LOGBOOK FYP</center></div>
                            <font color="green" align="center">
                            <div class="panel-body">
                                <!-- SEARCH LOGBOOK-->   
                                <form method="POST">
                                    <input type="text" class="form-control" name="keyword" placeholder="Search here..." required="required">
                                    <button class="btn btn-success" name="search" ><span class="glyphicon glyphicon-search"></span> Search</button>
                                </form>
                                <!-- ADD NEW LOGBOOK-->  
                                <br><a href="addlogbook.php?" type="button" class="btn btn-s btn-primary">New Daily Activity</a>
                                <div class="table-responsive">
                                    
                                    <!-- SEARCH LOGBOOK FUNCTION SECTION -->
                                    <?php
                                        include('includes/config.php');
                                        if(ISSET($_POST['search'])){
                                    ?>

                                    <table class="table table-bordered table-hover table-striped">
                                        
                                        <thead>
                                            <tr>
                                                <th>Day</th>
                                                <th>Date</th>
                                                <th>Update</th>
                                                <th>View</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <!-- DISPLAY LIST OF LOGBOOK THAT CLICK SEARCH BUTTON -->
                                            <?php
                                                $keyword = $_POST['keyword'];
                                                $query = mysqli_query($bd, "SELECT * FROM logbook WHERE student_id='$User' and log_day LIKE '%$keyword%'") or die(mysqli_error());
                                                $count = mysqli_num_rows($query);
                                                if($count > 0){
                                                    while($fetch = mysqli_fetch_array($query)){
                                            ?>

                                            <tr>
                                                <td><?php echo $fetch['log_day']; ?></td>
                                                <td><?php echo $fetch['log_date']; ?></td>
                                                <td><a href="editlogbook.php?id=<?php echo $fetch["logbook_id"];?>" class="btn btn-warning">Update</a></td>
                                                <td><a href="viewlogbook.php?id=<?php echo $fetch['logbook_id'] ?>" class="btn btn-info">View</a></td>
                                                <td>
                                                    <a href="logbook.php?id=<?php echo $fetch['logbook_id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
                                                    <button class="btn btn-danger">Delete</button>
                                                </td>
                                            </tr>

                                            <?php
                                                }
                                            }else{
                                                echo "<tr><td colspan='2' class='text-danger'><center>No result found!</center></td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                    <?php		
                                    }else{
                                    ?>
                                    
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                            <th>Day</th>
                                                <th>Date</th>
                                                <th>Update</th>
                                                <th>View</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <!-- DISPLAY LIST OF LOGBOOK THAT NOT CLICK SEARCH BUTTON -->
                                            <?php
                                                $query = mysqli_query($bd, "SELECT * FROM logbook WHERE student_id='$User' ORDER BY log_day ASC") or die(mysqli_error());
                                                while($fetch = mysqli_fetch_array($query)){
                                            ?>

                                            <tr>
                                                <td><?php echo $fetch['log_day']; ?></td>
                                                <td><?php echo $fetch['log_date']; ?></td>
                                                <td><a href="editlogbook.php?id=<?php echo $fetch["logbook_id"];?>" class="btn btn-warning">Update</a></td>
                                                <td><a href="viewlogbook.php?id=<?php echo $fetch['logbook_id'] ?>" class="btn btn-info">View</a></td>
                                                <td>
                                                    <a href="logbook.php?id=<?php echo $fetch['logbook_id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
                                                    <button class="btn btn-danger">Delete</button>
                                                </td>
                                            </tr>
                                            
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>  
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
