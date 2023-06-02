

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="connexion.css">
    <title>Connexion</title>
</head>
<body>

  <div id="container">
	<form action="verificationConnexion.php" method="post">
    <h1>Connexion</h1>
		<p>Pseudo : <input type="text" name="pseudo" required></p>
		<p>Mot de passe : <input type="password" name="password" required></p>
		<p><input type="submit" class="envoyer" value="valider" style="background: #999370;color: white;border-style: outset;border-color: #black;height: 50px;width: 100%;font: bold 15px arial, sans-serif;text-shadow:none;"></p>
    <p><a href = inscription.php>Pas encore inscrit ?</a></p>
	</form>
	<div id="msg">
		<?php
		if (isset($_GET["error"])) {
			echo "<p> Erreur de connexion </p>" ;
		}
		?>
	</div>

	<?php
	if (isset($_POST["OUT"])){
		session_destroy();
	}
	?>
</div>
</body>
</html>
