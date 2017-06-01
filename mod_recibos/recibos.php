<?php
include('../inc/config.php');
include('../inc/validar.php');


$link = mysqli_connect ($dbhost, $dbusername, $dbuserpass);
mysqli_set_charset($link,'utf8');
mysqli_select_db($link,$dbname) or die('No se puede seleccionar la base de datos');
$stmt = mysqli_query($link," SELECT * FROM recibos") or die(mysql_error());


?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="60" />
	  <link rel="icon" type="image/png" href="../images/icons/salary.png" sizes="16x16">
    <title>Recibos cargados</title>

     <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap.css" rel="stylesheet">
		<link href="../css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script language='javascript' src="../js/jquery-1.12.3.js"></script>
    <script language='javascript' src="../js/jquery.dataTables.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable( {
        "language": {
              "lengthMenu": "Mostrar _MENU_ registros por pagina",
              "zeroRecords": "No se encontraron registros",
              "info": "Pagina _PAGE_ de _PAGES_",
              "infoEmpty": "No hay registros",
              "infoFiltered": "(filtrado de _MAX_ registros)",
              "sSearch":       	"Buscar",
            	"oPaginate": {
            		"sFirst":    	"Primero",
            		"sPrevious": 	"Anterior",
            		"sNext":     	"Siguiente",
            		"sLast":     	"Ultimo"
            	}
          },
          "scrollY":        "500px",
          "scrollCollapse": true,
          "order":[[0,"asc"]]
            } );
} );
</script>
  </head>
  <body>

        <div class="container">
		<br>
      <!-- Static navbar -->
      <?php include('../inc/menu.php'); ?>
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <form action="../inc/reportes/generarReporte.php" method="post" target="_blank">
        <label>
        <input class="btn btn-sm btn-primary btn-block" type="submit" name="button" id="button" value="Imprimir">
        </label>
        </form>
	  		<h4 class="text-center bg-info">Listado recibos cargados</h4>
        <div class="row">
              <table id="example" class="display" cellspacing="0" width="100%">
                	<thead>
                    	<th> Nº recibo </th>
                      <th> Apellido y Nombre </th>
            					<th> Documento </th>
                      <th> Total </th>
                      <th> Fecha </th>
                      <th> Detalle </th>
                      <th> Concepto </th>
                  </thead>
                    <tbody>
                    	<?php while($recibos = mysqli_fetch_array($stmt)){ ?>
                        <tr class="success">
                            <td> <?php echo $recibos['nro_recibo']; ?> </td>
                            <td> <?php echo $recibos['apellido_nombre']; ?> </td>
                            <td> <?php echo $recibos['documento']; ?> </td>
                            <td> <?php echo $recibos['total']; ?> </td>
                            <td> <?php echo $recibos['fecha']; ?> </td>
                            <td> <?php echo $recibos['detalle']; ?> </td>
                            <td> <?php echo $recibos['concepto']; ?> </td>
                        </tr>
                        <?php } ?>
                    </tbody>
				</table>

</div>
      </div>
      <div class="panel-footer">
			<p class="text-center">Direccion de Sistemas - Municipalidad de Bariloche</p>
		</div>
    </div> <!-- /container -->
  </body>
</html>
