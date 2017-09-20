<?php
include 'auth.php';
if (session_status() == PHP_SESSION_NONE)
	session_start();
if ($_POST['submit'] == 'Sign in')
{
    if (isset($_POST['login']) && isset($_POST['passwd']))
    {
        if ((auth($_POST['login'], $_POST['passwd'])) === TRUE)
            {
            $_SESSION['loggued_on_user'] = $_POST['login'];
            header("Location: lobi.php");
            }
    }
    else
        $_SESSION['loggued_on_user'] = NULL;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Warhammer 4000</title>
    <link rel="stylesheet" href="index.css"/>
</head>
<body>
    <div>
        <form method="post" action="index.php">
            <input type="text" name="login" placeholder="Login" value=<?=$_POST['login'];?>><br></br>
            <input type="password" name="passwd" placeholder="Password"/><br></br>
            <input type="submit" name="submit" value="Sign in"/>
            <a href="create.php">Create new account</a>
        </form>
    </div>
</body>
</html>