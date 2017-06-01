<?php
if(($_SESSION["logeado"] != "SI")||($_SESSION["origen"] != "sueldos")){
  header ("Location: ../index.php");
  exit();
}

?>
