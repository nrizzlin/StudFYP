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

/* DELETE THESIS DATA FUNCTION */
if(isset($_GET['del']))
{
    mysqli_query($bd, "DELETE FROM thesis WHERE thesis_id = '".$_GET['id']."'");
    $_SESSION['delmsg']="Proposal record deleted !!";
}
	
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Proposal | Student</title>
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/css/style.css" rel="stylesheet" />
    </head>

    <body>
        <!-- HEADER SECTION -->
        <?php include('includes/header.php');?>
        <!--  SIDEBAR SECTION -->
        <?php include('includes/menubar.php');?>
        <!-- DASHBOARD SECTION END-->
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Proposal FYP </h1>
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading"><center>PROPOSAL</center></div>
                            <font color="black" align="center">
                            <div class="panel-body">
                                <a href="addProposal.php" type="button" class="btn btn-s btn-primary">Add New Proposal</a>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Date</th>
                                                <th>File</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
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
                                                    <a href="files/<?php echo $row['thesis_attach']; ?>" download><?php echo $row['thesis_attach']?></a>
                                                </td>
                                                <td><a href="editProposal.php?id=<?php echo $id ?>" class="btn btn-warning">Update</a></td>
                                                <td>
                                                    <a href="proposal.php?id=<?php echo $row['thesis_id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
                                                    <button class="btn btn-danger">Delete</button>
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
