<!doctype html>
<html>
<head>
<meta charset="utf-8"/>
</head>
<body>
<?php
	if(isset($_POST["prenom"])) {
		$prenom = $_POST["prenom"];
	}
	if(isset($_POST["nom"])) {
		$nom = $_POST["nom"];
	}
	if(isset($_POST["pseudo"])) {
		$pseudo = $_POST["pseudo"];
	}
	if(isset($_POST["email"])) {
		$email = $_POST["email"];
	}
	if(isset($_POST["password_ins"])) {
		$password_ins = $_POST["password_ins"];
	}
	if(isset($_POST["date_naiss"])) {
		$date_naiss = $_POST["date_naiss"];
	}
	if(isset($_POST["favori"])) {
		$favori = $_POST["favori"];
	}
	if(isset($_POST["experience"])) {
		$experience = $_POST["experience"];
	}
	if(isset($_POST["type"])) {
		$type = $_POST["type"];
	}

	try{
		$bdd = new PDO('mysql:host=localhost;dbname=oss;charset=utf8','root','abcd1234');
	}
	catch(Exception $e){
		die('Erreur : '.$e->getMessage());
	}

	$checkEmail = $bdd->prepare('SELECT email FROM utilisateur WHERE email = :email');
	if($checkEmail->execute(array(':email' => $email))){
		if($row = $checkEmail->fetch()) {
			//utilisateur existant
		} else {
			$req = $bdd->prepare('INSERT INTO utilisateur SET name = :prenom, firstName = :nom, pseudo = :pseudo, email = :email, password = :password, dateNaissance = :date_naiss, lieuChasse = :favori, experience = :experience');
			if($req->execute(array(
				':prenom'=>$prenom,
				':nom'=>$nom,
				':pseudo'=>$pseudo,
				':email'=>$email,
				':password'=>$password_ins,
				':date_naiss'=>$date_naiss,
				':favori'=>$favori,
				':experience'=>$experience
			))){}
			else{
				echo 'Erreur '. $req->errorInfo()[2];
			}
			
		}
	}
?>
</body>
</html>
