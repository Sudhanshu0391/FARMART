<?php
    include("users.php");
    $email=$_SESSION['email'];
    $profile=new users;
    $profile->users_profile($email);
	$profile->tool();
	$img=$profile->get_image($_SESSION['uid'],$_SESSION['type']);
	
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {margin: 0; background-color: #C8C8C8;}

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
padding: 14px 16px;
text-decoration: none;
}

ul.topnav li a:hover:not(.active) {background-color: #C9ADA7;}

ul.topnav li a.active {background-color: black ;}

ul.topnav li.right {float: right;}

@media screen and (max-width: 600px) {
ul.topnav li.right,
ul.topnav li {float: none;}
}
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
#myInput1 {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
#myInput2 {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}


#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
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
.tb1 > td{
height:200px;
width:400px;
border:20px solid green;	
}
.fast-transition {
  position: relative; /* For positioning the pseudo-element */
  
}

.fast-transition::before {
  /* Position the pseudo-element. */
  content: ' ';
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
	
  /* Create the box shadow at expanded size. */
  box-shadow: 0 6px 6px 0 rgba(0, 0, 0, 0.3);
  

  /* Hidden by default. */
  opacity: 0;
  transition: opacity 500ms;
  
}

.fast-transition:hover::before {
  /* Show the pseudo-element on hover. */
  opacity: 1;
  
}


</style>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

<!-- Google Fonts -->

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">

<!-- Bootstrap core CSS -->

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

<!-- Material Design Bootstrap -->

<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">  
</head>
<body style="font-size:17px">
<script>

	var product=<?php echo json_encode($profile->tool,JSON_PRETTY_PRINT) ?>;

</script>
<div>
<ul class="topnav" style="padding-left:50px;padding-right:30px;padding-top:0px;height:60px;">
	<li><a  href="farm_home.php" style="padding-top:20px;">Home</a></li>
	<li><a class="active" href="toolshow.php" style="padding-top:20px;">Tools</a></li>
	<li><a href="wareshow.php" style="padding-top:20px;">Warehouse</a></li>
	<li><a href="farm_contact.php" style="padding-top:20px;">Contact Us</a></li>
	<li><a href="profile.php" style="padding-top:20px;">Profile</a></li>
	<li style="float:right;padding-left:20px;padding-top:5px">
    <a href="logout.php" class="navbar-link btn btn-info"  style="text-decoration: none;font-weight: bold;color: white;height:40px;padding-top:10px">LogOut</a></li>
	<li style="float:right;margin-top:0px;padding-top:10px"><img style="border-radius: 50%" src="img/<?php echo $img; ?>" alt="" width="40px" height="40px"></li>
	
</ul>


</div>
<div style="height:auto;max-height:10000px;;background-color:F0F0F0">
<table style="width:100%;border: 0px ">
<tr>
<td><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for City.." title="Type in a city"></td>
<td><input type="text" id="myInput2" onkeyup="myFunction()" placeholder="Search for Product Name.." title="Type in a product"></td>
</tr>
</table>
<center>
<div style="height:auto;width:100%;position:static;overflow:auto;">

<div style="border-radius:10px;padding-bottom:24px;background-color:#ffffff;width:98%;max-height:100px;min-height:1000px;overflow-y:auto;overflow-x:hidden">
<?php 
	$I=0;
	foreach($profile->tool as $prod){ ?>
		
		<div class="fast-transition" id="<?php $id=$prod['TOOL_ID']; echo $id; ?>" style="height:450px; width:24.2%;float:left;margin:5px 5px 10px 5px;" onclick="page('<?php echo $id;?>')">
		<br>
		<center>
		<img style="height:250px;width:250px" src="img/<?php echo $prod['PHOTO'];?>" alt="<?php echo $prod['PHOTO'];?>" width="250px" height="250px">
		</center>
		<br><br>
		<span style="float:left;padding-left:20px;font-size:20px"><?php echo $prod['TOOL_NAME'];?></span>
		<br>
		<div style="float:left">
		<span style="padding-left:20px;text-align:left;float:left;width:100%;color:grey;font-size:15px"><?php $s=strlen( $prod['T_DESC']); if($s>80){echo substr($prod['T_DESC'],0,80)."..."; echo "<br>";}else{$x=$prod['T_DESC'];$len=74-strlen($x);echo $x; for($i=0;$i<$len;$i++){echo "&nbsp;";}  }?></span>
		</div>
		<br><br>
		<span style="float:left;padding-left:20px;font-size:15px"><b>&#8377;<?php echo $prod['PRICE'];?></b>/Piece</span><br>
		<span style="float:left;padding-left:20px;font-size:15px">Available Quantity:<?php echo $prod['QUANTITY'];?></span>
		
		
		</div>

		<?php 
		$I++;
}
?>
</div>

</center>
<br>
</div>
<script>
function myFunction() {
  var input, filter,td, i, txtValue;
  input = document.getElementById("myInput");
  input2 = document.getElementById("myInput2");
  filter = input.value.toUpperCase(); 
  filter2 = input2.value.toUpperCase();
  

  if(input.value.length!=0 && input2.value.length!=0){
	   for (i = 0; i < product.length; i++) {
		city = product[i].CITY;
		name=product[i].TOOL_NAME;
		  if ( city.toUpperCase().indexOf(filter1) > -1 && name.toUpperCase().indexOf(filter2) > -1) {
			document.getElementById(product[i].TOOL_ID).style.display = "";
		  } else {
			document.getElementById(product[i].TOOL_ID).style.display ="none";
		  }      
	  }
	}
	 else if(input.value.length!=0){
	   for (i = 0; i < product.length; i++) {
		city = product[i].CITY;
		domain=product[i].PRODUCT_DOMAIN;
		name=product[i].PRODUCT_NAME;
		  if ( city.toUpperCase().indexOf(filter) > -1) {
			document.getElementById(product[i].TOOL_ID).style.display = "";
		  } else {
			document.getElementById(product[i].TOOL_ID).style.display ="none";
		  }      
	  }
	}
	else{
	   for (i = 0; i < product.length; i++) {
		city = product[i].CITY;
		name=product[i].TOOL_NAME;
		  if ( name.toUpperCase().indexOf(filter2) > -1) {
			document.getElementById(product[i].TOOL_ID).style.display = "";
		  } else {
			document.getElementById(product[i].TOOL_ID).style.display ="none";
		  }      
	  }
	}
}
function page(pid){
	var page="tmoredetail.php?pid=";
	page+=pid;
	window.location.assign(page)
}
</script>
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