<?php
  session_start();
 ?>

<?php


      //$nom=str_replace('"', '',$a);
      //$nom=substr($a,1,-1);
      $pn=$_POST["choix"];
      $pieces = explode(" ", $pn);
      echo $pieces[0];
      echo "<br>";
      echo $pieces[1];
      $r=0;
      if (($handle = fopen("bloquer.csv", "r"))) {
          while (($data = fgetcsv($handle, 1000, ";"))) {
            if ( $_SESSION["prenom"]==$data[2] && $_SESSION["nom"]==$data[3] && $pieces[0]==$data[0] && $pieces[1]==$data[1]){
              $DateAndTime = date('m-d-Y h:i:s a', time());
              $fc = fopen('messagerie.csv', 'a+');
              $m = "Tu as été bloqué par ".$pieces[0]." ".$pieces[1]." .";
              $monTab = array(
                array(
                $_SESSION["prenom"]." ".$_SESSION["nom"],
                $m,
                "admin",
                "  ",
                $DateAndTime,
                "o",
                "o"
              ));
              foreach ($monTab as $fields){
              fputcsv($fc, $fields,";");
              }
              fclose($fc);


              $r=1;
            }
          }
      }
      if ($r==0){


                $DateAndTime = date('m-d-Y h:i:s a', time());
                $fc = fopen('messagerie.csv', 'a+');
                $monTab = array(
                  array(
                  $_POST["choix"],
                  $_POST["message"],
                  $_SESSION["nom"],
                  $_SESSION["prenom"],
                  $DateAndTime,
                  "o",
                  "o",
                  $_SESSION["type"]
                ));





              foreach ($monTab as $fields){
              fputcsv($fc, $fields,";");
              }
              fclose($fc);
      }


      if ($_SESSION["typeUtilisateur"]=="eleve"){
        header('Location: messagerie_eleves.php');
        exit();
      }elseif($_SESSION["typeUtilisateur"]=="admin"){
        header('Location: messagerie_admin.php');
        exit();
      }else{
        header('Location: messagerie_respo.php');
        exit();
      }

?>
