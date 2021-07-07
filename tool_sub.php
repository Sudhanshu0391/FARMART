<?php
	include("../users.php");
	$product=new users;
	if($_GET['update']==0){
		if($product->add_tool($_POST)){
			$product->url("tooldetails.php?page=0&run=success0");
		}
	}
	else if($_GET['update']==1){
		if($product->tool_update($_POST)){
			$product->url("tooldetails.php?page=0&run=success1");
		}
	}	
	else if($_GET['update']==2){
		extract($_POST);
		if($product->tool_delete($pid1)){
			$product->url("tooldetails.php?page=0&run=success2");
		}
	}
?>