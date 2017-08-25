<?php
//if ( isset( $_SESSION[ 'id' ] ) ) {
require_once( 'connectMysqli.php' );
require_once( 'function.php' );
$requete = 'SELECT * FROM poisson';
if ( $result = mysqli_query( $bdd, $requete ) ) {
	while ( $donne = mysqli_fetch_assoc( $result ) ) {
		$presence = addRating( 'presence_' . strtolower( $donne[ 'name' ] ) );
		$taille = addRating( 'taille_' . strtolower( $donne[ 'name' ] ) );
		$attitude = addRating( 'attitude_' . strtolower( $donne[ 'name' ] ) );

		$str = '<li class="detailFish" id="id_fish_' . $donne[ 'id' ] . '">
			<h3>' . $donne[ 'name' ] . '</h3>
			<label>Présence : </label>
			' . $presence . '
			<br>
			<label>Taille : </label>
			' . $taille . '
			<br>
			<label>Attitude : </label>
			' . $attitude . '
			</li>';
		echo( $str );
	}
}
//}
?>