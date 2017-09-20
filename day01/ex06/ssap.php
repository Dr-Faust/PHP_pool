#!/usr/bin/php
<?php
$arr = array();
for ($i = 1; $i < $argc; $i++)
{
	$argv[$i] = trim($argv[$i]);
	while(strpos($argv[$i], "  "))
		$argv[$i] = str_replace("  ", " ", $argv[$i]);
	$elem = explode(" ", $argv[$i]);
	$arr = array_merge($arr, $elem);
}
sort($arr);
foreach($arr as $elem)
	print("$elem\n");
?>
