<?php
include('../inc/config.php');
include('../inc/validar.php');
$link = mysqli_connect ($dbhost, $dbusername, $dbuserpass);
mysqli_select_db($link,$dbname);
mysqli_set_charset($link,'utf8');

$fecha = $_POST['fecha'];
$concepto = $_POST['concepto'];
$detalle = $_POST['detalle'];

$sql = "DELETE FROM recibos";
$stmt = mysqli_query($link,$sql);

$adjunto = $_FILES["archivo"]['name'];
$tipo_archivo = $_FILES["archivo"]['type'];



//echo $detalle;
//exit();


//--------------------------------------------------- Subo adjunto al servidor, dentro de la carpeta de mod_recibos/archivos -----------------------------------------------------
$uploadedfileload="true";
$uploadedfile_size=$_FILES["archivo"]['size'];

if($fecha == "" || $concepto == "" || $detalle == "")
{
  $msg=$msg."Debes completar todos los campos.";
  header ("Location: frm_cargar_recibos.php?errordat&msg={$msg}");
  exit();
}

if($adjunto == "")
{
  $msg=$msg."Debes seleccionar un archivo.";
  header ("Location: frm_cargar_recibos.php?errordat&msg={$msg}");
  exit();
}

if ($_FILES["archivo"]['size']>5000000){
  $msg=$msg."El archivo es mayor que 5000KB, debes reduzcirlo antes de subirlo<BR>";
  $uploadedfileload="false";
}
//Octet stream se agrego porque en la maquina de sueldos el csv tenia ese tipo de archivo/aplicacion.
if (!(strpos($tipo_archivo, "csv") || strpos($tipo_archivo, "excel") || strpos($tipo_archivo, "octet-stream"))){
   $msg=$msg." Tu archivo tiene que ser .csv. Otros archivos no son permitidos<BR>";
   $uploadedfileload="false";
 }

$add="archivos/$adjunto";
if($uploadedfileload=="true"){
  /*if (file_exists($add)) { Esto eliminaba el archivo si ya existia, pero ahora la funcion de mas abajo elimina todo los archivos del server.
    unlink($add);
  }*/
  if(copy ($_FILES["archivo"]['tmp_name'], $add)){


    $sql = "LOAD DATA
            LOCAL INFILE 'C://wamp64//www//sueldos//mod_recibos//archivos//$adjunto'
            INTO TABLE recibos
            CHARACTER SET latin1
            FIELDS TERMINATED BY ','
            LINES TERMINATED BY '".'\r\n'."'
            IGNORE 1 LINES";

    //echo $sql;
    //exit();

    $my_error = mysqli_query($link, $sql);

    $sql = "UPDATE recibos SET fecha = '$fecha', concepto = '$concepto', detalle = '$detalle'";
    $my_error = mysqli_query($link, $sql);

    /*$files = glob('archivos/*'); // obtiene todos los archivos
    foreach($files as $file){
      if(is_file($file)) // si se trata de un archivo
        unlink($file); // lo elimina
      }*/

  }else{
      header ("Location: frm_cargar_recibos.php?errordat&msg={$msg}");
      exit();
  }
}else{
  header ("Location: frm_cargar_recibos.php?errordat&msg={$msg}");
  exit();
}
header ("Location: recibos.php");



?>
