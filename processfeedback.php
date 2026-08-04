<?php
	$action = $_REQUEST['action'];
	$id = $_REQUEST['id'];
	
    include("connect.php");
	include("config.php");
	
	switch($action){
		case "approve":
			$query ="SELECT * FROM `guestbook` WHERE `ID` = '$id' ";
			$result = mysqli_query($link, $query) or die("Error: could not get comments ". mysql_error());
			$rows = mysqli_num_rows($result);
			if($rows > 0){
				$query1 = "UPDATE `guestbook` SET `status`='V' WHERE `ID` =$id " ;
				$result1 = mysqli_query($link, $query1) or die("Error: couldn't add comment " . mysql_error());
				if(mysqli_affected_rows($link)==1){
					echo "<p style='color:green;font-size:18px'>Feedback Approved Successfully </p>";
				}else{
					echo "<p style='color:green;font-size:18px'>Feedback was already Approved... </p>";
				}
			}else{
				echo "<p style='color:red;font-size:18px'>Feedback Not Found... </p>";
			}
		
			break;
		case "delete":
			$query ="SELECT * FROM `guestbook` WHERE `ID` = '$id'";
			$result = mysqli_query($link, $query) or die("Error: could not get comments ". mysql_error());
			$rows = mysqli_num_rows($result);
			if($rows > 0){
				$query1 = "DELETE FROM `guestbook` WHERE `ID` =$id " ;
				$result1 = mysqli_query($link, $query1) or die("Error: couldn't delete comment " . mysql_error());
				if(mysqli_affected_rows($link)==1){
					echo "<p style='color:green;font-size:18px'>Feedback Deleted Successfully </p>";
				}else{
					echo "<p style='color:red;font-size:18px'>Feedback Not Found... </p>";
				}
			}else{
				echo "<p style='color:red;font-size:18px'>Feedback Not Found... </p>";
			}
			break;
	}
	
	
?>

