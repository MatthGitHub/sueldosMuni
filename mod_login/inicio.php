<?php
include('../inc/config.php');
include('../inc/validar.php');

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../images/icons/salary.png" sizes="16x16">
    <title>Sistema Sueldos MSCB</title>

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
    <br>
        <div class="container">
		<!-- Static navbar -->
		<?php include "../inc/menu.php"; ?>
		<!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h2><img src="../images/icons/salary_blanco.png" alt="Municipalidad Bariloche" align="middle" style="margin:0px 0px 0px 0px" height="32" width="32"> Mesa de Ayuda Sueldos </h2>
			<div class="row">
				<div class="col-lg-5">
					<p>
						<a class="btn btn-lg btn-direct" href="../mod_recibos/frm_cargar_recibos.php" role="button">Cargar recibos API</a>
					</p>
				</div>
				<div class="col-lg-5">
					<p>

					</p>
					<p>

					</p>
				</div>
			</div>
      </div>
			<div class="panel-footer">
			<p class="text-center">Direccion de Sistemas - Municipalidad de Bariloche</p>
		</div>
    </div> <!-- /container -->

  </body>
</html>
