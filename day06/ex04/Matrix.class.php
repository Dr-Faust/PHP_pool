<?php
class Matrix {

	const IDENTITY = 1;
	const SCALE = 2;
	const RX = 3;
	const RY = 4;
	const RZ = 5;
	const TRANSLATION = 6;
	const PROJECTION = 7;

	public static $verbose = false;
	private $_mtrx;
	private $_preset;

	function __construct(array $matrix) {
		$this->_mtrx = array();
		for ($i = 0; $i < 4; $i++)
			$this->_mtrx[$i] = array(0, 0, 0, 0);
		$this->_preset = $matrix["preset"];
		if ($this->_preset == Matrix::IDENTITY) {
			if (Matrix::$verbose) {
				echo ("Matrix IDENTITY instance constructed".PHP_EOL);
			}
			$this->_mtrx[0][0] = 1;
			$this->_mtrx[1][1] = 1;
			$this->_mtrx[2][2] = 1;
			$this->_mtrx[3][3] = 1;
		}
		else if ($this->_preset == Matrix::TRANSLATION) {
			if (Matrix::$verbose)
				echo ("Matrix TRANSLATION preset instance constructed".PHP_EOL);
			$this->_mtrx[0][0] = 1;
			$this->_mtrx[1][1] = 1;
			$this->_mtrx[2][2] = 1;
			$this->_mtrx[3][3] = 1;
			$this->_mtrx[0][3] = $matrix["vtc"]->__get("x");
			$this->_mtrx[1][3] = $matrix["vtc"]->__get("y");
			$this->_mtrx[2][3] = $matrix["vtc"]->__get("z");
		}
		else if ($this->_preset == Matrix::SCALE) {
			if (Matrix::$verbose)
				echo ("Matrix SCALE preset instance constructed".PHP_EOL);
			$this->_mtrx[0][0] = $matrix["scale"];
			$this->_mtrx[1][1] = $matrix["scale"];
			$this->_mtrx[2][2] = $matrix["scale"];
			$this->_mtrx[3][3] = 1;
		}
		else if ($this->_preset == Matrix::RX) {
			if (Matrix::$verbose)
				echo ("Matrix Ox ROTATION preset instance constructed".PHP_EOL);
			$this->_mtrx[0][0] = 1;
			$this->_mtrx[1][1] = cos($matrix["angle"]);
			$this->_mtrx[1][2] = -sin($matrix["angle"]);
			$this->_mtrx[2][1] = sin($matrix["angle"]);
			$this->_mtrx[2][2] = cos($matrix["angle"]);
			$this->_mtrx[3][3] = 1;
		}
		else if ($this->_preset == Matrix::RY) {
			if (Matrix::$verbose)
				echo ("Matrix Oy ROTATION preset instance constructed".PHP_EOL);
			$this->_mtrx[0][0] = cos($matrix["angle"]);
			$this->_mtrx[0][2] = sin($matrix["angle"]);
			$this->_mtrx[1][1] = 1;
			$this->_mtrx[2][0] = -sin($matrix["angle"]);
			$this->_mtrx[2][2] = cos($matrix["angle"]);
			$this->_mtrx[3][3] = 1;
		}
		else if ($this->_preset == Matrix::RZ) {
			if (Matrix::$verbose)
				echo ("Matrix Oz ROTATION preset instance constructed".PHP_EOL);
			$this->_mtrx[0][0] = cos($matrix["angle"]);
			$this->_mtrx[0][1] = -sin($matrix["angle"]);
			$this->_mtrx[1][0] = sin($matrix["angle"]);
			$this->_mtrx[1][1] = cos($matrix["angle"]);
			$this->_mtrx[2][2] = 1;
			$this->_mtrx[3][3] = 1;
		}
		else if ($this->_preset == Matrix::PROJECTION) {
			if (Matrix::$verbose)
				echo ("Matrix PROJECTION preset instance constructed".PHP_EOL);
			$fov = 1 / tan($matrix["fov"] / 2 / 180. * M_PI);
			$this->_mtrx[0][0] = $fov / $matrix["ratio"];
			$this->_mtrx[1][1] = $fov;
			$this->_mtrx[2][2] = -($matrix["far"] + $matrix["near"]) / 
				($matrix["far"] - $matrix["near"]);
			$this->_mtrx[3][2] = -1;
			$this->_mtrx[2][3] = (2 * $matrix["near"] * $matrix["far"]) /
				($matrix["near"] - $matrix["far"]);
		}
	}
	function __destruct() {
		if (Matrix::$verbose)
			echo ("Matrix instance destructed".PHP_EOL);
	}
	function mult(Matrix $rhs) {
		$matrix = array();
		for ($i = 0; $i < 4; $i++)
			$matrix[$i] = array(0, 0, 0, 0);
		for ($x = 0; $x < 4; $x++)
			for ($y = 0; $y < 4; $y++)
				$matrix[$x][$y] = $this->_mtrx[$x][0] * $rhs->_mtrx[0][$y] +
					$this->_mtrx[$x][1] * $rhs->_mtrx[1][$y] +
					$this->_mtrx[$x][2] * $rhs->_mtrx[2][$y] +
					$this->_mtrx[$x][3] * $rhs->_mtrx[3][$y];
		$flag = Matrix::$verbose;
		Matrix::$verbose = false;
		$new = new Matrix(array("preset" => ""));
		$new->_mtrx = $matrix;
		Matrix::$verbose = $flag;
		return ($new);
	}
	function transformVertex(Vertex $vrtx) {
		$arr["x"] = $vrtx->__get("x") * $this->_mtrx[0][0] +
			$vrtx->__get("y") * $this->_mtrx[0][1] +
			$vrtx->__get("z") * $this->_mtrx[0][2] +
			$vrtx->__get("w") * $this->_mtrx[0][3];
		$arr["y"] = $vrtx->__get("x") * $this->_mtrx[1][0] +
			$vrtx->__get("y") * $this->_mtrx[1][1] +
			$vrtx->__get("z") * $this->_mtrx[1][2] +
			$vrtx->__get("w") * $this->_mtrx[1][3];
		$arr["z"] = $vrtx->__get("x") * $this->_mtrx[2][0] +
			$vrtx->__get("y") * $this->_mtrx[2][1] +
			$vrtx->__get("z") * $this->_mtrx[2][2] +
			$vrtx->__get("w") * $this->_mtrx[2][3];
		$arr["w"] = 1;
		$arr["color"] = $vrtx->__get("color");
		return (new Vertex($arr));
	}
	function symmetry() {
		$arr = array();
		for ($i = 0; $i < 4; $i++)
			$arr[$i] = array(0, 0, 0, 0);
		for ($x = 0; $x < 4; $x++)
			for($y = 0; $y < 4; $y++)
				$arr[$x][$y] = $this->_mtrx[$y][$x];
		$flag = Matrix::$verbose;
		Matrix::$verbose = false;
		$new = new Matrix(array("preset" => ""));
		$new->_mtrx = $arr;
		Matrix::$verbose = $flag;
		return ($new);
	}
	function doc() {
		return (file_get_contents("Matrix.doc.txt"));
	}
	function __toString() {
		$str = "M | vtcX | vtcY | vtcZ | vtxO".PHP_EOL;
		$str.= "-----------------------------".PHP_EOL;
		$str.= "x | ".number_format($this->_mtrx[0][0], 2)." | ".
			number_format($this->_mtrx[0][1], 2)." | ".
			number_format($this->_mtrx[0][2], 2)." | ".
			number_format($this->_mtrx[0][3], 2).PHP_EOL;
		$str.= "y | ".number_format($this->_mtrx[1][0], 2)." | ".
			number_format($this->_mtrx[1][1], 2)." | ".
			number_format($this->_mtrx[1][2], 2)." | ".
			number_format($this->_mtrx[1][3], 2).PHP_EOL;
		$str.= "z | ".number_format($this->_mtrx[2][0], 2)." | ".
			number_format($this->_mtrx[2][1], 2)." | ".
			number_format($this->_mtrx[2][2], 2)." | ".
			number_format($this->_mtrx[2][3], 2).PHP_EOL;
		$str.= "w | ".number_format($this->_mtrx[3][0], 2)." | ".
			number_format($this->_mtrx[3][1], 2)." | ".
			number_format($this->_mtrx[3][2], 2)." | ".
			number_format($this->_mtrx[3][3], 2);
		return ($str);
	}
}
?>
