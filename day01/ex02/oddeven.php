#!/usr/bin/php
<?php
print("Enter a number: ");
while ($numb = fgets(STDIN))
{
	$numb = trim($numb);
	if (!is_numeric($numb))
		print("'$numb' is not a number\n");
	else if ($numb % 2 == 0)
		print("The number $numb is even\n");
	else
		print("The number $numb is odd\n");
	print("Enter a number: ");
}
?>
