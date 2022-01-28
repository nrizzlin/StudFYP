<?php
session_start();
if(isset($_SESSION['User'])){
    $User = $_SESSION['User'];
}else{
    header("location:/studfyp/login.php");
}
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
  $semester=$_POST['semester'];
  $semester2=$_POST['semester2'];
$ret=mysqli_query($bd, "insert into announcement(announceTitle,announceDetails) values('$semester','$semester2')");
if($ret)
{
$_SESSION['msg']="Semester Updated Successfully !!";
}
else
{
  $_SESSION['msg']="Error : Semester not updated";
}
}
if(isset($_GET['del']))
      {
              mysqli_query($bd, "delete from semester where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="semester deleted !!";
      }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin | Semester</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
<?php include('includes/header.php');?>
    
<?php if($_SESSION['alogin']!="")
{
 include('includes/menubar.php');
}
 ?>
    
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Announcement  </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                           Update Announcement 
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>


<div class="panel-body">
    <form name="semester" method="post">
   <div class="form-group">
    <label for="semester">Announcement id</label>
    <input type="text" class="form-control" id="announceId" name="announceId" placeholder="1" required />
    <label for="semester">Announcement Title</label>
    <input type="text" class="form-control" id="semester" name="semester" placeholder="Title"  />
    <label for="semester">Announcement Content</label>
    <input type="text" class="form-control" id="semester2" name="semester2" placeholder="Contents"  />
  </div>
 <button type="submit" name="submit" class="btn btn-default">Submit</button>
</form>
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
<?php } ?>
