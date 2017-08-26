<?php
	if(isset($_POST["email"])){
		$email = $_POST["email"];
	}


	//echo "Mail : ".$email;
	try{
		$bdd = new PDO('mysql:host=mysql.hostinger.fr;dbname=u464082933_oss;charset=utf8','u464082933_admin','tdh97137');
	}
	catch(Exception $e){
		die('Erreur : '.$e->getMessage());
	}

	$checkEmail = $bdd->prepare('SELECT email FROM utilisateur WHERE email = :email');
	if($checkEmail->execute(array(':email' => $email))){
		if($checkEmail->fetch()){
			echo('false');
		} else{
			echo('true');
		}
	}
?>