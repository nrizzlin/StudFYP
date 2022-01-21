
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
require_once('includes/config.php');

	/* LOGIN FUNCTION SESSION  */
	if(isset($_POST['Login'])){

		/* LOGIN FUNCTION SESSION IF USER TYPE : STUDENT */
		if($_POST['userType']=="Student"){
			if(empty($_POST['username']) || empty($_POST['userPass'])){
				header("location:../login.php?Empty= Please Fill in the Blanks");
			}else{
				$query = "SELECT * FROM user WHERE user_username='".$_POST['username']."' AND user_pass='".$_POST['userPass']."' ";
				$result = mysqli_query($bd,$query);
		
				if(mysqli_fetch_assoc($result)){
					$_SESSION['User']=$_POST['username'];
					header("Location: student_index.php");
					
				}else{
					header("location:../login.php?Invalid= Invalid username or password");
				}
			}
		}

		/* LOGIN FUNCTION SESSION IF USER TYPE : LECTURER */
		if($_POST['userType']=="Lecturer"){
			if(empty($_POST['username']) || empty($_POST['userPass'])){
				header("location:../login.php?Empty= Please Fill in the Blanks");
			}else{
				$query = "SELECT * FROM user WHERE user_username='".$_POST['username']."' AND user_pass='".$_POST['userPass']."' ";
				$result = mysqli_query($bd,$query);
		
				if(mysqli_fetch_assoc($result)){
					$_SESSION['User']=$_POST['username'];
					header("Location: lecturer_index.php");
					
				}else{
					header("location:../login.php?Invalid= Invalid username or password");
				}
			}
		}

		/* LOGIN FUNCTION SESSION IF USER TYPE : INDUSTRY */
		if($_POST['userType']=="Industry"){
			if(empty($_POST['username']) || empty($_POST['userPass'])){
				header("location:../login.php?Empty= Please Fill in the Blanks");
			}else{
				$query = "SELECT * FROM user WHERE user_username='".$_POST['username']."' AND user_pass='".$_POST['userPass']."' ";
				$result = mysqli_query($bd,$query);
		
				if(mysqli_fetch_assoc($result)){
					$_SESSION['User']=$_POST['username'];
					header("Location: industry_index.php");
					
				}else{
					header("location:../login.php?Invalid= Invalid username or password");
				}
			}
		}
	}		
?>