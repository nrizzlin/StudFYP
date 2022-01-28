<?php
include 'includes/dbh.inc.php';
if (isset($_GET['deleteid']))
{
    $User_ID = $_GET['deleteid'];
    $sql = "DELETE FROM `user` WHERE User_ID = $User_ID";
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        header('location: displayuser.php');
    } 
    else
    {
        echo "failed delete";
    }
    
}
?>