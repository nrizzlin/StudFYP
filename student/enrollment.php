<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Enrollment FYP</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
    <?php include('includes/header.php');?>
    <!-- LOGO HEADER END-->
    <?php 
// if($_SESSION['login']!="")
// {
    include('includes/menubar.php');
// }
    ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Enrollment FYP </h1>
                </div>
            </div>
            <div class="row" >
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <center>FINAL YEAR PROJECT</center>
                        </div>
                        <font color="green" align="center">
                        <div class="panel-body">
                            <form name="frmEnroll" method="post" enctype="multipart/form-data">
                                <div>
                                <label>Enroll : </label>

                                <select id="enroll_status" name="enroll_status">
                                    <option value="FYP1">FYP 1</option>
                                    <option value="FYP2">FYP 2</option>
                                </select>

                                <input type="submit" name="submit" value="Confirm">

                                <?php
                                    if(isset($_POST["submit"]))
                                    {
                                        include ('includes/config.php'); 
                                        $enroll_status = $_POST['enroll_status'];
                                        mysqli_query($bd,"INSERT INTO student (enroll_status) VALUES ('$enroll_status')");
                                        echo '<script>alert("You Already Enroll")</script>';
                                    }
                                ?>
                                </div>
                                <div>
                                <input type="button" value="Enroll FYP 1" onclick="window.location.href='proposal.php'"/>
                                <input type="button" value="Enroll FYP 2" onclick="window.location.href='logbook.php'"/>
                                </div>
                            </form>
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

<?php 
// } 
?>
