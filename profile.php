<?php
    include("users.php");
    $email=$_SESSION['email'];
	$fid=$_SESSION['uid'];
    $profile=new users;
    $profile->detail($email,$_SESSION['type']);
	$profile->users_profile($email);
	$profile->farmData;
	$img=$profile->get_image($_SESSION['uid'],$_SESSION['type']);
?>
<html>
<head>
<style>

body {margin: 0; background-color: #C0C0C0;}

ul.topnav {
list-style-type: none;
margin: 0;
padding: 0;
overflow: hidden;
background: rgb(227,162,26);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 32%, rgba(0,212,255,1) 100%);
}

ul.topnav li {float: left;}

ul.topnav li a {
display: block;
color: white;
text-align: center;
padding: 13px 16px;
text-decoration: none;
}

ul.topnav li a:hover:not(.active) {background-color: #C9ADA7;}

ul.topnav li a.active {background-color: black ;}

ul.topnav li.right {float: right;}

@media screen and (max-width: 600px) {
ul.topnav li.right,
ul.topnav li {float: none;}
}
.divider-text {
    position: relative;
    text-align: center;
    margin-top: 15px;
    margin-bottom: 15px;
}
.divider-text span {
    padding: 7px;
    font-size: 12px;
    position: relative;   
    z-index: 2;
}
.divider-text:after {
    content: "";
    position: absolute;
    width: 100%;
    border-bottom: 1px solid #ddd;
    top: 55%;
    left: 0;
    z-index: 1;
}

.btn-facebook {
    background-color: #405D9D;
    color: #fff;
}
.btn-twitter {
    background-color: #42AEEC;
    color: #fff;
}
ul#horizontal-list {
	min-width: 696px;
	list-style: none;
	padding-top: 20px;
	}
	ul#horizontal-list li {
		display: inline;
	}
</style>
 
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

<!-- Google Fonts -->

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">

<!-- Bootstrap core CSS -->

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

<!-- Material Design Bootstrap -->

<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">
    <meta charset="utf-8">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">     
        
</head>
<body style="font-size:17px">

<div>
<ul class="topnav" style="padding-left:50px;padding-right:30px;padding-top:0px;height:60px;">
	<li><a  style="padding-top:20px;" href="farm_home.php">Home</a></li>
	<li><a href="toolshow.php"style="padding-top:20px;">Tools</a></li>
	<li><a href="wareshow.php" style="padding-top:20px;">Warehouse</a></li>
	<li><a href="farm_contact.php" style="padding-top:20px;">Contact Us</a></li>
	<li><a class="active" href="profile.php" style="padding-top:20px;">Profile</a></li>
	<li style="float:right;padding-left:20px;padding-top:5px">
    <a  href="logout.php" class="navbar-link btn btn-info" style="text-decoration: none;font-weight: bold;color: white;height:40px;padding-top:10px">LogOut</a>
	</li>
	<li style="float:right;margin-top:0px;padding-top:10px"><img style="border-radius: 50%;float:none" src="img/<?php echo $img; ?>" alt="" width="40px" height="40px"></li>
	
</ul>

</div>

<div id="contact" class="paddsection">
<div class="container" style="padding-left:0px">
<div class="contact-block1" >
<div class="row" >
<div class="container" style="align:center">

<div  class="bootstrap">
            <ul class="nav nav-tabs" id="horizontal-list" style="font-size:20px;padding-right:40px;">
                <li class="active"><a href="profile.php">Profile</a></li>
                <li><a href="productdetails.php?page=0">Products</a></li>
            </ul>
</div>

</div>
<div class="col-lg-6">

<div class="contact-contact">
<center>
<h2 class="mb-30"><b>PROFILE</b></h2>
</center>
<div class="contact-details">
<center>
<img style="border-radius: 50%" src="img/<?php foreach ($profile->farmData as $prof){echo $prof['F_PHOTO'];}?>" alt="" width="250px" height="250px"><br>
<input type="button" id="btn1" class="btn" value="EDIT Photo" onclick="edit()" style="background-color:#D3D3D3;height:40px">
<div id="form2" style="display:none">
<form action="setImage.php?id=0" method="post" enctype="multipart/form-data" class="Product_detail">
<br><input type="file" name="img" class="form-control" id="img" accept="image/*" style="width:200px;border:0px" >
<input type="submit" class="btn" value="save" style="background-color:#D3D3D3;height:40px">
</form>
</div
</center>
</div>

</div>
</div>

<div class="col-lg-6">
<center>
<?php
	foreach($profile->data as $data1){
		$name=$data1['name'];
		$email=$data1['email_id'];
		$mobile=$data1['mobile'];
	}
	foreach($profile->farmData as $data2){
		$state=$data2['STATE'];
		$city=$data2['CITY'];
		$address=$data2['ADDRESS'];
		$pincode=$data2['PIN_CODE'];
		$bName=$data2['BANK_NAME'];
		$accNo=$data2['ACC_NO'];
		$ifsc=$data2['IFSC'];
	}
