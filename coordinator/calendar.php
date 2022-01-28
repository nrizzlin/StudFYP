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
  $day=$_POST['date'];
  $eventName=$_POST['evtname'];
$ret=mysqli_query($bd, "insert into calendar(day,event) values('$day','$eventName')");
if($ret)
{
$_SESSION['msg']="Calendar Event Created Successfully !!";
}
else
{
  $_SESSION['msg']="Error : Calendar event not created";
}
}
if(isset($_GET['del']))
      {
              mysqli_query($bd, "delete from calendar where day = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Event deleted !!";
      }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin | Calendar</title>
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
                        <h1 class="page-head-line">Calendar</h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                           Add Event 
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>


<div class="panel-body">
    <form name="semester" method="post">
   <div class="form-group">
    <label for="semester">Date</label>
    <input type="date" class="form-control" id="date" name="date" placeholder="date" required />
    <label for="semester">Event Name</label>
    <input type="text" class="form-control" id="evtname" name="evtname" placeholder="Submission 1" required />
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
                            Calendar
                        </div>
                        
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;">Date</th>
                                            <th style="text-align:center;">Event Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql=mysqli_query($bd, "select * from calendar ORDER BY day asc");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


                                        <tr>
                                            <td><?php echo htmlentities($row['day']);?></td>
                                            <td><?php echo htmlentities($row['event']);?></td>
                                            <td>
  <a href="calendar.php?id=<?php echo $row['day']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
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