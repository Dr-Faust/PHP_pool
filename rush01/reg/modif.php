<?PHP
	header('Location: index.html');
	function find_login($data_arr, $login)
	{
		foreach ($data_arr as $key => $value) {
			if ($value['login'] == $login) {
				return ($key);
			}
		}
		echo "ERROR\n";
		return (-1);
	}
	if ($_POST['submit'] == "OK" && $_POST['oldpw'] != "" && $_POST['newpw'] != "" && $_POST['login'] != "")
	{
		$data = unserialize(file_get_contents("../private/passwd"));
		if (($key = find_login($data, $_POST['login'])) < 0)
			return ;
		$pass = hash('whirlpool', "some_shit".$_POST['oldpw']);
		$oldpass = $data[$key]['passwd'];
		if ($pass == $oldpass)
		{
			$data[$key]['passwd'] = hash('whirlpool', "some_shit".$_POST['newpw']);
			file_put_contents("../private/passwd", serialize($data));
			echo "OK\n";
		}
		else
			echo "ERROR\n";
	}
	else
		echo "ERROR\n";
?>
