<?php
session_start();

$pseudo=$_POST["pseudo"];
/* est ce que c'est un éleve ?*/
if (($handle = fopen("infoInscription.csv", "r"))) {
    while (($data = fgetcsv($handle, 1000, ";"))) {
        $p=$data[3];
        $m=$data[4];
        $t=$data[5];
        $s=$data[6];
        $profile = $data[11];
        echo $data[6];

        if ($profile == null){
          $profile = "profile/base.png";
        }

        if ($p==$pseudo && password_verify($_POST["password"], $m) && $t=="eleve" || $s==$pseudo && $m==$mdp && $t=="eleve"){
			       $_SESSION["nom"]=$data[0];
			       $_SESSION["prenom"]=$data[1];
			       $_SESSION["date"]=$data[2];
             $_SESSION["pseudo"] = $data[3];
             $_SESSION["password"] = $_POST["password"];
             $_SESSION["typeUtilisateur"] = $data[5];
             $_SESSION["mail"] = $data[6];
             $_SESSION["adresse"] = $data[7];
             $_SESSION["complement"] = $data[8];
             $_SESSION["ville"] = $data[9];
             $_SESSION["postal"] = $data[10];
             $_SESSION["profile"] = $profile;
             echo '<script>window.location.href="accueil_eleve.php"</script>';


		         header('Location: accueil_eleve.php');
			       exit();
		  }
    }
    fclose($handle);
}
/* est ce que c'est un responsable admission ? */
if (($handle = fopen("infoInscription.csv", "r"))) {
    while (($data = fgetcsv($handle, 1000, ";"))) {

        $p=$data[3];

        $m=$data[4];

        $t=$data[5];

        $s=$data[6];
        if ($p==$pseudo && password_verify($_POST["password"], $m) && $t=="respo" || $s==$pseudo && $m==$mdp && $t=="respo"){
			$_SESSION["nom"]=$data[0];
			$_SESSION["prenom"]=$data[1];
			$_SESSION["date"]=$data[2];
      $_SESSION["pseudo"] = $data[3];
      $_SESSION["password"] = $_POST["password"];
      $_SESSION["typeUtilisateur"] = $data[5];
      $_SESSION["mail"] = $data[6];
      $_SESSION["adresse"] = $data[7];
      $_SESSION["complement"] = $data[8];
      $_SESSION["ville"] = $data[9];
      $_SESSION["postal"] = $data[10];
      $_SESSION["profile"] = $data[11];
      
      echo '<script>window.location.href="accueil_respo.php"</script>';


		    header('Location: accueil_respo.php');
			exit();
		}
    }
    fclose($handle);
}
/* est ce que c'est un admin */
if(($handle = fopen("infoInscription.csv", "r"))) {
    while (($data = fgetcsv($handle, 1000, ";"))) {

        $p=$data[3];

        $m=$data[4];

        $t=$data[5];

        $s=$data[6];
        if ($p==$pseudo && password_verify($_POST["password"], $m) && $t=="admin" || $s==$pseudo && $m==$mdp && $t=="admin"){
			$_SESSION["nom"]=$data[0];
			$_SESSION["prenom"]=$data[1];
			$_SESSION["date"]=$data[2];
      $_SESSION["pseudo"] = $data[3];
      $_SESSION["password"] = $_POST["password"];
      $_SESSION["typeUtilisateur"] = $data[5];
      $_SESSION["mail"] = $data[6];
      $_SESSION["adresse"] = $data[7];
      $_SESSION["complement"] = $data[8];
      $_SESSION["ville"] = $data[9];
      $_SESSION["postal"] = $data[10];
      $_SESSION["profile"] = $data[11];

      echo '<script>window.location.href="accueil_admin.php"</script>';

		    header('Location: accueil_admin.php');
			exit();
		}
    }
    fclose($handle);
}
/*Alors il n'a pas de compte (c'est donc une erreur)*/

header('Location: index.php');

?>
