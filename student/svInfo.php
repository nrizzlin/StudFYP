<?php

/*
BCS 2243 WEB ENGINEERING
GROUP : 2B-2
PROJECT : UMP-FK FINAL YEAR PROJECT MANAGEMENT SYSTEM (StudFYP)
MODULE : No.3 (Student)
NAME : NUR IZZLIN BINTI AZMAN 
MATRIC NO : CB20012
*/

/* SESSION */
session_start();
if(isset($_SESSION['User'])){
    $User = $_SESSION['User'];
}else{
    header("location: login.php");
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
        <title>Supervisor Information</title>
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
                    <div class="col-md-12"><h1 class="page-head-line">Supervisor Infomation</h1></div>
                </div>

                <!-- DISPLAY SUPERVISOR FACULTY INFORMATION-->
                <div class="row" >
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading"><center>Supervisor Infomation(Faculty)</center></div>
                            <font color="black" align="left">
                            <div class="panel-body">
                                <form name="frmSvInfo" method="post" enctype="multipart/form-data">
                                    <table align="center" width="60%">

                                        <?php
                                        include ('includes/config.php'); //DATABASE CONNECTION
                                        $records = mysqli_query($bd,"SELECT lecturer_name,lecturer_Email,lecturer_Phone FROM lecturer WHERE student_id='$User' AND lecturer_type='Supervisor' AND lecturer_type='supervisor'"); // FETCH LECTURER DATA FROM LECTURER TABLE
                                        while ($data = mysqli_fetch_array($records))
                                        {
                                        ?>

                                        <tr>
                                            <td> Name : </td>
                                            <td><?php echo $data['lecturer_name']; ?></td>
                                        </tr>

                                        <tr>
                                            <td>Role : </td>
                                            <td>Supervisor Faculty</td>
                                        </tr>

                                        <tr>
                                            <td>Email : </td>
                                            <td><?php echo $data['lecturer_Email']; ?></td>
                                        </tr>

                                        <tr>
                                            <td>Contact Number : </td>
                                            <td><?php echo $data['lecturer_Phone']; ?></td>
                                        </tr>

                                        <?php
                                        }
                                        ?>

                                        <?php mysqli_close($bd); // CLOSE DATABASE CONNECTION ?>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>  
                </div>

                <!-- DISPLAY SUPERVISOR INDUSTRY INFORMATION-->
                <div class="row" >
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading"><center>Supervisor Infomation (Industry)</center></div>
                            <font color="black" align="left">
                            <div class="panel-body">
                                <form name="frmSvInfo" method="post" enctype="multipart/form-data">
                                    <table align="center" width="60%">
                                        <?php
                                        include ('includes/config.php'); //DATABASE CONNECTION
                                        $records = mysqli_query($bd,"SELECT industry_email,industry_phone,industry_representative,industry_company,industry_company FROM industry WHERE student_id='$User'"); // FETCH INDUSTRY DATA FROM INDUSTRY TABLE
                                        while ($data = mysqli_fetch_array($records))
                                        {
                                        ?>

                                        <tr>
                                            <td> Name : </td>
                                            <td><?php echo $data['industry_representative']; ?></td>
                                        </tr>

                                        <tr>
                                            <td>Role : </td>
                                            <td>Supervisor Industry</td>
                                        </tr>

                                        <tr>
                                            <td>Email : </td>
                                            <td><?php echo $data['industry_email']; ?></td>
                                        </tr>

                                        <tr>
                                            <td>Contact Number : </td>
                                            <td><?php echo $data['industry_phone']; ?></td>
                                        </tr>

                                        <tr>
                                            <td>Company Name : </td>
                                            <td><?php echo $data['industry_company']; ?></td>
                                        </tr>

                                        <tr>
                                            <td>Address : </td>
                                            <td><?php echo $data['industry_company']; ?></td>
                                        </tr>

                                        <?php
                                        }
                                        ?>

                                        <?php mysqli_close($bd); // CLOSE CONNECTION ?>
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