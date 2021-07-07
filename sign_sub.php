<?php
    include("users.php");
	include("manipulation.php");
    $register=new users;
	extract($_POST);
	$r1=rand(32,126);
	$r2=rand(32,126);
	$r3=rand(32,126);
	$key=chr($r1);
	$key .=chr($r2);
	$key .=chr($r3);
	$mp=sChange($key,$pass);
	$hp=md5($mp);
	$left=substr($hp,0,16);
	$right=substr($hp,16);
	$mdl=md5($left);
	$mdr=md5($right);
	$new="";
	$mdl .=$mdr;
	$NewM=md5($mdl);
	$final="";
	$final .=substr($NewM,0,16);
	$final .=$key;
	$final .=substr($NewM,16);
	if($pass!=$repass){
		 $register->url("registration.php?run=retype");
	}
	else{
		if($register->sign($_POST,$final))
		{
			$register->url("registration.php?run=success");
		}
	}
  ?>