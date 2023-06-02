
let codeRespo = "9099"
let codeAdmin = "6066"

function codageRespo(code) {
    if (code == codeRespo) {
        document.getElementById('verif').innerHTML = "<form method='POST'><input type='text' name='code' value='respo'></form>"
        window.close(code)
    }
    else {
        window.alert("Mauvais mot de passe !")
        verif()
    }
    
}

function codageAdmin(code) {
    if (code == codeAdmin) {
        document.getElementById('verif').innerHTML = "<form method='POST'><input type='text' name='code' value='admin'></form>"
        window.close(code)
    }
    else {
        window.alert("Mauvais mot de passe !")
        verif()
    }
    
}

function verif() {
    let type = document.querySelector('input[name="typeUtilisateur"]:checked').value
    if (type == 'respo'){
        let code = prompt("Vérification de sécurité, veuillez rentrer le code des responsables admissions :")
        if (code == null) {
            document.getElementById('verif').innerHTML = "<form method='POST'><input type='hidden' name='code' value='";code;"'></form>"
            window.close(code)
        }
        else {
            codageRespo(code)
        }
    }
     else if (type == 'admin'){
        let code = prompt("Vérification de sécurité, veuillez rentrer le code des administrateurs :")
        if (code == null) {
            document.getElementById('verif').innerHTML = "<form method='POST'><input type='hidden' name='code' value='";code;"'></form>"
            window.close(code)
        }
        else {
            codageAdmin(code)
        }
     }
     else if (type == 'eleve'){
        document.getElementById('verif').innerHTML = "<form method='POST'><input type='hidden' name='code' value='eleve'></form>"
     }
    
}