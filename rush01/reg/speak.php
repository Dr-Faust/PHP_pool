<?PHP
	date_default_timezone_set("Europe/Kiev");
	session_start();
	if ($_SESSION['loggued_on_user'] != "")
	{
		if ($_POST['msg'])
		{
			if (file_exists("../private/chat"))
			{
				$fd = fopen("../private/chat", "r+");
				flock($fd, LOCK_EX);
				$data = unserialize(file_get_contents("../private/chat"));
			}
			$data[] = array("user" => $_SESSION['loggued_on_user'], "time" => time(), "msg" => $_POST['msg']);
			file_put_contents("../private/chat", serialize($data));
			flock($fd, LOCK_UN);
			fclose($fd);
		}
		echo "<!DOCTYPE html>\n";
		echo "<html>\n";
		echo "<head>\n";
		echo "<meta charset=\"utf-8\">\n";
		echo "<script language=\"javascript\">top.frames['chat'].location = 'chat.php';</script>\n";
		echo "<title>Speak chat page</title>\n";
		echo "</head>\n";
		echo "<body>\n";
		echo "<div style=\"height:100%;\">\n";
		echo "<form action=\"speak.php\" method=\"post\">\n";
		echo "<div style=\"float:left; height: 40px;\">\n";
		echo "<textarea name=\"msg\" rows=\"2\" cols=\"80\" style=\"font-size:12px;\"></textarea>\n";
		echo "</div>\n";
		echo "<div style=\"float:left; width:60px; height: 100%;\">\n";
		echo "<button type=\"submit\" name=\"submit\" value=\"OK\" style=\"width: 50px; height: 25px; margin-left:20px; margin-top: 3px;\">OK</button>\n";
		echo "</div>\n";
		echo "</form>\n";
		echo "</div>\n";
		echo "\n";
		echo "\n";
		echo "</body>\n";
		echo "</html>\n";
	}
	else
		echo "ERROR\n";
?>
