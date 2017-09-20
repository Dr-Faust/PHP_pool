#!/usr/bin/php
<?php
function ft_is_sort($arr)
{
	$len = count($arr);
	$tmp = $arr;
	sort($tmp);
	for ($i = 0; $i < $len; $i++)
		if (strcmp($tmp[$i], $arr[$i]))
			return (false);
	return (true);
}
?>
