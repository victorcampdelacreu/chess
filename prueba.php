<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRUEBAS</title>
    <link rel="stylesheet" href="estilos2.css">
</head>

<body>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                
                <input required type="text" name="cambio" placeholder="elija Dama=D, Caballo=C" />
                
                <button name="formularioC" class="botonEnviar" type="submit">Enviar</button>
                
                </form>
                <?php 
                $cambio='-'; 
                
                if (isset($_POST['formularioC'])) {
                    $cambio = $_POST['cambio'];
                   
                }
                echo 'prueba  ',$cambio;
                echo die;
                header("Location: prueba_2.php?cambio=".$cambio."");    
             ?> 
     <br>
     
         
             


</body>
</thml>