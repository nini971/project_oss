<?php
session_start();
if(isset($_POST['send'])){
	require_once( 'connectMysqli.php' );
	// RECUPERATION DES DONNEES DU FORMULAIRE
	if(isset($_POST['spot'])){
		$spot = $_POST['spot'];
	}
	if(isset($_POST['type'])){
		$type = $_POST['type'];
	}
	if(isset($_POST['rating_acces'])){
		$acces = $_POST['rating_acces'];
	}
	// RECUPERATION DES ATTRIBUTS DES POISSSONS DU FORMULAIRE
	$tabFish =array();
	$presence =array();
	$taille = array();
	$attitude =array();
	$idfish = array();
	
	$requete = "SELECT * FROM poisson";
	$result = mysqli_query($bdd, $requete);
	while($donne = mysqli_fetch_assoc($result)){
		if(isset($_POST[strtolower($donne['name'])])){
			array_push($tabFish, $donne['name']);
			$idfish[$donne['name']] = $donne['id'];
			if(isset($_POST['rating_presence_'. strtolower($donne['name'])])){
				$presence[$donne['name']] = $_POST['rating_presence_'. strtolower($donne['name'])];
			}
			if(isset($_POST['rating_taille_'. strtolower($donne['name'])])){
				$taille[$donne['name']] = $_POST['rating_taille_'. strtolower($donne['name'])];
			}
			if(isset($_POST['rating_attitude_'. strtolower($donne['name'])])){
				$attitude[$donne['name']] = $_POST['rating_attitude_'. strtolower($donne['name'])];
			}
		}
	}
	//FIN DES ATTRIBUTS POISSON
	$myid = $_SESSION['id'];
	//FIN DES DONNEES DU FORMILAIRE
	//---------------------------------------
	//INSCRIPTION EN BASE DE DONNEE
	$requeteSpot = "INSERT INTO spot (id_utilisateur, name, type, acess, position) VALUES ('$myid', '$spot', '$type', '$acces', 0)";
	mysqli_query($bdd,$requeteSpot);
	
	// RECUPERATION ID SPOT
	$requeteInfoSpot = "SELECT * FROM spot ORDER BY id DESC LIMIT 1";
	$resultInfoSpot = mysqli_query($bdd, $requeteInfoSpot);
	$donneInfoSpot = mysqli_fetch_assoc($resultInfoSpot);
	$idspot = $donneInfoSpot['id'];
	
	//AJOUT DES FISHINSPOT
	foreach($tabFish as $val){
		$requeteFish = "INSERT INTO fishInSpot (id_utilisateur, id_spot, id_poisson, size, attitude, exitence) VALUES ('$myid', '$idspot', '$idfish[$val]', '$taille[$val]', '$attitude[$val]', '$presence[$val]' )";
		mysqli_query($bdd, $requeteFish);
	}
	header('Location:index.php');
}
?>