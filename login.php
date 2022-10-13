<?php 

include 'setting.php';

session_start();
error_reporting(0);

if (isset($_SESSION['id'])) {

}

if (isset($_POST['submit'])) {
	
	$email = $_POST['email'];
	$modeDePasse = md5($_POST['modeDePasse']);

	$sql = "SELECT * FROM utilisateur WHERE email='$email' AND modeDePasse='$modeDePasse'";
	$result = mysqli_query($set, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['id'] = $row['id'];
		$_SESSION['CIN'] = $row['CIN'];
		header("Location: home.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
	$email= "";
	$_POST['modeDePasse'] = "";
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="login_register.css">
    <title>Application de Gestion de Bibliothèque</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">S'identifier</p>
			<div class="input-group" 
			      >
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group" >
				<input type="password" placeholder="mode de passe" name="modeDePasse" value="<?php echo $_POST['modeDePasse']; ?>" required>
			</div>
			<div class="input-group" >
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text" style="font-size: 1.5rem; margin-top: 60px;
    margin-left:50px;">Pas de compte?  <a href="register.php" style="font-size: 1.5rem;margin-left:30px;">  S'inscrire</a>.</p>
	        <p class="login-register-text" style="font-size: 1.5rem; margin-top: 20px;
    margin-left:30px;">Etes-vous un Admin?   <a href="admin.php" style="font-size: 1.5rem;margin-left:30px;">  S'identifier</a>.</p>
		</form>
	</div>
</body>
</html>