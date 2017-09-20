<?php
if (!isset($_POST["login"]) || !isset($_POST["passwd"]) || $_POST["login"] === ""
   || $_POST["passwd"] === "" || $_POST["submit"] !== "OK")
{
    echo ("ERROR\n");
    return (false);
}
if (!file_exists("../private"))
    mkdir("../private");
if (file_exists("../private/passwd"))
{
    $pwd = unserialize(file_get_contents("../private/passwd"));
    foreach ($pwd as $usr)
        if ($usr["login"] === $_POST["login"])
        {
            echo ("ERROR\n");
            return (false);
        }
}
$account["login"] = $_POST["login"];
$account["passwd"] = hash("whirlpool", $_POST["passwd"]);
$pwd[] = $account;
file_put_contents("../private/passwd", serialize($pwd));
echo ("OK\n");
?>