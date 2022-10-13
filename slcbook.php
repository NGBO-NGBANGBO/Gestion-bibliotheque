<?php
$msg='';
include("setting.php");
session_start();
if(isset($_SESSION['CIN']))
{
	
$CIN=$_SESSION['CIN'];
$a=mysqli_query($set,"SELECT * FROM utilisateur WHERE CIN='$CIN'");
$b= mysqli_fetch_array($a);
$name=$b['nom'];


$date=date('d/m/Y');

$bn=$_POST['name'];

if($bn!=NULL)
{
	$p=mysqli_query($set,"SELECT * FROM books WHERE id='$bn'");
	$q=mysqli_fetch_array($p);
	$bk=$q['name'];
	$ba=$q['author'];
	$sql=mysqli_query($set,"INSERT INTO issue(CIN,name,author,date) VALUES('$CIN','$bk','$ba','$date')");
	if($sql)
	{
		$msg="Ajouté avec succès";
	}
	else
	{
		$msg="erreur, veuillez réessayer plus tard";
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
<span class="head"> Gestion de la MUNDIATHEQUE</span><br />
<marquee class="clg" direction="right" behavior="alternate" scrollamount="1">MUNDIAPOLIS</marquee>
</div>
<br />

<div align="center">
<div id="wrapper">
<br />
<br />

<span class="SubHead">Selectioner un livre</span>
<br />
<br />
<form method="post" action="">
<table border="0" class="table" cellpadding="10" cellspaidg="10">
<tr><td colspan="2" align="center" class="msg"><?php echo $msg;?></td></tr>
<tr class="SubHead" style="text-decoration:underline;"><td class='SubHead'>Nom</td><td class='SubHead'>Auteur</td><td class='SubHead'>ISBN</td></tr>
</div>

<?php
$x=mysqli_query($set,"SELECT * FROM books");
$yo=mysqli_fetch_assoc($x);
while($y=mysqli_fetch_array($x))
{
	?>
	<tr class="SubHead" style="text-decoration:underline;">
	<td class='labels'><?php echo $y['name'];?></td><td class='labels'><?php echo $y['author'];?></td>
	<td class='labels'><?php echo $y['id'];?> </td> 
	<th><a href="mdfbook.php?idl=<?php echo($y['id']) ?>" class="link" />Modifier</a></th></th></tr>
<?php
}
?>


</table>
</form>
<br />
<br />
<a href="adminhome.php" class="link">Retour</a>
<br />
<br />

</div>
</div>
</body>
</html>