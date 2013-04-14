<?php

$que=$_GET['question'];
$name=$_GET['name'];
$topic=$_GET['topic'];


$date=date("d/m/Y");
date_default_timezone_set('Asia/Kolkata');
$time = date('h:i:s a', time());

$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="test"; // Database name
$tbl_name="questions"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$sql="INSERT INTO $tbl_name (topic,detail,name,datetime)
VALUES ('$topic','$que','$name','$date')";
// OREDER BY id DESC is order result by descending

$result=mysql_query($sql);


echo "que: ".$que."  name: ".$name."  topic: ".$topic."  date: ".$date;


header('location:question.php?topic='.$topic);
?>