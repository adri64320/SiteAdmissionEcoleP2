<?php
    session_start();
    $prenom=$_SESSION["prenom"];
    $nom=$_SESSION["nom"];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="note_eleve.css">
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
              <a class="nav-link active" aria-current="page" href="accueil_eleve.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="note_eleves.php">Note</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="messagerie_eleves.php">Messagerie</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="deconnexion.php">Deconnexion</a>
            </li>
        
        </div>
        <a href="profil.php"><img src="<?php echo $_SESSION['profile']?>" width="55px" height="55px" class='profile'></a>      </div>
    </nav>
    <div class="note">



    <br>
    <br>
    <br>


    <h1>Choix et Notes</h1>
    <br>
    <br>
    <br>

    <table>
        <tr>
            <th>ECTS acquis </th>
            <th>Moyenne </th>
            <th>Classement </th>
            <th>Choix 1 </th>
            <th>Choix 2 </th>
            <th>Choix 3 </th>
            <th>Choix 4 </th>
            <th>Choix 5 </th>
            <th>Choix 6 </th>
            <th>Choix 7 </th>
            <th>Choix 8 </th>

        </tr>


<?php

    if (($handle = fopen("infoEleves.csv", "r"))){
        while (($data = fgetcsv($handle, 1000, ";"))){
           $p=$data[0];
           $n=$data[1];
            if($p==$prenom && $n==$nom){
                    echo "<tr>";
					echo "<td>".$data[3]."</td>";
					echo "<td>".$data[4]."</td>";
					echo "<td>".$data[13]."</td>";
					echo "<td>".$data[5]."</td>";
					echo "<td>".$data[6]."</td>";
					echo "<td>".$data[7]."</td>";
                    echo "<td>".$data[8]."</td>";
                    echo "<td>".$data[9]."</td>";
                    echo "<td>".$data[10]."</td>";
                    echo "<td>".$data[11]."</td>";
                    echo "<td>".$data[12]."</td>";
                    echo "</tr>";

            }
        }
    fclose($handle);
    }
?>

</table>
</div>
</body>
</html>
