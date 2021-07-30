<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablero</title>
    <link rel="stylesheet" href="estilos2.css">
</head>

<body>
       
    <?php 
        require('funciones.php');
        
        

            echo "<table>";
            for ($i = 8; $i >0; $i--) {
                echo "<tr>";               
                
                for ($j = 1; $j < 9 ; $j++) {
                    if($j==1){
                        $nj='a';
                    }
                    if($j==2){
                        $nj='b';
                    }
                    if($j==3){
                        $nj='c';
                    }
                    if($j==4){
                        $nj='d';
                    }
                    if($j==5){
                        $nj='e';
                    }
                    if($j==6){
                        $nj='f';
                    }
                    if($j==7){
                        $nj='g';
                    }
                    if($j==8){
                        $nj='h';
                    }
                   
                    
                    
                    if (($j+$i)%2==1){
                        $color='blanco';
                        echo "<td class= 'tablero1'>".$nj , $i .'</td>';   
                    }
                   
                    if (($j+$i)%2==0){
                        $color='negro';
                        echo "<td class= 'tablero2'>".$nj, $i.'</td>';
                    }
                    $fila=$j;
                    $columna=$i;
                    insertar_tablero($fila,$columna,$color);
                     
                }

                echo "<tr>";  
            }
            echo "</table>";
           
        
    ?>
    <br>
   
    <div class="cajas">
        <h2>
            <a class="enlaces" href="en_preparacion.php">Ir a Preparacion juego</a>
        </h2>
    </div>
</body>

</html>