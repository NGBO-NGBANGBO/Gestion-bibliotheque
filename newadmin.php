<?php 

include 'setting.php';

error_reporting(0);

session_start();

if (isset($_SESSION['id'])) {
    
}

if (isset($_POST['submit'])) {
	$nom = $_POST['nom'];
	$password = md5($_POST['password']);
	

	$sql = "SELECT * FROM admin WHERE nom='$nom'";
	$result = mysqli_query($set, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO admin ( nom,password)
					VALUES ('$nom', '$password')";
			$result = mysqli_query($set, $sql);
			if ($result) {
				echo "<script>alert('L'enregistrement des données est terminé!!')</script>";
				$nom= "";
				$_POST['password'] = "";
				
				
				
			} else {
				echo "<script>alert('Quelque chose s'est mal passé!!')</script>";
			}
		} else {
			echo "<script>alert(' Email existe déjà')</script>";
		}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="login_register.css">

</head>
<body>
	<div class="container" style="height:500px">
		<form action="" method="POST" class="login-email" style="margin-top: 0px;">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Ajouter un Admin</p>
			
			<div class="input-group">
				<input type="text" placeholder="Nom d'admin" name="nom" value="<?php echo $nom; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Mode de passe" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
           
			<div class="input-group">
				<button name="submit" class="btn">enregistrer</button>
			</div>
            <br />
            <br />
            <a href="adminhome.php" class="link" style="font-size: 1.6rem;margin-left:220px;">Retour</a>
		</form>
	</div>
</body>
</html>