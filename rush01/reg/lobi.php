<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lobby</title>
    <link rel="stylesheet" href="lobi.css"/>
</head>
<body>
   
    <div class="main">
       <div class="maindiv">
			<div style="font-family: 'Raleway', Arial, sans-serif; font-size:40px; width: 100%; float: left; margin-top: 5px;">Chat</div>

			<div style="position: relative; width: 30%; float: left; height: 20px;"></div>
			<div style="position: relative; width: 40%; float: left; border: 0px; font-size: 20px; margin-top: 10px;">
				<a style="display:block;" href="logout.php">LOG OUT</a>
			</div>
			<div style="float: left: text-align:center; width: 600px; margin-left: 150px;">
				<iframe name="chat" src="chat.php" width="100%" height="550px" style="border: solid 2px; margin-top: 25px;"></iframe>
				<iframe name="speak" src="speak.php" width="100%" height="50px" style="border: solid 2px;"></iframe>
			</div>
		</div>
        <div class="newgame">
            <a href="game/index.php"> <img src="play-button.png" alt=""> </a>
        </div>
    </div>
</body>
</html>