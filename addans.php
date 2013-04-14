<?php

$qid=$_GET['id'];
$name=$_GET['name'];
$ans=$_GET['answer'];


$date=date("d/m/Y");
date_default_timezone_set('Asia/Kolkata');
$time = date('h:i:s a', time())."  ".$date;

$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="test"; // Database name
$tbl_name="answers"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$sql="INSERT INTO $tbl_name(question_id,a_name,a_answer,a_datetime)
VALUES ('$qid','$name','$ans','$time')";
// OREDER BY id DESC is order result by descending
$result=mysql_query($sql);

$result=mysql_query("SELECT * FROM questions WHERE id=$qid");
$rows=mysql_fetch_array($result);

$reply=$rows['reply'];
$reply=$reply+1;
$sql="update questions set reply='$reply' WHERE id='$qid'";
mysql_query($sql);



header('location:answer.php?id='.$qid);
?>