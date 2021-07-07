<?php
	include("../users.php");
	$edit=new users;
	extract($_POST);
	$query1="UPDATE user_credential SET name='$name',mobile='$mobile' WHERE email_id='$email'";
	$query2="UPDATE user_detail SET STATE='$state' , CITY='$city' ,ADDRESS='$address' ,PIN_CODE='$pincode'  WHERE EMAIL_ID='$email'";
	if($edit->update($query1,$query2)){
			$edit->url("profile.php?run=success");
	}
	else{
		echo "123";
	}
?>
	