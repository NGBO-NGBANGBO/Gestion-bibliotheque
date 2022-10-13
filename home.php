<?php

include("setting.php");
session_start();
if(isset($_SESSION['CIN']))
{
$CIN=$_SESSION['CIN'];
$a=mysqli_query($set,"SELECT * FROM utilisateur WHERE CIN='$CIN'");
$b=mysqli_fetch_array($a);
$nom=$b['nom'];
$prenom=$b['prenom'];

}
?>


<!DOCTYPE html PUBLIC">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Gestion de la MUNDIATHEQUE</title>
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

<span class="SubHead">BIENVENUE  DANS NOTRE E-BIBLIOTHEQUE <?php echo $nom;?> <?php echo $prenom;?> </span>
<br />
<br />
<table border="0" class="table" cellpadding="10" cellspacing="10" width=500px>
<th colspan=10 class="SubHead">OPTION </th>
<tr><td><a href="kb/empr.php" class="Command">Emprunter un livre</a></td>
<td><a href="request.php" class="Command">Demander des nouveaux livres</a></td></tr>

</table>
<br />
<br />
<br />
<br />


<br />
<br />
<table border="0" class="table" cellpadding="10" cellspacing="10" width=500px>
<th colspan=10 class="SubHead">PROFIL </th>


<tr><td><a href="changePassword.php" class="Command">Changer votre mot de passe</a></td>
<td><a href="logout.php" class="Command">Se déconecter</a></td></tr>

</table>
<br />
<br />

<a href="login.php" class="link">Retour</a>
<br />
<br />

<br />
<br />

</div>
</div>
</body>
</html>