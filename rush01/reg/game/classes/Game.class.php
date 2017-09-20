<?php
require_once 'Ship.class.php';
class Game {
	private $_ship = array();
	public function getShip(){ return $this->_ship; }
	public function add_ship(Array $ship){
			switch ($ship['name']) {
				case 'Cairn':
				$this->_ship[] = new Tombship($ship);
					break;
				case 'Jackal':
				$this->_ship[] = new Jackal($ship);
					break;
				case 'Shroud':
				$this->_ship[] = new Shadow($ship);
					break;
				case 'Ore':
				$this->_ship[] = new Battleship($ship);
					break;
				case 'Porrui':
				$this->_ship[] = new Fury($ship);
					break;
				case 'Tiger':
				$this->_ship[] = new Tiger($ship);
					break;
				case 'Oberon':
				$this->_ship[] = new Oberon($ship);
					break;
				case 'Exorcist':
				$this->_ship[] = new GrandCruiser($ship);
					break;
				case 'Firestorm':
				$this->_ship[] = new Firestorm($ship);
					break;
				default:
					break;
			}
	}
	public static function doc(){
		if (file_exists('../docs/Phase.doc.txt'))
			$doc = file_get_contents('../docs/Phase.doc.txt');
		return $doc;
	}	
}
?>