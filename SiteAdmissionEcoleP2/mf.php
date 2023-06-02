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

  //Affichage MF

  if (($handle = fopen("infoElevesMarieMF.csv", "r"))){
    $actu = 0;
    $mmf = 0;
    $i=0;
    while (($data = fgetcsv($handle, 1000, ";"))){
      $i++;
      $option = $data[7];
      switch ($option) {
        case 'ACTU ':
          case 'ACTU':
          $actu++;
          break;
        case 'MMF ':
          case 'MMF':
          $mmf++;
          break;

        default:
          echo 'erreur mf';
          exit();
          break;
      }
    }
  fclose ($handle);
  }
  $totalmf=$actu+$mmf;
    echo "<h1>Nombre d'élèves par option MF :</h1>
      <ul>
        <li><span class='option' style='font-weight: bold;'>ACTU</span> : ".$actu."/35</li>
        <li><span class='option' style='font-weight: bold;'>MMF</span> : ".$mmf."/70</li>
        <li><span class='option' style='font-weight: bold;'>Total</span> : ".$totalmf."/".$i."</li>
      </ul>";


    //Affiche MF fait

    //Affiche MF

    $actu = array(
        0, //Nombre d'élèves dans l'option
        0, //Moyenne des moyennes
        20, //Moyenne du dernier admis
        0, // Moyenne des rangs
        array( //Distibution des rangs
          0,
          0,
        )
      );
      $mmf = $actu;
      $fillieres= array (
      $actu,
      $mmf,
      );
  
      //Rang 1 = nombre d'eleves par option, rang 2 = moyenne, rang 3 = moyenne dernier admis, rang 4 = moyenne des rangs, rang 5 = distribution des rangs
  
      function statsMF($nombre, $data, $fillieres){
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
  
          default:
            echo 'error';
            break;
        }
      return $fillieres;
      }
      
      if (($handle = fopen("infoElevesMarieMF.csv", "r"))){
          while (($data = fgetcsv($handle, 1000, ";"))){
            $option = $data[7];
            switch ($option) {
            case 'ACTU':
              case 'ACTU ':
                $fillieres=statsMF(0, $data, $fillieres);
  
                break;
              case 'MMF':
                case 'MMF ':
                $fillieres=statsMF(1, $data, $fillieres);
  
                break;
  
              default:
                echo 'erreur';
                exit();
                break;
            }
        }
        fclose ($handle);
        }
        echo "<br><h1>Moyenne par option (MF) :</h1>
          <ul>
            <li><span class='option' style='font-weight: bold;'>ACTU</span> : ".round($fillieres[0][1]/$fillieres[0][0], 2)."/20  <br><span class='option' style='font-weight: bold;'>Moyenne du dernier admis</span> : ".$fillieres[0][2]." <br><span class='option' style='font-weight: bold;'>Moyenne des rangs</span> : ".intval($fillieres[0][3]/$fillieres[0][0])."</li>
            <li><span class='option' style='font-weight: bold;'>MMF</span> : ".round($fillieres[1][1]/$fillieres[1][0], 2)."/20  <br><span class='option' style='font-weight: bold;'>Moyenne du dernier admis</span> : ".$fillieres[1][2]." <br><span class='option' style='font-weight: bold;'>Moyenne des rangs</span> : ".intval($fillieres[1][3]/$fillieres[1][0])."</li>
          </ul>";
          echo "<h2>Nombre d'élèves admis sur leur 1er, 2ème, etc... choix par option (MF) :</h2>
          <table>
              <tr>
                <th>Option</th>
                <th>1er choix</th>
                <th>2ème choix</th>
              </tr>
              <tr>
                <th>ACTU</th>";
                for ($i=0; $i < 2; $i++) { 
                  echo "<th>".$fillieres[0][4][$i]."</th>";
                }
              echo "</tr>
              <tr>
                <th>MMF</th>";
                for ($i=0; $i < 2; $i++) { 
                  echo "<th>".$fillieres[1][4][$i]."</th>";
                }
                echo "</tr>
              
          </table>";

      //Affiche MF fait
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