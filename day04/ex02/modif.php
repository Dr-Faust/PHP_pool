<?php
if (!isset($_POST["login"]) || !isset($_POST["oldpw"]) || !isset($_POST["newpw"])
    || $_POST["login"] === "" || $_POST["oldpw"] === "" || $_POST["newpw"] === ""
    || $_POST["oldpw"] === $_POST["newpw"] || $_POST["submit"] !== "OK"
    || !file_exists("../private/passwd"))
{
    echo ("ERROR\n");
    return (false);
}
$pwd = unserialize(file_get_contents("../private/passwd"));
foreach ($pwd as $usr)
    if ($usr["login"] === $_POST["login"])
        if ($usr["passwd"] === hash("whirlpool", $_POST["oldpw"]))
        {
            $usr["passwd"] = hash("whirlpool", $_POST["newpw"]);
            file_put_contents("../private/passwd", serialize($pwd));
            echo ("OK\n");
            return (true);
        }
echo ("ERROR\n");
return (false);
?>