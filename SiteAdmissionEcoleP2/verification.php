<!DOCTYPE html>
<html>
<head>
    <title>Enregistrer Élèves</title>
</head>
<body>
  <?php
    $eleve = "eleve";
    $respo = "respo";
    $admin = "admin";

    $type = $_POST["typeUtilisateur"];

    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $date = $_POST["date"];
    $pseudo = $_POST["pseudo"];
    $password = $_POST["password"];

    if ($type == $eleve) {
      $lien = "enregistrerInscription.php";
    }
    else if ($type == $respo) {
      $lien = "enregistrerInscription1.php";
    }
    else if ($type == $admin) {
      $lien = "enregistrerInscription2.php";
    }
   ?>

   <form id='formulaire' action="<?php echo $lien; ?>" method="POST">
	<p><input type="text" name="nom" value="<?php echo $nom ; ?>" required></p>
	<p><input type="text" name="prenom" value="<?php echo $prenom ; ?>" required></p>
	<p><input type="date" name="date" value="<?php echo $date ; ?>" required></p>
	<p><input type="text" name="pseudo" value="<?php echo $pseudo; ?>" required></p>
	<p><input type="password" name="password" value="<?php echo $password ; ?>" required></p>
	</form>

  <script type="text/javascript">
document.getElementById('formulaire').submit();
</script>

</body>
</html>
