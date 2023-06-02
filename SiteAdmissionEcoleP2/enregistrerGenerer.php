<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Génerer</title>
</head>
<body>
  <?php
  /*function mdp(){
    $alph = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
       $pass = array();
       $alphLen = strlen($alph) - 1;
       for ($i = 0; $i < 8; $i++) {
           $n = rand(0, $alphLen);
           $pass[] = $alph[$n];
       }
       $mdpa = implode($pass);
       $mdp = password_hash(implode($pass), PASSWORD_DEFAULT);
       $mdpt = array();
       $mdpt[0]=$mdpa;
       $mdpt[1]=$mdp;
      return ($mdpt);
  }*/
  function enregistrer() {
    //$mdpt = mdp();
    $fp = fopen('infoInscription.csv', 'a+');
    if (($handle = fopen("elevescsv/choixEtudiantsParcours1.csv", "r"))){
        fgetcsv($handle, 1000, ";");
        while (($data = fgetcsv($handle, 1000, ";"))){
          $prenom = $data[0];
          $nom = $data[1];
          $mail = $data[2];
          $date = "";
          $mdp = password_hash($nom, PASSWORD_DEFAULT);
          $eleve = "eleve";
          $monUtilisateur= array(
            array($nom,
            $prenom,
            $date,
            $date,
            $mdp,
            $eleve,
            $mail
              )
          );
          foreach ($monUtilisateur as $fields) {
            fputcsv($fp, $fields,";");
          }
        }
      }
      if (($handle = fopen("elevescsv/choixEtudiantsParcours3.csv", "r"))){
          fgetcsv($handle, 1000, ";");
          while (($data = fgetcsv($handle, 1000, ";"))){
            $prenom = $data[0];
            $nom = $data[1];
            $mail = $data[2];
            $date = "";
            $mdp = password_hash($nom, PASSWORD_DEFAULT);
            $eleve = "eleve";
            $monUtilisateur= array(
              array($nom,
              $prenom,
              $date,
              $date,
              $mdp,
              $eleve,
              $mail
                )
            );

            foreach ($monUtilisateur as $fields) {
              fputcsv($fp, $fields,";");
            }
          }
        }
        if (($handle = fopen("elevescsv/choixEtudiantsParcours2.csv", "r"))){
            fgetcsv($handle, 1000, ";");
            while (($data = fgetcsv($handle, 1000, ";"))){
              $prenom = $data[0];
              $nom = $data[1];
              $mail = $data[2];
              $date = "";
              $mdp = password_hash($nom, PASSWORD_DEFAULT);
              $eleve = "eleve";
              $monUtilisateur= array(
                array($nom,
                $prenom,
                $date,
                $date,
                $mdp,
                $eleve,
                $mail
                  )
              );

              foreach ($monUtilisateur as $fields) {
                fputcsv($fp, $fields,";");
              }
            }
          }
    fclose($fp);
  }
  enregistrer();

   ?>
   <script>
   alert('Les comptes ont bien été créés')
   window.location.href="accueil_admin.php"</script>
</body>
