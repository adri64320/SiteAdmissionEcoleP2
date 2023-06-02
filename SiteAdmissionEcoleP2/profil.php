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
    <link rel="stylesheet" href="profil.css">
    <title>Mon profil</title>
</head>

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
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="deconnexion.php">Deconnexion</a>
            </li>
          </ul>
          ';
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
<body>
    <?php
    /* Permet de vérifier si les deux mot de passes sont les mêmes */
    if (isset($_POST["nom"])) {
        if ($_POST["password1"] != $_POST["password2"]) {
        header('Location: modifProfil.php');
        exit();
        }
    }

    ?>

    <?php
    /* Permet de récupérer et enregistrer les modifications*/


    //Renommer les données du fichier envoyé

      /*  if(isset($_FILES['profile'])){
          echo'profil fait';
            $tmpNameFic = $_FILES['profile']['tmp_name'];
            $nameFic = $_FILES['profile']['name'];
            $sizeFic = $_FILES['profile']['size'];
            $errorFic = $_FILES['profile']['error'];
        } */



    function ajout($csv) { //Ajoute les informations dans le fichier csv
        if (isset($_FILES['profile']['name']) && $_FILES['profile']['name'] != null) {
            $profile = $_FILES['profile']['name'];
        }
        else {
            $profile = $_SESSION["profile"];
        };
        if (isset($_POST["nom"])) {
            $nom = $_POST["nom"];
        }
        else {
            $nom = null;
        };
        if (isset($_POST["prenom"])) {
            $prenom = $_POST["prenom"];
        }
        else {
            $prenom = null;
        };
        if (isset($_POST["pseudo"])) {
            $pseudo = $_POST["pseudo"];
        }
        else {
            $pseudo = null;
        };
        if (isset($_POST["mail"])) {
            $mail = $_POST["mail"];
        }
        else {
            $mail = null;
        };
        if (isset($_POST["date"])) {
            $date = $_POST["date"];
        }
        else {
            $date = null;
        };
        if (isset($_POST["adresse"])) {
            $adresse = $_POST["adresse"];
        }
        else {
            $adresse = null;
        };
        if (isset($_POST["complement"])) {
            $complement = $_POST["complement"];
        }
        else {
            $complement = null;
        };
        if (isset($_POST["ville"])) {
            $ville = $_POST["ville"];
        }
        else {
            $ville = null;
        };
        if (isset($_POST["postal"])) {
            $postal = $_POST["postal"];
        }
        else {
            $postal = null;
        };
        if (isset($_POST["password1"])) {
            $password = password_hash($_POST["password1"], PASSWORD_DEFAULT);
        }
        else {
            $password = null;
        };
		$monUtilisateur= array(
			array($nom,
					$prenom,
					$date,
					$pseudo,
					$password,
					$_SESSION["typeUtilisateur"],
                    $mail,
                    $adresse,
                    $complement,
                    $ville,
                    $postal,
                    "profile/".$profile
				)
		);
		foreach ($monUtilisateur as $fields) {
			fputcsv($csv, $fields,";");
        }
    }

    function modif(){
        if(($handle = fopen("infoInscription.csv", "r+"))) {
            $content = array();
            while (($data = fgetcsv($handle, 1000, ";"))) {
                if($data[0] != $_SESSION["nom"] || $data[1] != $_SESSION["prenom"]){
                    $ligne = array();
                    for ($j=0; $j < 12; $j++) {
                        array_push($ligne, $data[$j]);
                    }
                    array_push($content, $ligne);
                }
            }
            rewind($handle);
            foreach ($content as $lines) {
                fputcsv($handle, $lines,';');
            }
            fflush($handle);
            ftruncate($handle, ftell($handle));
            ajout($handle);
            fclose($handle);
        }
    }


    if (isset($_FILES['profile']['name']) && $_FILES['profile']['name'] != null) {
        $_SESSION["profile"] = 'profile/'.$_FILES['profile']['name'];
    }
    if (isset($_POST["nom"])) {
        $_SESSION["nom"] = $_POST["nom"];
        @modif();
    }
    if (isset($_POST["prenom"])) {
        $_SESSION["prenom"] = $_POST["prenom"];
    }
    if (isset($_POST["pseudo"])) {
        $_SESSION["pseudo"] = $_POST["pseudo"];
    }
    if (isset($_POST["mail"])) {
        $_SESSION["mail"] = $_POST["mail"];
    }
    if (isset($_POST["date"])) {
        $_SESSION["date"] = $_POST["date"];
    }
    if (isset($_POST["adresse"])) {
        $_SESSION["adresse"] = $_POST["adresse"];
    }
    if (isset($_POST["complement"])) {
        $_SESSION["complement"] = $_POST["complement"];
    }
    if (isset($_POST["ville"])) {
        $_SESSION["ville"] = $_POST["ville"];
    }
    if (isset($_POST["postal"])) {
        $_SESSION["postal"] = $_POST["postal"];
    }
    if (isset($_POST["password1"])) {
        $_SESSION["password"] = $_POST["password1"];
    }

    function enregistrerFichier() {
        $errorFic = $_FILES['profile']['error'];
        if (isset($errorFic) && $errorFic != null) {
            switch ($errorFic){
              case 1: // UPLOAD_ERR_INI_SIZE
                echo "Le fichier dépasse la limite autorisée par le serveur !";
                break;
              case 2: // UPLOAD_ERR_FORM_SIZE
                echo "Le fichier dépasse la limite autorisée dans le formulaire HTML !";
                break;
              case 3: // UPLOAD_ERR_PARTIAL
                echo "L'envoi du fichier a été interrompu pendant le transfert !";
                break;
              case 4: // UPLOAD_ERR_NO_FILE
                echo "Le fichier que vous avez envoyé a une taille nulle !";
                break;
            }
        }
        else {
            $tmpNameFic1 = $_FILES['profile']['tmp_name'];
            $nameFic1 = $_FILES['profile']['name'];
            move_uploaded_file($_FILES['profile']['tmp_name'], 'profile/'.$_FILES['profile']['name']);
        }
    }

    @enregistrerFichier();

    ?>
    <div class="container">
    <?php
    /* Permet d'afficher en joli le type utilisateur */
    $type = $_SESSION["typeUtilisateur"];
    switch ($type) {
        case 'eleve':
            $type = "Élève";
            break;
        case 'admin':
            $type = "Administrateur";
            break;
        case 'respo':
            $type = "Responsable admissions";
            break;
    }
    /* Permet d'afficher les infos existantes */
    echo '<p class="containerimg"><img src="',$_SESSION["profile"],'" class="profile2" width="10%" height="10%" alt=""></p>';
    echo '<div class="containerp"><div><p><span style="font-weight: bold;">Nom</span> : ',$_SESSION["nom"],'</p></div>';
    echo '<div><p><span style="font-weight: bold;">Prénom</span> : ',$_SESSION["prenom"],'</p></div>';
    echo '<div><p><span style="font-weight: bold;">Pseudo</span> : ',$_SESSION["pseudo"],'</p></div>';
    echo '<div><p><span style="font-weight: bold;">Type utilisateur</span> : ',$type,'</p></div>';

    if (isset($_SESSION["mail"])){
        echo '<div><p><span style="font-weight: bold;">Adresse mail</span> : ',$_SESSION["mail"],'</p></div>';
    }
    else {
        echo '<div><p><span style="font-weight: bold;">Adresse mail</span> : Aucune adresse mail renseignée</p></div>';
    };

    echo '<div><p><span style="font-weight: bold;">Date de naissance</span> : ',$_SESSION["date"],'</p></div>';

    if (isset($_SESSION["adresse"])){
        echo '<div><p><span style="font-weight: bold;">Adresse</span> : ',$_SESSION["adresse"].'</div>';

        if (isset($_SESSION["complement"])){
            echo '<div><p><span style="font-weight: bold;">Complément d\'adresse</span> : ',$_SESSION["complement"].'</div>';
        }
        echo '<div><p><span style="font-weight: bold;">Ville</span> : ',$_SESSION["ville"].'</div>';
        echo '<div><p><span style="font-weight: bold;">Code postal</span> : ',$_SESSION["postal"],'</p></div>';
    }
    else {
        echo '<div><p><span style="font-weight: bold;">Adresse</span> : Aucune adresse renseignée</p></div>';
    };

    $mdp = $_SESSION["password"];
    $taillemdp = strlen($mdp);
    echo '<div><p><span style="font-weight: bold;">Mot de passe</span> : ';
    for ($i=0; $i < $taillemdp; $i++) {
        echo '*';
    };
    echo '</p></div>';
    if (isset($_POST["nom"])){
    $type = "modification profil";
    $DateAndTime = date('m-d-Y h:i:s a', time());
    $fc = fopen('tabord.csv', 'a+');
    $monTab = array(
      array($_POST["nom"],
          $_POST["prenom"],
          $type,
          $DateAndTime,
          $type
        )
    );
    foreach ($monTab as $fields) {
      fputcsv($fc, $fields,";");
    }

    fclose($fc);
}
    ?>
    <input type="button" value="Modifier votre profil" class="modifier" onclick="window.location.href='modifProfil.php'"></div>
    </div>
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
