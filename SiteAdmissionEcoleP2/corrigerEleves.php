<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="deconnexion.php">Deconnexion</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled">Disabled</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
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
    <form  method="POST" id="changementGSI">
      <select name="eleveGSI" id="eleveGSI">
      <?php
        $eleves=array();
        if (($handle = fopen("infoElevesMarieGSI.csv", "r"))) {
          //fgetcsv($handle, 1000, ";");
            while (($data = fgetcsv($handle, 1000, ";"))) {
              array_push($eleves, $data);
            }
          fclose ($handle);
        };
        for ($i=0; $i < sizeof($eleves); $i++) {
            echo "<option id=".$i.">".$eleves[$i][0]." ".$eleves[$i][1]."</option>";
        }
      ?>
      </select>
      <select name="option" id="option">
        <option>HPDA </option>
        <option>BI </option>
        <option>CS </option>
        <option>IAC </option>
        <option>IAP </option>
        <option>ICC </option>
        <option>INEM </option>
        <option>VISUA </option>
      </select>
    <input type="submit" value="Confirmer">
    </form>
    <?php
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
    echo '<input type="hidden" id ="hpda" value="'.$hpda.'">
          <input type="hidden" id ="bi" value="'.$bi.'">
          <input type="hidden" id ="cs" value="'.$cs.'">
          <input type="hidden" id ="iac" value="'.$icc.'">
          <input type="hidden" id ="iap" value="'.$iap.'">
          <input type="hidden" id ="icc" value="'.$icc.'">
          <input type="hidden" id ="inem" value="'.$inem.'">
          <input type="hidden" id ="visua" value="'.$visua.'">';
     ?>

    <form  method="POST" id="changementMI">
      <select name="eleveMI" id="eleveMI">
      <?php
        $eleves=array();
        if (($handle = fopen("infoElevesMarieMI.csv", "r"))) {
          //fgetcsv($handle, 1000, ";");
            while (($data = fgetcsv($handle, 1000, ";"))) {
              array_push($eleves, $data);
            }
          fclose ($handle);
        };
        for ($i=0; $i < sizeof($eleves); $i++) {
            echo "<option id=".$i.">".$eleves[$i][0]." ".$eleves[$i][1]."</option>";
        }
      ?>
      </select>
      <select name="option" id="option">
        <option>HPDA </option>
        <option>BI </option>
        <option>DS </option>
        <option>FT </option>
        <option>IAC </option>
        <option>IAP </option>
      </select>
    <input type="submit" value="Confirmer">
    </form>
    <?php
    if (($handle = fopen("infoElevesMarieMI.csv", "r"))){
      $hpda = 0;
      $bi = 0;
      $ds = 0;
      $ft = 0;
      $iac = 0;
      $iap = 0;
      $i=0;
      while (($data = fgetcsv($handle, 1000, ";"))){
        $i++;
        $option = $data[11];
        switch ($option) {
          case 'HPDA ':
            case 'HPDA':
            $hpda++;
            break;
          case 'BI ':
            case 'BI':
            $bi++;
            break;
          case 'DS ':
            case 'DS':
            $cs++;
            break;
          case 'FT ':
            case 'FT':
            $iac++;
            break;
          case 'IAC ':
            case 'IAC':
            $iap++;
            break;
          case 'IAP ':
            case 'IAP':
            $icc++;
            break;

          default:
            echo 'erreur';
            exit();
            break;
        }
      }
    fclose ($handle);
    }
    echo '<input type="hidden" id ="hpda" value="'.$hpda.'">
          <input type="hidden" id ="bi" value="'.$bi.'">
          <input type="hidden" id ="cs" value="'.$ds.'">
          <input type="hidden" id ="iac" value="'.$ft.'">
          <input type="hidden" id ="iap" value="'.$iac.'">
          <input type="hidden" id ="icc" value="'.$iap.'">';
    ?>

<form  method="POST" id="changementMF">
      <select name="eleveMF" id="eleveMFF">
      <?php
        $eleves=array();
        if (($handle = fopen("infoElevesMarieMF.csv", "r"))) {
          //fgetcsv($handle, 1000, ";");
            while (($data = fgetcsv($handle, 1000, ";"))) {
              array_push($eleves, $data);
            }
          fclose ($handle);
        };
        for ($i=0; $i < sizeof($eleves); $i++) {
            echo "<option id=".$i.">".$eleves[$i][0]." ".$eleves[$i][1]."</option>";
        }
      ?>
      </select>
      <select name="option" id="option">
        <option>ACTU </option>
        <option>MMF </option>
      </select>
    <input type="submit" value="Confirmer">
    </form>
    <?php
    if (($handle = fopen("infoElevesMarieMF.csv", "r"))){
      $actu = 0;
      $mmf = 0;
      while (($data = fgetcsv($handle, 1000, ";"))){
        $i++;
        $option = $data[7];
        switch ($option) {
          case 'ACTU ':
            case 'ACTU':
            $hpda++;
            break;
          case 'MMF ':
            case 'MMF':
            $bi++;
            break;

          default:
            echo 'erreur';
            exit();
            break;
        }
      }
    fclose ($handle);
    }
    echo '<input type="hidden" id ="hpda" value="'.$actu.'">
          <input type="hidden" id ="bi" value="'.$mmf.'">';
    ?>

     <script type="text/javascript" src ="corrigerEleves.js"></script><!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
