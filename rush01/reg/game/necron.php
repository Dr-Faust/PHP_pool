<?php
        if (session_status() == PHP_SESSION_NONE)
            session_start();
        if (!array_key_exists('spent', $_SESSION))
            $_SESSION['spent'] = 0;
        if (isset($_POST['submit'])){
            switch ($_POST['submit']) {
                case 'add_Cairn-class':
                    $_SESSION['ships'][] = 'Cairn';
                    $_SESSION['spent'] += 300;
                    break;
                case 'add_Jackal':
                    $_SESSION['ships'][] = 'Jackal';
                    $_SESSION['spent'] += 100;
                    break;
                case 'add_Shroud':
                    $_SESSION['ships'][] = 'Shroud';
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
    <h1 style='text-align: center;'> 
    <?php echo  "Spent : " . $_SESSION['spent']; ?> </h1>
    <div class="list_vaisseau">
      <ul>
        <li>
        <br> 
        <h2> Tomb Ship</h2>
        <div>
          <img src="img/Vaisseau-Tombe_Cairn.jpg">
        </div>
        <br>
        <?php 
        if ($_SESSION['Points'] - $_SESSION['spent'] >= 300)
                {
        ?>
        <form action="necron.php" method="POST">
        <button type="submit" name="submit" value="add_Cairn-class">ADD: 300 Points</button>
        </form>
        <?php
                }
        ?>
        <br>
        </li>
        <li>
                <h2> Raider</h2>
        <div>
          <img src="img/Raider_Jackal.jpg">
        </div>
         <br>
        <?php if ($_SESSION['Points'] - $_SESSION['spent'] >= 100)
                {
        ?>
        <form action="necron.php" method="POST">
        <button type="submit" name="submit" value="add_Jackal">ADD: 100 Points</button>
        </form>
        <?php
                }
        ?>
        </li>
                <li>
                <h2> Night Shadow</h2>
        <div>
          <img src="img/defaa8b0cb882fd9b9212f5744b98a9c.jpg">
        </div>
        <br>
        <?php if ($_SESSION['Points'] - $_SESSION['spent'] >= 50)
                {
        ?>
        <form action="necron.php" method="POST">
        <button type="submit" name="submit" value="add_Shroud">ADD: 50 Points</button>
        </form>
        <?php
                }
        ?>
        </li>
      </ul>

    </div>
	</body>
</HTML>