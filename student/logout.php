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

	/* LOGOUT FUNCTION SESSION  */
	if(isset($_GET['logout'])){
		session_destroy();
		header("location:index.php");
	}
?>