?>
<h2><b>Farmer Details</b></h2><br></center>
<form method="post" action="farm_detail.php" enctype="multipart/form-data" class="farmer_detail">
<div class="row">
<?php
	if(isset($_GET['run']) && $_GET['run']=="success")
	{
	echo "<div style='margin-left:20%'><mark>You have successfully Updated your Detail.</mark></div></center>";
	}
?>
<div class="col-lg-6">
<div class="form-group">

<label for="Name" style="font-weight: bold">Name</label>
<input type="text" name="name" class="form-control" id="name" value="<?php echo $name;?>" placeholder="Name" required minlength="4"/>
</div>
</div>

<div class="col-lg-6">
<div class="form-group">
<label for="Email" style="font-weight: bold">Email</label>
<input type="email" class="form-control" name="email" value="<?php echo $email;?>" id="email"  required placeholder="<?php echo $email;?>" maxlength='0' readonly />
</div>
</div>
<div class="col-lg-12">
<div class="form-group">
<label for="Mobile" style="font-weight: bold">Mobile</label>
<?php
	if($mobile==Null){
		echo "<input type='tel' class='form-control' name='mobile' id='mobile' required placeholder='Mobile' pattern='^[1-9][0-9]{9}$'>";
	}
	else{
		echo "<input type='tel' class='form-control' name='mobile' id='mobile' value='{$mobile}' required placeholder='Mobile' pattern='^[1-9][0-9]{9}$' />";
	}
?>

</div>
</div>

<div class="col-lg-12">
<div class="form-group">
<label for="State" style="font-weight: bold">State</label>
<?php
	if($state==Null){
		echo "<input type='text' class='form-control' name='state' id='state' required placeholder='State' minlength='4' />";
	}
	else{
		echo "<input type='text' class='form-control' name='state' id='state' value='{$state}' required placeholder='State' minlength='4' />";
	}
?>

</div>
</div>
<div class="col-lg-12">
<div class="form-group">
<label for="City" style="font-weight: bold">City</label>
<?php
	if($city==Null){
		echo "<input type='text' class='form-control' name='city' id='city' required placeholder='City' minlength='4'>";
	}
	else{
		echo "<input type='text' class='form-control' name='city' id='subject' value='{$city}' required placeholder='City' minlength='4' />";
	}
?>
</div>
</div>
<div class="col-lg-12">
<div class="form-group">
<label for="pincode" style="font-weight: bold">PIN Code</label>
<?php
	if($pincode==0){
		echo "<input type='text' class='form-control' name='pincode' id='pincode' required placeholder='PIN Code' pattern='^[1-9][0-9]{5}$' />";
	}
	else{
		echo "<input type='text' class='form-control' name='pincode' id='pincode' value='{$pincode}' placeholder='{$pincode}' pattern='^[1-9][0-9]{5}$' />";
	}
?>
</div>
</div>
<div class="col-lg-12">
<div class="form-group">
<label for="Address" style="font-weight: bold">Address</label>
<?php
	if($address==Null){
		echo "<input type='text' class='form-control' name='address' id='address' required placeholder='Address' minlength='4'/>";
	}
	else{
		echo "<input type='text' class='form-control' name='address' id='address' value='{$address}' placeholder='{$address}' minlength='4' />";
	}
?>
</div>
</div>
<div class="col-lg-12">
<div class="form-group">
<label for="bName" style="font-weight: bold">Bank Name</label>
<?php
	if($bName==Null){
		echo "<input type='text' class='form-control' name='bName' id='bName' required placeholder='Bank Name' minlength='4' />";
	}
	else{
		echo "<input type='text' class='form-control' name='bName' id='bName' value='{$bName}' placeholder='{$bName}' minlength='4' />";
	}
?>
</div>
</div>
<div class="col-lg-12">
<div class="form-group">
<label for="AccNo" style="font-weight: bold">Bank Account Number</label>
<?php
	if($accNo==Null){
		echo "<input type='text' class='form-control' name='accNo' id='accNo' required placeholder='Bank Account Number' pattern='[0-9]{9,18}'/>";
	}
	else{
		echo "<input type='text' class='form-control' name='accNo' id='accNo' value='{$accNo}' placeholder='{$accNo}' pattern='[0-9]{9,18}'/>";
	}
?>
</div>
</div>
<div class="col-lg-12">
<div class="form-group">

