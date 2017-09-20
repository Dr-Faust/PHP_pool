#!/usr/bin/php
<?php
$file = fopen($argv[1], "r");
$str = fread($file, filesize($argv[1]));
preg_match_all('/<a(.+?)>(.+?)<\/a>/s', $str, $pattern);
$i = 0;
while ($pattern[2][$i])
{
    preg_match_all('/\<([^>]+)\>/' , $pattern[2][$i], $link);
    $str = str_replace($pattern[2][$i], strtoupper($pattern[2][$i]), $str);
    for ($j = 0; $j < count($link[0]); $j++)
        $str = str_replace(strtoupper($link[0][$j]), strtolower($link[0][$j]), $str);
    $i++;
}
$i = 0;
while ($pattern[0][$i])
{
    preg_match_all('/title="(.*?)"/', $pattern[0][$i], $title);
    for ($j = 0; $j < count($title[1]); $j++)
        $str = str_replace($title[1][$j], strtoupper($title[1][$j]), $str);
    $i++;
}
echo($str);
?>