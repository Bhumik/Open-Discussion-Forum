<?php

$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="test"; // Database name
$tbl_name="questions"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$sql="SELECT * FROM $tbl_name ORDER BY id ASC";
// OREDER BY id DESC is order result by descending

$result=mysql_query($sql);
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
			<li><a href="topics.html">Topics</a></li>
			<li><a href="#">more &nbsp;</a></li>
			<li><a href="#">Contact </a></li>
			<li><a href="#">About Us</a></li>
		</ul>
  </div>
		<ul class="breadcrumb">
			<li><a href="#" class="active">Home</a> <span class="divider">/</span></li>
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
			<table class="table table-hover">
              <thead>
                <tr>
                  <th style="width:4%">#</th>
                  <th style="width:45%">Questions</th>
                  <th style="width:20%">Topics</th>
                  <th style="width:10%">Replies</th>
				  <th style="width:20%">Date</th>
                </tr>
              </thead>
              <tbody>

<?php
 while($rows=mysql_fetch_array($result)){

?>
                <tr>
                  <td><? echo $rows['id']; ?></td>
                  <td><? echo $rows['detail']; ?></td>
                  <td><? echo $rows['topic']; ?></td>
                  <td><? echo $rows['reply']; ?></td>
			<td><? echo $rows['datetime']; ?></td>
                </tr>
<?php
}

mysql_close();
?>
			  </tbody>
			</table>
				
		</div>
	</div>
	
</div>

            <div style="margin:20px;" >
				<hr>
				<p class="pull-right"><a href="#">BHUMIK</a></p>
				<p>&copy; 2013 Copyrights, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
			</div>
 
</body>
  
  
</html>