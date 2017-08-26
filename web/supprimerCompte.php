<?php
session_start();
try {
	$bdd = new PDO( 'mysql:host=mysql.hostinger.fr;dbname=u464082933_oss;charset=utf8', 'u464082933_admin', 'tdh97137' );
} catch ( Exception $e ) {
	die( 'Erreur : ' . $e->getMessage() );
}
$req = $bdd->prepare( 'DELETE FROM utilisateur WHERE id= :id' );
if ( $req->execute( array( ':id' => $_SESSION[ 'id' ] ) ) ) {
	session_destroy();
	header( 'Location: index.php' );
}
?>