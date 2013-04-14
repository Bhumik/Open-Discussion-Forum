<?php

$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="test"; // Database name
$tbl_name="questions"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$sql="SELECT DISTINCT topic FROM $tbl_name ORDER BY topic";
// OREDER BY id DESC is order result by descending

$result=mysql_query($sql);
?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title> topic</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="css/bootstrap.min.css" rel="stylesheet">
<!--    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    -->
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
	  
	  .topics{float:left; margin:11px;width:160px;}
	 .container{width:100%;}
	 </style>
  </head>

  <body style="background-image:url(4.png)">
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
	<h2 style="margin-left:10px;" > Discussion forum </h2>
<div class="cont">
	<div class="navbar">
		<div class="navbar-inner">
			<ul class="nav">
			<li><a href="index.php">Home</a></li>
			<li class="active"><a href="#">Topics</a></li>
			<li><a href="#">more &nbsp;</a></li>
			<li><a href="contact.php">Contact </a></li>
			<li><a href="about.php">About Us</a></li>
		    </ul>
         </div>
		
		<ul class="breadcrumb">
			<li><a href="index.php">Home</a> <span class="divider">/</span></li>
			<li class="active">Topics</li>
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
				</ul> <br>
		</div>
		
		<div class="span10" >
					<div class="well ">
						<span>All Topics</span>
						<a href="#myModal" role="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal" >Add Topic</a>
		
						<div id="myModal" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" >X</button>
								<h3 id="myModalLabel">Add Topic</h3>
							</div>
							<form name="input" action="question.php" method="get">
							<div class="modal-body">
								
								<label>Enter Topic</label>
								<input type="text" name="topic" placeholder="Enter Your New topic here">
								
							</div>
							
							<div class="modal-footer">
									<button class="btn" data-dismiss="modal" >Close</button>
									<button type="submit" class="btn btn-primary">ADD</button>
							</div>
							</form>
						</div>
				    </div>
					
					<div class="container">
<?php
$pg=1;
while($rows=mysql_fetch_array($result)){
?>
						<a class="btn btn-info topics" href="question.php?topic=<?echo $rows['topic']; ?>&pg=<?echo $pg; ?>" ><?echo $rows['topic']; ?></a>
<?php 
}
mysql_close();
?>
					<div>
		</div>
	
	</div>
 </div>
</div>
		 
            <div  class="footer" style="margin-top:90px;" >
				<hr>
				<p class="pull-right"><a href="#">BHUMIK</a></p>
				<p>&copy; 2013 Copyrights, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
			</div>

</body>
 </html>