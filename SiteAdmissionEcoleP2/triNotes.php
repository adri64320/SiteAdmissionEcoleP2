
<!DOCTYPE html>
<html>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Trier</title>
</head>
<body>
  <?php

//Tri GSI

    $lignes=array();
    if (($handle = fopen("elevescsv/choixEtudiantsParcours1.csv", "r"))) {
        fgetcsv($handle, 1000, ";");
        while (($data = fgetcsv($handle, 1000, ";"))) {
          array_push($lignes, $data);
        }
      fclose ($handle);
    }

    print_r($lignes);
    $verif = true;
    while($verif){
      $verif = false;
      for ($i=0; $i<sizeof($lignes)-1; $i++){
        if ((float)$lignes[$i][4] < (float)$lignes[$i+1][4]){
          $tmp=$lignes[$i];
          $lignes[$i]=$lignes[$i+1];
          $lignes[$i+1]=$tmp;
          $verif=true;
        }
      }
    }

    $fp = fopen('infoElevesTriGSI.csv', 'w');
		foreach ($lignes as $fields) {
			fputcsv($fp, $fields,";");
		}

		fclose($fp);

//Fin tri GSI

//Tri MI

    $lignes=array();
    if (($handle = fopen("elevescsv/choixEtudiantsParcours3.csv", "r"))) {
        fgetcsv($handle, 1000, ";");
        while (($data = fgetcsv($handle, 1000, ";"))) {
          array_push($lignes, $data);
        }
      fclose ($handle);
    }

    print_r($lignes);
    $verif = true;
    while($verif){
      $verif = false;
      for ($i=0; $i<sizeof($lignes)-1; $i++){
        if ($lignes[$i][4] < $lignes[$i+1][4]){
          $tmp=$lignes[$i];
          $lignes[$i]=$lignes[$i+1];
          $lignes[$i+1]=$tmp;
          $verif=true;
        }
      }
    }

    $fp = fopen('infoElevesTriMI.csv', 'w');
    foreach ($lignes as $fields) {
      fputcsv($fp, $fields,";");
    }

    fclose($fp);

//Fin tri MI


//Tri MF

    $lignes=array();
    if (($handle = fopen("elevescsv/choixEtudiantsParcours2.csv", "r"))) {
        fgetcsv($handle, 1000, ";");
        while (($data = fgetcsv($handle, 1000, ";"))) {
          array_push($lignes, $data);
        }
      fclose ($handle);
    }

    print_r($lignes);
    $verif = true;
    while($verif){
      $verif = false;
      for ($i=0; $i<sizeof($lignes)-1; $i++){
        if ((float)$lignes[$i][4] < (float)$lignes[$i+1][4]){
          $tmp=$lignes[$i];
          $lignes[$i]=$lignes[$i+1];
          $lignes[$i+1]=$tmp;
          $verif=true;
        }
      }
    }

    $fp = fopen('infoElevesTriMF.csv', 'w');
    foreach ($lignes as $fields) {
      fputcsv($fp, $fields,";");
    }

    fclose($fp);

//Fin tri MF
   ?>
   <script>window.location.href="mariages.php"</script>
</body>
</html>
