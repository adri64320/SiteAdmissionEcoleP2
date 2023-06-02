<?php
  session_start();
?>
<?php
$message = $_POST["message"];
$date = $_POST["date"];
$prenom = $_POST["prenom"];
$nom = $_POST["nom"];
$rnom = $_POST["een"];
$rprenom = $_POST["eep"];
$r=-1;
$pieces = explode(" ", $prenom);
if (($handle = fopen("messagerie.csv", "r"))) {
    while (($data = fgetcsv($handle, 1000, ";"))) {

        $pn=$data[0];
        $pieces = explode(" ", $pn);
        $m=$data[1];
        $rn=$data[2];
        $rp=$data[3];
        $d=$data[4];
        $type=$data[5];
        $r=$r+1;
        if ( $rp==$rprenom && $rn==$rnom && $m==$message && $date==$d && $pieces[1]==$nom && $pieces[0]==$prenom ){
            echo "<br>";

            $fc = fopen('messagerie.csv', 'a+');
            $monTab = array(
              array(
              $pn,
              $m,
              $rn,
              $rp,
              $d,
              $type,
              "f",
              

            ));



            foreach ($monTab as $fields){
              fputcsv($fc, $fields,";");
            }
            fclose($fc);



            $numlign=$r ; // numéro de la ligne( l'indexation commence par 0 ), ici c'est la ligne 2...
            $donnee=file('messagerie.csv'); // on met le contenu du fichier dans $donnee
          	$fichier=fopen('messagerie.csv',"w"); // ouvre le fichier en droit d'écriture
          	fputs($fichier,''); // on le vide
          	$i=0;
          	foreach($donnee as $d)
          // on ne commente que la ligne précisée dans  $numlign.
          	{
          		if($i!=$numlign){
                  fputs($fichier,$d);
          		}

          		$i++;
          	}
          	fclose($fichier);





        }



    }
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
}
?>
