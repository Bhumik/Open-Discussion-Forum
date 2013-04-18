<?php

$name=$_GET['name'];
$mail=$_GET['mail'];
$feed=$_GET['feed'];


$date=date("d/m/Y");
date_default_timezone_set('Asia/Kolkata');
$time = date('h:i:s a', time())."  ".$date;


$data="Name : ".$name."\r\nMail : ".$mail."\r\nDate :  ".$time."\r\nFeed : ".$feed."\r\n\r\n";
$my_file = 'feedback.txt';
$handle = fopen($my_file, 'a+') or die('Cannot open file:  '.$my_file);
fwrite($handle, $data);
fwrite($handle,"\n");

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

		<div >
		<div style="margin-left:38%;margin: 14% 0px 14% 38%;color:#00ff00;font-size:40px;width:300px;"><h4 class="well" ><i class="icon-ok"></i>&nbsp;&nbsp;Message Successfully Sent</h4></div>

		</div>
			
			
            <div style="margin:20px;" >
				<hr>
				<p class="pull-right"><a href="#">BHUMIK</a></p>
				<p>&copy; 2013 Copyrights, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
			</div>



</body>
  
  
</html>