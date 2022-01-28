<?php


/* SESSION */
	session_start();

	/* LOGOUT FUNCTION SESSION  */
	if(isset($_GET['logout'])){
		session_destroy();
		header("location:index.php");
	}
?>