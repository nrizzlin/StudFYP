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
session_start();
if(isset($_SESSION['User'])){
    $User = $_SESSION['User'];
}else{
    header("location:/studfyp/login.php");
}

/* QUERY FOR SELECT LOGBOOK TABLE */
$query = "SELECT * FROM logbook";
$result = mysqli_query($bd,$query);
$row = mysqli_fetch_assoc($result);
$id = $_GET['id'];

/* UPDATE LOGBOOK DATA FUNCTION */
if(isset($_POST['btn_update']))
  {
    $date	= $_REQUEST['date'];	//textbox name "date"
    $day	= $_REQUEST['day'];	//textbox name "day"
    $activities	= $_REQUEST['txt_activity'];	//textbox name "txt_activity"
	$note	= $_REQUEST['txt_note'];	//textbox name "txt_note"
    $studID	= $_REQUEST['txt_id'];	//textbox name "txt_id"

    //FILE UPLOAD
    $message="";
    $file=$_FILES['txt_file']['name'];
    $target="files/".basename($file);

    if(move_uploaded_file($_FILES['txt_file']['tmp_name'],$target)){
        $message="File uploaded successfully";
    }else{
        $message="Failed to upload the file";
    }

    $update_data="UPDATE logbook SET log_date='$date', log_day='$day', log_activity='$activities', log_file='$file',  log_note='$note' WHERE logbook_id=$id";
    $run_data = mysqli_query($bd,$update_data);

    if($run_data){
        header('location: logbook.php');
    }else{
        echo "Data unsuccessfully update";
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
                    <div class="col-md-12"><h1 class="page-head-line">Logbook FYP</h1></div>
                </div>
                <div class="row" >
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading"><center>UPDATE LOGBOOK</center></div>
                            <font color="black" align="left">
                            <div class="panel-body">
                                <form class="form-inline" method="POST"  enctype="multipart/form-data">
                                    <table align="center" width="100%">
                                        
                                        <?php
                                        /* DATABASE CONNECTION */
                                        include('includes/config.php');

                                        /* FETCH DATA FROM TABLE LOGBOOK */
                                        $query = "SELECT * FROM logbook WHERE logbook_id=$id";
                                        $result = mysqli_query($bd,$query);
                                        $row = mysqli_fetch_assoc($result);
                                        ?>
                                            
                                        <tr>
                                            <td><input type ="hidden" name="id" value="<?php echo $id; ?>"></td>
                                        </tr>

                                        <tr>
                                            <td><label class="control-label">Student ID : </label></td>
                                            <td><input type="text" name="txt_id" class="form-control" value="<?php echo $row['student_id'];  ?>" readonly/></td>
                                        </tr>

                                        <tr>
                                            <td><label class="control-label">Date: </label></td>
                                            <td><input type="date" name="date" class="form-control" required="required"/></td>
                                        </tr>

                                        <tr>
                                            <td><label class="control-label">Day: </label></td>
                                            <td><input type="text" name="day" class="form-control" value="<?php echo $row['log_day'];?>" required="required"/></td>
                                        </tr>

                                        <tr>
                                            <td><label class="control-label">Activities: </label></td>
                                            <td><textarea name="txt_activity"  cols="50" rows="10" required="required"><?php echo $row['log_activity'];?></textarea></td>
                                        </tr>

                                            
                                        <tr>
                                            <td><label class="control-label">Attachment: </label></td>
                                            <td>
                                                <input type="file" name="txt_file" class="form-control" required="required"/>
                                                <p><a href="files/<?php echo $row['log_file']; ?>" download><?php echo $row['log_file']?></a></p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><label class="control-label">Note : </label></td>
                                            <td><input type="text" name="txt_note" class="form-control" value="<?php echo $row['log_note'];?>" required="required"/></td>
                                        </tr>
                                            
                                        <tr>
                                            <td colspan="2">
                                                <br>
                                                <input type="submit"  name="btn_update" class="btn btn-primary" value="UPDATE">
                                                <input type="reset"   name="btn_reset" class="btn btn-info "value="RESET">
                                            </td>
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