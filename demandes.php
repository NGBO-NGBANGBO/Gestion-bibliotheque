<?php
include("setting.php");
$msg='';
session_start();
if(isset($_SESSION['CIN']))
{
	
$CIN=$_SESSION['CIN'];
$a=mysqli_query($set,"SELECT * FROM issue WHERE CIN='$CIN'");
$b=mysqli_fetch_array($a);
$name=$b['name'];
$date=date('d/m/Y');
$bn='';
if(isset($_POST['name']))
{
	$bn= $_POST['name'];
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
<meta charset='utf-8'>
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

<span class="SubHead">Selectionnez un livre </span>
<br />
<br />

<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr><td colspan="2" align="center" class="msg"><?php echo $msg;?></td></tr>
<tr ><td class='labels'>CIN </td><td class='labels'>Etudiant</td><td class='labels'> ISBN </td> <td class='labels'>Nom du livre</td><td class='labels'>Confirmer</td><td class='labels'>Supprimer</td>

<?php
$x=mysqli_query($set,"SELECT * FROM issue");


while($y=mysqli_fetch_assoc($x))
{
	?>
	<div >
<tr ><td class='SubHead'> <?php echo $y['CIN'];?></td><td class='SubHead'> <?php echo $y['utilisateur'];?></td><td class='SubHead'> <?php echo $y['isbn'];?> </td> <td class='SubHead'><?php echo $y['name']." ".$y['author'];?></td>
<td><a class='link' href="accepter.php?var=<?php echo($y['id']) ?>">accepter</a> </td>  <td><a class='link' href="supp.php?var=<?php echo($y['id']) ?>">supprimer</a> </td></tr>
<?php		
}
?>
</div>
</table>

<br />
<br />
<a href="adminhome.php" class="link">Retour</a>
<br />
<br />

</div>
</div>
</body>
</html>