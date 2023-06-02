<?php
  session_start();
?>
<?php
$ep = $_POST["eep"];
$en = $_POST["een"];
$nom = $_SESSION["nom"];
$prenom = $_SESSION["prenom"];
$DateAndTime = date('m-d-Y h:i:s a', time());
$fc = fopen('bloquer.csv', 'a+');
$monTab = array(
  array(
  $prenom,
  $nom,
  $ep,
  $en,
  $DateAndTime

));













foreach ($monTab as $fields){
  fputcsv($fc, $fields,";");
}
fclose($fc);
$type = "a bloqué ".$ep." ".$en." dans la messagerie";
$fc = fopen('tabord.csv', 'a+');
$monTab = array(
 array($_SESSION["nom"],
     $_SESSION["prenom"],
     $_SESSION["type"],
      $DateAndTime,
      $type
   )
);
foreach ($monTab as $fields) {
 fputcsv($fc, $fields,";");
}

fclose($fc);
if ($_SESSION["type"]=="eleve"){
  header('Location: messagerie_eleves.php');
  exit();
}elseif($_SESSION["type"]=="admin"){
  header('Location: messagerie_admin.php');
  exit();
}else{
  header('Location: messagerie_respo.php');
  exit();
}
?>
