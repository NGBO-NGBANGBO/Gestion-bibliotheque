<?php
include("../setting.php");
session_start();
if(isset($_SESSION['CIN']))
{

$CIN=$_SESSION['CIN'];
$a=mysqli_query($set,"SELECT * FROM utilisateur WHERE CIN='$CIN'");
$b=mysqli_fetch_array($a);
$name=$b['nom'];
$CIN=$b['CIN'];

$ID=$_GET['ID'];

$query = "SELECT * FROM books WHERE id=$ID";
echo $query;
$result = mysqli_query($set,$query)or die(mysql_error());
$row = mysqli_fetch_assoc($result);
$rendu=$_POST['ds'];  
echo $rendu;     
$i=$row["id"];
echo $i;
$n=$row["name"];
echo $n;
$a=$row["author"];
echo $a;


$s="INSERT INTO `issue` (`utilisateur`, `CIN`, `isbn`, `name`, `author`, `date`, `rendu`) 
VALUES ('$name', '$CIN', '$ID', '$n', '$a', current_timestamp(), '$rendu')";
echo $s;
mysqli_query($set,$s);

header("location:Product.php");
}
?>