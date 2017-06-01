<?php
include('../inc/config.php');
include('../inc/validar.php');

$archivo = "";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../images/icons/salary.png" sizes="16x16">
    <title> Cargar Recibos API </title>

    <!-- Bootstrap -->
    <script src="../js/jquery-1.12.3.js"></script>
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

<div class="container">
		<br>
          <?php include('../inc/menu.php'); ?>
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">

		<h4 class="text-center bg-info">Cargar recibos API</h4>

	<div class="container">
    <form name="form1" enctype="multipart/form-data" method="post" action="procesar_recibos.php">
		<div class="row">
			<div class="col-md-7 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">

            			<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
								<input name="fecha" type="text" id="fecha" class="form-control" placeholder="Fecha de Pago" />
							</div>
						</div>

          			  <div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-keyboard-o fa-fw"></i></span>
								<input name="concepto" type="text" id="claveA" class="form-control" placeholder="Concepto" />
							</div>
						</div>

          			  <div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-keyboard-o fa-fw"></i></span>
								<input name="detalle" type="text" id="detalle" class="form-control" placeholder="Detalle Resolucion" />
							</div>
						</div>

						<form class="form form-signup" role="form">
						<div class="form-group">
							<div class="input-group">
								<div class='input-group'>

									<input name="archivo" type="file">
								</div>
							</div>
						</div>
						<br><br>

					</div>

					<input type="submit" name="Submit" value="ENVIAR" class="btn btn-sm btn-primary btn-block">
				  </form>
				</div>
						 <?php
				if(isset($_GET['sucess'])){
				echo "
				<div class='alert alert-success-alt alert-dismissable'>
								<span class='glyphicon glyphicon-ok'></span>
								<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
									×</button>Listo! Tu registro fue hecho satisfactoriamente.</div>
				";
				}else{
				echo "";
				}
				?>
				<?php
				if(isset($_GET['errordat'])){
				echo "
				<div class='alert alert-warning-alt alert-dismissable'>
								<span class='glyphicon glyphicon-exclamation-sign'></span>
								<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
									×</button> ".$_GET['msg']." </div>
				";
				}else{
				echo "";
				}
				?>
				<?php
				if(isset($_GET['errordb'])){
				echo "
				<div class='alert alert-danger-alt alert-dismissable'>
								<span class='glyphicon glyphicon-exclamation-sign'></span>
								<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
									×</button> Error, no ha introducido todos los datos.</div>
				";
				}else{
				echo "";
				}
				?>
			</div>
		</div>
	</form>
  </div>
	</div>

  <div class="panel-footer">
			<p class="text-center">Direccion de Sistemas - Municipalidad de Bariloche</p>
	</div>
 </div> <!-- /container -->
 </body>
</html>
