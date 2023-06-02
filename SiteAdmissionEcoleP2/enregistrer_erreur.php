<?php
session_start();

 $erreur=$_POST["erreur"];
 $date = date('m-d-Y h:i:s a', time());
 $fp = fopen('erreur.csv', 'a+');
 $monUtilisateur= array(
   array($_SESSION["prenom"],
        $_SESSION["nom"],
        $_SESSION["type"],
        $date,
        $erreur
     )
 );

 foreach ($monUtilisateur as $fields) {
   fputcsv($fp, $fields,";");
 }

 fclose($fp);
 if ($_SESSION["typeUtilisateur"]=="eleve"){
   header('Location: accueil_eleve.php');
   exit();
 }elseif($_SESSION["type"]=="admin"){
   header('Location: messagerie_admin.php');
   exit();
 }else{
   header('Location: accueil_respo.php');
   exit();
 }
 ?>
