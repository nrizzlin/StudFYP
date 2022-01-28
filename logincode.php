
<?php


/* SESSION */
session_start();
require_once('includes/config2.php');

	/* LOGIN FUNCTION SESSION  */
	if(isset($_POST['loginbtn'])){

		/* LOGIN FUNCTION SESSION IF USER TYPE : STUDENT */
		if($_POST['user_type']=="Student"){
			if(empty($_POST['user_username']) || empty($_POST['user_pass'])){
				header("location:../login.php?Empty= Please Fill in the Blanks");
			}else{
				$query = "SELECT * FROM user WHERE user_username='".$_POST['user_username']."' AND user_pass='".$_POST['user_pass']."' ";
				$result = mysqli_query($bd,$query);
		
				if(mysqli_fetch_assoc($result)){
					$_SESSION['User']=$_POST['user_username'];
					header("Location:student/student_index.php");
					
				}else{
					header("location:../login.php?Invalid= Invalid username or password");
				}
			}
		}

		/* LOGIN FUNCTION SESSION IF USER TYPE : Faculty_Supervisor */
		if($_POST['user_type']=="Faculty_Supervisor"){
			if(empty($_POST['user_username']) || empty($_POST['user_pass'])){
				header("location:../login.php?Empty= Please Fill in the Blanks");
			}else{
				$query = "SELECT * FROM user WHERE user_username='".$_POST['user_username']."' AND user_pass='".$_POST['user_pass']."' ";
				$result = mysqli_query($bd,$query);
		
				if(mysqli_fetch_assoc($result)){
					$_SESSION['User']=$_POST['user_username'];
					header("Location: supervisor/manage-students.php");
					
				}else{
					header("location:../login.php?Invalid= Invalid username or password");
				}
			}
		}

		/* LOGIN FUNCTION SESSION IF USER TYPE : Admin */
		if($_POST['user_type']=="Admin"){
			if(empty($_POST['user_username']) || empty($_POST['user_pass'])){
				header("location:../login.php?Empty= Please Fill in the Blanks");
			}else{
				$query = "SELECT * FROM user WHERE user_username='".$_POST['user_username']."' AND user_pass='".$_POST['user_pass']."' ";
				$result = mysqli_query($bd,$query);
		
				if(mysqli_fetch_assoc($result)){
					$_SESSION['User']=$_POST['user_username'];
					header("Location: admin_index.php");
					
				}else{
					header("location:../login.php?Invalid= Invalid username or password");
				}
			}
		}

		/* LOGIN FUNCTION SESSION IF USER TYPE : Faculty_Industry */
		if($_POST['user_type']=="Faculty_Industry"){
			if(empty($_POST['user_username']) || empty($_POST['user_pass'])){
				header("location:../login.php?Empty= Please Fill in the Blanks");
			}else{
				$query = "SELECT * FROM user WHERE user_username='".$_POST['user_username']."' AND user_pass='".$_POST['user_pass']."' ";
				$result = mysqli_query($bd,$query);
		
				if(mysqli_fetch_assoc($result)){
					$_SESSION['User']=$_POST['user_username'];
					header("Location: industry/StudentList.php");
					
				}else{
					header("location:../login.php?Invalid= Invalid username or password");
				}
			}
		}

		/* LOGIN FUNCTION SESSION IF USER TYPE : Lecturer_Evaluator */
		if($_POST['user_type']=="Lecturer_Evaluator"){
			if(empty($_POST['user_username']) || empty($_POST['user_pass'])){
				header("location:../login.php?Empty= Please Fill in the Blanks");
			}else{
				$query = "SELECT * FROM user WHERE user_username='".$_POST['user_username']."' AND user_pass='".$_POST['user_pass']."' ";
				$result = mysqli_query($bd,$query);
		
				if(mysqli_fetch_assoc($result)){
					$_SESSION['User']=$_POST['user_username'];
					header("Location: industry/StudentList.php");
					
				}else{
					header("location:../login.php?Invalid= Invalid username or password");
				}
			}
		}

		/* LOGIN FUNCTION SESSION IF USER TYPE : INDUSTRY */
		if($_POST['user_type']=="Evaluator_Industry"){
			if(empty($_POST['user_username']) || empty($_POST['user_pass'])){
				header("location:../login.php?Empty= Please Fill in the Blanks");
			}else{
				$query = "SELECT * FROM user WHERE user_username='".$_POST['user_username']."' AND user_pass='".$_POST['user_pass']."' ";
				$result = mysqli_query($bd,$query);
		
				if(mysqli_fetch_assoc($result)){
					$_SESSION['User']=$_POST['user_username'];
					header("Location: industry/StudentList.php");
					
				}else{
					header("location:../login.php?Invalid= Invalid username or password");
				}
			}
		}
	}		
?>