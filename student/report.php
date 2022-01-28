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
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Report | Student</title>
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
                    <div class="col-md-12"><h1 class="page-head-line">Report </h1></div>
                </div>
                <div class="row" >
                    <div class="col-md-3"></div>
                    <div class="col-md-6">

                    <div class="panel panel-default">
                            <div class="panel-heading"><center>REPORT DATA </center></div>
                            <font color="black" align="center">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;">Total PROPOSAL</th>
                                                <th style="text-align:center;">Total Logbook</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <!-- DISPLAY LIST OF THESIS SECTION -->
                                            <tr>
                                                <td>                                        
                                                    <?php                  
                                                        $query = "SELECT thesis_id FROM thesis  WHERE student_id='$User'";  
                                                        $query_run = mysqli_query($bd, $query);
                                                        $row = mysqli_num_rows($query_run);
                                                        echo '<h3> '.$row.'</h3>';
                                                        ?>  
                                                </td> 
                                                <td>                                        
                                                    <?php                  
                                                        $query = "SELECT logbook_id FROM logbook  WHERE student_id='$User'";  
                                                        $query_run = mysqli_query($bd, $query);
                                                        $row = mysqli_num_rows($query_run);
                                                        echo '<h3> '.$row.'</h3>';
                                                        ?>  
                                                </td>       
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <!-- DISPLAY LIST OF THESIS  -->
                        <div class="panel panel-default">
                            <div class="panel-heading"><center>REPORT PROPOSAL</center></div>
                            <font color="black" align="center">
                            <div class="panel-body">
                                <a href="addProposal.php" type="button" class="btn btn-s btn-info">Add New Proposal</a>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Date</th>
                                                <th>File</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <!-- DISPLAY LIST OF THESIS SECTION -->
                                            <?php                  
                                                $query = "SELECT * FROM thesis WHERE student_id='$User'";
                                                $cnt=1;
                                                $result = mysqli_query($bd, $query) or die (mysqli_error($bd));               
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                $id=$row["thesis_id"];
                                            ?>

                                            <tr>
                                                <td><?php echo $row['thesis_type']; ?></td>
                                                <td><?php echo $row['thesis_date']; ?></td>
                                                <td>
                                                    <a href="files/<?php echo $row['thesis_attach']; ?>" target="_blank"><?php echo $row['thesis_attach']?></a>
                                                </td>        
                                            </tr>

                                            <?php 
                                                $cnt++;
                                                } 
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- DISPLAY LIST OF LOGBOOK  -->
                        <div class="panel panel-default">
                            <div class="panel-heading"><center>REPORT LOGBOOK</center></div>
                            <font color="black" align="center">
                            <div class="panel-body">
                                <a href="addProposal.php" type="button" class="btn btn-s btn-info">Add Daily Activities</a>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Day</th>
                                                <th>Date</th>
                                                <th>Activity</th>
                                                <th>File</th>
                                                <th>Note</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <!-- DISPLAY LIST OF LOGBOOK SECTION -->
                                            <?php                  
                                                $query = "SELECT * FROM logbook WHERE student_id='$User'";
                                                $cnt=1;
                                                $result = mysqli_query($bd, $query) or die (mysqli_error($bd));
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                $id=$row["logbook_id"];
                                            ?>

                                            <tr>
                                                <td><?php echo $row['log_day']; ?></td>
                                                <td><?php echo $row['log_date']; ?></td>
                                                <td><?php echo $row['log_activity']; ?></td>
                                                <td>
                                                    <a href="files/<?php echo $row['log_file']; ?>" target="_blank"><?php echo $row['log_file']?></a>
                                                </td> 
                                                <td><?php echo $row['log_note']; ?></td>
                                            </tr>

                                            <?php 
                                                $cnt++;
                                                } 
                                            ?>
                                        </tbody>
                                    </table>
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