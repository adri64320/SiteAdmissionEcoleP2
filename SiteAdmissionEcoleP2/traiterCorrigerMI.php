<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Affiche</title>
    <style>
      table,
      th,
      td {
        padding: 10px;
        border: 1px solid black;
        border-collapse: collapse;
      }
    </style>
  </head>
  <body>
      <?php
        $eleves=array();
        $new = $_POST["eleve"];
        if (($handle = fopen("infoElevesMarieMI.csv", "r"))) {
              while (($data = fgetcsv($handle, 1000, ";"))) {
                array_push($eleves, $data);
              }
            fclose ($handle);
          };
        for ($i=0; $i < sizeof($eleves); $i++) {
            $nom = $eleves[$i][0]." ".$eleves[$i][1];
            if ($nom == $new){
              switch ($_POST["option"]) {
                case 'HPDA':
                  $eleves[$i][11]="HPDA ";
                  break;
                case 'BI':
                  $eleves[$i][11]="BI ";
                  break;
                case 'DS':
                  $eleves[$i][11]="DS ";
                  break;
                case 'FT':
                  $eleves[$i][11]="FT ";
                  break;
                case 'IAC':
                  $eleves[$i][11]="IAC ";
                  break;
                case 'IAP':
                  $eleves[$i][11]="IAP ";
                  break;
                default:
                  echo 'error';
                  exit();
                  break;
              }
            }
        }

        $fp = fopen('infoElevesMarieMI.csv', 'w');
        foreach ($eleves as $fields) {
            fputcsv($fp, $fields,";");
        }
        fclose($fp);
      ?>
  </body>
  </html>
