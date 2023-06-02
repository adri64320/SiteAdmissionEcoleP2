<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="modifprofil.css">
    <title>Modifier mon profil</title>
</head>

<body>
<?php
  $type = $_SESSION["typeUtilisateur"];

  switch ($type) {
    case 'eleve':
       echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
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
           </ul>';
      break;
    case 'respo':
       echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
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
         </ul>';
      break;
    case 'admin':
        echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
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
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="deconnexion.php">Deconnexion</a>
            </li>
          </ul>';
      break;
    
    default:
      echo 'erreur';
      break;
  }
?>
<a href="profil.php"><img src="<?php echo $_SESSION['profile']?>" width="55px" height="55px" class='profile'></a>
        </div>
      </div>
    </nav>
    <div class='container'>
    <form enctype="multipart/form-data" action="profil.php" method="POST"> 
    <?php
        echo '<input type="hidden" name ="tailleMax" value ="20000000"><p><span class="gras">Photo de profil (Taille max : 2Mo)</span>: <input type="file" name="profile" value="',$_SESSION["profile"],'" class="button3" accept="image/png, image/jpeg"></p>
        <p><span class="gras">Nom</span> : <input type="text" name="nom" value="',$_SESSION["nom"],'" class="inputtxt" required></p>
        <p><span class="gras">Prénom</span> : <input type="text" name="prenom" value="',$_SESSION["prenom"],'" class="inputtxt" required>
        <p><span class="gras">Pseudo</span> : <input type="text" name="pseudo" value="',$_SESSION["pseudo"],'" class="inputtxt" required</p>';
        if (isset($_SESSION["mail"])) {
           echo '<p><span class="gras">Adresse mail</span> : <input type="text" name="mail"  value="',$_SESSION["mail"],'" class="inputtxt"></p>';
        }
        else {
            echo '<p><span class="gras">Adresse mail</span> : <input type="mail" name="mail" class="inputtxt"></p>';
        };
        echo '<p><span class="gras">Date de naissance</span> : <input type="date" name="date" value="',$_SESSION["date"],'" class="inputtxt" required></p>';
        if (isset($_SESSION["adresse"])) {
            echo '<p><span class="gras">Adresse</span> : <input type="text" name="adresse"  value="',$_SESSION["adresse"],'" class="inputtxt"> <br>';

            if (isset($_SESSION["complement"])){
                echo '<span class="gras">Complément d\'adresse (n°Apt...)</span> : <input type="text" name="complement"  value="',$_SESSION["complement"],'" class="inputtxt"> <br>';
            };
            echo '<span class="gras">Ville</span> : <input type="text" name="ville"  value="',$_SESSION["ville"],'" class="inputtxt"> <br>';
            echo '<span class="gras">Code postal</span> : <input type="text" name="postal"  value="',$_SESSION["postal"],'" class="inputtxt"></p>';
        }
        else {
            echo '<p><span class="gras">Adresse</span> : <input type="text" name="adresse" class="inputtxt"> <br>
            <span class="gras">Complément d\'adresse (n°Apt...)</span> : <input type="text" name="complement class="inputtxt""> <br>
            <span class="gras">Ville : <input type="text" name="ville" class="inputtxt"> <br>
            <span class="gras">Code postal</span> : <input type="text" name="postal" class="inputtxt"></p>';
        };

        echo '<p><span class="gras">Mot de passe</span> : <input type="password" name="password1" value ="',$_SESSION["password"],'" class="inputtxt" required></p>
        <p><span class="gras">Confirmation du mot de passe</span> : <input type="password" name="password2" value ="',$_SESSION["password"],'" class="inputtxt" required></p>';

    ?>
    <p><input type="submit" value="Modifier" class="button1"><input type="button" value="Annuler" class="button2" onclick="window.location.href='profil.php'"></p>
      </div>
  </form>
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