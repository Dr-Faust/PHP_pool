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
	include 'classes/Game.class.php';
	include 'header.php';
	include 'panel.php';
	include 'Ship.php';
	
	if (session_status() == PHP_SESSION_NONE)
		session_start();
		?>
		<link rel="stylesheet" type="text/css" href="class.css" />

