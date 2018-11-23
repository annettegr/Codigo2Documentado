<?php
    //ARCHIVO PARA MOSTRAR EL INICIO

    //MANDA LLAMAR LA CONEXION
	require_once('connection.php');

	//VERIFICA SI ESTÁ EL CONTROLADOR Y EL METODO
	if (isset($_GET['controller'])&&isset($_GET['action'])) {
		
		$controller=$_GET['controller'];
		$action=$_GET['action'];
	}else{
		$controller= 'Cliente';
		$action='index';
	}
	//MANDA A LLAMAR LA VISTA
	require_once('Views/Layouts/layout.php');	
 ?>