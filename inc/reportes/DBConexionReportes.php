<?php
include ("../config.php");
$conexion = mysqli_connect ($dbhost, $dbusername, $dbuserpass);
mysqli_select_db($conexion,$dbname);

if($conexion == false) {
 echo 'Ha habido un error <br>';
} else {
 //echo 'Conectado a la base de datos';
}

?>
