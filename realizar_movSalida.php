<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>realizar movimiento</title>
    <link rel="stylesheet" href="estilos2.css">
</head>

<body>
    <?php
        require('funciones.php');
       

        // este programa trae la posicion de salida de la pieza
        $n=$_GET['n'];
        $pieza_id=$_GET['pieza_id'];
        $posInicial=$n;
        $posFinal=0;
        
        insertar_jugada($posInicial,$posFinal,$pieza_id);

        $jugadas_id_ultima = ultima_jugada_id();
        $jugada_id = $jugadas_id_ultima[0];
         
        // envia a movimientosDestino el id de la jugada
        header("Location: movimientosDestino.php?id=".$jugada_id."");
    ?>
        

</body>

</html>