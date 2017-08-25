<?php
session_start();
if ( $_SESSION[ 'status' ] == 1 ) { // SI USER CONNECTER
	require_once( 'connectMysqli.php' );
	$requete = "SELECT * FROM spot"; // RECUPERATION DE TOUT LES SPOTS
	$result = mysqli_query( $bdd, $requete );
	while ( $donne = mysqli_fetch_assoc( $result ) ) {
		$idUser = $donne[ 'id_utilisateur' ];
		$idSpot = $donne[ 'id' ];
		$requeteUser = "SELECT * FROM utilisateur WHERE id='$idUser'"; // RECUPERATION DE USER QUI A POSTE LE SPOT
		$resultUser = mysqli_query( $bdd, $requeteUser );
		$donneUser = mysqli_fetch_assoc( $resultUser );
		$note = $donne[ 'acess' ];
		for ( $i = 1; $i <= 5; $i++ ) {
			if ( $i <= $note ) {
				$tabnote[ $i ] = 'rating-on';
			} else {
				$tabnote[ $i ] = '';
			}
		}
		$requeteFish = "SELECT * FROM fishInSpot WHERE id_spot='$idSpot'"; // RECUPERATION DES POISSONS DU SPOT
		$resultFish = mysqli_query( $bdd, $requeteFish );
		$strFish ='';
		while ( $donneFish = mysqli_fetch_assoc( $resultFish ) ) {
			
			$idPoisson = $donneFish[ 'id_poisson' ];
			$requetePoisson = "SELECT * FROM poisson WHERE id='$idPoisson'";
			$resultPoisson = mysqli_query( $bdd, $requetePoisson );
			$donnePoisson = mysqli_fetch_assoc( $resultPoisson );
			for ( $i = 1; $i <= 5; $i++ ) {
				if ( $i <= $donneFish[ 'size' ] ) {
					$tabnotetaille[ $i ] = 'rating-on';
				} else {
					$tabnotetaille[ $i ] = '';
				}
			}
			for ( $i = 1; $i <= 5; $i++ ) {
				if ( $i <= $donneFish[ 'attitude' ] ) {
					$tabnoteattitude[ $i ] = 'rating-on';
				} else {
					$tabnoteattitude[ $i ] = '';
				}
			}
			for ( $i = 1; $i <= 5; $i++ ) {
				if ( $i <= $donneFish[ 'exitence' ] ) {
					$tabnotepresence[ $i ] = 'rating-on';
				} else {
					$tabnotepresence[ $i ] = '';
				}
			}
			//  STOCK DANS UNE VARIABLE LE CODE HTML POUR L AFFICHAGE DES POISSONS
			$strFish .= '<div class="divpoissondansspot">
			<h3>' . $donnePoisson[ 'name' ] . '</h3>
			<p>Présence : 
			<span class="">
       
        		<label class="rating-note ' . $tabnotepresence[ 1 ] . '"></label>
        
        		<label class="rating-note ' . $tabnotepresence[ 2 ] . '"></label>
        
        		<label class="rating-note ' . $tabnotepresence[ 3 ] . '"></label>
        
        		<label class="rating-note ' . $tabnotepresence[ 4 ] . '"></label>
        
        		<label class="rating-note ' . $tabnotepresence[ 5 ] . '"></label>
    		</span>
			</p>
			<p>Taille : 
			<span class="">
       
        		<label class="rating-note ' . $tabnotetaille[ 1 ] . '"></label>
        
        		<label class="rating-note ' . $tabnotetaille[ 2 ] . '"></label>
        
        		<label class="rating-note ' . $tabnotetaille[ 3 ] . '"></label>
        
        		<label class="rating-note ' . $tabnotetaille[ 4 ] . '"></label>
        
        		<label class="rating-note ' . $tabnotetaille[ 5 ] . '"></label>
    		</span>
			</p>
			<p>Attitude : 
			<span class="">
       
        		<label class="rating-note ' . $tabnoteattitude[ 1 ] . '"></label>
        
        		<label class="rating-note ' . $tabnoteattitude[ 2 ] . '"></label>
        
        		<label class="rating-note ' . $tabnoteattitude[ 3 ] . '"></label>
        
        		<label class="rating-note ' . $tabnoteattitude[ 4 ] . '"></label>
        
        		<label class="rating-note ' . $tabnoteattitude[ 5 ] . '"></label>
    		</span>
			</p></div>';
		}
		$str = '<section class="infoSpot">
					<article>
						<h2>' . $donne[ 'name' ] . '</h2>
						<p>Type : ' . $donne[ 'type' ] . '</p>
						<p>Acces : <span class="">
       
        					<label class="rating-note ' . $tabnote[ 1 ] . '"></label>
        
        					<label class="rating-note ' . $tabnote[ 2 ] . '"></label>
        
        					<label class="rating-note ' . $tabnote[ 3 ] . '"></label>
        
        					<label class="rating-note ' . $tabnote[ 4 ] . '"></label>
        
        					<label class="rating-note ' . $tabnote[ 5 ] . '"></label>
    						</span></p>
					</article>
					<article>
						<p>Date d\'ajout : ' . $donne[ 'dateAdd' ] . '</p>
						<p>Ajouter par : ' . $donneUser[ 'pseudo' ] . '</p>
						<fieldset>
							<legend>Liste des poissons</legend>
							'. $strFish .'
						</fieldset>
					</article>
				</section>';
		echo( $str );
	}
} else echo 'Vous n\'êtes pas connecté !';
?>