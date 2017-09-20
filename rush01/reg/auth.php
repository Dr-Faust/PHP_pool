<?PHP
	if (session_status() == PHP_SESSION_NONE)
		session_start();
	function 	user_exist($login, $db)
	{
		foreach ($db as $l => $log)
		{
			if ($log['login'] == $login) 
			 	return $l;
		}
		return (FALSE);
	}
	function auth($login, $passwd)
	{
		if ($login && $passwd)
		{
			$filecontent = file_get_contents('../private/passwd');
			$db = unserialize($filecontent);
			if (($n = user_exist($login, $db)) !== FALSE)
			{
				if ($db[$n]['passwd'] == hash('whirlpool', $passwd))
				{
					$_SESSION['player'] = $db[$n]['player'];
					return (TRUE);
				}
				else
					return (FALSE);
			}
			else
				return (FALSE);
		}
		else
			return (FALSE);
	}
?>