<?php 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMP-FK StudFYP</title>
    <link rel="stylesheet" href="mystyle.css">
</head>
<body>
    <table class="layout" align="center" class="layout">

        <tr class="banner">
                <td class="c1-banner">
                    <img src="ump-logo.png" alt="UMP Logo" class="header">
                </td>
                <td class="c2-banner" align="center">
                    <h1>UMP-FK FINAL YEAR PROJECT MANAGEMENT SYSTEM <h1><i>(StudFYP)</i></h1></h1>
                </td>
                <td>
                    <p>Student</p>
                    <p><button>Log out</button></p>
                </td>
        </tr>

        <tr class="navigation">
            <td colspan="3">
                <ul>
                <li class="navbar"><a class="navbarlink"href="mainstudent.php">Home</a></li>
                    <li class="navbar"><a class="navbarlink" href="enrollfyp.php">Enrollment FYP</a></li>
                    <li class="navbar"><a class="navbarlink" href="logbook.php">Logbook FYP</a></li>
                    <li class="navbar"><a class="navbarlink" href="svinfo.php">Supervisor Info</a></li>
                </ul>
            </td>
        </tr>
        <tr class="content">
            <td class="cont" colspan="3">
                <h2>Home</h2>
                <br>
                <form name="formBar" align="center">
                    <table align="center" class="tablemain">
                        <tr>
                            <th class="table1"><h3>Information/ News</h3></th>
                            <th class="table1"><h3>Announcements</h3></th>
                        </tr>
                        <tr>
                            <td class="table1"><textarea name="info-news" id="info-news" cols="80" rows="30"></textarea></td>
                            <td class="table1"><textarea name="announce" id="announce" cols="80" rows="30"></textarea></td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>

        <tr class="footer">
            <td class="footr" colspan="3">
                <ul class="side-footer">
                    <li ><a href="index.html" class="f">Home |</a></li>
                    <li ><a href="#help" class="f">Help |</a></li>
                    <li ><a href="#privacy" class="f">Privacy |</a></li>
                    <li ><a href="#logout" class="f">logout |</a></li>
                    <li class="copyrght"><a href="#copy">Copyright 2021; All Right Reserved</a></li>
                </ul>
            </td>
        </tr>
    </table>
    
    <script src="MyGold/Javascript/goldfunction.js"></script>
</body>
</html>