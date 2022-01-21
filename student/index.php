
<!DOCTYPE html>

<!-- BCS 2243 WEB ENGINEERING
GROUP : 2B-2
PROJECT : UMP-FK FINAL YEAR PROJECT MANAGEMENT SYSTEM (StudFYP)
MODULE : No.3 (Student)
NAME : NUR IZZLIN BINTI AZMAN 
MATRIC NO : CB20012 -->

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>UMP-FK Final Year Project Management System (StudFYP)</title>
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/css/style.css" rel="stylesheet" />
    </head>
    <body>
        <!-- HEADER SECTION -->
        <?php include('includes/header.php');?>
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"><h4 class="page-head-line">Please Login To Enter </h4></div>
                </div>
                <span style="color:red;" ></span>
                <form action="login.php" method="POST" >
                    <div class="row" align="center">
                        <label>Enter Username : </label>
                        <input type="text" name="username" id="username"><br><br>

                        <label>Enter Password :  </label>
                        <input type="password" name="userPass" id="userPass"><br><br>

                        <label style=" width: 99px; text-align:left;"> User Type :  </label>
                        <select name="userType" id="userType" style=" width: 170px; height: 30px; ">
                            <option value="Student">Student</option>
                            <option value="Lecturer">Lecturer</option>
                            <option value="Industry">Industry</option>
                        </select><br><br>
                        <hr/>

                        <button type="submit" name="Login" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> &nbsp;Log Me In </button>&nbsp;
                    </div>
                </form>
            </div>
        </div>
    
        <!-- FOOTER SECTION -->
        <?php include('includes/footer.php');?>

        <!-- SCRIPT SECTION -->
        <script src="assets/js/jquery-1.11.1.js"></script>
        <script src="assets/js/bootstrap.js"></script>
    </body>
</html>
