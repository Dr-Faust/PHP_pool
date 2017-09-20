	<?php
		include 'Ship.php';
		include 'game.php';
		if (session_status() == PHP_SESSION_NONE)
			session_start();
	?>
<html>
<head>
      <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div id="panel">
    <h2 style="text-align: center;" id="PhaseName">Player panel</h2>
        <div>
      	<p>Mouvements</p>
      	    <form action="Moves.php" name="move" method="POST">
      	     <select style='width:150px;' name="ship">
      	    <?php display_name()?>
      	    </select>
      		<input width="100px" type="number" min="-50" max="50" name="movenb" id="movenb"  placeholder="move">
      		<button type="submit">go</button>
      		</form>
		</div>
      </div>
</body>
</html>
<?php 
	$game = $_SESSION['game'];
	foreach ($game->getShip() as $key => $value) {
			posship($value, $key);
	}
 ?>