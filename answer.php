<?php

$ansid=$_GET["id"];

$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="test"; // Database name
$tblq="questions"; // Table name
$tbla="answers";

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

 //echo $topic;echo $tbl_name;


$result=mysql_query("SELECT * FROM questions  WHERE id=$ansid;");
$rows=mysql_fetch_array($result);


$view=$rows['view'];
$view=$view+1;
$sql="update $tblq set view='$view' WHERE id='$ansid'";
mysql_query($sql);

$result=mysql_query("SELECT * FROM answers WHERE question_id=$ansid ORDER BY question_id");

$sql=mysql_query("SELECT COUNT(*) FROM answers WHERE question_id=$ansid");
$k=mysql_fetch_array($sql);


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
     <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
   
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
	  
	  .table th, .table td{line-height: 13px;}
	  
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
			<li><a href="topics.php">Topics</a></li>
			<li><a href="#">more &nbsp;</a></li>
			<li><a href="contact.php">Contact </a></li>
			<li><a href="about.php">About Us</a></li>
		</ul>
  </div>
		<ul class="breadcrumb">
			<li><a href="index.php">Home</a> <span class="divider">/</span></li>
			<li><a href="topics.php">Topics</a> <span class="divider">/</span></li>
			<li class="active" style="font-weight:bold;font-size:15px;" ><? echo $rows['topic']; ?></li>
			<a  class="btn btn-small btn-info pull-right" style="margin-top:-3px;font-weight:bold;font-size:15px;" href="topics.php">Other Topics</a>
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
<table style="width:100%;margin: 0px 0 20px 0 ;background-color:#cacaca;border-radius: 10px 10px 10px 10px;">
  <tr class="info" style="height:30px;border-radius: 8px;">
    <td rowspan="2"  style="width:5%;font-size:30px;">&nbsp;&nbsp;Q.</td>
    <td rowspan="2"  style="width:75%;padding:0 5px 0 5px;border-right:1px solid #ffffff;"><h5><? echo $rows['detail']; ?></h5></td>
    
	<td  style="width:20%;padding-left:10px;">By <? echo $rows['name']; ?></td>
  </tr>
<tr class="info">
    <td style="padding-left:10px;"><? echo $rows['datetime']; ?></td>
  </tr>

</table>
<h4>Answers : (<? echo $k[0]; ?>)</h4>
<table class="table" style="width:100%;margin:0px 0 0 0 ;">

<?php
$k=1;
while($row=mysql_fetch_array($result))
{
?>

  <tr style="height:30px;border-radius: 8px;">
    <td rowspan="2"  style="width:5%;">A.<? echo $k;?></td>
    <td rowspan="2"  style="width:75%;"><? echo $row['a_answer']; ?></td>
    <td  style="width:20%">By <? echo $row['a_name']; ?></td>
  </tr>
  <tr >
	<td style="padding-left:10px;"><? echo $row['a_datetime']; ?></td>
  </tr>

<?php
$k++;
}
mysql_close();
?>
<!-- ####################################################################### -->

</table>


		<div class="well well-small" style="margin:20px 0px 10px 0;">
			<form name="input" action="addans.php" method="get">
				<textarea name="answer" placeholder="Add Your Answer Here.. ::" style="width:98%;"></textarea>
				<input type="text" name="name" placeholder="Your Name">
				<input type="hidden" name="id" value="<? echo $ansid ;?>">
				<button type="submit" class="btn btn-info btn-small pull-right" style="width:100px;margin:0 10px 0 0">Add Answer</button>
			</form>
		</div>		
		

		</div>
	</div>
	
</div>

            <div style="margin:20px" >
				<hr>
				<p class="pull-right"><a href="#">BHUMIK</a></p>
				<p>&copy; 2013 Copyrights, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
			</div>
 
</body>
  
  
  </html>