<?php
require_once 'Ship.class.php';
require_once 'navalspear.class.php';
require_once 'Weapon.class.php';
class Fury extends Ship {

	const PP = 8;
	const PV = 6;

	public function __construct (array $kwargs){
			$value = array();
			$value['sprite'] = 'http://vignette4.wikia.nocookie.net/warhammer40k/images/4/4d/Manta1.jpg/revision/latest?cb=20121103025440';
			$value['pv'] = Fury::PV;
			$value['cm'] = 150;
			$value['pp'] = Fury::PP;
			$value['maneuver'] = 3;
			$value['weapons']['1'] = new navalspear();
			$value['weapons']['2'] = new navalspear();
			$value['size']['width'] = 2;
			$value['size']['height'] = 4;
			$value['name'] = 'Fury';
			$value['pos'] = $kwargs['pos'];
			parent::__construct($value);
	}
	public static function doc(){
		if (file_exists('../docs/Fury.doc.txt'))
			$doc = file_get_contents('../docs/Fury.doc.txt');
		return $doc;
	}
	public function shoot(Ship $target, Weapon $weapon) {
		if ($weapon->getCharges() > 1)
		{
			$dice = rand(1 , 6);
			$range = $this->check_range($target, $weapon);
			if ($range == 1 && $dice >= 4)
				$target->receive_dmg();
			else if ($range == 2 && $dice >= 5)
				$target->receive_dmg();
			else if ($range == 3 && $dice >= 6)
				$target->receive_dmg();
			$weapon->subCharge();
		}
	}

}
?>