<?php
session_start();
if(isset($_SESSION['User'])){
    $User = $_SESSION['User'];
}else{
    header("location:/studfyp/login.php");
}
include('includes/config.php');


if(isset($_POST['submit']))
{
  $lect=$_POST['lecturer_ID'];
  $stud=$_POST['student_ID'];
$ret=mysqli_query($bd, "insert into assignation(student_id ,lecturer_id ) values('$stud','$lect')");
if($ret)
{
$_SESSION['msg']="Assign Successfully !!";
}
else
{
  $_SESSION['msg']="Error : Fail [Repeated Student ID]";
}
}
if(isset($_GET['del']))
      {
              mysqli_query($bd, "delete from assignation where student_id  = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Record deleted !!";
      }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin | Assignation</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
<?php include('includes/header.php');
 include('includes/menubar.php');
 ?>
    
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Assignation  </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                           Assignation for Supervisor
                           <a href="assignationEva.php"><button name="addEva" class="btn btn-default" style="float: right; margin-right:5px;">Assign Evaluator</button></a>
                           <a href="editAssignation.php"><button name="editAssign" class="btn btn-default" style="float: right; margin-right:5px;">Edit Assigned Supervisor</button></a>
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>



                        <div class="panel-body">
                       <form name="semester" method="post">
   <div class="form-group">
    <label for="semester">Student Id  </label>
    <input type="text" class="form-control" id="student_ID" name="student_ID" placeholder="CB20172" required />
    <label for="semester">Lecturer Id  </label>
    <input type="text" class="form-control" id="lecturer_ID" name="lecturer_ID" placeholder="LC008" required />
  </div>
 <button type="submit" name="submit" class="btn btn-default">Submit</button>
</form>
                            </div>
                            </div>
                    </div>
                  
                </div>
                <font color="red" align="center"><?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?></font>
                <div class="col-md-12">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Assignation List
                        </div>
                        
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;">No</th>
                                            <th style="text-align:center;">Student ID</th>
                                            <th style="text-align:center;">Lecturer ID</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql=mysqli_query($bd, "select * from assignation");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo htmlentities($row['student_id']);?></td>
                                            <td><?php echo htmlentities($row['lecturer_ID']);?></td>
                                            <td>
  <a href="assignation.php?id=<?php echo $row['student_id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
                                            <button class="btn btn-danger">Delete</button>
</a>
                                            </td>
                                        </tr>
<?php 
$cnt++;
} ?>

                                        
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
