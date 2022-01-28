<?php

/*
BCS 2243 WEB ENGINEERING
GROUP : 2B-2
PROJECT : UMP-FK FINAL YEAR PROJECT MANAGEMENT SYSTEM (StudFYP)
MODULE : No.3 (Student)
NAME : NUR IZZLIN BINTI AZMAN 
MATRIC NO : CB20012
*/

/* SESSION */
session_start();
if(isset($_SESSION['User'])){
    $User = $_SESSION['User'];
}else{
    header("location:/studfyp/login.php");
}

/* CONNECTION DATABASE */
require_once('includes/config.php');

/* QUERY FOR SELECT ANNOUNCEMENT TABLE */
$result = mysqli_query($bd, "SELECT * FROM announcement WHERE student_id = '$User'");

/* MYDONUT CHART SECTION */
$day = 0;
$query = "SELECT * FROM logbook WHERE student_id = '".$_SESSION['User']."'";
$result = mysqli_query($bd,$query);
$i=0;
while($row = mysqli_fetch_array($result))
{
    $day = $row["log_day"];
    $i++;
}
?>


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


        <style>
            .no-data {
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                
                font-size: 1.5rem;
                font-weight: bold;
                
                color: gray;
            }
            .no-data.hidden {
                display: none;
            }
        </style>
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
                    <div class="col-md-12"><h1 class="page-head-line">DASHBOARD </h1></div>
                </div>
                <div class="row" >
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Daily Activity Progress</h3>
                                <h6 class="card-subtitle">Last Updated Logbook on Day <?php echo $day ?></h6>
                                <div style="position: relative; height: 70vh; width: 100%">
                                    <div id="noDonat" class="no-data hidden">No Data</div>
                                    
                                    <canvas id="myDonat" height="100%" width="100%"></canvas>
                                    
                                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                                    <script>
                                        const labels = ["Finish", "Not finish"];

                                        // LOAD DATA LOGBOOK FROM PROGRESS.PHP FILE
                                        $.get("progress.php", (data, status) => 
                                        {
                                            data = JSON.parse(data);
                                            console.log(data);
                                            const d = {
                                                labels: labels,
                                                datasets: 
                                                [
                                                    {
                                                        label: "My First Dataset",
                                                        data,
                                                        backgroundColor: [
                                                            "rgb(244, 211, 53)",
                                                            "rgb(200, 200, 200)",
                                                        ],
                                                        hoverOffset: 4,
                                                    },
                                                ],
                                            };

                                            const config = {
                                                type: "doughnut",
                                                data: d,
                                                options: {
                                                    maintainAspectRatio: false,
                                                    responsive: true,
                                                },
                                            };

                                            let myDonat;
                                            if (data.length === 0) {
                                                document.querySelector('#noDonat').classList.remove('hidden');
                                            } else {
                                                myDonat = new Chart(document.getElementById("myDonat"), config);
                                            }
                                        });
                                    </script>
                                </div>	
                            </div>
                            <div><hr class="mt-0 mb-0"></div>
                        </div>
                    </div>
                
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading"><center>ANNOUNCEMENT</center></div>
                            <font color="black" align="center">
                            <div class="panel-body">
                                <form name="dept" method="post" enctype="multipart/form-data">
                                    <table border=0 cellpadding="10" cellspacing="1" width="500">
                                        <tr>
                                            <td>No</td>
                                            <td>Date</td>
                                            <td>Title</td>
                                            <td>Content</td>
                                        </tr>

                                        <?php
                                            /* DISPLAY LIST OF ANNOUNCEMENT SECTION */
                                            include ('includes/config.php'); // CONNECTION DATABASE
                                            $records = mysqli_query($bd,"SELECT * FROM announcement"); // FETCH ANNOUNCEMENT DATA FROM ANNOUNCEMENT TABLE
                                            while ($data = mysqli_fetch_array($records))
                                            {
                                        ?>

                                        <tr>
                                            <td><?php echo $data['annoucement_id']; ?></td>
                                            <td><?php echo $data['date']; ?></td>
                                            <td><?php echo $data['announce_title']; ?></td>
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

        <!-- FOOTER SECTION -->
        <?php include('includes/footer.php');?>

        <!-- SCRIPT SECTION -->
        <script src="assets/js/jquery-1.11.1.js"></script>
        <script src="assets/js/bootstrap.js"></script>
    </body>
</html>
