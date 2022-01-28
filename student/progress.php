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

/* CONNECTION DATABASE */
include('includes/config.php');

/* QUERY TO SELECT LOGBOOK DATA FROM LOGBOOK TABLE */
$query = "SELECT * FROM logbook WHERE student_id = '".$_SESSION['User']."'";
$result = mysqli_query($bd,$query);
$i=0;

/* DISPLAY LOGBOOK DATA IN MYDONUT CHART */
if($result){
	if($result->num_rows > 0){
		while($row = mysqli_fetch_array($result)) {
			$day = $row["log_day"];
			$i++;
		}
		if($day<31){
			$somedata = 30 - $day;
		}
		$somedata = array($day, $somedata);

		echo json_encode($somedata);
	}else{
		echo json_encode([]);
	}
}else{
	echo json_encode([]);
}
?>