#!/usr/bin/php
<?php
$arr = array();
$i = 1;
while ($i <= $argc)
{
	$tmp = array_filter(explode(" ", $argv[$i++]));
	$arr = array_merge($arr, $tmp);
}
usort($arr, "strnatcasecmp");
$len = count($arr);
$i = 0;
$tmp = array();
while ($i < $len)
{
	if (ctype_alpha($arr[$i]))
		print($arr[$i]."\n");
	else
		$tmp[] = $arr[$i];
	$i++;
}
$arr = $tmp;
sort($arr);
$tmp = array();
$arr = array_filter($arr);
$len = count($arr);
$i = 0;
while ($i < $len)
{
	if (is_numeric($arr[$i]) && strlen($arr[$i]) > 0)
		print($arr[$i]."\n");
	else
		$tmp[] = $arr[$i];
	$i++;
}
$arr = $tmp;
$arr = array_filter($arr);
$len = count($arr);
$i = 0;
$j = 1;
while ($i < $len)
{
	print($arr[$i++]."\n");	
}
?>
