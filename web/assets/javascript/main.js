'use strict';
// JavaScript Document
var tabPage = ['accueil.php', 'carte.php', 'spot.php', 'ajoutSpot.php', 'glossaire.php'];

// FONCTION QUI AFFICHE LE DETAIL DES IMAGES DANS AJOUTSPOT
function afficheDetailFish(e) {
    var cible = e.target;
    var id = cible.dataset.id;
    var elementLi = document.getElementById('id_fish_' + id);
    elementLi.classList.toggle('hiddenFish');

}

// fonction check password et confirm
function check() {
    var password = document.getElementById("password_ins");
    var password_confirm = document.getElementById("password_confirm");
    var submit = document.getElementById("inscrire");
    if (password.value != password_confirm.value) {
        document.getElementById("message").innerHTML = "Wrong !";
        submit.disabled = true;
    } else if (password.value == password_confirm.value) {
        document.getElementById("message").innerHTML = "Correct !";
        submit.disabled = false;
    } else {
        document.getElementById("message").innerHTML = "Error !";
    }
}
// check mail dans formu inscription
function checkXhrEmail(evt) {
    var cible = evt.target;

    if (cible.readyState == cible.DONE) {
        if (cible.status == 200) {
            console.log('bon : ' + cible);
            if (cible.responseText == 'true') {
                console.log('pas dans la base');
                document.getElementById("email_check").innerHTML = 'Ok !';
            } else if (cible.responseText == 'false') {
                document.getElementById("email_check").innerHTML = 'Email existant !';
            } else {
                document.getElementById("email_check").innerHTML = 'Erreur !';
            }
        }
    }
}

function checkEmail(evt) {
    var formD = new FormData(document.getElementById("formInsc"));
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = checkXhrEmail;
    xhr.open("POST", "check_email.php");
    xhr.send(formD);


}

/*function initialisation() {
 var optionsCarte = {
 zoom: 8,
 center: new google.maps.LatLng(47.389982, 0.688877)
 }
 var maCarte = new google.maps.Map(document.getElementById("map"), optionsCarte);
 }*/
// init pour la formulaire d'inscription et infoCompte
function init_maj() {
    // var email_ins = document.getElementById("email_ins");
    // email_ins.addEventListener("blur", checkEmail);

}

function changePage(evt) {
    var cible = evt.target;
    var url = cible.dataset.lien;
    var req = new XMLHttpRequest();

    document.querySelector('#container').classList.remove('menuaccueil', 'menucarte', 'menuspot', 'menuajout', 'menuglossaire');
    document.querySelector('#container').classList.add(cible.dataset.color);

    req.onreadystatechange = majAccueil;
    req.open('GET', url);
    req.send();

    var tabMenu = [document.getElementById("accueil"), document.getElementById("carte"), document.getElementById("spot"), document.getElementById("ajout"), document.getElementById("glossaire")];

    // rend l'onglet actif moins opaque
    for (var i = 0; i < tabMenu.length; i++) {
        if (tabMenu[i].classList.contains('actif')) {
            tabMenu[i].classList.remove('actif');
        }
        if (tabMenu[i] == cible) {
            tabMenu[i].classList.add('actif');
        }
    }
}

function majAccueil(evt) {
    var main = document.getElementById("main");
    var cible = evt.target;

    console.log('debu ');
    if (cible.readyState == cible.DONE) {
        console.log('Fini ');
        if (cible.status == 200) {
            console.log('Fini OK : ' + cible.responseURL);
            main.innerHTML = cible.responseText;

            if (cible.responseURL == 'http://localhost:8000/inscription') {
                console.log("page inscription");

                $("#form_inscription").submit( function(event) {
                    console.log("le form est submit");

                    event.preventDefault();
                    var $this = $(this);
                    console.log($this.serialize());
                    //Ici on peut ajouter un loader...
                    $.ajax({
                        url: '/inscription',
                        type: 'POST',
                        data: $this.serialize(),
                        success: function(result){
                        }
                    });
                })
                init_maj();
            }
            var modifCompt = document.getElementById("modifier");
            if (modifCompt) {
                modifCompt.onclick = changePage;
            }
            var addSpot = document.getElementById('detailFishForm');
            if (addSpot) {
                var tabFish = document.getElementsByClassName('checkFish');
                console.log('debut detail fish' + tabFish[0]);
                for (var i = 0; i < tabFish.length; i++) {
                    tabFish[i].onchange = afficheDetailFish;
                }
            }
            var mapgoogle = document.getElementById('map');
            if (mapgoogle) {
                /*
                 var jsElm = document.createElement("script");
                 // make the script element load file
                 jsElm.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyAMAlxADY_2tJes70XPjBsan07lCr6y-qk";
                 // finally insert the element to the body element in order to load the script
                 document.getElementById('container').appendChild(jsElm);*/
                var optionsCarte = {
                    zoom: 8,
                    center: new google.maps.LatLng(48.122388, -3.743348)
                }
                var maCarte = new google.maps.Map(document.getElementById("map"), optionsCarte);
            }
        }
    }
}

function majTopBlock(e) {
    var topBlock = document.getElementById("top_block");
    var cible = e.target;


    if (cible.readyState == cible.DONE) {
        if (cible.status == 200) {
            topBlock.innerHTML = cible.responseText;
            var ins = document.getElementById("inscription");

            if (ins) ins.onclick = changePage;


            var infoCompte = document.getElementById("infoCompte");
            if (infoCompte) {
                console.log('id present');
                infoCompte.preventDefault;
                infoCompte.onclick = changePage;
            }
            var email = document.getElementById("email");
            var password = document.getElementById("password");
            if (email || password) {
                email.onfocus = function () {
                    email.classList.remove("noCheck");
                };
                password.onfocus = function () {
                    password.classList.remove("noCheck");
                };
            }
        }
    }

}

function identification() {
    var req = new XMLHttpRequest();

    req.onreadystatechange = majTopBlock;
    req.open('POST', 'topBlock.php');
    req.send();

}


function init() {


    identification();

    var tabMenu = [document.getElementById("accueil"), document.getElementById("carte"), document.getElementById("spot"), document.getElementById("ajout"), document.getElementById("glossaire")];

    var req = new XMLHttpRequest();

    req.onreadystatechange = majAccueil;
    req.open('GET', 'accueil.html');
    req.send();

    for (var i = 0; i < tabMenu.length; i++) {
        tabMenu[i].onclick = changePage;
    }
    tabMenu[0].classList.add('actif');
}

window.onload = init;
