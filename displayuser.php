<?php
session_start();
if(isset($_SESSION['User'])){
    $User = $_SESSION['User'];
}else{
    header("location: login.php");
}
include 'includes/dbh.inc.php';

if(isset($_GET['del']))
{
    mysqli_query($conn, "delete from user where User_ID = '".$_GET['deleteid']."'");
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

    <title>Admin Display/Delete User</title>
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
                                <h1 class="page-head-line">Display Users Profile Info </h1>
                            </div>
                        </div>
                        <div class="row" >
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                <center>User Information</center>
                                </div>
                            
                                <div class="panel-body">
                                    <div class="table-responsive table-bordered">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                
                                                <th> ID</th>
                                                <th> Username </th>
                                                <th> Usertype</th>
                                                <th> Password</th>
                                                <th> Operation</th>
                                                
                                            </tr>                  
                                        </thead>
                                        <tbody>
                                        <?php
                                            $sql = "SELECT * FROM user;";
                                            $result = mysqli_query($conn,$sql);
                                            if($result)
                                            {
                                                while ($row = mysqli_fetch_assoc($result))
                                                {
                                                $User_ID = $row['User_ID'];
                                                $user_username = $row['user_username'];
                                                $user_type = $row['user_type'];
                                                $user_pass = $row['user_pass'];
                                                echo '<tr>
                                                <td>'.$User_ID. ' </td>
                                                <td>'.$user_username. ' </td>
                                                <td>' .$user_type. ' </td>
                                                <td>' .$user_pass. ' </td>
                                                <td>
                                                <button class ="btn btn-warning"><a href="updateuser.php?updateid='.$User_ID.'" >Update</a></button>
                                                <button class ="btn btn-danger"><a href="displayuser.php?deleteid='.$User_ID.'&del=delete" >Delete</a></button>
                                                
                                                </td>
                                                </tr>';
                                            }
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
        
        <?php include('includes/footer.php');?>
        
            <script src="assets/js/jquery-1.11.1.js"></script>
            
            <script src="assets/js/bootstrap.js"></script>
        </body>
</html>


