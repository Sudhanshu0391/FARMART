<?php
session_start();
class users
{
public $host="localhost";
public $username="root";
public $pass="";
public $db_name="farmart";
public $conn;
public $data;
public $farmData;
public $userData;
public $pData;
public $tData;
public $wData;
public $pro;
public $tool;
public $ware;
public $prodD;
public $farmD;
public $char="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
public function __construct ()
{
$this->conn=new mysqli($this->host,$this->username,$this->pass,$this->db_name);
if($this->conn->connect_errno)
{
die("Database connection failed ".$this->conn->connect_errno);
}
}
public function sign($data,$npass)
{
	extract($data);
	if(strcmp($type,"farmer")==0){
		$query=$this->conn->query("SELECT * FROM farmers_details");
		$query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0){
			$query2=$this->conn->query("SELECT F_ID FROM farmers_details ORDER BY ID DESC LIMIT 1");
			while($row1=$query2->fetch_array(MYSQLI_ASSOC)){
				$last=$row1['F_ID'];
			}
			$last++;
		}
		else{
			$last='F001';
		}
		$query3=$this->conn->query("INSERT INTO	farmers_details(F_ID,EMAIL_ID,F_PHOTO) VALUES('$last','$email','default.png')");
		
	}
	else{
		$query=$this->conn->query("SELECT * FROM user_detail");
		$query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0){
			$query2=$this->conn->query("SELECT USER_ID FROM user_detail ORDER BY ID DESC LIMIT 1");
			while($row1=$query2->fetch_array(MYSQLI_ASSOC)){
				$last=$row1['USER_ID'];
			}
			$last++;
		}
		else{
			$last='U001';
		}
		$query3=$this->conn->query("INSERT INTO	user_detail(USER_ID,EMAIL_ID,PHOTO) VALUES('$last','$email','default.png')");
	}
	$query1="insert into user_credential values('','$email','$name','$phone','$type','$npass','$last')";
		if($this->conn->query($query1)){
			return true;
		}
}

