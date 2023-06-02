<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
</head>
<body>
	<h1>Connexion</h1>
	<form action="verificationConnexion.php" method="post">
		<p>Pseudo : <input type="text" name="pseudo" required></p>
		<p>Mot de passe : <input type="password" name="password" required></p>
		<p><input type="submit" value="valider"></p>
	</form>
	<div id="msg">
		<?php
		if (isset($_GET["error"])) {
			echo "<p> Erreur de connexion </p>" ;
		}
		?>
	</div>
	<p><a href = inscription.php>Pas encore inscrit ?</a></p>

	<?php
	if (isset($_POST["OUT"])){
		session_destroy();
	}
	?>
</body>
</html>
