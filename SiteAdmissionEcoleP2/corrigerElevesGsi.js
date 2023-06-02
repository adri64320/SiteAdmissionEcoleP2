/*function verifier() {
  var option = document.getElementById("option").value
  var hpda = document.getElementById("hpda").value
  var bi = document.getElementById("bi").value
  var cs = document.getElementById("cs").value
  var iac = document.getElementById("iac").value
  var iap = document.getElementById("iap").value
  var icc = document.getElementById("icc").value
  var inem = document.getElementById("inem").value
  var visua = document.getElementById("visua").value
  var eleve = document.getElementById("eleve").value
  console.log(option)
  switch (option) {
    case 'HPDA':
      if (hpda >= 18) {
        alert("Impossible de déplacer "+eleve+" dans l'option "+option+" : il n'y a plus de places dans celle-ci !")
        return false
      }
      break;
    case 'BI':
      if (bi >= 20) {
        alert("Impossible de déplacer "+eleve+" dans l'option "+option+" : il n'y a plus de places dans celle-ci !")
        return false
      }
      break;
    case 'CS':
      if (cs >= 70) {
        alert("Impossible de déplacer "+eleve+" dans l'option "+option+" : il n'y a plus de places dans celle-ci !")
        return false
      }
      break;
    case 'IAC':
      if (iac >= 50) {
        alert("Impossible de déplacer "+eleve+" dans l'option "+option+" : il n'y a plus de places dans celle-ci !")
        return false
      }
      break;
    case 'IAP':
      if (iap >= 17) {
        console.log('aaaa')
        alert("Impossible de déplacer "+eleve+" dans l'option "+option+" : il n'y a plus de places dans celle-ci !")
        return false
      }
      break;
    case 'ICC':
      if (icc >= 35) {
        alert("Impossible de déplacer "+eleve+" dans l'option "+option+" : il n'y a plus de places dans celle-ci !")
        return false
      }
      break;
    case 'INEM':
      if (inem >= 35) {
        alert("Impossible de déplacer "+eleve+" dans l'option "+option+" : il n'y a plus de places dans celle-ci !")
        return false
      }
      break;
    case 'VISUA':
      if (visua >= 35) {
        alert("Impossible de déplacer "+eleve+" dans l'option "+option+" : il n'y a plus de places dans celle-ci !")
        return false
      }
      break;
    default:
    alert('Erreur')
    return false

  }
}*/

function ajax(eleve, option ) {
  xhttp = new XMLHttpRequest()
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      alert('Changement bien effectué')
    }
  }
  xhttp.open("POST", "traiterCorrigerGSI.php?", true)
  xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhttp.send("eleve="+eleve+"&option="+option)
}

document.getElementById('changementGSI').addEventListener("submit", function(e){
  e.preventDefault()
  var option = document.getElementById("option").value
  var hpda = document.getElementById("hpda").value
  var bi = document.getElementById("bi").value
  var cs = document.getElementById("cs").value
  var iac = document.getElementById("iac").value
  var iap = document.getElementById("iap").value
  var icc = document.getElementById("icc").value
  var inem = document.getElementById("inem").value
  var visua = document.getElementById("visua").value
  var eleve = document.getElementById("eleveGSI").value
  switch (option) {
    case 'HPDA':
      if (hpda >= 18) {
        alert("Impossible de déplacer "+eleve+" dans l'option "+option+" : il n'y a plus de places dans celle-ci !")
        valid = false
      }
      else {
        ajax(eleve, option)
      }
      break;
    case 'BI':
      if (bi >= 20) {
        alert("Impossible de déplacer "+eleve+" dans l'option "+option+" : il n'y a plus de places dans celle-ci !")
        valid = false
      }
      else {
        ajax(eleve, option)
      }
      break;
    case 'CS':
      if (cs >= 70) {
        alert("Impossible de déplacer "+eleve+" dans l'option "+option+" : il n'y a plus de places dans celle-ci !")
        valid = false
      }
      else {
        ajax(eleve, option)
      }
      break;
    case 'IAC':
      if (iac >= 50) {
        alert("Impossible de déplacer "+eleve+" dans l'option "+option+" : il n'y a plus de places dans celle-ci !")
        valid = false
      }
      else {
        ajax(eleve, option)
      }
      break;
    case 'IAP':
      if (iap >= 17) {
        alert("Impossible de déplacer "+eleve+" dans l'option "+option+" : il n'y a plus de places dans celle-ci !")
        valid = false
      }
      else {
        ajax(eleve, option)
      }
      break;
    case 'ICC':
      if (icc >= 35) {
        alert("Impossible de déplacer "+eleve+" dans l'option "+option+" : il n'y a plus de places dans celle-ci !")
        valid = false
      }
      else {
        ajax(eleve, option)
      }
      break;
    case 'INEM':
      if (inem >= 35) {
        alert("Impossible de déplacer "+eleve+" dans l'option "+option+" : il n'y a plus de places dans celle-ci !")
        valid = false
      }
      else {
        ajax(eleve, option)
      }
      break;
    case 'VISUA':
      if (visua >= 35) {
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
