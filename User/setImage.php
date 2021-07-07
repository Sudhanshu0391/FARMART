<?php
	include("../users.php");
	$set=new users;
	if(isset($_GET['id'])){
		if($_GET['id']==0){
			if($set->editFarmImg($_POST,$_SESSION['uid'])){
				$set->url("profile.php?set=1");
			}
		}
		else if($_GET['id']==1){
			if($set->editProdImg($_POST))
				$set->url("tooldetails.php?page=0&set=1");
		}
		else if($_GET['id']==2){
			if($set->editProdImg($_POST))
				$set->url("waredetails.php?page=0&set=1");
		}
	}
?>