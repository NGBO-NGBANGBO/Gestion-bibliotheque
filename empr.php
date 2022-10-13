<?php
include("setting.php");
session_start();

$s=$_GET['isbn'];
$f="INSERT INTO issue(CIN,name,author,date) VALUES('$CIN','$bk','$ba','$date')";

$sql=mysqli_query($set,$f);
header("location:issueBook.php");

	
	?>