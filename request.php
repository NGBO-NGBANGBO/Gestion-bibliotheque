<?php
$msg='';
include("setting.php");
session_start();
if(isset($_SESSION['id']))
{

}
if (isset($_POST['submit'])) {	
$CIN=$_SESSION['CIN'];
$a=mysqli_query($set,"SELECT * FROM utilisateur WHERE CIN='$CIN'");
$b=mysqli_fetch_array($a);
$bn =$_POST['name'];
$au =$_POST['author'];
if($bn!=NULL && $au!=NULL)
{
	$sql=mysqli_query($set,"INSERT INTO request(name,author,CIN) VALUES('$bn','$au','$CIN')");
	
	if($sql)
	{
		$msg="Demandé avec succès";
	}
	else
	{
		$msg="Le livre existe déjà";
	}
}
}
?>
<!DOCTYPE html >
<html >
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

<span class="SubHead">Demander des livres</span>
<br />
<br />
<form method="post" action="">
<table border="0" class="table" cellpadding="10" cellspaidg="10">
<tr><td class="msg" align="center" colspan="2"><?php echo $msg;?></td></tr> 
<tr><td class="labels">livre : </td><td><input type="text" size="25" class="fields" required="required" name="name" placeholder="Entrer le nom de livre" /></td></tr>
<tr><td class="labels">Auteur : </td><td><input type="text" size="25" class="fields" required="required" name="author" placeholder="Enter le nom de l'auteur" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" class="fields" value="Demander" /></td></tr>
</table>
</form>

<br />
<br />
<a href="home.php" class="link">Retour</a>
<br />
<br />

</div>
</div>
</body>
</html>