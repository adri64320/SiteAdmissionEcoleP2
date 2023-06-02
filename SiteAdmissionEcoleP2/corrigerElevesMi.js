function ajax(eleve, option ) {
    xhttp = new XMLHttpRequest()
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        alert('Changement bien effectué')
      }
    }
    xhttp.open("POST", "traiterCorrigerMI.php?", true)
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send("eleve="+eleve+"&option="+option)
  }
  
  document.getElementById('changementMI').addEventListener("submit", function(e){
    e.preventDefault()
    var option = document.getElementById("option").value
    var hpda = document.getElementById("hpda").value
    var bi = document.getElementById("bi").value
    var ds = document.getElementById("ds").value
    var ft = document.getElementById("ft").value
    var iac = document.getElementById("iac").value
    var iap = document.getElementById("iap").value
    var eleve = document.getElementById("eleveMI").value
    switch (option) {
      case 'HPDA':
        if (hpda >= 17) {
          alert("Impossible de déplacer "+eleve+" dans l'option "+option+" : il n'y a plus de places dans celle-ci !")
          valid = false
        }
        else {
          ajax(eleve, option)
        }
        break;
      case 'BI':
        if (bi >= 15) {
          alert("Impossible de déplacer "+eleve+" dans l'option "+option+" : il n'y a plus de places dans celle-ci !")
          valid = false
        }
        else {
          ajax(eleve, option)
        }
        break;
      case 'DS':
        if (ds >= 35) {
          alert("Impossible de déplacer "+eleve+" dans l'option "+option+" : il n'y a plus de places dans celle-ci !")
          valid = false
        }
        else {
          ajax(eleve, option)
        }
        break;
      case 'FT':
        if (ft >= 35) {
          alert("Impossible de déplacer "+eleve+" dans l'option "+option+" : il n'y a plus de places dans celle-ci !")
          valid = false
        }
        else {
          ajax(eleve, option)
        }
        break;
      case 'IAC':
        if (iac >= 20) {
          alert("Impossible de déplacer "+eleve+" dans l'option "+option+" : il n'y a plus de places dans celle-ci !")
          valid = false
        }
        else {
          ajax(eleve, option)
        }
        break;
      case 'IAP':
        if (iap >= 35) {
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