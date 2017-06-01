<?php

// ini_set('display_errors', '1');
// ini_set('error_reporting', E_ALL);

define('FPDF_FONTPATH', 'font/');
require('mysql_table.php');
include('../config.php');
// libreria para importar documentos dentro de FPDF
require_once('fpdi/fpdi.php');


$conexion = mysqli_connect ($dbhost, $dbusername, $dbuserpass);
mysqli_select_db($conexion,$dbname);
mysqli_set_charset($conexion,'utf8');

$sql = "SELECT * FROM recibos";
$stmt = mysqli_query($conexion,$sql);

$fecha = date('d-m-Y');

$template_pdf = "template_recibos.pdf";
$pdf = new FPDI();

// importamos el documento
$pdf->setSourceFile($template_pdf);

 // seteamos la fuente, el estilo y el tamano
$pdf->SetFont('Times','',10);

// seteamos la posicion inicial
$pdf->SetXY(25, 80);

$pdf->setPrintHeader(false);

$pdf->AddPage('L');
$tplIdx = $pdf->importPage(1);
$pdf->useTemplate($tplIdx);
$pdf->SetAutoPageBreak(true,1);
$x = 55;
$y = 6;
$i = 0;
while($recibo = mysqli_fetch_array($stmt)){

  if($i == 4){
    $pdf->AddPage('L');
    $tplIdx = $pdf->importPage(1);
    $pdf->useTemplate($tplIdx);
    $x = 55;
    $y = 6;
    $i = 0;
  }

  $pdf->SetXY($x,$y);
	//escribimos el numero de recibo
	$pdf->Write(0,$fecha);
  $pdf->SetX($x+90);
  $pdf->Write(0,$fecha);
  $pdf->SetX($x+180);
  $pdf->Write(0,$fecha);
  //--------------------------------
  $pdf->SetXY($x-18,$y+5);
  $pdf->Write(0,$recibo['detalle']);
  $pdf->SetX($x+70);
  $pdf->Write(0,$recibo['detalle']);
  $pdf->SetX($x+159);
  $pdf->Write(0,$recibo['detalle']);
  //--------------------------------
  $pdf->SetXY($x-18,$y+10);
  $pdf->Write(0,$recibo['concepto']);
  $pdf->SetX($x+70);
  $pdf->Write(0,$recibo['concepto']);
  $pdf->SetX($x+159);
  $pdf->Write(0,$recibo['concepto']);
  //---------------------------------
  $pdf->SetXY($x-33,$y+16);
  $pdf->Write(0,$recibo['apellido_nombre']);
  $pdf->SetX($x+56);
  $pdf->Write(0,$recibo['apellido_nombre']);
  $pdf->SetX($x+147);
  $pdf->Write(0,$recibo['apellido_nombre']);
  //--------------------------------
  if($i == 0){
    $pdf->SetXY($x-10,$y+24);
    $pdf->Write(0,$recibo['documento']);
    $pdf->SetXY($x+78,$y+25);
    $pdf->Write(0,$recibo['documento']);
    $pdf->SetX($x+168);
    $pdf->Write(0,$recibo['documento']);
    //--------------------------------
    $pdf->SetXY($x-10,$y+29);
    $pdf->Write(0,$recibo['total']);
    $pdf->SetXY($x+78,$y+30);
    $pdf->Write(0,$recibo['total']);
    $pdf->SetX($x+168);
    $pdf->Write(0,$recibo['total']);
    //--------------------------------
    $pdf->SetXY($x-30,$y+42);
    $pdf->Write(0,$recibo['nro_recibo']);
    $pdf->SetXY($x+53,$y+42);
    $pdf->Write(0,$recibo['nro_recibo']);
    $pdf->SetX($x+143);
    $pdf->Write(0,$recibo['nro_recibo']);
  }else{
    $pdf->SetXY($x-12,$y+24);
    $pdf->Write(0,$recibo['documento']);
    $pdf->SetXY($x+78,$y+24);
    $pdf->Write(0,$recibo['documento']);
    $pdf->SetX($x+168);
    $pdf->Write(0,$recibo['documento']);
    //--------------------------------
    $pdf->SetXY($x-12,$y+29);
    $pdf->Write(0,$recibo['total']);
    $pdf->SetX($x+78);
    $pdf->Write(0,$recibo['total']);
    $pdf->SetX($x+168);
    $pdf->Write(0,$recibo['total']);
    //--------------------------------
    if($i == 3){
      $pdf->SetXY($x-30,$y+39);
      $pdf->Write(0,$recibo['nro_recibo']);
      $pdf->SetX($x+53);
      $pdf->Write(0,$recibo['nro_recibo']);
      $pdf->SetX($x+143);
      $pdf->Write(0,$recibo['nro_recibo']);
    }else{
      $pdf->SetXY($x-30,$y+42);
      $pdf->Write(0,$recibo['nro_recibo']);
      $pdf->SetX($x+53);
      $pdf->Write(0,$recibo['nro_recibo']);
      $pdf->SetX($x+143);
      $pdf->Write(0,$recibo['nro_recibo']);
    }
  }
  $i++;
  $y = $y +50;
}


//enviamos cabezales http para no tener problemas
header("Content-Transfer-Encoding", "binary");
header('Cache-Control: maxage=3600');
header('Pragma: public');

//enviamos el documento creado con un nombre nuevo y forzamos su descarga.
$pdf->Output('recibos.pdf', 'D');
/*class PDF extends PDF_MySQL_Table{
    function Header()
    {
        // Titulo
        $this->SetFont('Arial', '', 18);
        $this->Cell(0, 6, 'Recibos', 0, 1, 'C');
        $this->Ln(10);
        // Asegurar la header de la tabla en el output
        parent::Header();
    }
}

  $pdf=new PDF();
  $pdf->AddPage();
  //Primera tabla.
  $pdf->Table($conexion,'SELECT * FROM recibos');
  ob_start();
  $pdf->Output();*/


?>
