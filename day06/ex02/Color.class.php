<?php
class Color {
	
	public $red;
	public $green;
	public $blue;
	public static $verbose = false;

	function __construct(array $color) {
		if (isset($color["red"]) && isset($color["green"])
			&& isset($color["blue"])) {
			$this->red = (int)$color["red"];
			$this->green = (int)$color["green"];
			$this->blue = (int)$color["blue"];
		}
		else if (isset($color["rgb"])) {
			$this->red = ((int)$color["rgb"] >> 16) & 0xFF;
			$this->green = ((int)$color["rgb"] >> 8) & 0xFF;
			$this->blue = ((int)$color["rgb"]) & 0xFF;
		}
		if (Color::$verbose) {
			echo ($this->__toString()." constructed.".PHP_EOL);
		}
	}
	function __destruct() {
		if (Color::$verbose) {
			echo ($this->__toString()." destructed.".PHP_EOL);	
		}
	}
	function add(Color $clr) {
		$ret_clr = new Color(array("red" => $this->red + $clr->red,
			"green" => $this->green + $clr->green,
			"blue" => $this->blue + $clr->blue));
		return ($ret_clr);
	}
	function sub(Color $clr) {
		$ret_clr = new Color(array("red" => $this->red - $clr->red,
			"green" => $this->green - $clr->green,
			"blue" => $this->blue - $clr->blue));
		return ($ret_clr);	
	}
	function mult($mltpr) {
		$ret_clr = new Color(array("red" => $this->red * $mltpr,
			"green" => $this->green * $mltpr,
			"blue" => $this->blue * $mltpr));
		return ($ret_clr);
	}
	function doc() {
		return (file_get_contents("Color.doc.txt"));
	}
	function __toString() {
		$str = "Color( red: ";
		if ($this->red < 100) {
			$str.= " ";
		}
		if ($this->red < 10) {
			$str.= " ";
		}
		$str.= $this->red.", green: ";
		if ($this->green < 100) {
			$str.= " ";
		}
		if ($this->green < 10) {
			$str.= " ";
		}
		$str.= $this->green.", blue: ";
		if ($this->blue < 100) {
			$str.= " ";
		}
		if ($this->blue < 10) {
			$str.= " ";
		}
		$str.= $this->blue." )";
		return ($str);
	}
}
?>
