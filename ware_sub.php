<?php
	include("../users.php");
	$product=new users;
	if($_GET['update']==0){
		if($product->add_ware($_POST)){
			$product->url("waredetails.php?page=0&run=success0");
		}
	}
	else if($_GET['update']==1){
		if($product->ware_update($_POST)){
			$product->url("waredetails.php?page=0&run=success1");
		}
	}	
	else if($_GET['update']==2){
		extract($_POST);
		if($product->ware_delete($pid1)){
			$product->url("waredetails.php?page=0&run=success2");
		}
	}
?>