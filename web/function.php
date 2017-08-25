<?php
function addRating($name){
	$str = '<span class="rating">
        <input type="radio" class="rating-input"
            id="rating-input-1-5_'.$name.'" name="rating_'.$name.'" value="5">
        <label for="rating-input-1-5_'.$name.'" class="rating-star"></label>
        <input type="radio" class="rating-input"
            id="rating-input-1-4_'.$name.'" name="rating_'.$name.'" value="4">
        <label for="rating-input-1-4_'.$name.'" class="rating-star"></label>
        <input type="radio" class="rating-input"
            id="rating-input-1-3_'.$name.'" name="rating_'.$name.'" value="3">
        <label for="rating-input-1-3_'.$name.'" class="rating-star"></label>
        <input type="radio" class="rating-input"
            id="rating-input-1-2_'.$name.'" name="rating_'.$name.'" value="2">
        <label for="rating-input-1-2_'.$name.'" class="rating-star"></label>
        <input type="radio" class="rating-input"
            id="rating-input-1-1_'.$name.'" name="rating_'.$name.'" value="1">
        <label for="rating-input-1-1_'.$name.'" class="rating-star"></label>
    </span>';
	return($str);
}
?>