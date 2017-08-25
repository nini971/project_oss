<?php
session_start();
try {
	$bdd = new PDO( 'mysql:host=mysql.hostinger.fr;dbname=u464082933_oss;charset=utf8', 'u464082933_admin', 'tdh97137' );
} catch ( Exception $e ) {
	die( 'Erreur : ' . $e->getMessage() );
}

$req = $bdd->prepare( 'SELECT * FROM utilisateur WHERE email = :email' );
if ( $req->execute( array( ':email' => $_SESSION[ "email" ] ) ) ) {
	if ( $info = $req->fetch() ) {
		$_SESSION[ "id" ] = $info[ "id" ];
		$_SESSION[ "nom" ] = $info[ "name" ];
		$_SESSION[ "prenom" ] = $info[ "firstName" ];
		$_SESSION[ "pseudo" ] = $info[ "pseudo" ];
		$_SESSION[ "email" ] = $info[ "email" ];
		$_SESSION[ "birthDate" ] = $info[ "dateNaissance" ];
		$_SESSION[ "lieuxChasse" ] = $info[ "lieuxChasse" ];
		$_SESSION[ "experience" ] = $info[ "experience" ];
		$_SESSION[ "status" ] = $info[ "statut" ];
	}
	header( "Location: index.php" );
}
?>