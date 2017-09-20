#!/usr/bin/php
<?php
$flag = 0;
foreach ($argv as $elem)
{
	if (!$flag)
	{
		$flag++;
		continue ;
	}
	print("$elem\n");
}
?>
