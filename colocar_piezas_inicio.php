<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colocar Piezas</title>
    <link rel="stylesheet" href="estilos2.css">
</head>
<?php
    require('funciones.php');

    //coloca piezas blancas
    $marca=0;
    $n=61;
    $pieza_id=14;
    $fila=1;
    $columna='e';
    modificar_posicion($n,$pieza_id,$fila,$columna,$marca);
    $n=60;
    $pieza_id=15;
    $columna='d';
    modificar_posicion($n,$pieza_id,$fila,$columna,$marca);
    $n=59;
    $pieza_id=16;
    $columna='c';
    modificar_posicion($n,$pieza_id,$fila,$columna,$marca);
    $n=58;
    $pieza_id=17;
    $columna='b';
    modificar_posicion($n,$pieza_id,$fila,$columna,$marca);
    $n=57;
    $pieza_id=18;
    $columna='a';
    modificar_posicion($n,$pieza_id,$fila,$columna,$marca);
    $n=62;
    $pieza_id=19;
    $columna='f';
    modificar_posicion($n,$pieza_id,$fila,$columna,$marca);
    $n=63;
    $pieza_id=20;
    $columna='g';
    modificar_posicion($n,$pieza_id,$fila,$columna,$marca);
    $n=64;
    $pieza_id=21;
    $columna='h';
    modificar_posicion($n,$pieza_id,$fila,$columna,$marca);
   

    $fila=2; // coloca peones blancos
    $n=49;
    $pieza_id=22;
    $columna='a';
    modificar_posicion($n,$pieza_id,$fila,$columna,$marca);
    $n=$n+1;
    $pieza_id=23;
    $columna='b';
    modificar_posicion($n,$pieza_id,$fila,$columna,$marca);
    $n=$n+1;
    $pieza_id=24;
    $columna='c';
    modificar_posicion($n,$pieza_id,$fila,$columna,$marca);
    $n=$n+1;
    $pieza_id=25;
    $columna='d';
    modificar_posicion($n,$pieza_id,$fila,$columna,$marca);
    $n=$n+1;
    $pieza_id=26;
    $columna='e';
    modificar_posicion($n,$pieza_id,$fila,$columna,$marca);
    $n=$n+1;
    $pieza_id=27;
    $columna='f';
    modificar_posicion($n,$pieza_id,$fila,$columna,$marca);
    $n=$n+1;
    $pieza_id=28;
    $columna='g';
    modificar_posicion($n,$pieza_id,$fila,$columna,$marca);
    $n=$n+1;
    $pieza_id=29;
    $columna='h';
    modificar_posicion($n,$pieza_id,$fila,$columna,$marca);
    
    // coloca piezas negras
   
    $pieza_id=30;
    $fila=8;
    $n=5;
    $columna='e';
    modificar_posicion($n,$pieza_id,$fila,$columna,$marca);
    $n=4;
    $pieza_id=31;
    $columna='d';
    modificar_posicion($n,$pieza_id,$fila,$columna,$marca);
    $n=3;
    $pieza_id=32;
    $columna='c';
    modificar_posicion($n,$pieza_id,$fila,$columna,$marca);
    $n=2;
    $pieza_id=33;
    $columna='b';
    modificar_posicion($n,$pieza_id,$fila,$columna,$marca);
    $n=1;
    $pieza_id=34;
    $columna='a';
    modificar_posicion($n,$pieza_id,$fila,$columna,$marca);
    $n=6;
    $pieza_id=35;
    $columna='f';
    modificar_posicion($n,$pieza_id,$fila,$columna,$marca);
    $n=$n+1;
    $pieza_id=36;
    $columna='g';
    modificar_posicion($n,$pieza_id,$fila,$columna,$marca);
    $n=$n+1;
    $pieza_id=37;
    $columna='h';
    modificar_posicion($n,$pieza_id,$fila,$columna,$marca);
    // coloca peones negros
    $n=$n+1;
    $fila=2;
    $pieza_id=38;
    $columna='a';
    modificar_posicion($n,$pieza_id,$fila,$columna,$marca);
    $n=$n+1;
    $pieza_id=39;
    $columna='b';
    modificar_posicion($n,$pieza_id,$fila,$columna,$marca);
    $n=$n+1;
    $pieza_id=40;
    $columna='c';
    modificar_posicion($n,$pieza_id,$fila,$columna,$marca);
    $n=$n+1;
    $pieza_id=41;
    $columna='d';
    modificar_posicion($n,$pieza_id,$fila,$columna,$marca);
    $n=$n+1;
    $pieza_id=42;
    $columna='e';
    modificar_posicion($n,$pieza_id,$fila,$columna,$marca);
    $n=$n+1;
    $pieza_id=43;
    $columna='f';
    modificar_posicion($n,$pieza_id,$fila,$columna,$marca);
    $n=$n+1;
    $pieza_id=44;
    $columna='g';
    modificar_posicion($n,$pieza_id,$fila,$columna,$marca);
    $n=$n+1;
    $pieza_id=45;
    $columna='h';
    modificar_posicion($n,$pieza_id,$fila,$columna,$marca);
    $n=$n+1;
    



?>  
  <br>
   
   <div class="cajas">
       <h2>
           <a class="enlaces" href="en_juego.php">Ir juego</a>
       </h2>
   </div>

   </html>