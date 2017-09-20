<?php
require_once 'Ship.class.php';
require_once 'navalspear.class.php';
require_once 'Weapon.class.php';
class Shadow extends Ship {

	const PP = 5;
	const PV = 3;

	public function __construct (array $kwargs){
			$value = array();
			$value['sprite'] = 'http://www.aerth.fr/useless/necron/Necron_Night_Shroud.jpg';
			$value['pv'] = Shadow::PV;
			$value['cm'] = 150;
			$value['pp'] = Shadow::PP;
			$value['maneuver'] = 1;
			$value['weapons']['1'] = new navalspear();
			$value['weapons']['2'] = new navalspear();
			$value['size']['width'] = 1;
			$value['size']['height'] = 2;
			$value['name'] = 'Night Shadow';
			$value['pos'] = $kwargs['pos'];
			parent::__construct($value);
	}
	public static function doc(){
		if (file_exists('../docs/Shadow.doc.txt'))
			$doc = file_get_contents('../docs/Shadow.doc.txt');
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