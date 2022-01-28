<?php
session_start();
if(isset($_SESSION['User'])){
    $User = $_SESSION['User'];
}else{
    header("location:/studfyp/login.php");
}
include('includes/config.php');


if(isset($_GET['del']))
      {
              mysqli_query($bd, "delete from announcement where annoucement_id  = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Announcement deleted !!";
      }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin | Home</title>
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
                        <h1 class="page-head-line">Announcement  </h1>
                    </div>
                </div>
                
                <font color="red" align="center"><?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?></font>
            
                <div class="col-md-12">
                <a href="editAnnouncement.php"><button name="editAnnounce" class="btn btn-default" style="float: right; margin-top: 10px; margin-right:5px;">Edit Announcement</button></a>
                <a href="addAnnouncement.php"><button name="addAnnounce" class="btn btn-default" style="float: right; margin-top: 10px; margin-right:5px;">Add New Announcement</button></a>
                
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Latest Announcement
                        </div>
                        
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;">Announcement ID</th>
                                            <th style="text-align:center;">Date</th>
                                            <th style="text-align:center;">Announcement Title</th>
                                            <th style="text-align:center;">Announcement Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql=mysqli_query($bd, "select * from announcement");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


                                        <tr>
                                            <td><?php echo htmlentities($row['annoucement_id']);?></td>
                                            <td><?php echo htmlentities($row['date']);?></td>
                                            <td><?php echo htmlentities($row['announce_title']);?></td>
                                            <td><?php echo htmlentities($row['announce_detail']);?></td>
                                            <td>
  <a href="home.php?id=<?php echo $row['annoucement_id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
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
