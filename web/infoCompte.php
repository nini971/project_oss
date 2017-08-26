<?php
session_start();
?>
<h1>Information du compte</h1>
<section class="infoCompte">
	<h1><?php echo $_SESSION["prenom"] .' '. $_SESSION["nom"];?></h1>
	<p>Pseudo : <em><?php echo $_SESSION["pseudo"];?></em></p>
	<p>Email : <em><?php echo $_SESSION["email"];?></em></p>
	<p>Date de naissance : <em><?php echo $_SESSION["birthDate"];?></em></p>
	<p>Lieux de chasse favori : <em><?php echo $_SESSION["lieuxChasse"];?></em></p>
	<p>Expérience : <em><?php echo $_SESSION["experience"];?></em></p>
	
	<aside><button id="modifier" data-lien="modifierCompte.php">Modifier</button><a href="supprimerCompte.php"><button id="supprimer" >Supprimer</button></a></aside>
</section>