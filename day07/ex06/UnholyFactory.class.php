<?php
class UnholyFactory {
	private $_fighters;

	public function __construct() {
		$this->_fighters = array();
	}
	public function absorb($fighter) {
		if ($fighter instanceof Fighter) {
			foreach ($this->_fighters as $f)
				if ($f->get_type() === $fighter->get_type()) {
					print ("(Factory already absorbed a fighter of type ".
						$fighter->get_type().")".PHP_EOL);
					return ;
				}
			$this->_fighters[] = $fighter;
			print ("(Factory absorbed a fighter of type ".
				$fighter->get_type().")".PHP_EOL);
		}
		else
			print ("(Factory can't absorb this, it's not a fighter)".PHP_EOL);
	}
	public function fabricate($rf) {
		$flag = false;
		foreach ($this->_fighters as $f)
			if ($f->get_type() === $rf) {
				print ("(Factory fabricates a fighter of type ".
					$f->get_type().")".PHP_EOL);
				$flag = true;
				break ;
			}
		if ($flag)
			return ($f);
		else
			print ("(Factory hasn't absorbed any fighter of type "
					.$rf.")".PHP_EOL);
		return (null);
	}
}
?>
