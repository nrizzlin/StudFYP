<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "studfyp");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$user_username = mysqli_real_escape_string($link, $_REQUEST['user_username']);
$user_pass = mysqli_real_escape_string($link, $_REQUEST['user_pass']);
$user_type = mysqli_real_escape_string($link, $_REQUEST['user_type']);
 
// Attempt insert query execution
$sql = "INSERT INTO user (user_username, user_pass, user_type) VALUES ('$user_username', '$user_pass', '$user_type')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>