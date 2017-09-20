<?php
	include_once 'classes/Ship.class.php';
	include_once 'classes/GrandCruiser.class.php';
	include_once 'classes/Oberon.class.php';
	include_once 'classes/Firestorm.class.php';
	include_once 'classes/Shadow.class.php';
	include_once 'classes/Tombship.class.php';
	include_once 'classes/Jackal.class.php';
	include_once 'classes/Battleship.class.php';
	include_once 'classes/Fury.class.php';
	include_once 'classes/Tiger.class.php';	
	include_once 'classes/Weapon.class.php';
	include_once 'classes/Game.class.php';
	
	if (session_status() == PHP_SESSION_NONE)
		session_start();
	function posship(Ship $ship, $key){
	$pos = $ship->getPos();
	$size = $ship->getSize();
	$x = $pos['x'] * 10 + 2 * $pos['x'];
	$y = $pos['y'] * 10 + 2 * $pos['y'];
	$width = $size['height'] * 10 + 2 * $size['height'];
	return (json_encode(array('x' => $x, 'y' => $y)));
	echo '<div style=" ' . $rotate . 'position: absolute; left:' . $x . '; top:' . $y . ';">
	 	<img src="' . $ship->getSprite() . '" width ="' . $width . 'px" data-ship="'.$key.'"  class="ship"></div>';
}
	$ship = $_SESSION['game']->getShip();
	if ($nb = $_POST['movenb'])
	{			
		$ship = $ship[$_POST['ship']];
		if ($nb > 0 && $nb <= $ship->getCm())
		{
			$ship->move_on($nb);
		}
		echo (posship($ship, $_POST['ship']));
	}
	header("Location: main_page.php");
?>
