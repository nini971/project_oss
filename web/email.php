<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
		<meta charset="UTF-8" />
		<title>Titre de votre page</title>
		<style>
			html, body {
				height: 100%;
				margin: 0;
				padding: 0
			}
			#EmplacementDeMaCarte {
				height: 100%
			}
		</style>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMAlxADY_2tJes70XPjBsan07lCr6y-qk"></script>
		<script>
			function initialisation(){
				var optionsCarte = {
					zoom: 8,
					center: new google.maps.LatLng(47.389982, 0.688877)
				}
				var maCarte = new google.maps.Map(document.getElementById("EmplacementDeMaCarte"), optionsCarte);
			}
			google.maps.event.addDomListener(window, 'load', initialisation);
		</script>
	</head>
	<body>
		<div id="EmplacementDeMaCarte"></div>
		<noscript>
			<p>Attention : </p>
			<p>Afin de pouvoir utiliser Google Maps, JavaScript doit être activé.</p>
			<p>Or, il semble que JavaScript est désactivé ou qu'il ne soit pas supporté par votre navigateur.</p>
			<p>Pour afficher Google Maps, activez JavaScript en modifiant les options de votre navigateur, puis essayez à nouveau.</p>
		</noscript>
	</body>
</html>
<?php
/*$to = 'mathieu31120@gmail.com';
$subject = 'php test';
$message = 'coucou c john tzpihgpitez  pitantgpia  panr irap ngr';
for($i = 0; $i< 1000;$i++){
	mail($to,$subject,$message);
}*/

?>