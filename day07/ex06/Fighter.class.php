<?php
abstract class Fighter {
	protected $_type = "fighter";

	public function __construct($class) {
		$this->_type = $class;
	}
	abstract public function fight($target);
	public function get_type() {
		return ($this->_type);
	}
}
?>
