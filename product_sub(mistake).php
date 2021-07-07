<?php
    include("users.php");
    $email="sudhanshu@gmail.com";
    $products=new users;
    $products->prod_detail($email);
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

ul.topnav li {float: right;}

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
</style>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

<!-- Google Fonts -->

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">

<!-- Bootstrap core CSS -->

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

<!-- Material Design Bootstrap -->

<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">
</head>
<body>

<div>
<ul class="topnav">
<li><a class="active" href="#contact">Contact Us</a></li>
<li><a href="registration.html">Warehouse</a></li>
<li><a href="registration.html">Products</a></li>
<li><a href="registration.php">User Register</a></li>
<li><a href="home.php">Home</a></li>
</ul>
</div>
<br><br>
<div id="contact" class="paddsection">
<div class="container">
<div class="contact-block1">
<div class="row">
<div class="col-lg-6">
<div class="contact-contact">


</div>
</div>
<?php
	if($products->pData==false){
		echo "<b><There is No Product</center></b>";
	}
	else{
		foreach($products->pData as $temp){
		echo $temp['PRODUCT_ID'];
	}
	}

?>
<div class="col-lg-6">
<h2><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Product Details</b></h2><br>
<form action="" method="post" role="form" class="contactForm" style="align:center;">
<div class="row">
<div class="col-lg-12">
<div class="form-group">
<input type="text" class="form-control" name="subject" id="subject" required placeholder="Product Domain" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
</div>
</div>
<div class="col-lg-12">
<div class="form-group">
<input type="text" class="form-control" name="subject" id="subject" required placeholder="Product Name" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
</div>
</div>
<div class="col-lg-12">
<div class="form-group">
<input type="text" class="form-control" name="subject" id="subject" required placeholder="Quantity(Kg)" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
</div>
</div>
<div class="col-lg-12">
<div class="form-group">
<input type="text" class="form-control" name="subject" id="subject" required placeholder="Price(Rs)" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
</div>
</div>
<div class="col-lg-12" style="padding-left:40%">
<input type="submit" class="btn" value="Save" style="background-color:#D3D3D3;">
</div>
</div>
</form>
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