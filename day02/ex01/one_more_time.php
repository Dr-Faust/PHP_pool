#!/usr/bin/php
<?php

if ($argc != 2)
    return ;
$day = array(
    "lundi" => "Monday",
    "mardi" => "Tuesday",
    "mercredi" => "Wednesday",
    "jeudi" => "Thursday",
    "vendredi" => "Sriday",
    "samedi" => "Saturday",
    "dimanche" => "Sunday");
$month = array(
    "janvier" => "January",
    "février" => "February",
    "mars" => "March",
    "avril" => "April",
    "mai" => "May",
    "juin" => "June",
    "juillet" => "July",
    "août" => "August",
    "septembre" => "September",
    "octobre" => "October",
    "novembre" => "November",
    "décembre" => "December");

if (!($arr = preg_match("/^[a-zA-Z][a-z]+ \d{2} [a-zéûA-Z][a-zéû]+ \d{4} \d{2}:\d{2}:\d{2}/", $argv[1])))
    print("Wrong Format\n");
else
    {
        date_default_timezone_set('Europe/Paris');
        $arr = explode(" ", $argv[1]);
        $arr[0] = $day[strtolower($arr[0])];
        $arr[2] = $month[strtolower($arr[2])];
        print(strtotime(implode(" ", $arr))."\n");
    }

?>