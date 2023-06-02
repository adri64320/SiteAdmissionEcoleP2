<!DOCTYPE html>
<html>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Marier</title>
</head>
<body>
  <?php

//Création du mariage pour les GSI

function GSI() {
    $eleves=array();

    if (($handle = fopen("infoElevesTriGSI.csv", "r"))) {
        while (($data = fgetcsv($handle, 1000, ";"))) {
          array_push($eleves, $data);
        }
      fclose ($handle);
    };

    for ($i=0; $i<sizeof($eleves);$i++){
        $eleves[$i][13] = null; //Colonne correspondant au couple
    }
  return $eleves;
  }

    $filieres = array();
    $filieres[0][0]='HPDA';
    $filieres[1][0]='BI';
    $filieres[2][0]='CS';
    $filieres[3][0]='IAC';
    $filieres[4][0]='IAP';
    $filieres[5][0]='ICC';
    $filieres[6][0]='INEM';
    $filieres[7][0]='VISUA';
    $filieres[0][1]=18;
    $filieres[1][1]=20;
    $filieres[2][1]=70;
    $filieres[3][1]=50;
    $filieres[4][1]=17;
    $filieres[5][1]=35;
    $filieres[6][1]=35;
    $filieres[7][1]=35;

    $verif = true;

    $eleves = GSI();
    while ($verif){
        $verif = false;
        for ($i=0; $i < sizeof($eleves); $i++) {
            for ($j=5; $j < 13; $j++) {
                if ($eleves[$i][13] == null && $eleves[$i][$j] != null){
                    $choix = $eleves[$i][$j];
                    $eleves[$i][$j]=null;
                    switch ($choix) {
                        case 'HPDA ':
                           case 'HPDA':
                            if ($filieres[0][1] != 0){
                                $eleves[$i][13]=$choix;
                                $filieres[0][1]=$filieres[0][1]-1;
                                $verif=true;
                            }
                            else if ($filieres[0][1] == 0){
                                for ($l=0; $l < sizeof($eleves) ; $l++) {
                                    if ($eleves[$l][13] == $choix && $eleves[$l][4]<$eleves[$i][4]){
                                        $eleves[$i][13]=$choix;
                                        $eleves[$l][13]=null;
                                        $verif=true;
                                    }
                                    else if ($eleves[$l][13] == $choix && $eleves[$l][4]==$eleves[$i][4]){
                                      if ($eleves[$l][3]<$eleves[$i][3]){
                                        $eleves[$i][13]=$choix;
                                        $eleves[$l][13]=null;
                                        $verif=true;
                                      }
                                    }
                                }
                            }
                            //filiere($i , 0, $filieres, $eleves, $verif);
                            break;
                        case 'BI ':
                          case  'BI':
                            if ($filieres[1][1] != 0){
                                $eleves[$i][13]=$choix;
                                $filieres[1][1]=$filieres[1][1]-1;
                                $verif=true;
                            }
                            else if ($filieres[1][1] == 0){
                                for ($l=0; $l < sizeof($eleves) ; $l++) {
                                    if ($eleves[$l][13] == $choix && $eleves[$l][4]<$eleves[$i][4]){
                                        $eleves[$i][13]=$choix;
                                        $eleves[$l][13]=null;
                                        $verif=true;
                                    }
                                    else if ($eleves[$l][13] == $choix && $eleves[$l][4]==$eleves[$i][4]){
                                      if ($eleves[$l][3]<$eleves[$i][3]){
                                        $eleves[$i][13]=$choix;
                                        $eleves[$l][13]=null;
                                        $verif=true;
                                      }
                                    }
                                }
                            }
                            //filiere($i , 1, $filieres, $eleves, $verif);
                            break;
                        case 'CS ':
                          case  'CS':
                            if ($filieres[2][1] != 0){
                                $eleves[$i][13]=$choix;
                                $filieres[2][1]=$filieres[2][1]-1;
                                $verif=true;
                            }
                            else if ($filieres[2][1] == 0){
                                for ($l=0; $l < sizeof($eleves) ; $l++) {
                                    if ($eleves[$l][13] == $choix && $eleves[$l][4]<$eleves[$i][4]){
                                        $eleves[$i][13]=$choix;
                                        $eleves[$l][13]=null;
                                        $verif=true;
                                    }
                                    else if ($eleves[$l][13] == $choix && $eleves[$l][4]==$eleves[$i][4]){
                                      if ($eleves[$l][3]<$eleves[$i][3]){
                                        $eleves[$i][13]=$choix;
                                        $eleves[$l][13]=null;
                                        $verif=true;
                                      }
                                    }
                                }
                            }
                            //filiere($i , 2, $filieres, $eleves, $verif);
                            break;
                        case 'IAC ':
                          case  'IAC':
                            if ($filieres[3][1] != 0){
                                $eleves[$i][13]=$choix;
                                $filieres[3][1]=$filieres[3][1]-1;
                                $verif=true;
                            }
                            else if ($filieres[3][1] == 0){
                                for ($l=0; $l < sizeof($eleves) ; $l++) {
                                    if ($eleves[$l][13] == $choix && $eleves[$l][4]<$eleves[$i][4]){
                                        $eleves[$i][13]=$choix;
                                        $eleves[$l][13]=null;
                                        $verif=true;
                                    }
                                    else if ($eleves[$l][13] == $choix && $eleves[$l][4]==$eleves[$i][4]){
                                      if ($eleves[$l][3]<$eleves[$i][3]){
                                        $eleves[$i][13]=$choix;
                                        $eleves[$l][13]=null;
                                        $verif=true;
                                      }
                                    }
                                }
                            }
                            //filiere($i , 3, $filieres, $eleves, $verif);
                            break;
                        case 'IAP ':
                          case  'IAP':
                            if ($filieres[4][1] != 0){
                                $eleves[$i][13]=$choix;
                                $filieres[4][1]=$filieres[4][1]-1;
                                $verif=true;
                            }
                            else if ($filieres[4][1] == 0){
                                for ($l=0; $l < sizeof($eleves) ; $l++) {
                                    if ($eleves[$l][13] == $choix && $eleves[$l][4]<$eleves[$i][4]){
                                        $eleves[$i][13]=$choix;
                                        $eleves[$l][13]=null;
                                        $verif=true;
                                    }
                                    else if ($eleves[$l][13] == $choix && $eleves[$l][4]==$eleves[$i][4]){
                                      if ($eleves[$l][3]<$eleves[$i][3]){
                                        $eleves[$i][13]=$choix;
                                        $eleves[$l][13]=null;
                                        $verif=true;
                                      }
                                    }
                                }
                            }
                            //filiere($i , 4, $filieres, $eleves, $verif);
                            break;
                        case 'ICC ':
                          case  'ICC':
                            if ($filieres[5][1] != 0){
                                $eleves[$i][13]=$choix;
                                $filieres[5][1]=$filieres[5][1]-1;
                                $verif=true;
                            }
                            else if ($filieres[5][1] == 0){
                                for ($l=0; $l < sizeof($eleves) ; $l++) {
                                    if ($eleves[$l][13] == $choix && $eleves[$l][4]<$eleves[$i][4]){
                                        $eleves[$i][13]=$choix;
                                        $eleves[$l][13]=null;
                                        $verif=true;
                                    }
                                    else if ($eleves[$l][13] == $choix && $eleves[$l][4]==$eleves[$i][4]){
                                      if ($eleves[$l][3]<$eleves[$i][3]){
                                        $eleves[$i][13]=$choix;
                                        $eleves[$l][13]=null;
                                        $verif=true;
                                      }
                                    }
                                }
                            }
                            //filiere($i , 5, $filieres, $eleves, $verif);
                            break;
                        case 'INEM ':
                          case 'INEM':
                            if ($filieres[6][1] != 0){
                                $eleves[$i][13]=$choix;
                                $filieres[6][1]=$filieres[6][1]-1;
                                $verif=true;
                            }
                            else if ($filieres[6][1] == 0){
                                for ($l=0; $l < sizeof($eleves) ; $l++) {
                                    if ($eleves[$l][13] == $choix && $eleves[$l][4]<$eleves[$i][4]){
                                        $eleves[$i][13]=$choix;
                                        $eleves[$l][13]=null;
                                        $verif=true;
                                    }
                                    else if ($eleves[$l][13] == $choix && $eleves[$l][4]==$eleves[$i][4]){
                                      if ($eleves[$l][3]<$eleves[$i][3]){
                                        $eleves[$i][13]=$choix;
                                        $eleves[$l][13]=null;
                                        $verif=true;
                                      }
                                    }
                                }
                            }
                            //filiere($i , 6, $filieres, $eleves, $verif);
                            break;
                        case 'VISUA ':
                          case 'VISUA':
                            if ($filieres[7][1] != 0){
                                $eleves[$i][13]=$choix;
                                $filieres[7][1]=$filieres[7][1]-1;
                                $verif=true;
                            }
                            else if ($filieres[7][1] == 0){
                                for ($l=0; $l < sizeof($eleves) ; $l++) {
                                    if ($eleves[$l][13] == $choix && $eleves[$l][4]<$eleves[$i][4]){
                                        $eleves[$i][13]=$choix;
                                        $eleves[$l][13]=null;
                                        $verif=true;
                                    }
                                    else if ($eleves[$l][13] == $choix && $eleves[$l][4]==$eleves[$i][4]){
                                      if ($eleves[$l][3]<$eleves[$i][3]){
                                        $eleves[$i][13]=$choix;
                                        $eleves[$l][13]=null;
                                        $verif=true;
                                      }
                                    }
                                }
                            }
                            //filiere($i , 7, $filieres, $eleves, $verif);
                            break;


                        default:
                            echo 'erreur';
                            exit();
                            break;
                    }
                }
            }
        }
    };
    
    
    $fp = fopen('infoElevesMarieGSI.csv', 'w');
    foreach ($eleves as $fields) {
      fputcsv($fp, $fields,";");
    }
    fclose($fp);

