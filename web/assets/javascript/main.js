'use strict';
// JavaScript Document
var tabPage = ['accueil.php', 'carte.php', 'spot.php', 'ajoutSpot.php', 'glossaire.php'];
var id_fish_add = [];
var data_post_form = [];
// fonction qui affiche un nouveaux fish ajouter
function displayFish(name, id) {
    var str = '<span onclick="deleteFishInFrom('+id+',\''+name+'\')" class="btn_delete_fish btn btn-danger" id="div_'+id+'" data-id="'+id+'"> ' + name + '</span>';
    return str;
}

function deleteFishInFrom(id, name) {
    console.log('suppresion du ' + name);
    $('#select_fish').append('<option value="'+ id +'">'+ name +'</option>');
    console.log('<option value="'+ id +'">'+ name +'</option>');
    console.log('contenu de list ID : ' + id_fish_add);
    id_fish_add.splice(id_fish_add.indexOf(id), 1);
    console.log('contenu de list ID  après modif : ' + id_fish_add);

    console.log(data_post_form);

    var indexDataFish;
    data_post_form.forEach(function (el, index) {
        if(el.indexOf('[fish]=' + id) !== -1){
            data_post_form.splice(index,1);
            indexDataFish = index;
        }
    });

    console.log(data_post_form);

    $('.btn_delete_fish').each(function (index, el) {
        if ($(el).attr('data-id') == id){
            $(el).remove();
        }
    });
    $('#add-another-fish').prop('disabled', false);
}

// FONCTION QUI AFFICHE LE DETAIL DES IMAGES DANS AJOUTSPOT
function afficheDetailFish(e) {
    var cible = e.target;
    if (cible.checkbox.valueOf()){

    } else {

    }
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
            if (jQuery('#form_spot')){
                data_post_form = [];
                $('#ossbundle_spot_spotAcces').prop('required',false);
                $('#ossbundle_spot_Submit').prop('disabled', true);

                // WHEN FORM IS SUBMIT
                $("#form_spot").submit( function(event) {
                    // Eviter le comportement par défaut (soumettre le formulaire)
                    event.preventDefault();

                    var $this = $(this);
                    var data =  $this.serialize();
                    data_post_form.forEach (function(el){
                        data += encodeURI(el);
                    });
                    var access = $('#rating_access input[type = radio]:checked').val();
                    var spotAccess = encodeURI('&ossbundle_spot[spotAcces]=' + access);

                    data = data.replace('&ossbundle_spot%5BspotAcces%5D=', spotAccess);
                    data = data.replace('&rating_access=' + access, '');

                    console.log(data);

                    $.ajax({
                        url: '/addSpot',
                        type: 'POST',
                        data: data,
                        success: function(result){
                        }
                    });
                    console.log("le form est submit");
                })
                var fishInSpotCount = 0;

                jQuery(document).ready(function() {
                    jQuery('#add-another-fish').click(function(e) {
                        e.preventDefault();
                        $('#modalFish').modal('show');
                        fishInSpotCount++;
                        // var dataForm = jQuery('#form_prototype');
                        // var fishList = jQuery('#fish-fields-list');

                        // grab the prototype template
                        // var newWidget = dataForm.attr('data-prototype');
                        // replace the "__name__" used in the id and name of the prototype
                        // with a number that's unique to your emails
                        // end name attribute looks like name="contact[emails][2]"
                        // newWidget = newWidget.replace(/__name__/g, fishInSpotCount);

                        // create a new list element and add it to the list
                        // var newLi = jQuery('<div></div>').html(newWidget);
                        //newLi.appendTo(fishList);
                    });
                });

                // quand on click sur Add pour un fish
                $('#add_new_fish_valid').click(function (e) {
                    id_fish_add.push($('#select_fish').val());
                    data_post_form.push ('&ossbundle_spot[fishInSpot]['+fishInSpotCount+'][fish]='+$('#select_fish').val()+
                        '&ossbundle_spot[fishInSpot]['+fishInSpotCount+'][existence]='+$('#rating_existence input[type = radio]:checked').val()+
                        '&ossbundle_spot[fishInSpot]['+fishInSpotCount+'][size]='+$('#rating_size input[type = radio]:checked').val()+
                        '&ossbundle_spot[fishInSpot]['+fishInSpotCount+'][attitude]='+$('#rating_attitude input[type = radio]:checked').val());
                    $('#list_fish_add').append(displayFish($('#select_fish option:selected').prop('text'), $('#select_fish').val()));

                    $('#modalFish').modal('hide')
                    // remove les options déjà selected
                    $('#select_fish option').each(function (index, el) {
                        if(id_fish_add.indexOf($(el).attr('value')) != -1){
                            el.remove();
                        }
                    });
                    if($('#select_fish option').length == 0){
                        $('#add-another-fish').prop('disabled', true);
                    }
                });

                // quand la modal s'ouvre
                $('#modalFish').on('show.bs.modal', function (e) {
                    // désactivé les btn radio
                    $('.detailFish input[type=radio]').each(function (index, el) {
                        $(el).prop('checked', false);
                    });


                    // check si il reste des fish
                    console.log('combien d\'option : ' + $('#select_fish option').length);
                    // if($('#select_fish option').length == 0){
                    //     $('.modal-body').append("<p>Il n'y a plus de poissons disponibles !</p>");
                    //     $('#add_new_fish_valid').prop('disabled', true);
                    // }
                });



            }
            var modifCompt = document.getElementById("modifier");
            if (modifCompt) {
                modifCompt.onclick = changePage;
            }
            var addSpot = document.getElementById('detailFishForm');

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
    console.log(cible);


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
                // email.onfocus = function () {
                //     email.classList.remove("noCheck");
                // };
                // password.onfocus = function () {
                //     password.classList.remove("noCheck");
                // };
            }
        }
    }

}

function identification() {
    var req = new XMLHttpRequest();

    req.onreadystatechange = majTopBlock;
    req.open('POST', '/login');
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
