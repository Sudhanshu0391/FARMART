<?php
	include("users.php");
    $prod=new users;
	extract($_POST);
	$prod->detail($_SESSION['email'],$_SESSION['type']);
	$prod->users_profile($_SESSION['email']);
	$uData=$prod->farmData[0];
	$prod->proDetail($pid);
	$product=$prod->prodD[0];
	$farmer=$prod->farmD[0];
	$to_email =$farmer['EMAIL_ID'];
	$subject = "ORDER RECEIVED FROM FARMART";
	$message = "Hi,".ucwords($farmer['NAME'])."<br>";
	$message.="You got a Order<br><br>";
	$message.="<h3><b>Product Detail:</b></h3>";
	$message.="<br>Product Name:".$product['Tool_NAME'];
	$message.="<br><b>Quantity:".$oQuantity."</b><br><br>";
	$message.="<h3><b>Buyer Detail:</b></h3>";
	$message.="Name:".$prod->data[0]['name'];
	$message.="<br>Mobile Number:".$prod->data[0]['mobile'];
	$message.="<br>State:".$uData['STATE'];
	$message.="<br>City:".$uData['CITY'];
	$message.="<br>Address:".$uData['ADDRESS'];
	$message.="Thank You<br>";
	$message.="FARMART";
	$headers = "From: FARMART". "\r\n";;
	$headers .= "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$url="tmoredetail.php?pid=".$pid;
	// More headers
	if (mail($to_email, $subject, $message, $headers)) {
		$prod->url($url."&run=success");
	} else {
		echo mail($to_email, $subject, $message, $headers);
	}
?>