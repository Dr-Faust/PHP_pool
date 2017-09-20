#!/usr/bin/php
<?php
$argv[1] = trim($argv[1]);
$arr = explode(" ", $argv[1]);
$arr = array_filter($arr);
$i = 0;
foreach($arr as $elem)
{
	if ($i)
		print("$elem ");
	else
		$i = 1;
}
if ($arr[0])
	print("$arr[0]\n");
?>
