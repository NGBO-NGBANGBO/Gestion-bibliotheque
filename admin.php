<?php
$msg='';
include("setting.php");
session_start();

if(!isset($_SESSION['aid']))
{

}

if (isset($_POST['submit'])) 
{
        $nom = $_POST['nom'];
	    $password = md5($_POST['password']);

	    $sql="SELECT * FROM admin WHERE nom='$nom' AND password='$password'";
	    $result = mysqli_query($set, $sql);
	if ($result->num_rows > 0) 
	   {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['aid'] = $row['aid'];
		header("location:adminhome.php");
	   }
	else
	   {
		$msg="Les coordonnés saisi sont incorrect";
	   }
	   $nom= "";
	   $_POST['password'] = "";
}

?>

<!DOCTYPE html >
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="login_register.css">
    
    <title>Application de Gestion du MUNDIATHEQUE</title>

</head>

<body>

<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">L'identification de l'Admin </p>
			<div class="input-group" >
				<input type="text" placeholder="Nom d'admin " name="nom" >
			</div>
			<div class="input-group" >
				<input type="password" placeholder="mode de passe" name="password" >
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
		    <br />
            <br />
            <a href="login.php" class="link" style="font-size: 1.6rem;margin-left:160px;">Page d'Acceuil</a>
		</form>
</div>

</body>
</html>