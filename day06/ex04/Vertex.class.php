<?php
class Vertex {

	private $_x;
	private $_y;
	private $_z;
	private $_w;
	private $_color;
	public static $verbose = false;
	
	function __construct(array $coords) {
		$this->_x = (isset($coords["x"])) ? $coords["x"] : 0;
		$this->_y = (isset($coords["y"])) ? $coords["y"] : 0;
		$this->_z = (isset($coords["z"])) ? $coords["z"] : 0;
		$this->_w = (isset($coords["w"])) ? $coords["w"] : 1.0;
		$this->_color = (isset($coords["color"])) ? $coords["color"]
			: new Color(array("red" => 255, "green" => 255, "blue" => 255));
		if (Vertex::$verbose) {
			echo ($this->__toString()." constructed".PHP_EOL);
		}
	}
	function __destruct() {
		if (Vertex::$verbose) {
			echo ($this->__toString()." destructed".PHP_EOL);	
		}
	}
	function doc() {
		return (file_get_contents("Vertex.doc.txt"));
	}
	function __get($private) {
		if ($private === "x")
			return ($this->_x);
		else if ($private === "y")
			return ($this->_y);
		else if ($private === "z")
			return ($this->_z);
		else if ($private === "w")
			return ($this->_w);
		else if ($private === "color")
			return ($this->_color);
		else
			throw new Exeption("Uncaught Exception");
	}
/*	function __set($private, $val) {
		if ($private === "x")
			$this->_x = $val;
		else if ($private === "y")
			$this->_y = $val;
		else if ($private === "z")
			$this->_z = $val;
		else if ($private === "w")
			$this->_w = $val;
		else if ($private === "color")
			$this->_color = $val;
		else
			throw new Exeption("Uncaught Exception");
}*/
	function __toString() {
		$str = "Vertex( x: ".number_format($this->_x, 2).", y: ".
			number_format($this->_y, 2).", z: ". number_format($this->_z, 2).
			" w: ".number_format($this->_w, 2);
		if (Vertex::$verbose) {
			if (isset($this->_color))
				$str.= ", color: ".$this->_color->__toString();
		}
		$str.= " )";
		return ($str);
	}
}
?>
