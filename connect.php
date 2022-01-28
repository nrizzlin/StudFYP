<?php
 // connection to the database

$con = new mysqli("localhost", "root", "", "studfyp");

if (!$con)
{
    die("Connection failed: " . mysqli_connect_error());
}
else
{
    echo "connected";
}