//Mariages fait pour les GSI

//Création du mariage pour les MI

function MI() {
    $eleves=array();
    if (($handle = fopen("infoElevesTriMI.csv", "r"))) {
        while (($data = fgetcsv($handle, 1000, ";"))) {
          array_push($eleves, $data);
        }
      fclose ($handle);
    };
    for ($i=0; $i<sizeof($eleves);$i++){
        $eleves[$i][11] = null; //Colonne correspondant au couple
    }
  return $eleves;
  }

    $filieres = array();
    $filieres[0][0]='HPDA';
    $filieres[1][0]='BI';
    $filieres[2][0]='DS';
    $filieres[3][0]='FT';
    $filieres[4][0]='IAC';
    $filieres[5][0]='IAP';
    $filieres[0][1]=17;
    $filieres[1][1]=15;
    $filieres[2][1]=35;
    $filieres[3][1]=35;
    $filieres[4][1]=20;
    $filieres[5][1]=18;

    $verif = true;

    $eleves = MI();
    while ($verif){
        $verif = false;
        for ($i=0; $i < sizeof($eleves); $i++) {
            for ($j=5; $j < 11; $j++) {
                if ($eleves[$i][11] == null && $eleves[$i][$j] != null){
                    $choix = $eleves[$i][$j];
                    $eleves[$i][$j]=null;
                    switch ($choix) {
                        case 'HPDA ':
                          case 'HPDA':
                            if ($filieres[0][1] != 0){
                                $eleves[$i][11]=$choix;
                                $filieres[0][1]=$filieres[0][1]-1;
                                $verif=true;
                            }
                            else if ($filieres[0][1] == 0){
                                for ($l=0; $l < sizeof($eleves) ; $l++) {
                                    if ($eleves[$l][11] == $choix && $eleves[$l][4]<$eleves[$i][4]){
                                        $eleves[$i][11]=$choix;
                                        $eleves[$l][11]=null;
                                        $verif=true;
                                    }
                                    else if ($eleves[$l][11] == $choix && $eleves[$l][4]==$eleves[$i][4]){
                                      if ($eleves[$l][3]<$eleves[$i][3]){
                                        $eleves[$i][11]=$choix;
                                        $eleves[$l][11]=null;
                                        $verif=true;
                                      }
                                    }
                                }
                            }
                            //filiere($i , 0, $filieres, $eleves, $verif);
                            break;
                        case 'BI ':
                          case 'BI':
                            if ($filieres[1][1] != 0){
                                $eleves[$i][11]=$choix;
                                $filieres[1][1]=$filieres[1][1]-1;
                                $verif=true;
                            }
                            else if ($filieres[1][1] == 0){
                                for ($l=0; $l < sizeof($eleves) ; $l++) {
                                    if ($eleves[$l][11] == $choix && $eleves[$l][4]<$eleves[$i][4]){
                                        $eleves[$i][11]=$choix;
                                        $eleves[$l][11]=null;
                                        $verif=true;
                                    }
                                    else if ($eleves[$l][11] == $choix && $eleves[$l][4]==$eleves[$i][4]){
                                      if ($eleves[$l][3]<$eleves[$i][3]){
                                        $eleves[$i][11]=$choix;
                                        $eleves[$l][11]=null;
                                        $verif=true;
                                      }
                                    }
                                }
                            }
                            //filiere($i , 1, $filieres, $eleves, $verif);
                            break;
                        case 'DS ':
                          case 'DS':
                            if ($filieres[2][1] != 0){
                                $eleves[$i][11]=$choix;
                                $filieres[2][1]=$filieres[2][1]-1;
                                $verif=true;                            }
                            else if ($filieres[2][1] == 0){
                                for ($l=0; $l < sizeof($eleves) ; $l++) {
                                    if ($eleves[$l][11] == $choix && $eleves[$l][4]<$eleves[$i][4]){
                                        $eleves[$i][11]=$choix;
                                        $eleves[$l][11]=null;
                                        $verif=true;                                    }
                                    else if ($eleves[$l][11] == $choix && $eleves[$l][4]==$eleves[$i][4]){
                                      if ($eleves[$l][3]<$eleves[$i][3]){
                                        $eleves[$i][11]=$choix;
                                        $eleves[$l][11]=null;
                                        $verif=true;                                      }
                                    }
                                }
                            }
                            //filiere($i , 2, $filieres, $eleves, $verif);
                            break;
                        case 'FT ':
                          case 'FT':
                            if ($filieres[3][1] != 0){
                                $eleves[$i][11]=$choix;
                                $filieres[3][1]=$filieres[3][1]-1;
                                $verif=true;
                            }
                            else if ($filieres[3][1] == 0){
                                for ($l=0; $l < sizeof($eleves) ; $l++) {
                                    if ($eleves[$l][11] == $choix && $eleves[$l][4]<$eleves[$i][4]){
                                        $eleves[$i][11]=$choix;
                                        $eleves[$l][11]=null;
                                        $verif=true;
                                    }
                                    else if ($eleves[$l][11] == $choix && $eleves[$l][4]==$eleves[$i][4]){
                                      if ($eleves[$l][3]<$eleves[$i][3]){
                                        $eleves[$i][11]=$choix;
                                        $eleves[$l][11]=null;
                                        $verif=true;
                                      }
                                    }
                                }
                            }
                            //filiere($i , 3, $filieres, $eleves, $verif);
                            break;
                        case 'IAC ':
                          case 'IAC':
                            if ($filieres[4][1] != 0){
                                $eleves[$i][11]=$choix;
                                $filieres[4][1]=$filieres[4][1]-1;
                                $verif=true;
                            }
                            else if ($filieres[4][1] == 0){
                                for ($l=0; $l < sizeof($eleves) ; $l++) {
                                    if ($eleves[$l][11] == $choix && $eleves[$l][4]<$eleves[$i][4]){
                                        $eleves[$i][11]=$choix;
                                        $eleves[$l][11]=null;
                                        $verif=true;
                                    }
                                    else if ($eleves[$l][11] == $choix && $eleves[$l][4]==$eleves[$i][4]){
                                      if ($eleves[$l][3]<$eleves[$i][3]){
                                        $eleves[$i][11]=$choix;
                                        $eleves[$l][11]=null;
                                        $verif=true;
                                      }
                                    }
                                }
                            }
                            //filiere($i , 4, $filieres, $eleves, $verif);
                            break;
                        case 'IAP ':
                          case 'IAP':
                            if ($filieres[5][1] != 0){
                                $eleves[$i][11]=$choix;
                                $filieres[5][1]=$filieres[5][1]-1;
                                $verif=true;
                            }
                            else if ($filieres[5][1] == 0){
                                for ($l=0; $l < sizeof($eleves) ; $l++) {
                                    if ($eleves[$l][11] == $choix && $eleves[$l][4]<$eleves[$i][4]){
                                        $eleves[$i][11]=$choix;
                                        $eleves[$l][11]=null;
                                        $verif=true;
                                    }
                                    else if ($eleves[$l][11] == $choix && $eleves[$l][4]==$eleves[$i][4]){
                                      if ($eleves[$l][3]<$eleves[$i][3]){
                                        $eleves[$i][11]=$choix;
                                        $eleves[$l][11]=null;
                                        $verif=true;
                                      }
                                    }
                                }
                            }
                            //filiere($i , 5, $filieres, $eleves, $verif);
                            break;

                        default:
                            echo 'erreur';
                            exit();
                            break;
                    }
                }
            }
        }
    }
    $fp = fopen('infoElevesMarieMI.csv', 'w');
    foreach ($eleves as $fields) {
      fputcsv($fp, $fields,";");
    }
    fclose($fp);


