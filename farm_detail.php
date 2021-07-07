<?php
	include("users.php");
	$edit=new users;
	extract($_POST);
	$semail=$_SESSION['email'];
	$query1="UPDATE user_credential SET name='$name',mobile='$mobile' WHERE email_id='$email'";
	$query2="UPDATE farmers_details SET STATE='$state' , CITY='$city' ,ADDRESS='$address' ,PIN_CODE='$pincode' , BANK_NAME='$bName' , ACC_NO='$accNo' ,IFSC='$ifsc' WHERE EMAIL_ID='$email'";
	if($edit->update($query1,$query2)){
			$edit->url("profile.php?run=success");
	}
?>
	