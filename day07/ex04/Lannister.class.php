<?php
class Lannister {
	public function sleepWith($person) {
		if (get_parent_class($this) === get_parent_class($person))
			print ("Not even if I'm drunk !".PHP_EOL);
		else
			print ("Let's do this.".PHP_EOL);
	}
	public function incest() {
		return (true);
	}
}
?>
