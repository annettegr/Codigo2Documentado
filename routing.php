

<?php
//ARCHIVO DE RUTAS

//SE INDICA EL CONTROLADOR Y LOS METODOS DENTRO DE EL
$controllers=array(
	'Cliente' =>['index','add','addCliente','listClientes','updateshow','editCliente','deleteCliente','error']
);

//VERIFICA SI EXISTE EL METODO
if (array_key_exists($controller,  $controllers)) {
	if (in_array($action, $controllers[$controller])) {
		call($controller, $action);
	}
	//DE NO SER ASÍ, MANDA A LA PANTALLA DE ERROR
	else{
		call('Cliente','error');
	}		
}else{
	call('Cliente','error');
}

//METODO DE MANDAR LLAMAR EL CONTROLADOR JUNTO CON EL METODO
function call($controller, $action){
    //MANDA A LLAMAR EL CONTROLADOR
	require_once('Controllers/'.$controller.'Controller.php');
    //CREA EL CONTROLADOR
	switch ($controller) {
		case 'Cliente':
		require_once('Model/Cliente.php');
		$controller= new UsuarioController();
		break;			
		default:

		break;
	}
	$controller->{$action}();
}

?>