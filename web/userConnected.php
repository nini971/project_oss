<?php
session_start();
$pseudo = $_SESSION[ "pseudo" ];
echo( '<div> Bonjour <a data-lien="infoCompte.php" id="infoCompte" href="#">' . $pseudo . '</a> ! <a href="disconnect.php" id="btn_disconnect"><button>Déconnection</button></a></div>' );

?>