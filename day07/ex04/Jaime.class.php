<?php
class Jaime extends Lannister {
	public function sleepWith ($person) {
		if (get_parent_class($this) === get_parent_class($person)
			&& $person->incest()) {
			print ("With pleasure, but only in a tower in Winterfell, then.".PHP_EOL);
			return ;
		}
		parent::sleepWith($person);
	}
}
?>
