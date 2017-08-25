<div>
	<h1>Ajout un Spot</h1>
	<form method="post" action="formAddSpot.php" id="form_add_spot">
		<p>
			<label>Spot : </label>
			<input type="text" name="spot">
		</p>
		<p>
			<label>Type : </label>
			<select name="type">
				<option value="roche">Rocher</option>
				<option value="plage">Plage</option>
				<option value="port">Port</option>
				<option value="mer">Pleine mer</option>
			</select>
		</p>
		<p>
			<!--DIFFICULTE ACCES-->
			<label>Accès : </label>
			<span class="rating">
        <input type="radio" class="rating-input"
            id="rating-input-1-5" name="rating_acces" value="5">
        <label for="rating-input-1-5" class="rating-star"></label>
        <input type="radio" class="rating-input"
            id="rating-input-1-4" name="rating_acces" value="4">
        <label for="rating-input-1-4" class="rating-star"></label>
        <input type="radio" class="rating-input"
            id="rating-input-1-3" name="rating_acces" value="3">
        <label for="rating-input-1-3" class="rating-star"></label>
        <input type="radio" class="rating-input"
            id="rating-input-1-2" name="rating_acces" value="2">
        <label for="rating-input-1-2" class="rating-star"></label>
        <input type="radio" class="rating-input"
            id="rating-input-1-1" name="rating_acces" value="1">
        <label for="rating-input-1-1" class="rating-star"></label>
    </span>
		


		</p>
		<p>
			<!--GOOGLE MAP POUR LOCALISATION-->
		</p>
		<p>
			<!--SELECTION DES POISSONS-->
			<fieldset id="fieldFormAddSpot">
				<legend>Sélectionner les poissons</legend>
				<?php require_once('displayFish.php')?>
			</fieldset>
		</p>
		<section id="detailFishForm">
			<ul>
				<?php require_once('displayDetailFish.php')?>
			</ul>
		</section>
		<input type="submit" name="send"/>
		<input type="reset"/>
	</form>
</div>