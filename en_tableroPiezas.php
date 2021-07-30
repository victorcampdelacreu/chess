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
      
        

            echo "<table>";
            for ($i = 8; $i >0; $i--) {
                echo "<tr>";               
                
                for ($j = 1; $j < 9 ; $j++) {
                    $nom='abcdefgh';
                    //$nj=$nom[$j-1];
                    $nj=' ';
                    $col=' ';

                    if($i==7){
                        $nj='P';
                        $col='n';
                    }
                    if($i==2){
                        $nj='P';
                        $col='b';
                    }

                    if ($i==8 || $i==1){
                        if($j==1 || $j==8){
                            $nj='T';
                        }
                        if($j==2 || $j==7){
                            $nj='C';
                        }
                        if($j==3 || $j==6){
                            $nj='A';
                        }
                        if($j==4){
                            $nj='D';
                        }
                        if($j==5){
                            $nj='R';
                        }
                        if($i<3){
                            $col='b';
                        }
                        if($i>6){
                           $col='n';
                        }
                        
                    }
                    
                    if (($j+$i)%2==1){

                        echo "<td class= 'tablero1'>".$nj , $col.'</td>';   
                    }
                   
                    if (($j+$i)%2==0){
                        echo "<td class= 'tablero2'>".$nj, $col.'</td>';
                    }
                     
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