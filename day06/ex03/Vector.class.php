<?php

require_once 'Color.class.php';
require_once 'Vertex.class.php';

class Vector {

	private $_x;
	private $_y;
	private $_z;
	private $_w;
	private $_color;
	public static $verbose = false;
	
	function __construct(array $arr_vrtx) {
		if (isset($arr_vrtx["dest"])) {
			$this->_x = $arr_vrtx["dest"]->__get("x");
			$this->_y = $arr_vrtx["dest"]->__get("y");
			$this->_z = $arr_vrtx["dest"]->__get("z");
		}
		if (isset($arr_vrtx["orig"])) {
			$this->_x -= $arr_vrtx["orig"]->__get("x");
			$this->_y -= $arr_vrtx["orig"]->__get("y");
			$this->_z -= $arr_vrtx["orig"]->__get("z");
		}
		if (Vector::$verbose) {
			echo ($this->__toString($arr_vrtx)." constructed".PHP_EOL);
		}
	}
	function __destruct() {
		if (Vector::$verbose)
			echo ($this->__toString()." destructed".PHP_EOL);
	}
	function doc() {
		return (file_get_contents("Vector.doc.txt"));
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
	function magnitude() {
		return (sqrt(pow($this->_x, 2) + pow($this->_y, 2) + pow($this->_z, 2)));
	}
	function normalize() {
		if ($this->magnitude() == 0) {
			return (new Vector(array("dest" => new Vertex(array("x" => 0,
				"y" => 0, "z" => 0, "w", 0)))));
		}
		return (new Vector(array("dest" => new Vertex(array(
			"x" => $this->_x / $this->magnitude(),
			"y" => $this->_y / $this->magnitude(),
			"z" => $this->_z / $this->magnitude(),
			"w" => 1)))));
	}
	function add(Vector $rhs) {
		return (new Vector(array("dest" => new Vertex(array(
			"x" => $this->_x + $rhs->__get("x"),
			"y" => $this->_y + $rhs->__get("y"),
			"z" => $this->_z + $rhs->__get("z"),
			"w" => 1)))));
	}
	function sub(Vector $rhs) {
		return (new Vector(array("dest" => new Vertex(array(
			"x" => $this->_x - $rhs->__get("x"),
			"y" => $this->_y - $rhs->__get("y"),
			"z" => $this->_z - $rhs->__get("z"),
			"w" => 1)))));
	}
	function opposite() {
		return (new Vector(array("dest" => new Vertex(array(
			"x" => -$this->_x,
			"y" => -$this->_y,
			"z" => -$this->_z,
			"w" => 1)))));
	}
	function scalarProduct($k) {
		return (new Vector(array("dest" => new Vertex(array(
			"x" => $this->_x * $k,
			"y" => $this->_y * $k,
			"z" => $this->_z * $k,
			"w" => 1)))));
	}
	function dotProduct(Vector $rhs) {
		return ($this->_x * $rhs->__get("x") + $this->_y * $rhs->__get("y") +
			$this->_z * $rhs->__get("z"));
	}
	function cos(Vector $rhs) {
		$len = $this->magnitude() * $rhs->magnitude();
		if ($len == 0) {
			return (0);
		}
		return ($this->dotProduct($rhs) / $len);
	}
	function crossProduct(Vector $rhs) {
		return (new Vector(array("dest" => new Vertex(array(
			"x" => $this->_y * $rhs->__get("z") - $this->_z * $rhs->__get("y"),
			"y" => $this->_z * $rhs->__get("x") - $this->_x * $rhs->__get("z"),
			"z" => $this->_x * $rhs->__get("y") - $this->_y * $rhs->__get("x")
			)))));
	}
	function __toString() {
		$str = "Vector( x: ".number_format($this->_x, 2).", y: ".
			number_format($this->_y, 2).", z: ".
			number_format($this->_z, 2).", w: ".
			number_format($this->_w, 2)." )";;
		return ($str);
	}
}
?>
