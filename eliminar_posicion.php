<?php

require('funciones.php');
$id= $_GET['id'];

eliminar_posicion($id);

header("location: en_posicion.php");