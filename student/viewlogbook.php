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
    header("location: login.php");
}

/* QUERY FOR SELECT LOGBOOK TABLE */
$query = "SELECT * FROM logbook";
$result = mysqli_query($bd,$query);
$row = mysqli_fetch_assoc($result);
$id = $_GET['id'];

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
        <!-- MENU SECTION END-->
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"><h1 class="page-head-line">Logbook FYP </h1></div>
                </div>
                <div class="row" >
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading"><center>VIEW LOGBOOK</center></div>
                            <font color="black" align="left">
                            <div class="panel-body">
                                <form class="form-inline" method="POST"  enctype="multipart/form-data">
                                    <table align="center" width="109%">
                                        <!-- DISPLAY LOGBOOK DATA -->
                                        <?php
                                        include('includes/config.php'); //CONNECTION DATABASE 
                                        $query = "SELECT * FROM logbook WHERE logbook_id=$id AND student_id='$User'"; //QUERY FOR FETCH LOGBOOK DATA FROM LOGBOOK TABLE
                                        $result = mysqli_query($bd,$query);
                                        $row = mysqli_fetch_assoc($result);
                                        ?>

                                        <tr>
                                            <td><label class="control-label">Student ID : </label></td>
                                            <td><?php echo $row['student_id']; ?></td>
                                        </tr>

                                        <tr>
                                            <td><label class="control-label">Date: </label></td>
                                            <td><?php echo $row['log_date']; ?></td>
                                        </tr>

                                        <tr>
                                            <td><label class="control-label">Day: </label></td>
                                            <td><?php echo $row['log_day']; ?></td>

                                        </tr>

                                        <tr>
                                            <td><label class="control-label">Activities: </label></td>
                                            <td><textarea name="txt_activity" cols="50" rows="" disabled><?php echo $row['log_activity']; ?></textarea></td>
                                        </tr>

                                        <tr>
                                            <td rowspan="2"><label class="control-label">Attachment: </label></td>
                                            <td><strong>Download - </strong><a href="files/<?php echo $row['log_file']; ?>" download><?php echo $row['log_file']?></a></td>
                                        </tr>

                                        <tr>
                                            <td><strong>View - </strong><a href="files/<?php echo $row['log_file']; ?>" target="_blank"><?php echo $row['log_file']?></a></td>
                                        </tr>

                                        <tr>
                                            <td><a href="logbook.php" class="btn btn-primary">BACK</a></td>
                                        </tr>
                                    </table>
                                </form>
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
