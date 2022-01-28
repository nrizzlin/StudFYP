<?php
include 'includes/dbh.inc.php';
session_start();
if(isset($_SESSION['User'])){
    $User = $_SESSION['User'];
}else{
    header("location: login.php");
}
$User_ID = $_GET['updateid'];
if (isset($_POST['submit']))
{
    $user_username = $_POST['user_username'];
    $user_pass = $_POST['user_pass'];

    $sql = "UPDATE `user` set User_ID=$User_ID,user_username='$user_username',user_pass='$user_pass' where User_ID=$User_ID";
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        header('location: displayuser.php');
    } 
    else
    {
        echo "failed update";
    }
    
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Admin Update User</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>
    <?php include('includes/header.php');?>
    <?php include('includes/menubar.php');?>
	<div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"><h4 class="page-head-line">Update User Profile </h4></div>
                </div>
                <span style="color:red;" ></span>
                <form name="admin" method="post">
                
                    <div class="row" align="center">
                        <label >  Username : </label>
                        <input type="text" name="user_username" id="user_username"><br><br>

                        <label>  Password :  </label>
                        <input type="password" name="user_pass" id="user_pass"><br><br>

                        <button type="submit" name="submit" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> &nbsp;Update </button>&nbsp;
                        <button type="clear" name="clear" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> &nbsp;Clear </button>&nbsp;
               <hr/>
                </form>
               
                                    </div>

            </div>
        </div>
    </div>
    
    <?php include('includes/footer.php');?>
   
    <script src="assets/js/jquery-1.11.1.js"></script>
    
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
