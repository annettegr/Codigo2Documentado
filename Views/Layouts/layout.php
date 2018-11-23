<!-- VISTA DEL CRUD-->
<!DOCTYPE html>
<html lang="es">
<head>
	<title>DATOS</title>
    <!-- TIPO DE DATOS A USAR -->
	<meta charset="utf-8">
    <!-- IMPORTAR LIBRERIAS -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	
</head>
<body>
	<!-- MANDAR LLAMAR LA CABECERA -->
    <header>
		<?php 
			require_once('cabecera.php');
		 ?>
		
	</header>
    <!-- EN OTRA SECCIÓN MANDAR LLAMAR EL ROUTING DONDE SE TIENEN LAS RUTAS DE ACCESO -->
	<section>
		<?php require_once('routing.php'); ?>
	</section>

</body>
</html>