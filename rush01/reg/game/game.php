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
	include_once 'Ship.php';

	if (session_status() == PHP_SESSION_NONE)
		session_start();
    if (!isset($_SESSION['game'])){
			$_SESSION['game'] = new Game();
			$game = $_SESSION['game'];
			$x = 1;
			$y = 1;
			foreach ($_SESSION['ships'] as $value) {
				$ship['pos']['x'] = $x;
				$ship['pos']['y'] = $y;
				$ship['name'] = $value;
				$game->add_ship($ship);
				$y += 8;
			}
			header('Location: main_page.php');
	}
	else
		header('Location: index.php');
?>