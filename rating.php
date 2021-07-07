<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
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
<ul class="topnav" style="padding-left:50px;padding-right:30px">
	<li><a class="active" href="#about">Home</a></li>
	<li><a href="product.php">Product</a></li>
	<li><a href="contact.php">Contact Us</a></li>
	<li><a href="profile.php">Profile</a></li>
	<li style="float:right">
    <a href="logout.php" class="navbar-link btn btn-info" style="text-decoration: none;font-weight: bold;color: white">LogOut</a></li>
	<li style="float:right"><p class="navbar-text navbar-right" style="padding-right: 15px;padding-bottom:0px"><img style="border-radius: 50%" src="img/<?php foreach ($profile->data as $prof){echo $prof['img'];}?>" alt="" width="35px" height="35px"></p></li>
	
</ul>

</div><br>
<div class="container">
    <div class="row">

<form action="add_rate.php" method="post" style="border: 3px solid blue;">
 <table >
    <tr colspan="2">
       <td style="text-align:center"> <h3>FeedBack</h3></td>
    </tr>
 
    <tr>
        <td><label><b>Quality of the Product</b></label></td>
       <td> <div class="rateyo" id= "rating"
         data-rateyo-rating="4"
         data-rateyo-num-stars="5"
         data-rateyo-score="3">
         </div>
		 <span class='result'>0</span>
		 <input type="hidden" name="rating"></td>
	</tr>
	<tr>
        <td><label><b>Do you feel our [product or service] is worth the cost</b></label></td>
       <td> <div class="rateyo" id= "rating"
         data-rateyo-rating="4"
         data-rateyo-num-stars="5"
         data-rateyo-score="3">
         </div>
		 <span class='result'>0</span>
		 <input type="hidden" name="rating"></td>
	</tr>
	<tr>
        <td><label><b>How you rate our website in terms of Services given</b></label></td>
       <td> <div class="rateyo" id= "rating"
         data-rateyo-rating="4"
         data-rateyo-num-stars="5"
         data-rateyo-score="3">
         </div>
		 <span class='result'>0</span>
		 <input type="hidden" name="rating"></td>
	</tr>
	<tr>
        <td><label><b>Is quantity of the product delivered by the farmer is same as the quantity you orderded</b></label></td>
       <td> <div class="rateyo" id= "rating"
         data-rateyo-rating="4"
         data-rateyo-num-stars="5"
         data-rateyo-score="3">
         </div>
		 <span class='result'>0</span>
		 <input type="hidden" name="rating"></td>
	</tr>
	<tr>
        <td><label><b>How was the behaviour of the farmer towards you</b></label></td>
       <td> <div class="rateyo" id= "rating"
         data-rateyo-rating="4"
         data-rateyo-num-stars="5"
         data-rateyo-score="3">
         </div>
		 <span class='result'>0</span>
		 <input type="hidden" name="rating"></td>
	</tr>
	<tr colspan="2">
       <td style="text-align:center"><div><input type="submit" name="add"> </div></td>
    </tr>
</table>

    
 
</form>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script>
 
 
    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });
 
</script>
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
</body>
</html>
</body>
 
</html>