<?php
session_start();
if(isset($_SESSION['User'])){
    $User = $_SESSION['User'];
}else{
  header("location:/studfyp/login.php");
}
include('includes/config.php');


?>
<script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin | Progress</title>
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
                        <h1 class="page-head-line">Progress  </h1>
                    </div>
                </div>
                <div class="row" >
                  
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Overview Course
                        </div>
                       
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            
                                            <th style="text-align:center;">Student Id</th>
                                            <th style="text-align:center;">Total Marks </th>
                                            <th style="text-align:center;">Industry Marks</th>
                                            <th style="text-align:center;">Lecturer Marks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql=mysqli_query($bd, "select * from mark");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
  $industry=$row['industry'];
  $lecturer=$row['lecturer'];
  $total=$industry+$lecturer;
?>


                                        <tr>
                                            <td style="text-align:center;"><?php echo htmlentities($row['student_id']);?></td>
                                            <td style="text-align:center;"><?php echo htmlentities($total);?></td>
                                            <td style="text-align:center;"><?php echo htmlentities($lecturer);?></td>
                                            <td style="text-align:center;"><?php echo htmlentities($industry);?></td>
                                            <td>
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
                    <canvas id="myChart" style="width:100%;max-width:600px;"></canvas>
                    <script>
                      
var ind = "<?php Print($industry); ?>";
var lec = "<?php Print($lecturer); ?>";
var xValues = ["Industry Marks","Lecturer Marks"];
var yValues = [ind,lec];
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Student Marks"
    }
  }
});
</script>
                </div>
            </div>





        </div>
    </div>
    
  <?php include('includes/footer.php');?>
    
    <script src="assets/js/jquery-1.11.1.js"></script>
    
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>