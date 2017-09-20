<?php
class NightsWatch {
	private $_fighters;

	public function recruit($fighter) {
		if (array_key_exists("IFighter", class_implements($fighter)))
			$this->_fighters[] = $fighter;
	}
	public function fight() {
		foreach ($this->_fighters as $val)
			$val->fight();
	}
}
?>
