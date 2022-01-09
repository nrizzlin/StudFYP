<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>StudFYP | Student</title>
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
                    <h1 class="page-head-line">Home </h1>
                </div>
            </div>
            <div class="row" >
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        ANNOUNCEMENT
                        </div>
                        <font color="green" align="center">
                        <div class="panel-body">
                            <form name="dept" method="post" enctype="multipart/form-data">
                                <table border=0 cellpadding="10" cellspacing="1" width="500">
                                    <tr>
                                        <td>No</td>
                                        <td>Date</td>
                                        <td>Content</td>
                                    </tr>

                                    <?php
                                        include ('includes/config.php'); // Using database connection file here
                                        $records = mysqli_query($bd,"SELECT * FROM announcement"); // fetch data from database
                                        while ($data = mysqli_fetch_array($records))
                                        {
                                        ?>
                                        <tr>
                                            <td><?php echo $data['annoucement_id']; ?></td>
                                            <td><?php echo $data['date']; ?></td>
                                            <td><?php echo $data['announce_detail']; ?></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                        <?php mysqli_close($bd); // Close connection ?>
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
