<?php
	if (session_status() == PHP_SESSION_NONE)
		session_start();
	if (isset($_POST['submit'])){
		switch ($_POST['submit']) {
			case '500':
				$_SESSION['Points'] = 500;
				break;
			case '1000':
				$_SESSION['Points'] = 1000;
				break;
			case '1500':
				$_SESSION['Points'] = 1500;
				break;
			case 'Necron':
				$_SESSION['Army'] = 'Necron';
				header("Location: necron.php");
				break;
			case 'Tau':
				$_SESSION['Army'] = 'Tau';
				header("Location: tau.php");
				break;
			case 'Imperium':
				$_SESSION['Army'] = 'Imperium';
				header("Location: Imperium.php");
				break;
			default:
				break;
		}
	}
?>
<HTML>
  <HEAD>
    <META charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
     <TITLE>Rush01</TITLE>
  </HEAD>
	<body>
	<div class="banner">
		
		<?php if (!isset($_SESSION['Points']))
				{
		?>
		<img class="banner" src="img/level.png">
		<form action="index.php" method="POST">
        	<button type="submit" name="submit" value="500">Level 1 (500 Points)</button>
        	<button type="submit" name="submit" value="1000">Level 2 (1000 Points)</button>
        	<button type="submit" name="submit" value="1500">Level 3 (1500 Points)</button>
        </form>	
        <?php
    		}
        	else
        	{
        ?>
        <img class="banner" src="img/faction.png">
        <form class="numtwo" action="index.php" method="POST">
        	<button type="submit" name="submit" value="Necron">Necrons</button>
        	<button type="submit" name="submit" value="Tau">Tau</button>
        	<button type="submit" name="submit" value="Imperium">Imperium</button>
        </form>		
        <?php
        	}
        ?>
	</div>

	</body>
</HTML>
