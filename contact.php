<?php


$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="test"; // Database name
$tbl_name="questions"; // Table name


mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");


?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title> Forum | Bhumik</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.gif"> 



	<style type="text/css">
	 body .cont {margin:20px;}
	 
       .navbar .navbar-inner {
        padding: 0;
      }
      .navbar .nav {
        margin: 0;
        display: table;
        width: 100%;
      }
      .navbar .nav li {
        display: table-cell;
		
        float: none;
      
	  }
	  .navbar .nav li a {
        font-weight: bold;
        text-align: center;
        border-left: 1px solid rgba(255,255,255,.75);
        border-right: 1px solid rgba(0,0,0,.1);
      }
      .navbar .nav li:first-child a {
        border-left: 0;
        border-radius: 3px 0 0 3px;
      }
      .navbar .nav li:last-child a {
        border-right: 0;
        border-radius: 0 3px 3px 0;
      }
	  
	 </style>
  </head>

  <body style="background-image:url(4.png)">
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-latest.js"></script>
	
	
	<h2 style="margin-left:10px;" > Discussion forum </h2>
<div class="cont">
	<div class="navbar">
		<div class="navbar-inner">
			<ul class="nav">
			<li class="active"><a href="#">Home</a></li>
			<li><a href="topics.php">Topics</a></li>
			<li><a href="#">more &nbsp;</a></li>
			<li><a href="contact.php">Contact </a></li>
			<li><a href="about.php">About Us</a></li>
		</ul>
  </div>
		<ul class="breadcrumb">
			<li><a href="#" >Home</a> <span class="divider">/</span></li>
			<li><a href="#" class="active">Contact Us</a> </li>

		</ul>
	</div>
</div>

<div class="container-fluid">
	<div class="row-fluid">
		<div class="span2">
				<ul class="nav nav-list well">
						<li class="nav-header">Topics</li>
						<li ><a href="#">Home</a></li>
  						<li><a href="#">turbo c</a></li>
						<li><a href="#">java</a></li>
						<li><a href="#">facebook</a></li>
						<li><a href="#">sqala</a></li>
						<li class="divider"></li>
						<li><a href="#">javascript</a></li>
						<li class="active"><a href="#">jQuery</a></li>
				</ul><br>
			<div class="well" style="height:55px;margin-bottom:0px;">
			<p >	Advertise Here<p>
			</div>		
		</div>
		
		<div class="span10">
		<form name="input" action="feedback.php" method="get">
		<h2>Contact Us</h2>
		<h6>Feel free to connect with Us...</h6>
				<label><h4>Name </h4></label>
				<input type="text" name="name" style="width:30%;">
				
				<label><h4>Email id</h4></label>
				<input type="email" name="mail" style="width:30%;">
				
				<label><h4>Feedback / Suggestion</h4></label>
				<textarea  name="feed" rows="5" style="width:30%;"></textarea><br>
				<button type="submit" class="btn btn-success" style="width:10%;">SEND</button>
		</form>	
		</div>
	</div>
	
</div>

            <div style="margin:20px;" >
				<hr>
				<p class="pull-right"><a href="#">BHUMIK</a></p>
				<p>&copy; 2013 Copyrights, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
			</div>

<?php mysql_close(); ?>

</body>
  
  
</html>