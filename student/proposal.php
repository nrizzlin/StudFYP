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
	
if(isset($_REQUEST['delete_id']))
{
    // select image from db to delete
    $id=$_REQUEST['delete_id'];	//get delete_id and store in $id variable
    
    $select_stmt= $db->prepare('SELECT * FROM thesis WHERE thesis_id =:id');	//sql select query
    $select_stmt->bindParam(':id',$id);
    $select_stmt->execute();
    $row=$select_stmt->fetch(PDO::FETCH_ASSOC);
    unlink("upload/".$row['thesis_attach']); //unlink function permanently remove your file
    
    //delete an orignal record from db
    $delete_stmt = $db->prepare('DELETE FROM thesis WHERE thesis_id =:id');
    $delete_stmt->bindParam(':id',$id);
    $delete_stmt->execute();
    
    header("Location:proposal.php");
}
	
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Proposal | Student</title>
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
                    <h1 class="page-head-line">Proposal FYP </h1>
                </div>
            </div>
            <div class="row" >
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <center>PROPOSAL</center>
                        </div>
                        <font color="green" align="center">
                        <div class="panel-body">
                            <a href="addProposal.php" type="button" class="btn btn-xs btn-info">Add New</a>
                            <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Date</th>
                                            <th>File</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                <?php
									$select_stmt=$db->prepare("SELECT * FROM thesis");	//sql select query
									$select_stmt->execute();
									while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))
									{
									?>
                                        <tr>
                                            <td><?php echo $row['thesis_type']; ?></td>
                                            <td><?php echo $row['thesis_date'];?></td>
                                            <td>
                                              <a href="files/<?php echo $row['thesis_attach']; ?>" download><?php echo $row['thesis_attach']?></a></td>
                                            <td><a href="editProposal.php?update_id=<?php echo $row['thesis_id']; ?>" class="btn btn-warning">Edit</a></td>
                                            <td><a href="?delete_id=<?php echo $row['thesis_id']; ?>" class="btn btn-danger">Delete</a></td>
                                        </tr>
                                    <?php
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

<?php 
// } 
?>
