<?php
session_start();
include('function.inc.php');
include('dbh.inc.php');
if(isset($_POST["createbtn"]))
{
    $user_username = $_POST['user_username']; 
    $user_pass = $_POST['user_pass']; 
    $user_type = $_POST['user_type'];
    
    createUser($conn, $user_username,$user_pass,$user_type);
    
}
