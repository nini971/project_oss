<?php
//if ( isset( $_SESSION[ 'id' ] ) ) {
	require_once( 'connectMysqli.php' );
	$requete = 'SELECT * FROM poisson';
	if ( $result = mysqli_query( $bdd, $requete ) ) {
		while ( $donne = mysqli_fetch_assoc( $result ) ) {
			$str = '<label>'. $donne['name'] .'</label>
			<input type="checkbox" name="' . strtolower($donne[ 'name' ]) . '" class="checkFish" data-id="'. $donne[ 'id' ] .'">';
			echo( $str );
		}
	}
//}
?>