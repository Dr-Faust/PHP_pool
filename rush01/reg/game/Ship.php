<?php
	function posship(Ship $ship, $key){
	$pos = $ship->getPos();
	$size = $ship->getSize();
	$x = $pos['x'] * 10 + 2 * $pos['x'];
	$y = $pos['y'] * 10 + 2 * $pos['y'];
	$width = $size['height'] * 10 + 2 * $size['height'];
	 echo '<div style=" ' . $rotate . 'position: absolute; left:' . $x . '; top:' . $y . ';">
	  	<img src="' . $ship->getSprite() . '" width ="' . $width . 'px" data-ship="'.$key.'"  class="ship"></div>';
}
	function display_name(){
		$game = $_SESSION['game'];
		foreach ($game->getShip() as $key => $value) {
			echo '<option value="'.$key.'">'. $value->getName() . '(' . $key . ')' .'</option>';
		}
	}
?>