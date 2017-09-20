<?PHP
	date_default_timezone_set("Europe/Kiev");
	session_start();
	function ft_count($arr)
	{
		for ($i = 0; $arr[$i]; $i++)
			;
		return ($i);
	}
	if ($_SESSION['loggued_on_user'] != "")
	{
		if (file_exists("../private/chat"))
		{
			echo "<meta http-equiv=\"refresh\" content=\"5\">";
			$fd = fopen("../private/chat", "r+");
			flock($fd, LOCK_SH);
			$data = unserialize(file_get_contents("../private/chat"));
			flock($fd, LOCK_UN);
			fclose($fd);
			if ($data)
			{
				$count = ft_count($data);
				while (--$count >= 0)
					echo date("[H:s] <b>", $data[$count]["time"]).$data[$count]["user"]."</b>: ".$data[$count]["msg"]."<br />\n";
			}
		}
	}
	else
		echo "ERROR\n";
?>
