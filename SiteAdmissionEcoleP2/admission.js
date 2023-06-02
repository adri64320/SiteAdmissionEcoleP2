const prenom = document.getElementsByName('prenom')
const nom = document.getElementsByName('nom')
const nomPrenom = prenom
let i=0
nom.forEach((name) => {
  nomPrenom[i] += name
  i+=1
});

console.log(nomPrenom)


const searchInput = document.getElementById('Recherche')
searchInput.addEventListener('keyup', function() {
  const input = searchInput.value
  console.log(input)

  const result = prenom.filter(item => prenom.value.includes(input))

  console.log(result)
})

function generer() {
  const etat = document.getElementById('etat')

  xhttp = new XMLHttpRequest()
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      const reponse = this.responseText
      console.log (reponse)
      var row =""
      var eleves =""
      var tableau = "<table>"
      etat.innerHTML = "<table><tr><th>Prénom</th><th>Nom</th><th>Mail</th><th>Note ECTS</th><th>Moyenne</th><th>Choix 1</th><th>Choix 2</th><th>Choix 3</th><th>Choix 4</th><th>Choix 5</th><th>Choix 6</th><th>Choix 7</th><th>Choix 8</th><th>Choix accepté</th></tr>"
      for (var i = 0; i < reponse.length; i++) {
        row += "<tr>"
        for (var j = 0; j < 15; i++) {
          eleves += "<td>" + reponse[i][j] + "<td>"
        }
        row += eleves + "</tr>"
      }
      tableau += row + "</tableau>"
      etat.innerHTML = tableau
    }
  };

  xhttp.open("GET", "mariages.php", true)
  xhttp.send()

}

document.getElementById('afficher').addEventListener('click', generer)