<label for="IFSC" style="font-weight: bold">IFSC Code</label>
<?php
	if($ifsc==Null){
		echo "<input type='text' class='form-control' name='ifsc' id='ifsc' required placeholder='IFSC Code' pattern='^[a-zA-z]{4}[0-9]{7}$' />";
	}
	else{
	echo "<input type='text' class='form-control' name='ifsc' id='ifsc' value='{$ifsc}' placeholder='$ifsc' pattern='^[a-zA-z]{4}[0-9]{7}$' required/>";
	}
?>
</div>
</div>

<div class="col-lg-12">
<center>
<input type="submit" class="btn" value="Save" style="background-color:#D3D3D3;height:40px">
</center>
</div>
</div>
</form>
<script>
var input = document.getElementById('mobile');
input.oninvalid = function(event) {
    event.target.setCustomValidity('Invalid Mobile Number');
}
input = document.getElementById('pincode');
input.oninvalid = function(event) {
    event.target.setCustomValidity('Enter valid pin code');
}
input = document.getElementById('accNo');
input.oninvalid = function(event) {
    event.target.setCustomValidity('Enter valid Bank Account Number');
}
input = document.getElementById('ifsc');
input.oninvalid = function(event) {
    event.target.setCustomValidity('Enter valid IFSC Code');
}
function edit()
{
    document.getElementById('btn1').style.display = 'none';
	document.getElementById('form2').style.display = '';
}
</script>
</div>
</div>
</div>
</div>	
</div>


<footer class="page-footer bg-dark">
<div class="bg-success">
<div class="container">
<div class="row py-4 d-flex align-items-center">
<div class="col-md-12 text-center">
<a href="#"><i class="fab fa-facebook-f white-text mr-4"> </i></a>
<a href="#"><i class="fab fa-twitter white-text mr-4"> </i></a>
<a href="#"><i class="fab fa-google-plus-g white-text mr-4"> </i></a>
<a href="#"><i class="fab fa-linkedin-in white-text mr-4"> </i></a>
<a href="#"><i class="fab fa-instagram white-text"> </i></a>
</div>
</div>
</div>
</div>
<div class="container text-center text-md-left mt-5">
<div class="row">
<div class="col-md-3 mx-auto mb-4">
<h6 class="text-uppercase font-weight-bold">About us</h6>
<hr class="bg-success mb-4 mt-0 d-inline-block mx-auto" style="width: 125px; height: 2px">
<p class="mt-2">FARM♦MART is the local source for all of your farm supply needs. From animal health, feed, seed, and pet supplies,
to fencing, farm hardware, and lawn & garden tools, your local FARM♦MART knows what you need and when you need it. Each of our 
independently owned locations has a friendly staff dedicated to serving the needs of the community and providing you with an excellent 
experience every time you visit. We pride ourselves on our expertise and excellent products at great prices.</p>
</div>
<div class="col-md-2 mx-auto mb-4">
<h6 class="text-uppercase font-weight-bold">Products</h6>
<hr class="bg-success mb-4 mt-0 d-inline-block mx-auto" style="width: 85px; height: 2px">
<ul class="list-unstyled">
<li class="my-2"><a href="#">Product Buying</a></li>
<li class="my-2"><a href="#">Product Selling</a></li>
<li class="my-2"><a href="#">Warehouse</a></li>
</ul>
</div>
<div class="col-md-2 mx-auto mb-4">
<h6 class="text-uppercase font-weight-bold">Useful links</h6>
<hr class="bg-success mb-4 mt-0 d-inline-block mx-auto" style="width: 110px; height: 2px">
<ul class="list-unstyled">
<li class="my-2"><a href="#">Home</a></li>
<li class="my-2"><a href="#">Product</a></li>
<li class="my-2"><a href="#">Warehouse</a></li>
<li class="my-2"> <a href="#">Contact Us</a></li>
</ul>
</div>
<div class="col-md-3 mx-auto mb-4">
<h6 class="text-uppercase font-weight-bold">Contact</h6>
<hr class="bg-success mb-4 mt-0 d-inline-block mx-auto" style="width: 75px; height: 2px">
<ul class="list-unstyled">
<li class="my-2"><i class="fas fa-home mr-3"></i> VIT University</li>
<li class="my-2"><i class="fas fa-envelope mr-3"></i> farmart@gmail.com</li>
<li class="my-2"><i class="fas fa-phone mr-3"></i> +919802013139</li>
<li class="my-2"><i class="fas fa-print mr-3"></i> +912345678956</li>
</ul>
</div>
</div>
</div>
<div class="footer-copyright text-center py-3">
<p>&copy; Copyright
<a href="#">Farmart.com</a></p>
<p>Designed by The Vitians</p>
</div>
</footer>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Bootstrap tooltips -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>

<!-- Bootstrap core JavaScript -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>

<!-- MDB core JavaScript -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/js/mdb.min.js"></script>

</body>
</html>