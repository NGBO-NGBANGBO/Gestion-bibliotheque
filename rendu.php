<?php
include("setting.php");
session_start();
if(isset($_SESSION['id']))
{
	

$id=$_SESSION['id'];
$var=$_GET['var'];
$n="SELECT * FROM `accepter`  WHERE date='$var'";
echo $n;
$isbn=$b['isbn'];
$a=mysqli_query($set,$n);
$b=mysqli_fetch_array($a);
$u=$b['rendu'];
$yo="DELETE FROM `accepter` WHERE `date`='$var' and rendu='$u'";

echo $yo;
$iu=mysqli_query($set,$yo);

$sqlUpdateQteBook = "UPDATE `books` SET `qte`= `qte` + 1 WHERE `id`='$isbn'";
mysqli_query($set, $sqlUpdateQteBook);

header("location:pret.php");
}
?>