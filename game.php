<?php 
	
	session_start ();
    function printMap() {
        for ($i = 0; $i < $_SESSION['map_size']; $i++) {
            echo '<tr>';
            for ($j = 0; $j < $_SESSION['map_size']; $j++) {

                if ($i == 0 || $i == $_SESSION['map_size']-1 || $j == 0 | $j == $_SESSION['map_size']-1) {
                    $_SESSION['map'][$i][$j] = 0; 
                }

                if ($_SESSION['map_aux'][$i][$j]){
                    printEach($i, $j);
                }
                else{
                    printEach($i, $j);
                }
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

        if ($_SESSION['map'][$fil][$col] == 7) {

            $_SESSION['map'][$fil][$col]=7;

        }elseif ($_SESSION['map'][$fil-1][$col] != $num && $_SESSION['map'][$fil+1][$col] != $num && $_SESSION['map'][$fil][$col+1] != $num && $_SESSION['map'][$fil][$col-1] != $num) {
            
            $_SESSION['map'][$fil][$col]=$num;
        }else{
            verify($fil,$col,$num);
        }

  
    }

    function verify($fil,$col,$num){ 

        if ($_SESSION['map'][$fil][$col] == 0) {
            $_SESSION['map'][$fil][$col] = 0;
            return;
        }

        $_SESSION['map'][$fil][$col] = 7;


        if ($_SESSION['map'][$fil-1][$col] == $num) {
            verify($fil-1,$col,$num);
        } 

        if ($_SESSION['map'][$fil][$col+1] == $num) {
            verify($fil,$col+1,$num);
        } 

        if ($_SESSION['map'][$fil+1][$col] == $num) {
            verify($fil+1,$col,$num);
        } 

        if ($_SESSION['map'][$fil][$col-1] == $num) {
            verify($fil,$col-1,$num);
        } 

        $_SESSION['cont']++;
        
    }

    if ($_SESSION['cont'] == 2) {
        
        $_SESSION['acum']=$_SESSION['acum'] + $_SESSION['cont'];

    }elseif ($_SESSION['cont'] == 3) {

        $_SESSION['acum']=$_SESSION['acum'] + ($_SESSION['cont']*2);

    }elseif ($_SESSION['cont'] == 4) {

        $_SESSION['acum']=$_SESSION['acum'] + ($_SESSION['cont']*3);

    }elseif ($_SESSION['cont'] == 5) {

        $_SESSION['acum']=$_SESSION['acum'] + ($_SESSION['cont']*4);

    }elseif ($_SESSION['cont'] == 6) {

        $_SESSION['acum']=$_SESSION['acum'] + ($_SESSION['cont']*5);

    }elseif ($_SESSION['cont'] == 7) {

        $_SESSION['acum']=$_SESSION['acum'] + ($_SESSION['cont']*6);

    }elseif ($_SESSION['cont'] == 8) {

        $_SESSION['acum']=$_SESSION['acum'] + ($_SESSION['cont']*7);

    }elseif ($_SESSION['cont'] == 9) {

        $_SESSION['acum']=$_SESSION['acum'] + ($_SESSION['cont']*8);

    }elseif ($_SESSION['cont'] == 10) {

        $_SESSION['acum']=$_SESSION['acum'] + ($_SESSION['cont']*9);
    }


    echo $_SESSION['acum'];

    $_SESSION['cont']=0;


    function regroup(){

        for ($i=0; $i < 12; $i++) { 
            for ($j=0; $j < 12; $j++) { 
                
                if ($_SESSION['map'][$i][$j] == 7 && $_SESSION['map'][$i-1][$j] != 0) {
                    
                    //$_SESSION['map'][$i][$j]=$_SESSION['map'][$i-1][$j];
                    //$_SESSION['map'][$i-1][$j]=7;
                }
            }
        }


    }


    regroup();


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