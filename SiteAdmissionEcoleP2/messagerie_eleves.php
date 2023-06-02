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
    <link rel="stylesheet" href="messagerie.css" />
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





      <div class="envoi">
        <h1>Messagerie</h1>
        <br>
        <br>
        <br>
    <fieldset>



    <form  action="enregistrer_message.php" method="post" >





      <select  name="choix" class="mystyle">


      <?php

      if (($handle = fopen("infoInscription.csv", "r"))) {

        while (($data = fgetcsv($handle, 1000, ";"))) {
          $p=$data[0];
          $n=$data[1];
          echo"<option>";
          echo $p." ".$n;
          echo"</option>";


        }
      fclose($handle);
      }


      ?>
    </div>
    <div class="texte">


    </select>


       <br>
       <br>

       <p><label>Tapez le message</label></p>
         <p><textarea type="text" name="message" placeholder="Vous pouvez écrire le message ici" ></textarea></p>
        </fieldset>
           <p><input type="submit" value="Envoyer" class="envoyer" style="background: #999370;color: white;border-style: outset;border-color: #black;height: 50px;width: 100px;font: bold 15px arial, sans-serif;text-shadow:none;"></p>

      </form>
    </div>
      <div class="recus">
        <h2>Messages Recus</h2>
      <?php
          $r=0;
          $lignes=array();
          if (($handle = fopen("messagerie.csv", "r"))){
            while(($data = fgetcsv($handle, 1000, ";"))){
              array_push($lignes, $data);
            }
            fclose($handle);
          }
          $n=$_SESSION["nom"];
          $p1=$_SESSION["prenom"];
          $reverse = array_reverse($lignes);
          for ($i=0; $i < sizeof($reverse)-1 ; $i++){
            $prenom = $reverse[$i][0];
            $pieces = explode(" ", $prenom);
            $message = $reverse[$i][1];
            $en = $reverse[$i][2];
            $ep = $reverse[$i][3];
            $date = $reverse[$i][4];
            $type = $reverse[$i][5];
            if ($p1==$pieces[0] && $n==$pieces[1] && $type=="o"){

              echo '<div class="message">';



              echo "<b>".$en." ".$ep." :</b>";
              echo"<br>";

              echo $message;
              echo "<br>";
              echo "</div>";
              echo '<div class="date">';
              echo "Date : ".$date;

              echo "</div>";


              echo '<div id="mess">';
              echo '<form  action="supp_message_recu.php" method="post" >';
              echo '<input type="hidden" name="message" value="',$message,'">';
              echo '<input type="hidden" name="date" value="',$date,'">';
              echo '<input type="hidden" name="prenom" value="',$p1,'">';
              echo '<input type="hidden" name="nom" value="',$n,'">';
              echo '<input type="hidden" name="eep" value="',$ep,'">';
              echo '<input type="hidden" name="een" value="',$en,'">';
              echo '<p><input type="submit" class="corbeille"  value=""  /></p>';
              echo '</form>';
              echo '<form  action="bloquer.php" method="post" >';
              echo '<input type="hidden" name="eep" value="',$ep,'">';
              echo '<input type="hidden" name="een" value="',$en,'">';
              echo '<p><input type="submit" class="bloquer"  value="" /></p>';
              echo '</form>';
              echo '<form  action="signaler.php" method="post" >';
              echo '<input type="hidden" name="prenom" value="',$p1,'">';
              echo '<input type="hidden" name="nom" value="',$n,'">';
              echo '<input type="hidden" name="message" value="',$message,'">';
              echo '<input type="hidden" name="eep" value="',$ep,'">';
              echo '<input type="hidden" name="een" value="',$en,'">';
              echo '<p><input type="submit" class="signaler" value="Signaler" </p>';
              echo '</form>';

              echo "</div>";



              $r=1;
            }



          }
          if($r==0){
            echo " Vous avez recu aucun message";
          }



        ?>


        </div>
        <div class="envoyée">
            <h2>Messages envoyée</h2>



          <?php
              $r=0;
              $n=$_SESSION["nom"];
              $p1=$_SESSION["prenom"];
              for ($i=0; $i < sizeof($reverse)-1 ; $i++){
                $prenom = $reverse[$i][0];
                $pieces = explode(" ", $prenom);
                $message = $reverse[$i][1];
                $en = $reverse[$i][2];
                $ep = $reverse[$i][3];
                $date = $reverse[$i][4];
                $type = $reverse[$i][6];
                $pp = $pieces[0];
                $nn = $pieces[1];
                if ($ep==$p1 && $en==$n && $type=="o"){
                  echo '<div class="message1">';

                  echo "<b>A ".$pieces[0]." ".$pieces[1]." :</b>";
                  echo"<br>";
                  echo $message;
                  echo "<br>";

                  echo "<br>";
                  echo "</div>";
                  echo "Date : ".$date;
                  echo '<div id="mess">';
                  echo '<form  action="supp_message_env.php" method="post" >';
                  echo '<input type="hidden" name="message" value="',$message,'">';
                  echo '<input type="hidden" name="date" value="',$date,'">';
                  echo '<input type="hidden" name="prenom" value="',$pp,'">';
                  echo '<input type="hidden" name="nom" value="',$nn,'">';
                  echo '<input type="hidden" name="eep" value="',$ep,'">';
                  echo '<input type="hidden" name="een" value="',$en,'">';
                  echo '<p><input type="submit" class="corbeille1" value=""></p>';
                  echo '</form>';

                    echo "</div>";

                  $r=1;
                  }



              }
              if($r==0){
                echo " Vous avez envoyée aucun message";
              }

           ?>

        </div>


  </body>
</html>
