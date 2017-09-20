<?php
        if (session_status() == PHP_SESSION_NONE)
            session_start();
        if (!array_key_exists('spent', $_SESSION))
            $_SESSION['spent'] = 0;
        if (isset($_POST['submit'])){
            switch ($_POST['submit']) {
                case 'add_Ore':
                    $_SESSION['ships'][] = 'Ore';
                    $_SESSION['spent'] += 300;
                    break;
                case 'add_Porrui':
                    $_SESSION['ships'][] = 'Porrui';
                    $_SESSION['spent'] += 100;
                    break;
                case 'add_Tiger':
                    $_SESSION['ships'][] = 'Tiger';
                    $_SESSION['spent'] += 50;
                    break;
                default:
                    break;
            }
        }
        if ($_SESSION['Points'] == $_SESSION['spent'])
            header('Location: game.php');

?>
<HTML>
  <HEAD>
    <META charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <TITLE>Rush01</TITLE>
  </HEAD>
	   <body class="necron">
      <h1 style='text-align: center;'> <?php echo  "Spent : " . $_SESSION['spent']; ?> </h1>
    <div class="list_vaisseau">
      <ul>
        <li>
        <br > 
        <h2>Battleship</h2>
        <div>
          <img width="600px" height="300px" src="img/517.jpg">
        </div>
        <br>
        <?php
          if ($_SESSION['Points'] - $_SESSION['spent'] >= 300)
                {
        ?>
        <form action="tau.php" method="POST">
        <button type="submit" name="submit" value="add_Ore">ADD: 300 Points</button>
        </form>
        <?php
                }
        ?>
        <br>
        <li>
        <li>
                <h2>Fury</h2>
        <div>
          <img width="600px" src="img/Manta9.jpg">
        </div>
        <br>
        <?php
          if ($_SESSION['Points'] - $_SESSION['spent'] >= 100)
                {
        ?>
        <form action="tau.php" method="POST">
        <button type="submit" name="submit" value="add_Porrui">ADD: 100 Points</button>
        </form>
        <?php
                }
        ?>
        </li>
        <li>
                <h2>Tiger Shark</h2>
        <div>
          <img src="img/TigerSharkArt.jpg">
        </div>
         <br>
        <?php
          if ($_SESSION['Points'] - $_SESSION['spent'] >= 50)
                {
        ?>
        <form action="tau.php" method="POST">
        <button type="submit" name="submit" value="add_Tiger">ADD: 100 Points</button>
        </form>
        <?php
                }
        ?>
        </li>
      </ul>

    </div>
	</body>
</HTML>