<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="inscription.css">
    <title>Inscription CY-Site</title>
    <script type="text/javascript" src="inscription.js"></script>
</head>
<body>
	<h1>Inscription</h1>
	<form action="enregistrerInscription.php" method="POST" onsubmit="verif()">
	<p><label> Nom : </label><input type="text" name="nom" required></p>
	<p><label>Prénom : </label><input type="text" name="prenom" required></p>
	<p><label>Date de Naissance : </label><input type="date" name="date" required></p>
	<p><label>Pseudo : </label><input type="text" name="pseudo" required></p>
	<p><label>Mot de passe : </label><input type="password" name="password" required></p>
  <p><br>Je suis:</p>
  <br>

  <label>Elève</label>
  <p><input type="radio" id="eleve" name="typeUtilisateur" value="eleve" required>
  <label>Responsable Admissions</label><br>
  <input type="radio" id="respo" name="typeUtilisateur" value="respo">
  <label>Administrateur</label>
  <input type="radio" id="admin" name="typeUtilisateur" value="admin"></p>
  <input type="submit" value="valider">
  <span id="verif"></span>
	</form>
</body>
</html>