//Mariage fait pour les MI

//Création du mariage pour les MF


function MF() {
    $eleves=array();
    if (($handle = fopen("infoElevesTriMF.csv", "r"))) {
        while (($data = fgetcsv($handle, 1000, ";"))) {
          array_push($eleves, $data);
        }
      fclose ($handle);
    };
    for ($i=0; $i<sizeof($eleves);$i++){
        $eleves[$i][7] = null; //Colonne correspondant au couple
    }
  return $eleves;
  }

    $filieres = array();
    $filieres[0][0]='MMF';
    $filieres[1][0]='ACTU';
    $filieres[0][1]=70;
    $filieres[1][1]=35;

    $verif = true;

    $eleves = MF();
    while ($verif){
        $verif = false;
        for ($i=0; $i < sizeof($eleves); $i++) {
            for ($j=5; $j < 7; $j++) {
                if ($eleves[$i][7] == null && $eleves[$i][$j] != null){
                    $choix = $eleves[$i][$j];
                    $eleves[$i][$j]=null;
                    switch ($choix) {
                        case 'MMF ':
                          case 'MMF':
                            if ($filieres[0][1] != 0){
                                $eleves[$i][7]=$choix;
                                $filieres[0][1]=$filieres[0][1]-1;
                                $verif=true;
                            }
                            else if ($filieres[0][1] == 0){
                                for ($l=0; $l < sizeof($eleves) ; $l++) {
                                    if ($eleves[$l][7] == $choix && $eleves[$l][4]<$eleves[$i][4]){
                                        $eleves[$i][7]=$choix;
                                        $eleves[$l][7]=null;
                                        $verif=true;
                                    }
                                    else if ($eleves[$l][7] == $choix && $eleves[$l][4]==$eleves[$i][4]){
                                      if ($eleves[$l][3]<$eleves[$i][3]){
                                        $eleves[$i][7]=$choix;
                                        $eleves[$l][7]=null;
                                        $verif=true;
                                      }
                                    }
                                }
                            }
                            //filiere($i , 0, $filieres, $eleves, $verif);
                            break;
                        case 'ACTU ':
                          case 'ACTU':
                            if ($filieres[1][1] != 0){
                                $eleves[$i][7]=$choix;
                                $filieres[1][1]=$filieres[1][1]-1;
                                $verif=true;
                            }
                            else if ($filieres[1][1] == 0){
                                for ($l=0; $l < sizeof($eleves) ; $l++) {
                                    if ($eleves[$l][7] == $choix && $eleves[$l][4]<$eleves[$i][4]){
                                        $eleves[$i][7]=$choix;
                                        $eleves[$l][7]=null;
                                        $verif=true;
                                    }
                                    else if ($eleves[$l][7] == $choix && $eleves[$l][4]==$eleves[$i][4]){
                                      if ($eleves[$l][3]<$eleves[$i][3]){
                                        $eleves[$i][7]=$choix;
                                        $eleves[$l][7]=null;
                                        $verif=true;
                                      }
                                    }
                                }
                            }
                            //filiere($i , 1, $filieres, $eleves, $verif);
                            break;

                        default:
                            echo 'erreur';
                            exit();
                            break;
                    }
                }
            }
        }
    }

    $fp = fopen('infoElevesMarieMF.csv', 'w');
    foreach ($eleves as $fields) {
      fputcsv($fp, $fields,";");
    }
    fclose($fp);

//Mariage fait pour les MF

//FIN DES MARIAGES

   ?>
   <script type="text/javascript">
     window.location.href="afficherEleves.php"
   </script>
</body>
</html>
