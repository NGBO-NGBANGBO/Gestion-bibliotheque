<?php
include("setting.php");
session_start();
if(isset($_SESSION['CIN']))
{
	
$CIN=$_SESSION['CIN'];
$var=$_GET['var'];
$n="SELECT * FROM issue WHERE id=$var";
echo $n;
$a=mysqli_query($set,$n);
$b=mysqli_fetch_array($a);
$u=$b['utilisateur'];
$CIN=$b['CIN'];
$isbn=$b['isbn'];
$name=$b['name'];
$author=$b['author'];
$date=$b['date'];
$rendu=$b['rendu'];


$d="INSERT INTO `accepter`(`utilisateur`, `CIN`, `isbn`, `name`, `author`, `date`, `rendu`) VALUES ('$u','$CIN',$isbn,'$name','$author','$date','$rendu')";
$i=mysqli_query($set,$d);
echo $d;

$sql="DELETE FROM `issue` WHERE `id`=$var";
echo $sql;


$sqlUpdateQteBook = "UPDATE `books` SET `qte`= `qte` - 1 WHERE `id`='$isbn'";
mysqli_query($set, $sqlUpdateQteBook);
echo $sqlUpdateQteBook;
$p=mysqli_query($set,$sql);

header("location:demandes.php");
}
?>