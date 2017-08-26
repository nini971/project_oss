<?php
session_start();

if ( isset( $_POST[ "email" ] ) ) {
	$email = $_POST[ "email" ];
	$_SESSION["emailTemp"] = $_POST[ "email" ];
}
if ( isset( $_POST[ "password" ] ) ) {
	$password = $_POST[ "password" ];
	$password = sha1($password);
}


try {
	$bdd = new PDO( 'mysql:host=mysql.hostinger.fr;dbname=u464082933_oss;charset=utf8', 'u464082933_admin', 'tdh97137' );
} catch ( Exception $e ) {
	die( 'Erreur : ' . $e->getMessage() );
}

$user = $bdd->prepare('SELECT * FROM utilisateur WHERE email = :email');
if($user->execute(array(':email' => $email))){
	if($result = $user->fetch()){
		$password_result = $result['password'];
		if($password_result == $password){
			// password ok !
			$_SESSION["id"] = $result["id"];
			$_SESSION["nom"] = $result["name"];
			$_SESSION["prenom"] = $result["firstName"];
			$_SESSION["pseudo"] = $result["pseudo"];
			$_SESSION["email"] = $result["email"];
			$_SESSION["birthDate"] = $result["dateNaissance"];
			$_SESSION["lieuxChasse"] = $result["lieuxChasse"];
			$_SESSION["experience"] = $result["experience"];
			$_SESSION["status"] = $result["statut"];
			header('Location: index.php');
		} else {
			// password faux !
			$_SESSION["status"] = 10;
			header('Location: index.php');
		}
	} else {
		// utilisateur inexistant !
		$_SESSION["status"] = 20;
		header('Location: index.php');
	}
	
}

?>