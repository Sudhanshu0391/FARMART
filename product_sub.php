<?php
	include("users.php");
	$product=new users;
	if($_GET['update']==0){
		if($product->add_product($_POST)){
			$product->url("productdetails.php?page=0&run=success0");
		}
	}
	else if($_GET['update']==1){
		if($product->prod_update($_POST)){
			$product->url("productdetails.php?page=0&run=success1");
		}
	}	
	else if($_GET['update']==2){
		extract($_POST);
		if($product->prod_delete($pid1)){
			$product->url("productdetails.php?page=0&run=success2");
		}
	}
?>