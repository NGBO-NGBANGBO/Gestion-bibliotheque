<?php
include("setting.php");
session_start();
if(isset($_SESSION['aid']))
{

}
else{	
$aid=$_SESSION['aid'];
$a=mysqli_query($set,"SELECT * FROM admin WHERE aid='$aid'");
$b=mysqli_fetch_array($a);

$name=$_POST['name'];
$author=$_POST['author'];
if($name!=NULL && $author!=NULL)
{
	$sql=mysqli_query($set,"INSERT INTO books(name,author) VALUES('$name','$author')");
	if($sql)
	{
		$msg="Ajouté avec succès";
	}
	else
	{
		$msg="Le livre existe déjà";
	}
}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Application de Gestion de Bibliothèque</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="banner">
<span class="head">Application de Gestion de Bibliothèque</span><br />
<marquee class="clg" direction="right" behavior="alternate" scrollamount="1">MUNDIAPOLIS</marquee>
</div>
<br />

<div align="center">
<div id="wrapper">
<br />
<br />

<span class="SubHead">Livres souhaités </span>
<br />
<br />

<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr class="labels" style="text-decoration:underline;"><th>Nom du livre</th><th>Auteur</th><th>Demandé par<br>(ID utilisateur) </th></tr>
<?php
$x=mysqli_query($set,"SELECT * FROM request");
while($y=mysqli_fetch_array($x))
{
	?>
<tr class="labels" style="font-size:19px; color:white;"><td><?php echo $y['name'];?></td><td><?php echo $y['author'];?></td><td><?php echo $y['CIN'];?></td></tr>
<?php
}
?>
</table><br />
<br />
<a href="adminhome.php" class="link">Retour</a>
<br />
<br />

</div>
</div>
</body>
</html>