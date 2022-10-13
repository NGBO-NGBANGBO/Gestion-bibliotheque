<?php 

include 'setting.php';

error_reporting(0);

session_start();

if (isset($_SESSION['id'])) {
    
}

if (isset($_POST['submit'])) {
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$adresse = $_POST['adresse'];
	$telephone = $_POST['telephone'];
	$CIN=$_POST['CIN'];
	$email = $_POST['email'];
	$modeDePasse = md5($_POST['modeDePasse']);
	

	$sql = "SELECT * FROM utilisateur WHERE email='$email'";
	$result = mysqli_query($set, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO utilisateur (nom,prenom,adresse,telephone, email,modeDePasse,CIN)
					VALUES ('$nom','$prenom', '$adresse','$telephone','$email', '$modeDePasse','$CIN')";
			$result = mysqli_query($set, $sql);
			if ($result) {
				echo "<script>alert('L'enregistrement des données est terminé!!')</script>";
				$nom="";
				$prenom="";
				$adresse="";
				$telephone="";
				$email= "";
				$_POST['modeDePasse'] = "";
				$CIN= "";
				
				
				
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
	<div class="container" style="height:800px">
		<form action="" method="POST" class="login-email" style="margin-top: 0px;">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">S'inscrire</p>
			
			<div class="input-group">
				<input type="text" placeholder="Nom" name="nom" value="<?php echo $nom; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Prénom" name="prenom" value="<?php echo $prenom; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Adresse" name="adresse" value="<?php echo $adresse; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Téléphone" name="telephone" value="<?php echo $telephone; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="CIN" name="CIN" value="<?php echo $_POST['CIN']; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Mode de passe" name="modeDePasse" value="<?php echo $_POST['modeDePasse']; ?>" required>
            </div>
           
			<div class="input-group">
				<button name="submit" class="btn">enregistrer</button>
			</div>
			<p class="login-register-text" style="font-size: 20px; margin-top: 40px;
    margin-left:50px;">Avez-vous déjà un compte? <a href="login.php" style="font-size: 20px ;margin-left:20px;">   S'identifier</a></p>
		</form>
	</div>
</body>
</html>