<?php
session_start();

if ( isset( $_POST[ "prenom" ] ) ) {
	$prenom = $_POST[ "prenom" ];
}
if ( isset( $_POST[ "nom" ] ) ) {
	$nom = $_POST[ "nom" ];
}
if ( isset( $_POST[ "pseudo" ] ) ) {
	$pseudo = $_POST[ "pseudo" ];
}
if ( isset( $_POST[ "email" ] ) ) {
	$email = $_POST[ "email" ];
}
if ( isset( $_POST[ "date_naiss" ] ) ) {
	$date_naiss = $_POST[ "date_naiss" ];
}
if ( isset( $_POST[ "favori" ] ) ) {
	$favori = $_POST[ "favori" ];
}
if ( isset( $_POST[ "experience" ] ) ) {
	$experience = $_POST[ "experience" ];
}
if ( isset( $_POST[ "type" ] ) ) {
	$type = $_POST[ "type" ];
}
$id = $_SESSION["id"];
try {
	$bdd = new PDO( 'mysql:host=mysql.hostinger.fr;dbname=u464082933_oss;charset=utf8', 'u464082933_admin', 'tdh97137' );
} catch ( Exception $e ) {
	die( 'Erreur : ' . $e->getMessage() );
}

$req = $bdd->prepare( 'UPDATE utilisateur SET name = :nom, firstName = :prenom, pseudo = :pseudo, email = :email, dateNaissance = :date_naiss, lieuxChasse = :favori, experience = :experience WHERE id= :id' );
if ( $req->execute( array(
		':prenom' => $prenom,
		':nom' => $nom,
		':pseudo' => $pseudo,
		':email' => $email,
		':id' => $id,
		':date_naiss' => $date_naiss,
		':favori' => $favori,
		':experience' => $experience
	) ) ) {
	$_SESSION[ "email" ] = $email;
	header( "Location: getUser.php" );
} else {
	echo 'Erreur ' . $req->errorInfo()[ 2 ];
}


?>