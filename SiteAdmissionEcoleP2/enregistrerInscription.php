<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Enregistrer inscription</title>
</head>
<body>

	<?php

		$_SESSION["nom"] = $_POST["nom"];
		$_SESSION["prenom"] = $_POST["prenom"];
		$_SESSION["date"] = $_POST["date"];
		$_SESSION["pseudo"] = $_POST["pseudo"];
		$_SESSION["password"] = $_POST["password"];
		$_SESSION["typeUtilisateur"] = $_POST["typeUtilisateur"];
		$_SESSION["profile"] = "profile/base.png";

		if ($_POST["code"]!=null) {
			$type = $_POST["typeUtilisateur"];
			$eleve = "L'élève";
			$admin = "L'administrateur";
			$respo = "Le responsable admission";
			switch ($type) {
				case 'eleve':
					$name = $eleve;
					break;
				case 'respo':
					$name = $respo;
					break;
				case 'admin':
					$name = $admin;
					break;
				default:
					echo "error";
					break;
			}
		}
		else {
			header('Location: http://localhost:8080/inscription.php');
  			exit();
		};


		$fp = fopen('infoInscription.csv', 'a+');
		$mail="";
		$adresse="";
		$complement="";
		$ville="";
		$postal="";

		$monUtilisateur= array(
			array($_POST["nom"],
					$_POST["prenom"],
					$_POST["date"],
					$_POST["pseudo"],
					password_hash($_POST["password"], PASSWORD_DEFAULT),
					$_POST["typeUtilisateur"],
					$mail,
					$adresse,
					$complement,
					$ville,
					$postal,
					"base.png"
				)
		);

		foreach ($monUtilisateur as $fields) {
			fputcsv($fp, $fields,";");
		}

		fclose($fp);

	?>

    <?php
      $type = "inscription";
      $DateAndTime = date('m-d-Y h:i:s a', time());
      $fc = fopen('tabord.csv', 'a+');
      $monTab = array(
  			array($_POST["nom"],
  					$_POST["prenom"],
  					$_POST["typeUtilisateur"],
            $DateAndTime,
            $type
  				)
  		);
      foreach ($monTab as $fields) {
  			fputcsv($fc, $fields,";");
  		}

  		fclose($fc);
    ?><?php
			$type = $_POST["typeUtilisateur"];
			switch ($type) {
				case 'eleve':
					echo "<script>window.location.href='accueil_eleve.php'</script>";
					break;
				case 'admin':
					echo "<script>window.location.href='accueil_admin.php'</script>";
					break;
				case 'respo':
					echo "<script>window.location.href='accueil_respo.php'</script>";
					break;
			}
		?>

</body>
</html>
