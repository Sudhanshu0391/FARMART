<?php
    header( "refresh:4;url=../home.php" );
	session_start();
	session_destroy();
	?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>| FARMART |</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="icon" type="image/png" href="https://c7.uihere.com/files/895/949/319/quiz-logo-game-art-quiz-time-thumb.jpg">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
		<style>
		ul.topnav {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
 background: rgb(227,162,26);
 background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 32%, rgba(0,212,255,1) 100%);
}

ul.topnav li {float: center;}

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
    </head>
    <body>
                <div><ul class="topnav" ><li>
                    <a class="navbar-brand" href="home.php" style="align:center">
                        <span style="color: white;font-weight: bolder">FARMART</span>
                    </a></li></ul>
            </div>
        <center>
            <h2>You have successfully Logged Out</h2>
            <br><br><br><br>
           <div class="spinner-border text-success" style="width:100px; height:100px"></div>
        </center>
    </body>
</html>