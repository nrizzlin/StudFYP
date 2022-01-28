<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "studfyp");

//login 
if(isset($_POST['loginbtn']))
{
    $user_username = $_POST['user_username']; 
    $user_pass = $_POST['user_pass']; 

    $query = "SELECT * FROM user WHERE user_username='$user_username' AND user_pass='$user_pass'";
    $query_run = mysqli_query($connection, $query);
    $user_type = mysqli_fetch_array($query_run); 

   if($user_type['user_type'] == "admin")
   {
        $_SESSION['user_username'] = $user_username;
        header('Location: home.php');
   }
   
   else if($user_type['user_type'] == "lecturer1")
   {
     $_SESSION['user_username'] = $user_username;
     header('Location: ');
   }
   
   else if($user_type['user_type'] == "lecturer2")
   {
     $_SESSION['user_username'] = $user_username;
     header('Location: ');
   }
   else if($user_type['user_type'] == "lecturer3")
   {
     $_SESSION['user_username'] = $user_username;
     header('Location: ');
   }
   else if($user_type['user_type'] == "lecturer4")
   {
     $_SESSION['user_username'] = $user_username;
     header('Location: ');
   }
   else if($user_type['user_type'] == "student")
   {
     $_SESSION['user_username'] = $user_username;
     header('Location: student.php');
   }
   
   else
   {
        $_SESSION['status'] = "Username / Password is Invalid";
        header('Location: login.php');
   }
    
}

  