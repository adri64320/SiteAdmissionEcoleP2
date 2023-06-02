<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Signalement</title>
    <link rel="stylesheet" href="signaler.css">

  </head>
  <body>


<?php

$ep = $_POST["eep"];
$en = $_POST["een"];



$nom = $_SESSION["nom"];
$prenom = $_SESSION["prenom"];
$message = $_POST["message"];
$raison=null;
?>
<form  action="signaler.php" method="post">
<h1>Veuillez expliquer la raison du signalement</h1><p><textarea type="text" name="raison" ></textarea> <input type="hidden" name="message" value=<?php echo $message ?>> </p>
<p><input type="submit" name="" value="envoyée" style="background: #945C87;color: white;border-style: outset;border-color: #black;height: 50px;width: 100px;font: bold 15px arial, sans-serif;text-shadow:none;" ></p>
</form>
<?php
$raison = $_POST["raison"];

$m=$message;





$DateAndTime = date('m-d-Y h:i:s a', time());
$action = "a signaler le message : ".$m;
$action .=" pour raison : ".$raison." .";
echo "Vous n'avez rien envoyée comme signalement";

  if ($raison != null){

    $fc = fopen('tabord.csv', 'a+');
    $monTab = array(
      array(
      $nom,
      $prenom,
      $_SESSION["type"],
      $DateAndTime,
      $action

      ));
    foreach ($monTab as $fields){
      fputcsv($fc, $fields,";");
    }
    fclose($fc);
      echo'<script type="text/javascript">

        document.location.href="messagerie_eleves.php";


        </script>';
    }else{
      echo " ";
  }


?>
</body>
</html>
