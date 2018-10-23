<?php 
	session_start();
    $_SESSION['map_size'] = 12;
    $_SESSION['map'] = null;
    $_SESSION['map_aux'] = null;
    $_SESSION['cont'] = 0;
    $_SESSION['acum'] = 0;

	function generateMap() {
        for ($i = 0; $i < $_SESSION['map_size']; $i++) {
            for ($j = 0; $j < $_SESSION['map_size']; $j++) {

                $_SESSION['map'][$i][$j] = rand(1,6);
                $_SESSION['map_aux'][$i][$j] = true;
            }
        }
    }

    generateMap();

     if (isset($_POST['reload'])) {
        header("location:game.php");
    }

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Bubble Breaker</title>
</head>
<body>

	<form method="post" action="game.php">
		<input type="submit" name="enviar" value="Juego nuevo">
	</form>

</body>
</html>