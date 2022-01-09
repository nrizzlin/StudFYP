<?php

$db_host="localhost"; //localhost server 
$db_user="root";	//database username
$db_password="";	//database password   
$db_name="studfyp";	//database name

try
{
	$db=new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOEXCEPTION $e)
{
	$e->getMessage();
}

if(isset($_REQUEST['view_id']))
{
	try
	{
		$id = $_REQUEST['view_id']; //get "update_id" from index.php page through anchor tag operation and store in "$id" variable
		$select_stmt = $db->prepare('SELECT * FROM logbook WHERE logbook_id =:id'); //sql select query
		$select_stmt->bindParam(':id',$id);
		$select_stmt->execute(); 
		$row = $select_stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
	}
	catch(PDOException $e)
	{
		$e->getMessage();
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
    <?php include('includes/header.php');?>
    <!-- LOGO HEADER END-->
    <?php 
// if($_SESSION['login']!="")
// {
    include('includes/menubar.php');
// }
    ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Logbook FYP </h1>
                </div>
            </div>
            <div class="row" >
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <center>VIEW LOGBOOK</center>
                        </div>
                        <font color="black" align="left">
                            <div class="panel-body">
                            <form class="form-inline" method="POST"  enctype="multipart/form-data">
                                    <table align="center" width="100%">
                                    
                                    <?php
									$select_stmt=$db->prepare("SELECT * FROM thesis");	//sql select query
									$select_stmt->execute();
									while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))
									{
									?>
                                            <tr>
                                                <td><label class="control-label">Student ID : </label></td>
                                                <td><?php echo $row['student_id']; ?></td>
                                            </tr>

                                            <tr>
                                                <td><label class="control-label">Date: </label></td>
                                                <td><?php echo $row['log_date']; ?></td>
                                            </tr>

                                            <tr>
                                                <td><label class="control-label">Day: </label></td>
                                                <td><?php echo $row['log_day']; ?></td>

                                            </tr>

                                            <tr>
                                                <td><label class="control-label">Activities: </label></td>
                                                <td><?php echo $row['log_activity']; ?></td>
                                            </tr>

                                            <tr>
                                            <td><label class="control-label">Attachment: </label></td>
                                            <td>
                                                <p><a href="files/<?php echo $row['log_file']; ?>" download>Download-<?php echo $row['log_file']?></a></p>
                                                <p><a href="files/<?php echo $row['log_file']; ?>" target="_blank"><?php echo $row['log_file']?></a></p>
                                            </td>
                                            </tr>

                                        <tr>
                                            <td><a href="logbook.php" class="btn btn-primary">BACK</a></td>
                                        </tr>
                                    <?php
									}
									?> 
                                    </table>
		                    </form>
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

<?php 
// } 
?>
