<?php
function auth($login, $passwd)
{
    if (file_exists("../private/passwd"))
    {
        $pwd = unserialize(file_get_contents("../private/passwd"));
        foreach ($pwd as $usr)
            if ($usr["login"] === $login)
                if ($usr["passwd"] === hash("whirlpool", $passwd))
                    return (true);
    }
    else
        return (false);
}
?>