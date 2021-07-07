<?php
    include("users.php");
	include("manipulation.php");
    $signin=new users;
    extract($_POST);
	$dpass=$signin->pass($email);
	echo $dpass;
	echo "<br>";
	$mp=sChange(substr($dpass,16,3),$pass);
	$hp=md5($mp);
	$left=substr($hp,0,16);
	$right=substr($hp,16);
	$mdl=md5($left);
	$mdr=md5($right);
	$new="";
	$mdl .=$mdr;
	$NewM=md5($mdl);
	$final=substr($NewM,0,16);
	$final .=substr($dpass,16,3);
	$final .=substr($NewM,16);
	echo $final;
	$temp=$signin->signin($email,$final);
	echo $temp;
    if($temp==null)
    {
        $signin->url("login.php?run=failed");
    }
    else
    {
		if(strcmp($temp,'farmer')==0){
			$signin->url("farm_home.php");
		}
		else if(strcmp($temp,'user')==0){
			$signin->url("user/user_home.php");
		}
		else{
			$signin->url("login.php?run=failed");
		}
    }
?>