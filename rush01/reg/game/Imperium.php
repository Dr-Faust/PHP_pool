<?php
        if (session_status() == PHP_SESSION_NONE)
            session_start();
        if (!array_key_exists('spent', $_SESSION))
            $_SESSION['spent'] = 0;
        if (isset($_POST['submit'])){
            switch ($_POST['submit']) {
                case 'add_Oberon':
                    $_SESSION['ships'][] = 'Oberon';
                    $_SESSION['spent'] += 300;
                    break;
                case 'add_Exorcist':
                    $_SESSION['ships'][] = 'Exorcist';
                    $_SESSION['spent'] += 100;
                    break;
                case 'add_Firestorm':
                    $_SESSION['ships'][] = 'Firestorm';
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
        <h2>Oberon Battleship</h2>
        <div>
          <img src="img/OberonClassBattleship.JPG">
        </div>
        <br>
        <?php 
        if ($_SESSION['Points'] - $_SESSION['spent'] >= 300)
                {
        ?>
        <form action="Imperium.php" method="POST">
        <button type="submit" name="submit" value="add_Oberon">ADD: 300 Points</button>
        </form>
        <?php
                }
        ?>
        <br>
        </li>
        <li>
                <h2>Grand Cruiser</h2>
        <div>
          <img src="img/Vengance_Class_Grand_Cruiser.jpg">
        </div>
       <br>
        <?php 
        if ($_SESSION['Points'] - $_SESSION['spent'] >= 100)
                {
        ?>
        <form action="Imperium.php" method="POST">
        <button type="submit" name="submit" value="add_Exorcist">ADD: 100 Points</button>
        </form>
        <?php
                }
        ?>
        </li>
        <li>
        <h2>Firestorm</h2>
        <div>
          <img src="img/FirestormFrigate.jpg">
        </div>
        <br>
        <?php 
        if ($_SESSION['Points'] - $_SESSION['spent'] >= 50)
                {
        ?>
        <form action="Imperium.php" method="POST">
        <button type="submit" name="submit" value="add_Firestorm">ADD: 50 Points</button>
        </form>
        <?php
                }
        ?>
        </li>
      </ul>
    </div>
	</body>
</HTML>