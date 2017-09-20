#!/usr/bin/php
<?php

if ($argc != 4)
{
	printf ("Incorrect Parameters\n");
	return (0);
}
$argv[1] = trim($argv[1]);
$argv[2] = trim($argv[2]);
$argv[3] = trim($argv[3]);
if ($argv[2] == "+")
{
	print($argv[1] + $argv[3]);
	print("\n");
	return (0);
}
if ($argv[2] == "-")
{ 
	print($argv[1] - $argv[3]);
	print("\n");
	return (0);
}
if ($argv[2] == "/")
{
	print($argv[1] / $argv[3]);
	print("\n");
	return (0);
}
if ($argv[2] == "%")
{
	print($argv[1] % $argv[3]);
	print("\n");
	return (0);
}
else 
{ 	 
	print($argv[1] * $argv[3]);
	print("\n");
	return (0);
}
return (0);
?>
