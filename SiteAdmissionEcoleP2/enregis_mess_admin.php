<?php
  session_start();
 ?>

<?php


      //$nom=str_replace('"', '',$a);
      //$nom=substr($a,1,-1);
              $pn=$_POST["message"];





              $DateAndTime = date('m-d-Y h:i:s a', time());
              $fc = fopen('messagerie_admin.csv', 'a+');

              $monTab = array(
                array(
                "admin",
                $pn,
                $DateAndTime
              ));
              foreach ($monTab as $fields){
              fputcsv($fc, $fields,";");
              }
              fclose($fc);









        header('Location: accueil_admin.php');
        exit();


?>
