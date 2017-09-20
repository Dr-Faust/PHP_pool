<?php
session_start();
if ($_GET["submit"] == "OK")
{
    $_SESSION["login"] = $_GET["login"];
    $_SESSION["passwd"] = $_GET["passwd"];
}
?>
<html>
    <head>
        <title>Exercise 00 : Session</title>
        <style>
            body {font-family:Comic Sans; text-align: center;}
            h1 {text-align: center;}
            .field {
                width: 300px;
                height: 110px;
                margin-right: auto;
                margin-left: auto;
                margin-top: auto;
                border-style: outset;
                border-radius: 10px;
                box-shadow: 10px 10px 10px #000000;
            }
        </style>
    </head>
    <body background="https://wallpaperscraft.com/image/star_art_sky_night_people_silhouette_98142_3840x2400.jpg">
        <h1>Exercise 00 : Session</h1>
        <br />
        <div class="field">
            <form action="index.php" method="get" >
                <p>Login: &nbsp &nbsp &nbsp &nbsp<input type="text" name="login" value="<?php
                    if ($_SESSION["login"] !== false)
                        echo $_SESSION["login"];
                    ?>">
                </p>
                <p>Password: &nbsp<input type="text" name="passwd" value="<?php
                    if ($_SESSION["passwd"] !== false)
                        echo $_SESSION["passwd"];
                    ?>">
                </p>
                <button type="submit" name="submit" value="OK">Submit</button>
            </form>
        </div>
    </body>
<html>