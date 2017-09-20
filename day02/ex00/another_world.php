#!/usr/bin/php
<?php
print(trim(preg_replace('/\s\s+/', " ", $argv[1]))."\n");
?>