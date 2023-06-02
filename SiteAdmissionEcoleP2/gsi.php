<?php
  session_start();
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="stats.css">
    <title>Mon site</title>
  </head>
  <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

          <a class="navbar-brand" href="#">Mon Super Site</a>
          <img src="cy.png" width="60px" height="30px" alt="">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="accueil_respo.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="messagerie_respo.php">Messagerie</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Gérer les admissions
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="mariages.php">Générer et afficher</a></li>
                <li><a class="dropdown-item" href="admission.php">Statistiques par option</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="deconnexion.php">Deconnexion</a>
            </li>
          </ul>
          <a href="profil.php"><img src="<?php echo $_SESSION['profile']?>" width="55px" height="55px" class='profile'></a>
        </div>
      </div>
    </nav>
  </head>
  <body>
  <input type="button" class='button' value="Retour" onclick="window.location.href='admission.php'">
  <span class="corps">
  <?php

//Affichage GSI

    if (($handle = fopen("infoElevesMarieGSI.csv", "r"))){
      $hpda = 0;
      $bi = 0;
      $cs = 0;
      $iac = 0;
      $iap = 0;
      $icc = 0;
      $inem = 0;
      $visua = 0;
      $i=0;
      while (($data = fgetcsv($handle, 1000, ";"))){
        $i++;
        $option = $data[13];
        switch ($option) {
          case 'HPDA ':
            case 'HPDA':
            $hpda++;
            break;
          case 'BI ':
            case 'BI':
            $bi++;
            break;
          case 'CS ':
            case 'CS':
            $cs++;
            break;
          case 'IAC ':
            case 'IAC':
            $iac++;
            break;
          case 'IAP ':
            case 'IAP':
            $iap++;
            break;
          case 'ICC ':
            case 'ICC':
            $icc++;
            break;
          case 'INEM ':
            case 'INEM':
            $inem++;
            break;
          case 'VISUA ':
            case 'VISUA':
            $visua++;
            break;

          default:
            echo 'erreur';
            exit();
            break;
        }
      }
    fclose ($handle);
    }
    $totalgsi=$hpda+$bi+$cs+$iac+$iap+$icc+$inem+$visua;
      echo "<h1>Nombre d'élèves par option GSI :</h1>
        <ul>
          <li><span class='option' style='font-weight: bold;'>HPDA</span> : ".$hpda."/18</li>
          <li><span class='option' style='font-weight: bold;'>BI</span> : ".$bi."/20</li>
          <li><span class='option' style='font-weight: bold;'>CS</span> : ".$cs."/70</li>
          <li><span class='option' style='font-weight: bold;'>IAC</span> : ".$iac."/50</li>
          <li><span class='option' style='font-weight: bold;'>IAP</span> : ".$iap."/17</li>
          <li><span class='option' style='font-weight: bold;'>ICC</span> : ".$icc."/35</li>
          <li><span class='option' style='font-weight: bold;'>INEM</span> : ".$inem."/35</li>
          <li><span class='option' style='font-weight: bold;'>VISUA</span> : ".$visua."/35</li>
          <li><span class='option' style='font-weight: bold;'>Total</span> : ".$totalgsi."/".$i."</li>
        </ul>";

  // Affichage GSI Fait

  //Affiche GSI 

  $hpda = array(
    0, //Nombre d'élèves dans l'option
    0, //Moyenne des moyennes
    20, //Moyenne du dernier admis
    0, // Moyenne des rangs
    array( //Distibution des rangs
      0,
      0,
      0,
      0,
      0,
      0,
      0,
      0
    )
  );
  $bi = $hpda;
  $cs = $hpda;
  $iac = $hpda;
  $iap = $hpda;
  $icc = $hpda;
  $inem = $hpda;
  $visua = $hpda;
  $fillieres= array (
  $hpda,
  $bi,
  $cs,
  $iac,
  $iap,
  $icc,
  $inem,
  $visua
  );

  //Rang 1 = nombre d'eleves par option, rang 2 = moyenne, rang 3 = moyenne dernier admis, rang 4 = moyenne des rangs, rang 5 = distribution des rangs

  function statsGSI($nombre, $data, $fillieres){
    $fillieres[$nombre][1]=$fillieres[$nombre][1]+(float)$data[4];
    $fillieres[$nombre][0]++;
    if ($data[4]<$fillieres[$nombre][2]){
      $fillieres[$nombre][2]=$data[4];
    }
    $j=0;
    while($data[5+$j]==null){
      $j++;
      $fillieres[$nombre][3]++;
    }
    switch ($j) {
      case 1:
        $fillieres[$nombre][4][0]=$fillieres[$nombre][4][0]+1;
        break;
      case 2:
        $fillieres[$nombre][4][1]=$fillieres[$nombre][4][1]+1;
        break;
      case 3:
        $fillieres[$nombre][4][2]=$fillieres[$nombre][4][2]+1;
        break;
      case 4:
        $fillieres[$nombre][4][3]=$fillieres[$nombre][4][3]+1;
        break;
      case 5:
        $fillieres[$nombre][4][4]=$fillieres[$nombre][4][4]+1;
        break;
      case 6:
        $fillieres[$nombre][4][5]=$fillieres[$nombre][4][5]+1;
        break;
      case 7:
        $fillieres[$nombre][4][6]=$fillieres[$nombre][4][6]+1;
        break;
      case 8:
        $fillieres[$nombre][4][7]=$fillieres[$nombre][4][7]+1;
        break;

      default:
        echo 'error';
        break;
    }
  return $fillieres;
  }
  
  if (($handle = fopen("infoElevesMarieGSI.csv", "r"))){
      while (($data = fgetcsv($handle, 1000, ";"))){
        $option = $data[13];
        switch ($option) {
          case 'HPDA ':
            case 'HPDA':
            $fillieres=statsGSI(0, $data, $fillieres);

            break;
          case 'BI ':
            case 'BI':
            $fillieres=statsGSI(1, $data, $fillieres);

            break;
          case 'CS ':
            case 'CS':
            $fillieres=statsGSI(2, $data, $fillieres);

            break;
          case 'IAC ':
            case 'IAC':
            $fillieres=statsGSI(3, $data, $fillieres);

            break;
          case 'IAP ':
            case 'IAP':
            $fillieres=statsGSI(4, $data, $fillieres);

            break;
          case 'ICC ':
            case 'ICC':
            $fillieres=statsGSI(5, $data, $fillieres);

            break;
          case 'INEM ':
            case 'INEM':
            $fillieres=statsGSI(6, $data, $fillieres);

            break;
          case 'VISUA ':
            case 'VISUA':
            $fillieres=statsGSI(7, $data, $fillieres);

            break;

          default:
            echo 'erreur';
            exit();
            break;
        }
    }
    fclose ($handle);
    }
    echo "<h1>Moyenne par option (GSI) :</h1>
      <ul>
        <li><span class='option' style='font-weight: bold;'>HPDA</span> : ".round($fillieres[0][1]/$fillieres[0][0], 2)."/20  <br><span class='option' style='font-weight: bold;'>Moyenne du dernier admis</span> : ".$fillieres[0][2]." <br><span class='option' style='font-weight: bold;'>Moyenne des rangs</span> : ".intval($fillieres[0][3]/$fillieres[0][0])."</li>
        <li><span class='option' style='font-weight: bold;'>BI</span> : ".round($fillieres[1][1]/$fillieres[1][0], 2)."/20  <br><span class='option' style='font-weight: bold;'>Moyenne du dernier admis</span> : ".$fillieres[1][2]." <br><span class='option' style='font-weight: bold;'>Moyenne des rangs</span> : ".intval($fillieres[1][3]/$fillieres[1][0])."</li>
        <li><span class='option' style='font-weight: bold;'>CS</span> : ".round($fillieres[2][1]/$fillieres[2][0], 2)."/20  <br><span class='option' style='font-weight: bold;'>Moyenne du dernier admis</span> : ".$fillieres[2][2]." <br><span class='option' style='font-weight: bold;'>Moyenne des rangs</span> : ".intval($fillieres[2][3]/$fillieres[2][0])."</li>
        <li><span class='option' style='font-weight: bold;'>IAC</span> : ".round($fillieres[3][1]/$fillieres[3][0], 2)."/20  <br><span class='option' style='font-weight: bold;'>Moyenne du dernier admis</span> : ".$fillieres[3][2]." <br><span class='option' style='font-weight: bold;'>Moyenne des rangs</span> : ".intval($fillieres[3][3]/$fillieres[3][0])."</li>
        <li><span class='option' style='font-weight: bold;'>IAP</span> : ".round($fillieres[4][1]/$fillieres[4][0], 2)."/20  <br><span class='option' style='font-weight: bold;'>Moyenne du dernier admis</span> : ".$fillieres[4][2]." <br><span class='option' style='font-weight: bold;'>Moyenne des rangs</span> : ".intval($fillieres[4][3]/$fillieres[4][0])."</li>
        <li><span class='option' style='font-weight: bold;'>ICC</span> : ".round($fillieres[5][1]/$fillieres[5][0], 2)."/20  <br><span class='option' style='font-weight: bold;'>Moyenne du dernier admis</span> : ".$fillieres[5][2]." <br><span class='option' style='font-weight: bold;'>Moyenne des rangs</span> : ".intval($fillieres[5][3]/$fillieres[5][0])."</li>
        <li><span class='option' style='font-weight: bold;'>INEM</span> : ".round($fillieres[6][1]/$fillieres[6][0], 2)."/20  <br><span class='option' style='font-weight: bold;'>Moyenne du dernier admis</span> : ".$fillieres[6][2]." <br><span class='option' style='font-weight: bold;'>Moyenne des rangs</span> : ".intval($fillieres[6][3]/$fillieres[6][0])."</li>
        <li><span class='option' style='font-weight: bold;'>VISUA</span> : ".round($fillieres[7][1]/$fillieres[7][0], 2)."/20  <br><span class='option' style='font-weight: bold;'>Moyenne du dernier admis</span> : ".$fillieres[7][2]." <br><span class='option' style='font-weight: bold;'>Moyenne des rangs</span> : ".intval($fillieres[7][3]/$fillieres[7][0])."</li>
      </ul>";
      echo "<h2>Nombre d'élèves admis sur leur 1er, 2ème, etc... choix par option (GSI) :</h2>
      <table>
          <tr>
            <th>Option</th>
            <th>1er choix</th>
            <th>2ème choix</th>
            <th>3ème choix</th>
            <th>4ème choix</th>
            <th>5ème choix</th>
            <th>6ème choix</th>
            <th>7ème choix</th>
            <th>8ème choix</th>
          </tr>
          <tr>
            <th>HPDA</th>";
            for ($i=0; $i < 8; $i++) { 
              echo "<th>".$fillieres[0][4][$i]."</th>";
            }
          echo "</tr>
          <tr>
            <th>BI</th>";
            for ($i=0; $i < 8; $i++) { 
              echo "<th>".$fillieres[1][4][$i]."</th>";
            }
            echo "</tr>
          <tr>
            <th>CS</th>";
            for ($i=0; $i < 8; $i++) { 
              echo "<th>".$fillieres[2][4][$i]."</th>";
            }
            echo "</tr>
          <tr>
            <th>IAC</th>";
            for ($i=0; $i < 8; $i++) { 
              echo "<th>".$fillieres[3][4][$i]."</th>";
            }
            echo "</tr>
          <tr>
            <th>IAP</th>";
            for ($i=0; $i < 8; $i++) { 
              echo "<th>".$fillieres[4][4][$i]."</th>";
            }
            echo "</tr>
          <tr>
            <th>ICC</th>";
            for ($i=0; $i < 8; $i++) { 
              echo "<th>".$fillieres[5][4][$i]."</th>";
            }
            echo "</tr>
          <tr>
            <th>INEM</th>";
            for ($i=0; $i < 8; $i++) { 
              echo "<th>".$fillieres[6][4][$i]."</th>";
            }
          echo "</tr>
          <tr>
            <th>VISUA</th>";
            for ($i=0; $i < 8; $i++) { 
              echo "<th>".$fillieres[7][4][$i]."</th>";
            }
            echo "</tr>
          
      </table>";
    
    //Affiche GSI fait

    ?>
    </span>

<!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    </body>
</html>