public function signin($email,$password)
{
$query=$this->conn->query("select * from user_credential where email_id='$email' and pass='$password'");
$query->fetch_array(MYSQLI_ASSOC);
if($query->num_rows>0)
{
$_SESSION['email']=$email;
$query=$this->conn->query("select type,core_id from user_credential where email_id='$email'");
while($row1=$query->fetch_array(MYSQLI_ASSOC)){
	$_SESSION['type']=$row1['type'];
	$_SESSION['uid']=$row1['core_id'];
	return $row1['type'];
}
}
}
public function get_image($id,$type){
	if(strcmp($type,'farmer')==0){
		$query=$this->conn->query("SELECT F_PHOTO FROM farmers_details WHERE F_ID='$id'");
		while($row=$query->fetch_array(MYSQLI_ASSOC))
			return $row['F_PHOTO'];
	}
	else if(strcmp($type,'user')==0){
		$query1=$this->conn->query("SELECT PHOTO FROM user_detail WHERE USER_ID='$id'");
		while($row1=$query1->fetch_array(MYSQLI_ASSOC))
			return $row1['PHOTO'];
	}
}
public function pass($email)
{
$query=$this->conn->query("select pass from user_credential where email_id='$email'");
while($row=$query->fetch_array(MYSQLI_ASSOC))
return $row['pass'];
}
public function users_profile($email)
{
$query=$this->conn->query("select * from user_credential where email_id='$email'");
$row=$query->fetch_array(MYSQLI_ASSOC);
if($query->num_rows>0)
{
$this->data[]=$row;
}
return $this->data;
}
public function detail($email,$type)
{
	if(Strcmp($type,'farmer')==0){
		$query=$this->conn->query("select * from farmers_details where EMAIL_ID='$email'");
		$row=$query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0)
		{
		$this->farmData[]=$row;
		}
	}
	else if(Strcmp($type,'user')==0){
		$query=$this->conn->query("select * from user_detail where EMAIL_ID='$email'");
		$row=$query->fetch_array(MYSQLI_ASSOC);
		if($query->num_rows>0)
		{
		$this->userData[]=$row;
		}
	}
	
}
public function update($query1,$query2){
	if($this->conn->query($query1)===TRUE and $this->conn->query($query2) ===TRUE){
		return true;
	}
}
public function prod_detail($email){
	$query=$this->conn->query("SELECT * FROM product_details WHERE FARMER_ID=(SELECT F_ID FROM farmers_details WHERE EMAIL_ID='$email')");
	$row=$query->fetch_array(MYSQLI_ASSOC);
	if($query->num_rows>0){
		while($row=$query->fetch_array(MYSQLI_ASSOC))
	{
		$this->pData[]=$row;
	}
		return $this->pData;
	}
	else{
		$this->pData=false;
		return false;
	}
}
public function tool_detail($id){
	$query=$this->conn->query("SELECT * FROM tools_info WHERE USER_ID='$id'");
	if($query->num_rows>0){
		while($row=$query->fetch_array(MYSQLI_ASSOC))
	{
		$this->tData[]=$row;
	}
		return $this->tData;
	}
	else{
		$this->tData=false;
		return false;
	}
}
public function ware_detail($id){
	$query=$this->conn->query("SELECT * FROM ware_info WHERE USER_ID='$id'");
	if($query->num_rows>0){
		while($row=$query->fetch_array(MYSQLI_ASSOC))
	{
		$this->wData[]=$row;
	}
		return $this->wData;
	}
	else{
		$this->wData=false;
		return false;
	}
}
public function add_product($ProductD){
	extract($ProductD);
	$query2=$this->conn->query("SELECT PRODUCT_ID FROM product_details");
	$query2->fetch_array(MYSQLI_ASSOC);
	if($query2->num_rows>0){
		$query1=$this->conn->query("SELECT PRODUCT_ID FROM product_details ORDER BY ID DESC LIMIT 1");
		while($row1=$query1->fetch_array(MYSQLI_ASSOC))
			$last=$row1['PRODUCT_ID'];
		$last++;
	}
	else{
		$last='P001';
	}
	$ext=explode(".", $_FILES["img"]["name"]);
	$fname=$last.".".end($ext);
	move_uploaded_file($_FILES['img']['tmp_name'],"img/".$fname);
	$query="INSERT INTO	product_details VALUES('','$last','$fid','$pdomain','$pname','$description','$fname','$pquantity','$price')";
	if($this->conn->query($query)){
		return true;
	}
}
public function add_tool($ProductD){
	extract($ProductD);
	$query2=$this->conn->query("SELECT TOOL_ID FROM tools_info");
	$query2->fetch_array(MYSQLI_ASSOC);
	if($query2->num_rows>0){
		$query1=$this->conn->query("SELECT TOOL_ID FROM tools_info ORDER BY ID DESC LIMIT 1");
		while($row1=$query1->fetch_array(MYSQLI_ASSOC))
			$last=$row1['TOOL_ID'];
		$last++;
	}
	else{
		$last='T001';
	}
	$ext=explode(".", $_FILES["img"]["name"]);
	$fname=$last.".".end($ext);
	move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$fname);
	$query="INSERT INTO	tools_info VALUES('','$last','$fid','$email','$pname','$fname','$pquantity','$price','$description')";
	if($this->conn->query($query)){
		return true;
	}
}
public function add_ware($ProductD){
	extract($ProductD);
	$query2=$this->conn->query("SELECT WARE_ID FROM ware_info");
	$query2->fetch_array(MYSQLI_ASSOC);
	if($query2->num_rows>0){
		$query1=$this->conn->query("SELECT WARE_ID FROM ware_info ORDER BY ID DESC LIMIT 1");
		while($row1=$query1->fetch_array(MYSQLI_ASSOC))
			$last=$row1['WARE_ID'];
		$last++;
	}
	else{
		$last='W001';
	}
	$ext=explode(".", $_FILES["img"]["name"]);
	$fname=$last.".".end($ext);
	move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$fname);
	$query="INSERT INTO	ware_info VALUES('','$last','$email','$fid','$cat','$pname','$pquantity','$price','$description','$fname')";
	if($this->conn->query($query)){
		return true;
	}
}
public function prod_update($ProductD){
	extract($ProductD);
	$query="UPDATE product_details SET PRODUCT_DOMAIN='$pdomain',PRODUCT_NAME='$pname',PRODUCT_DESC='$description',QUANTITY='$pquantity',PRICE='$price' WHERE PRODUCT_ID='$pid'";
	if($this->conn->query($query)){
		return true;
	}
}
public function tool_update($ToolD){
	extract($ToolD);
	$query="UPDATE tools_info SET TOOL_NAME='$pname',T_DESC='$description',QUANTITY='$pquantity',PRICE='$price' WHERE TOOL_ID='$pid'";
	if($this->conn->query($query)){
		return true;
	}
}
public function ware_update($WareD){
	extract($WareD);
	$query="UPDATE ware_info SET CATEGORY='$cat', WARE_NAME='$pname',W_DESC='$description',AREA='$pquantity',PRICE='$price' WHERE WARE_ID='$pid'";
	if($this->conn->query($query)){
		return true;
	}
}
public function prod_delete($PID){
	$query="DELETE FROM product_details WHERE PRODUCT_ID='$PID'";
	if($this->conn->query($query)){
		return true;
	}
}
public function tool_delete($PID){
	$query="DELETE FROM tools_info WHERE TOOL_ID='$PID'";
	if($this->conn->query($query)){
		return true;
	}
}
public function ware_delete($PID){
	$query="DELETE FROM ware_info WHERE WARE_ID='$PID'";
	if($this->conn->query($query)){
		return true;
	}
	
}


