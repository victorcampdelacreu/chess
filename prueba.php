<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>realizar movimiento A DESTINO</title>
    <link rel="stylesheet" href="estilos2.css">
</head>

<body>
    <?php
    $Fi=6;
    $Ci=3;
    $Fd=4;
    $Cd=1;
    echo $Fi,'-',$Ci,'---';
    $Fk=$Fi;
    $Ck=0;

    if(($Ci+1<$Cd)&&($Fi+1<$Fd)){
        for($Ck=$Ci+1;$Ck<$Cd;$Ck++){
            $Fk=$Fk+1;
            echo $Fk,'-',$Ck,'--';
        }
        
    }

    if(($Ci+1<$Cd)&&($Fi-1>$Fd)){
        for($Ck=$Ci+1;$Ck<$Cd;$Ck++){
                $Fk=$Fk-1;
                echo $Fk,'-',$Ck,'--';
        }

    }
    
    if(($Ci-1>$Cd)&&($Fi+1<$Fd)){
        for($Ck=$Ci-1;$Ck>$Cd;$Ck--){
            $Fk=$Fk+1;
            echo $Fk,'-',$Ck,'--';
        }
        
    }
  
    if(($Ci-1>$Cd)&&($Fi-1>$Fd)){
        for($Ck=$Ci-1;$Ck>$Cd;$Ck--){
                $Fk=$Fk-1;
                echo $Fk,'-',$Ck,'--';
        }

    }
    
    
    echo die;

?>
</body>
</thml>