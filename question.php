<?php

$topic=$_GET["topic"];
$pgs=$_GET["pg"];
$pgr=$pgs-1;
$pgf=$pgs+1;

$pgs--;
$pgs=$pgs*10;//10
$pgn=$pgs+10;

echo $pgs."  ".$topic." ".$pgn;

$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="test"; // Database name
$tbl_name="questions"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$topik="'".$topic."'"; //echo $topic;echo $tbl_name;


$sql="SELECT * FROM $tbl_name WHERE topic=$topik ORDER BY reply DESC LIMIT $pgs,10 ";

// OREDER BY id DESC is order result by descending

$result=mysql_query($sql);
echo "   result:".$result[0];
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
			<li><a href="">Twitters</a> <span class="divider">/</span></li>
			<li class="active">Questions</li>
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
			<div class="well well-small" style="margin-bottom:0px;">
			<strong >Topic &nbsp;&nbsp;: &nbsp;&nbsp;</strong>
				<button type="submit" class="btn btn-info btn-small" style="width:100px;font-weight:bold;"><? echo $topic;?></button>
		
				<a href="#myModal" role="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal" >Add Question</a>
		
						<div id="myModal" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" >X</button>
								<h3 id="myModalLabel">Add Question  in this Topic</h3>
							</div>
							<form name="input" action="addque.php" method="get">
							<div class="modal-body">
								
								<label>Enter Question</label>
								<input type="text" name="question" placeholder="Enter Question here">
								<label>Your Name </label>
								<input type="text" name="name" placeholder="Hey,Write Ur Name Here">
								<input type="hidden" name="topic" value="<?php echo $topic;?>" >
								
							</div>
							<div class="modal-footer">
									<button class="btn" data-dismiss="modal" >Close</button>
									<button type="submit" class="btn btn-primary">ADD</button>
							</div>
							</form>
						</div>			
		     </div>
			
			
			<table class="table table-hover;">
              <thead>
                <tr>
                  <th style="width:4%">#</th>
                  <th style="width:43%">Questions</th>
				  <th style="width:20%">Submitted BY</th>
                  <th style="width:9%">Views</th>
				  <th style="width:9%">Replies</th>
				  <th style="width:15%">Last Update</th>
                </tr>
              </thead>
              <tbody>

<?php

//$len=mysql_field_len($result,0);
$nr=$pgs+1;
while($rows=mysql_fetch_array($result)){
?>
                <tr>
                  <td><? echo $nr?></td>
                  <td><a href="answer.php?id=<? echo $rows['id']; ?>"><? echo $rows['detail']; ?></a></td>
                  <td><? echo $rows['name']; ?></td>
				  <td><? echo $rows['view']; ?></td>
                  <td><? echo $rows['reply']; ?></td>
				  <td><? echo $rows['datetime']; ?></td>
				</tr>
<?php
$nr++;
}


$sql=mysql_query("SELECT COUNT(id) FROM questions WHERE topic=$topik");
$k=mysql_fetch_array($sql);
echo " k: ".$k[0] ;


mysql_close();
?>				
			  </tbody>
			</table>
				
		<ul class="pager"  style="margin:-10px;">
			<li class="previous"id="pre"> <a  href="question.php?topic=<?echo $topic; ?>&pg=<?echo $pgr; ?>">&larr; Newer</a> </li>
			<li class="next" id="nxt"><a href="question.php?topic=<?echo $topic; ?>&pg=<?echo $pgf; ?>">Older &rarr;</a></li>
		</ul>

<!--<div class="pagination pagination-centered" style="margin:-5px;">
					<ul>
						<li class="active"><a href="#">&laquo;</a></li>
						<li ><a href="#">1</a></li>
						<li ><a href="#">2</a></li>  style="visibility:hidden;"
						<li ><a href="#">3</a></li>
						<li ><a href="#">&laquo;</a></li>
					</ul>
				</div>-->
		</div>
	</div>
	
</div>

            <div style="margin:20px;" >
				<hr>
				<p class="pull-right"><a href="#">BHUMIK</a></p>
				<p>&copy; 2013 Copyrights, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
			</div>
			
<?php  
if(!$pgr)
  echo "<script>document.getElementById(\"pre\").style.visibility=\"hidden\";</script>";

if($k[0]<$pgn+1)
  echo "<script>document.getElementById(\"nxt\").style.visibility=\"hidden\";</script>";

?>
 
</body>
  
  
  </html>
