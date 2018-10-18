<?php 
	
	session_start ();
    function printMap() {
        for ($i = 0; $i < $_SESSION['map_size']; $i++) {
            echo '<tr>';
            for ($j = 0; $j < $_SESSION['map_size']; $j++) {

                 if ($i == 0 || $i == $_SESSION['map_size']-1 || $j == 0 | $j == $_SESSION['map_size']-1) {
                    $_SESSION['map'][$i][$j] = 0; 
                }

                if ($_SESSION['map_aux'][$i][$j])
                    printEach($i, $j);
                else
                    printEach($i, $j);
            }
            echo '</tr>';
        }
    }

    function printEach($row, $col) {

        if ($_SESSION['map'][$row][$col] == 0) {
            echo "<td class='borde' onclick='cargar($row,$col,0)'>";
        }elseif ($_SESSION['map'][$row][$col] == 1){
            
            echo "<td class='rojo' onclick='cargar($row,$col,1)'>";

        }elseif ($_SESSION['map'][$row][$col] == 2) {
        	
        	echo "<td class='verde' onclick='cargar($row,$col,2)'>";

        }elseif ($_SESSION['map'][$row][$col] == 3) {
        	
        	echo "<td class='azul' onclick='cargar($row,$col,3)'>";

        }elseif ($_SESSION['map'][$row][$col] == 4) {
        	
        	echo "<td class='amarillo' onclick='cargar($row,$col,4)'>";

        }elseif ($_SESSION['map'][$row][$col] == 5) {
        	
        	echo "<td class='morado' onclick='cargar($row,$col,5)'>";

        }elseif ($_SESSION['map'][$row][$col] == 6) {
        	
        	echo "<td class='fucksia' onclick='cargar($row,$col,6)'>";
        }elseif ($_SESSION['map'][$row][$col] == 7) {
            
            echo "<td class='blanco' onclick='cargar($row,$col,6)'>";
        }	
        	
    }

    if (isset($_GET['fil']) && isset($_GET['col']) && isset($_GET['mat'])) {
        $fil=$_GET['fil'];
        $col=$_GET['col'];
        $num=$_GET['mat'];

        verify($fil,$col,$num);
    }

    function verify($fil,$col,$num){ 

        if ($_SESSION['map'][$fil][$col] == 0) {
            $_SESSION['map'][$fil][$col] = 0;
            return;
        }
        $_SESSION['cont']=0;
        $_SESSION['map'][$fil][$col] = 7;


        if ($_SESSION['map'][$fil-1][$col] == $num) {
            
            $_SESSION['map'][$fil][$col] =  $num;
            verify($fil-1,$col,$num);
        }else{
            $_SESSION['cont']++;
        }
        
        if ($_SESSION['map'][$fil][$col+1] == $num) {
            $_SESSION['cont']=0;
            $_SESSION['map'][$fil][$col] =  $num;
            verify($fil,$col+1,$num);
        }else{
            $_SESSION['cont']++;
        }
       
        if ($_SESSION['map'][$fil+1][$col] == $num) {
            $_SESSION['cont']=0;
            verify($fil+1,$col,$num);
        }else{
            $_SESSION['cont']++;
        }

        if ($_SESSION['map'][$fil][$col-1] == $num) {
            $_SESSION['cont']=0;
            verify($fil,$col-1,$num);
        }else{
            $_SESSION['cont']++;
        }  

        
    }
   	

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>

    <form action="index.php" method="post">
        <p><button type="submit" value="0" name="back">Ir a menu</button></p>
    </form>
    <form action="index.php" method="post">
        <p><button type="submit" value="0" name="reload">Reiniciar</button></p>
    </form>

	<div class="container">
		<table>
			<?php 

 				printMap();

			 ?>
		</table>
	</div>

	<script type="text/javascript">
		function cargar(fila,col,mat){
			document.location="game.php?fil="+fila+"&col="+col+"&mat="+mat;				
		}
	</script>
</body>
</html>