public function editFarmImg($data,$id){
	extract($data);
	if(strcmp(substr($id,0,1),'F')==0){
		$query=$this->conn->query("SELECT F_PHOTO FROM farmers_details WHERE F_ID='$id'");
		while($row=$query->fetch_array(MYSQLI_ASSOC))
		{
			$temp=$row['F_PHOTO'];
		}
		$dir="img/";
	}
	else{
		$query=$this->conn->query("SELECT PHOTO FROM user_detail WHERE USER_ID='$id'");
		while($row=$query->fetch_array(MYSQLI_ASSOC))
		{
			$temp=$row['PHOTO'];
		}
		$dir="../img/";
	}
	$rand = '';
        for ($i = 0; $i < 10; $i++) {
            $rand .= $this->char[rand(0, strlen($this->char))];
        }
	$ext=explode(".", $_FILES["img"]["name"]);
	$fname=$id.$rand.".".end($ext);
	move_uploaded_file($_FILES['img']['tmp_name'],$dir.$fname);
	if(strcmp(substr($id,0,1),'F')==0){
	$query2="UPDATE farmers_details SET F_PHOTO='$fname' WHERE F_ID='$id'";
		if($this->conn->query($query2)){
			return true;
		}	
	}
	else{
		$query2="UPDATE user_detail SET PHOTO='$fname' WHERE USER_ID='$id'";
		if($this->conn->query($query2)){
			return true;
		}			
	}
}
public function editProdImg($data){
	extract($data);
	if(strcmp(substr($pid,0,1),'P')==0){
		$query=$this->conn->query("SELECT PRODUCT_PHOTO FROM product_details WHERE PRODUCT_ID='$pid'");
		while($row=$query->fetch_array(MYSQLI_ASSOC))
		{
			$temp=$row['PRODUCT_PHOTO'];
		}
		$dir="img/";
		$rand = '';
        for ($i = 0; $i < 10; $i++) {
            $rand .= $this->char[rand(0, strlen($this->char))];
        }
		$ext=explode(".", $_FILES["img"]["name"]);
		$fname=$pid.$rand.".".end($ext);
		move_uploaded_file($_FILES['img']['tmp_name'],$dir.$fname);
		$query2="UPDATE product_details SET PRODUCT_PHOTO='$fname' WHERE PRODUCT_ID='$pid'";
		if($this->conn->query($query2)){
			return true;
		}
	}
	else if(strcmp(substr($pid,0,1),'T')==0){
		$query=$this->conn->query("SELECT PHOTO FROM tools_info WHERE TOOL_ID='$pid'");
		while($row=$query->fetch_array(MYSQLI_ASSOC))
		{
			$temp=$row['PHOTO'];
		}
		$dir="../img/";
		$rand = '';
        for ($i = 0; $i < 10; $i++) {
            $rand .= $this->char[rand(0, strlen($this->char))];
        }
		$ext=explode(".", $_FILES["img"]["name"]);
		$fname=$pid.$rand.".".end($ext);
		move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$fname);
		$query="UPDATE tools_info SET PHOTO='$fname' WHERE TOOL_ID='$pid'";
		if($this->conn->query($query)){
			return true;
		}
	}
	else if(strcmp(substr($pid,0,1),'W')==0){
		$query=$this->conn->query("SELECT PHOTO FROM ware_info WHERE WARE_ID='$pid'");
		while($row=$query->fetch_array(MYSQLI_ASSOC))
		{
			$temp=$row['PHOTO'];
		}
		$dir="../img/";
		$rand = '';
        for ($i = 0; $i < 10; $i++) {
            $rand .= $this->char[rand(0, strlen($this->char))];
        }
		$ext=explode(".", $_FILES["img"]["name"]);
		$fname=$pid.$rand.".".end($ext);
		move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$fname);
		$query="UPDATE ware_info SET PHOTO='$fname' WHERE WARE_ID='$pid'";
		if($this->conn->query($query)){
			return true;
		}
	}
}
public function url($url)
{
header("location:".$url);
}
public function product(){
	$query=$this->conn->query("SELECT * FROM product_details");
	while($row=$query->fetch_array(MYSQLI_ASSOC)){
		$id=$row['FARMER_ID'];
		$query1=$this->conn->query("SELECT CITY FROM farmers_details WHERE F_ID='$id'");
		while($row1=$query1->fetch_array(MYSQLI_ASSOC)){
			$c=$row1['CITY'];
		}
		$row['CITY']=$c;
		$this->pro[]=$row;
	}	
}
public function tool(){
	$query=$this->conn->query("SELECT * FROM tools_info");
	while($row=$query->fetch_array(MYSQLI_ASSOC)){
		$id=$row['USER_ID'];
		$query1=$this->conn->query("SELECT CITY FROM user_detail WHERE USER_ID='$id'");
		while($row1=$query1->fetch_array(MYSQLI_ASSOC)){
			$c=$row1['CITY'];
		}
		$row['CITY']=$c;
		$this->tool[]=$row;
	}	
}
public function ware(){
	$query=$this->conn->query("SELECT * FROM ware_info");
	while($row=$query->fetch_array(MYSQLI_ASSOC)){
		$id=$row['USER_ID'];
		$query1=$this->conn->query("SELECT CITY FROM user_detail WHERE USER_ID='$id'");
		while($row1=$query1->fetch_array(MYSQLI_ASSOC)){
			$c=$row1['CITY'];
		}
		$row['CITY']=$c;
		$this->ware[]=$row;
	}	
}
public function proDetail($pid){
	if(strcmp(substr($pid,0,1),'P')==0){
		$query=$this->conn->query("SELECT * FROM product_details WHERE PRODUCT_ID='$pid'");
		while($row=$query->fetch_array(MYSQLI_ASSOC)){
			$id=$row['FARMER_ID'];
			$query1=$this->conn->query("SELECT * FROM farmers_details WHERE F_ID='$id'");
			while($row1=$query1->fetch_array(MYSQLI_ASSOC)){
				
				$query2=$this->conn->query("SELECT * FROM user_credential WHERE core_id='$id'");
				while($row2=$query2->fetch_array(MYSQLI_ASSOC)){
					$name=$row2['name'];
					$mobile=$row2['mobile'];
				}
				$row1['NAME']=$name;
				$row1['MOBILE']=$mobile;
				$this->farmD[]=$row1;
			}
			
			$this->prodD[]=$row;
		}	
	}
	else if(strcmp(substr($pid,0,1),'T')==0){
		$query=$this->conn->query("SELECT * FROM tools_info WHERE TOOL_ID='$pid'");
		while($row=$query->fetch_array(MYSQLI_ASSOC)){
			$id=$row['USER_ID'];
			$query1=$this->conn->query("SELECT * FROM user_detail WHERE USER_ID='$id'");
			while($row1=$query1->fetch_array(MYSQLI_ASSOC)){
				
				$query2=$this->conn->query("SELECT * FROM user_credential WHERE core_id='$id'");
				while($row2=$query2->fetch_array(MYSQLI_ASSOC)){
					$name=$row2['name'];
					$mobile=$row2['mobile'];
				}
				$row1['NAME']=$name;
				$row1['MOBILE']=$mobile;
				$this->farmD[]=$row1;
			}
			
			$this->prodD[]=$row;
		}	
	}
	else if(strcmp(substr($pid,0,1),'W')==0){
		$query=$this->conn->query("SELECT * FROM ware_info WHERE WARE_ID='$pid'");
		while($row=$query->fetch_array(MYSQLI_ASSOC)){
			$id=$row['USER_ID'];
			$query1=$this->conn->query("SELECT * FROM user_detail WHERE USER_ID='$id'");
			while($row1=$query1->fetch_array(MYSQLI_ASSOC)){
				
				$query2=$this->conn->query("SELECT * FROM user_credential WHERE core_id='$id'");
				while($row2=$query2->fetch_array(MYSQLI_ASSOC)){
					$name=$row2['name'];
					$mobile=$row2['mobile'];
				}
				$row1['NAME']=$name;
				$row1['MOBILE']=$mobile;
				$this->farmD[]=$row1;
			}
			
			$this->prodD[]=$row;
		}	
	}
}
}
new users;
?>
