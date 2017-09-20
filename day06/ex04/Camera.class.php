<?php
class Camera {

	private $_matrix;
	private $_translate;
	private $_rotate;
	private $_project;
	private $_translate_rotate;
	private $_origin;
	private $_width;
	private $_height;
	public static $verbose = false;

	function __construct(array $cam) {
		$this->_origin = $cam["origin"];
		$this->_translate = new Matrix(array("preset" => Matrix::TRANSLATION,
			"vtc" => (new Vector(array("dest" => $this->_origin)))->opposite()));
		$this->_rotate = $cam["orientation"];
		$this->_rotate = $this->_rotate->symmetry();
		if (isset($cam["ratio"])) {
			$ratio = $cam["ratio"];
			$this->_width = 1920;
			$this->_height = 1920 / $ratio;
		}
		else {
			$ratio = $cam["width"] / $cam["height"];
			$this->_width = $cam["width"];
			$this->_height = $cam["height"];
		}
		$fov = $cam["fov"];
		$near = $cam["near"];
		$far = $cam["far"];
		$this->_translate_rotate = $this->_rotate->mult($this->_translate);
		$this->_project = new Matrix(array("preset" => Matrix::PROJECTION,
			"fov" => $fov, "ratio" => $ratio, "far" => $far, "near" => $near));
		if (Camera::$verbose)
			echo ("Camera instance constructed".PHP_EOL);
	}
	function __destruct() {
		if (Camera::$verbose)
			echo ("Camera instance destructed".PHP_EOL);
	}
	function watchVertex(Vertex $vrtx) {
		$vrtx = $this->_project->transformVertex(
			$this->_translate_rotate->transformVertex($vrtx));
		$vrtx->__set("x", ($vrtx->__get("x") / ($this->_width / 2)) - 1);
		$vrtx->__set("y", ($vrtx->__get("y") / ($this->_height / 2)) - 1);
		return ($vrtx);
	}
	function doc() {
		return (file_get_contents("Camera.doc.txt"));
	}
	function __toString() {
		$str = "Camera(".PHP_EOL;
		$str.= "+ Origine: ".$this->_origin.PHP_EOL;
		$str.= "+ tT:".PHP_EOL;
		$str.= $this->_translate.PHP_EOL;
		$str.= "+ tR:".PHP_EOL;
		$str.= $this->_rotate.PHP_EOL;
		$str.= "+ tR->mult( tT ):".PHP_EOL;
		$str.= $this->_translate_rotate.PHP_EOL;
		$str.= "+ Proj:".PHP_EOL;
		$str.= $this->_project.PHP_EOL.")";
		return ($str);
	}
}
?>
