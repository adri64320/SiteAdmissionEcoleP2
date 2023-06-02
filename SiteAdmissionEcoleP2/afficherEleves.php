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
    <link rel="stylesheet" href="afficherEleves.css">

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
      <div class="container">
      <input type="button" class ="confirmer" onclick="window.location.href='admission.php'" value="Confirmer ces choix"></input>
      <input type="button" class ="modifier" onclick="window.location.href='modif.php'" value="Modifier ces choix"></input>
    </div>
    <?php
//Affichage GSI


$cpt = 0;
if (($handle = fopen("elevescsv/choixEtudiantsParcours1.csv", "r"))){
  fgetcsv($handle, 1000, ";");
echo "<h1>Tableau GSI :</h1><table>
  <tr>
    <th>Prénom</th>
    <th>Nom</th>
    <th>Mail</th>
    <th>Note ECTS</th>
    <th>Moyenne</th>
    <th>Choix 1</th>
    <th>Choix 2</th>
    <th>Choix 3</th>
    <th>Choix 4</th>
    <th>Choix 5</th>
    <th>Choix 6</th>
    <th>Choix 7</th>
    <th>Choix 8</th>
    <th>Choix accepté</th>
  </tr>";
    while (($data = fgetcsv($handle, 1000, ";"))){
      echo "<tr>";
      echo "<td name ='prenom'>".$data[0]."</td>";
      echo "<td name ='nom'>".$data[1]."</td>";
      echo "<td>".$data[2]."</td>";
      echo "<td>".$data[3]."</td>";
      echo "<td>".$data[4]."</td>";
      echo "<td>".$data[5]."</td>";
      echo "<td>".$data[6]."</td>";
      echo "<td>".$data[7]."</td>";
      echo "<td>".$data[8]."</td>";
      echo "<td>".$data[9]."</td>";
      echo "<td>".$data[10]."</td>";
      echo "<td>".$data[11]."</td>";
      echo "<td>".$data[12]."</td>";
      $handle2 = fopen("infoElevesMarieGSI.csv", "r");
      for ($i=0; $i<$cpt; $i++){
        fgetcsv($handle2, 1000, ";");
      }
      $data2 = fgetcsv($handle2, 1000, ";");
      echo "<td>".$data2[13]."</td>";
      echo "</tr>";
      $cpt = $cpt+1;
      fclose($handle2);
    }
fclose($handle);
}
echo "</table>";

//Affichage GSI fait

//Affichage MI


$cpt = 0;
if (($handle = fopen("elevescsv/choixEtudiantsParcours3.csv", "r"))){
fgetcsv($handle, 1000, ";");
echo "<h1>Tableau MI :</h1><table>
<tr>
<th>Prénom</th>
<th>Nom</th>
<th>Mail</th>
<th>Note ECTS</th>
<th>Moyenne</th>
<th>Choix 1</th>
<th>Choix 2</th>
<th>Choix 3</th>
<th>Choix 4</th>
<th>Choix 5</th>
<th>Choix 6</th>
<th>Choix accepté</th>
</tr>";
while (($data = fgetcsv($handle, 1000, ";"))){
  echo "<tr>";
  echo "<td name ='prenom'>".$data[0]."</td>";
  echo "<td name ='nom'>".$data[1]."</td>";
  echo "<td>".$data[2]."</td>";
  echo "<td>".$data[3]."</td>";
  echo "<td>".$data[4]."</td>";
  echo "<td>".$data[5]."</td>";
  echo "<td>".$data[6]."</td>";
  echo "<td>".$data[7]."</td>";
  echo "<td>".$data[8]."</td>";
  echo "<td>".$data[9]."</td>";
  echo "<td>".$data[10]."</td>";
  $handle2 = fopen("infoElevesMarieMI.csv", "r");
  for ($i=0; $i<$cpt; $i++){
    fgetcsv($handle2, 1000, ";");
  }
  $data2 = fgetcsv($handle2, 1000, ";");
  echo "<td>".$data2[11]."</td>";
  echo "</tr>";
  $cpt = $cpt+1;
  fclose($handle2);
}
fclose($handle);
}
echo "</table>";

//Affichage MI fait

//Affichage MF


$cpt = 0;
if (($handle = fopen("elevescsv/choixEtudiantsParcours2.csv", "r"))){
fgetcsv($handle, 1000, ";");
echo "<h1>Tableau MF :</h1><table>
<tr>
<th>Prénom</th>
<th>Nom</th>
<th>Mail</th>
<th>Note ECTS</th>
<th>Moyenne</th>
<th>Choix 1</th>
<th>Choix 2</th>
<th>Choix accepté</th>
</tr>";
while (($data = fgetcsv($handle, 1000, ";"))){
  echo "<tr>";
  echo "<td name ='prenom'>".$data[0]."</td>";
  echo "<td name ='nom'>".$data[1]."</td>";
  echo "<td>".$data[2]."</td>";
  echo "<td>".$data[3]."</td>";
  echo "<td>".$data[4]."</td>";
  echo "<td>".$data[5]."</td>";
  echo "<td>".$data[6]."</td>";
  $handle2 = fopen("infoElevesMarieMF.csv", "r");
  for ($i=0; $i<$cpt; $i++){
    fgetcsv($handle2, 1000, ";");
  }
  $data2 = fgetcsv($handle2, 1000, ";");
  echo "<td>".$data2[7]."</td>";
  echo "</tr>";
  $cpt = $cpt+1;
  fclose($handle2);
}
fclose($handle);
}
echo "</table>";

 ?>

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
