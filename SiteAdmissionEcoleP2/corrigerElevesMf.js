function ajax(eleve, option ) {
    xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        alert('Changement bien effectué')
      }
    }
    xhttp.open("POST", "traiterCorrigerMF.php?", true)
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send("eleve="+eleve+"&option="+option)
  }
  
  document.getElementById('changementMF').addEventListener("submit", function(e){
    e.preventDefault()
    var option = document.getElementById("option").value
    var actu = document.getElementById("actu").value
    var mmf = document.getElementById("mmf").value
    var eleve = document.getElementById("eleveMF").value
    switch (option) {
      case 'ACTU':
        if (actu >= 35) {
          alert("Impossible de déplacer "+eleve+" dans l'option "+option+" : il n'y a plus de places dans celle-ci !")
          valid = false
        }
        else {
          ajax(eleve, option)
        }
        break;
      case 'MMF':
        if (mmf >= 70) {
          alert("Impossible de déplacer "+eleve+" dans l'option "+option+" : il n'y a plus de places dans celle-ci !")
          valid = false
        }
        else {
          ajax(eleve, option)
        }
        break;
      default:
      alert('Erreur')
      valid = false
    }
  })