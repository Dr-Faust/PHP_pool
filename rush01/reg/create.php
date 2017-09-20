<?PHP
	function 	check_passwd_path()
	{
		if (!(file_exists("../private")))
			mkdir("../private");
	}
	function 	account_create($email, $passwd, $login)
	{
		if (!(file_exists('../private/passwd')))
			touch('../private/passwd');
		if ($filecontent = file_get_contents('../private/passwd'))
		{
			$db = unserialize($filecontent);
			foreach ($db as $k)
			{
				if ($k['email'] == $email)
				{
					$_POST['E-mail'] = "'E-mail already exists'"; 
				 	return false;
				}
                if ($k['login'] == $login)
				{
					$_POST['Login'] = "'Login already used'"; 
				 	return false;
				}
			}
		}
		$account = [];
		$account['email'] = $email;
        $account['login'] = $login;
		$account['passwd'] = hash('whirlpool', $passwd);
        $account['player'] = 0;
		$db[] = $account;
		file_put_contents('../private/passwd', serialize($db));
		return true;
	}
	if (!($_SESSION['loggued_on_user']))
	{	
			if ($_POST['submit'] == 'Register')
			{
				if ($_POST['email'] && $_POST['login'] && $_POST['passwd'] && $_POST['conf_passwd'])
				{
					if ($_POST['passwd'] == $_POST['conf_passwd'])
					{	
						check_passwd_path();
						if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
						{
							if (account_create($_POST['email'], $_POST['passwd'], $_POST['login']) === true)
							{
								var_dump($_POST);
								header('Location: index.php');
							}
						}
					}
				}
				else
				{
					$_POST['passwd'] = $_POST['passwd'];
					$_POST['login'] = $_POST['login'];
				}
			}
	}
	else
		header('Location: index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Warhammer 40000</title>
    <link rel="stylesheet" href="create.css"/>
</head>
<body>
   <div>
    <form method="post" action="create.php">
        <tbody>
        <tr>
            <td><h1>Create new account</h1></td>
            <td><input type="email" name="email" placeholder="E-mail"/></td><br></br>
            <td><input type="text" name="login" placeholder="Login"/></td><br></br>
            <td><input type="password" name="passwd" placeholder="Password"/></td><br></br>
            <td><input type="password" name="conf_passwd" placeholder="Confirm password"/></td><br></br>
            <td><a href="../lobi/lobi.html"><input type="submit" name="submit" value="Register"/></a>&nbsp&nbsp&nbsp&nbsp</td>
        </tr>
        </tbody>
    </form>
    </div>
</body>
</html>