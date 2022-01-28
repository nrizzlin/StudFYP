<?php
session_start();
if(isset($_SESSION['User'])){
    $User = $_SESSION['User'];
}else{
    header("location: login.php");
}
include 'includes/dbh.inc.php';
?>
<!DOCTYPE html>
<!-- BCS 2243 WEB ENGINEERING
GROUP : 2B-2
PROJECT : UMP-FK FINAL YEAR PROJECT MANAGEMENT SYSTEM (StudFYP)
MODULE : No.1 (MANAGE USER)
NAME : MOHAMMAD IMAN NAJMI BIN MOHID NASIR
MATRIC NO : CB20138 -->

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Dashboard</title>
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/css/style.css" rel="stylesheet" />
    </head>

        <!-- HEADER SECTION -->
        <?php include('includes/header.php');?>
        <!--  SIDEBAR SECTION -->
        <?php include('includes/menubar.php');?>
        <!-- DASHBOARD SECTION -->
            <div class="content-wrapper">
                <div class="container">
                    <div class="row">
                            <div class="col-md-12">
                                <h1 class="page-head-line">Dashboard </h1>
                            </div>
                        </div>
                        <div class="row" >
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                Userlist Information
                                </div>
                            
                                <div class="panel-body">
                                    <div class="table-responsive table-bordered">
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Usertype</th>
                                            <th>Total User </th>
                                            <th>Status  </th>
                                        </tr>
                                        <tr>
                                            <td>All</td>
                                            <td>
                                                <?php
                                                    $query = "SELECT User_ID FROM user ORDER BY User_ID";  
                                                    $query_run = mysqli_query($conn, $query);
                                                    $row = mysqli_num_rows($query_run);
                                                    echo '<h5> '.$row.'</h5>';
                                                ?>
                                            </td>
                                            <td>Active</td>
                                        </tr>
                                    </thead>
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


