<?php
include("setting.php");
session_start();
if(isset($_SESSION['aid']))
{
	
$aid=$_SESSION['aid'];
$a=mysqli_query($set,"SELECT * FROM admin WHERE aid='$aid'");
$b=mysqli_fetch_array($a);
$nom=$b['nom'];
}
?>

<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Application de Gestion du MUNDIATHEQUE</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="banner">
<span class="head"> Gestion de la MUNDIATHEQUE</span><br />
<marquee class="clg" direction="right" behavior="alternate" scrollamount="1">MUNDIAPOLIS</marquee>
</div>
<br />

<div align="center">
<div id="wrapper" style="height:65%;">
<br />
<br />

<span class="SubHead "style="font-size:45px;">Bienvenue  <?php echo $nom;?></span>
<br />
<br />
<table border="0" class="table" cellpadding="10" cellspacing="10" width=500px>
 <tr><th colspan=6 ><h3 class='SubHead'><u>Gestion des livres:</u></h3></th></tr>
 <tr><td><a href="addBooks.php" class="Command">Ajouter des livres</a></td>
<td><a href="bookRequests.php" class="Command">Livres souhaitées</a></td></tr>

<tr><td><a href="slcbook.php" class="Command">Modification des livres</a></td>
<td><a href="supprimer.php" class="Command">Supprimer des livres</a></td></tr>
</table>

<br />
<br />
<table border="0" class="table" cellpadding="10" cellspacing="10" width=500px >
 <tr><th colspan=6><h3 class='SubHead'><u>Gestion des demandes:</u></h3></th></tr>

<td><a href="demandes.php" class="Command">Demandes d'emprunts</a></td>
<td><a href="pret.php" class="Command">Gestion des prêts</a></td></tr>


</table>
<br />
<br />
<table border="0" class="table" cellpadding="10" cellspacing="10" width=700px >
<tr><th colspan=6><h3 class='SubHead'><u>Gestion du compte:</u></h3></th></tr>
<tr><td><a href="logout.php" class="Command">Se déconecter</a></td>
<td><a href="changePasswordAdmin.php" class="Command">Modifier mot de passe</a></td>
<td><a href="newadmin.php" class="Command">Ajouter un nouveau admin</a></td>
</tr>
</table>
<br />
<br />
<a href="admin.php" class="link">Retour</a>
<br />
<br />
 
</div>
</div>
</body>
</html>