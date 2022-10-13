<?php
$msg='';
include("setting.php");
session_start();
if(isset($_SESSION['id']))
{	
$id=$_SESSION['id'];
$a=mysqli_query($set,"SELECT * FROM utilisateur WHERE id='$id'");
$b= mysqli_fetch_array($a);

$name=$b['nom'];
$date=date('d/m/Y');
$bn=$_POST['name'];
$CIN=$b['CIN'];
if($bn!=NULL)
{
	$p=mysqli_query($set,"SELECT * FROM books WHERE id='$bn'");
	$q=mysqli_fetch_array($p);
	$bk=$q['name'];
	$ba=$q['author'];
	$sql=mysqli_query($set,"INSERT INTO issue(id,CIN,name,author,date) VALUES('$id','$CIN','$bk','$ba','$date')");
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
<span class="head">Application de Gestion de Bibliothèque</span><br />
<marquee class="clg" direction="right" behavior="alternate" scrollamount="1">MUNDIAPOLIS</marquee>
</div>
<br />

<div align="center">
<div id="wrapper">
<br />
<br />

<span class="SubHead">Supprimer un livre </span>
<br />
<br />

<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr><td colspan="2" align="center" class="msg"><?php echo $msg;?></td></tr>


<?php
$x=mysqli_query($set,"SELECT * FROM books");
while($y=mysqli_fetch_assoc($x))
{
	?>
	<div >
<tr ><td class='SubHead'> <?php echo $y['id'];?> </td> <td class='SubHead'><?php echo $y['name']." ".$y['author'];?></td><td><img width=80px height=90px src="./pic/<?php echo $y['image']; ?>"></td>
</td><th><a class='link' href="suppbook.php?var=<?php echo($y['id']) ?>">supprimer</a> </th></tr>
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