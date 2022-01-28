<?php

session_start();

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Admin Login</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>
    <?php include('includes/header.php');?>
	<div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"><h4 class="page-head-line">Please Login To Enter </h4></div>
                </div>
                <span style="color:red;" ></span>
                <?php
                    if(isset($_SESSION['status']) && $_SESSION['status'] !='') 
                    {
                        echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
                        unset($_SESSION['status']);
                    }
                ?>
             
            
                <form action="logincode.php" method="POST" >
                    <div class="row" align="center">
                        <label >  Username : </label>
                        <input type="text" name="user_username" id="user_username"><br><br>

                        <label>  Password :  </label>
                        <input type="password" name="user_pass" id="user_pass"><br><br>

                        <label> Usertype :  </label>
                        <select name="user_type" id="user_type" >
                        <option value="Admin">Admin (Coordinator)</option>
						<option value="Faculty_Supervisor">Faculty Supervisor</option>
                        <option value="Faculty_Industry">Faculty Industry</option>
                        <option value="Lecturer_Evaluator">Lecturer Evaluator</option>
                        <option value="Evaluator_Industry">Evaluator Industry</option>
						<option value="Student">Student</option>
                        </select><br><br>
                        <button type="submit" name="loginbtn" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> &nbsp;Log In </button>&nbsp;
                        <button type="clear" name="clear" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> &nbsp;Clear </button>&nbsp;
               <hr/>
                        
                         </div>
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