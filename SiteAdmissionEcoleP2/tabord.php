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
    <link rel="stylesheet" href="tabord.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Mon site</title>
  </head>
  <body style="background-color : #DFD9B5">
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
              <a class="nav-link active" aria-current="page" href="accueil_admin.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="messagerie_admin.php">Messagerie</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link active dropdown-toggle"  href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Tableau de bord
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="tabord.php">Le log du systeme</a></li>
                <li><a class="dropdown-item" href="erreur.php">Erreurs remontés par les utilisateurs</a></li>

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
    <div class="text">

    </div>

    <h2>Les différentes modifications réalisés dans le systeme</h2>
    <br>

    <?php
      $lignes=array();
      if (($handle = fopen("tabord.csv", "r"))){
        while(($data = fgetcsv($handle, 1000, ";"))){
          array_push($lignes, $data);
        }
        fclose($handle);
      }
      ?>
      <table>
          <tr>
              <th>Nom </th>
              <th> Prénom </th>
              <th> Type d'utilisateur </th>
              <th> Date </th>
              <th> Action </th>


          </tr>
      <?php
        $n=$_SESSION["nom"];
        $p1=$_SESSION["prenom"];
        $reverse = array_reverse($lignes);
        for ($i=0; $i < sizeof($reverse)-1 ; $i++){
          $nom=$reverse[$i][0];
          $prenom=$reverse[$i][1];
          $typeUtilisateur=$reverse[$i][2];
          $date=$reverse[$i][3];
          $action=$reverse[$i][4];
          echo "<tr>";
            echo "<td>".$nom."</td>";
            echo "<td>".$prenom."</td>";
            echo "<td>".$typeUtilisateur."</td>";
            echo "<td>".$date."</td>";
            echo "<td>".$action."</td>";
          echo "</tr>";
        }
      ?>
      </table>


    <br>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </div>
  </body>
</html>
