<?php 
/**
CONTROLADOR DEL CLIENTE
 *
*/
class UsuarioController
{
	//FUNCIÓN PARA MANDAR LLAMAR EL INDEX
	function index(){
		require_once('Views/Cliente/bienvenido.php');
	}

	//FUNCIÓN PARA MANDAR LLAMAR LA PANTALLA DE REGISTRO
	function add(){
		require_once('Views/Cliente/register.php');
	}

	//MÉTODO PARA AGREGAR CLIENTE
	function addCliente(){
	    //VERIFICACIÓN DEL ESTATUS
		if (!isset($_POST['estatus'])) {
			$estatus="of";
		}else{
			$estatus="on";
		}
		//CAPTURA DE DATOS
		$cliente= new Cliente(null, $_POST['nombre'],$_POST['edad'],$_POST['email'],$estatus);

		//AGREGAR CLIENTE
		Cliente::addCliente($cliente);
		//ENLISTAR EL REGISTRO
		$this->listClientes();
	}

	//MÉTODO PARA ENLISTAR LOS CLIENTES
	function listClientes(){
	    //ENLISTA LOS CLIENTES
		$listaClientes=Cliente::listClientes();
        //MANDAR LLAMAR LA PANTALLA DONDE SE VERÁN LOS REGISTROS
		require_once('Views/Cliente/show.php');
	}

	//METODO PARA MANDAR LLAMAR LA PANTALLA DE ACTUALIZACION
	function updateshow(){
	    //OBTENER ID DE REGISTRO
		$idCliente=$_GET['idCliente'];
		//BUSCAR EL REGISTRO CON EL ID
		$cliente=Cliente::searchById($idCliente);
		//REDIRIGIR A LA VISTA DE ACTUALIZACION
		require_once('Views/Cliente/updateshow.php');
	}

	//METODO PARA EDITAR LOS DATOS DEL REGISTRO
	function editCliente(){
	    //VERIFICA EL ESTATUS DEL REGISTRO
        if (!isset($_POST['estatus'])) {
            $estatus="of";
        }else{
            $estatus="on";
        }
        //SE OBTIENEN LOS NUEVOS DATOS
		$cliente = new Cliente($_POST['idCliente'],$_POST['nombre'],$_POST['edad'],$_POST['email'],$estatus);
		Cliente::editCliente($cliente);
		//MANDA LISTAR LOS REGISTROS
		$this->listClientes();
	}

	//METODO PARA ELIMINAR CLIENTE
	function deleteCliente(){
	    //SE OBTIENE EL ID DEL CLIENTE
		$idCliente=$_GET['idCliente'];
		Cliente::deleteCliente($idCliente);
		//SE MANDA LLAMAR LA LISTA DE REGISTROS
		$this->listClientes();
	}

	//METODO PARA MANDAR LLAMAR LA VISTA DE ERROR
	function error(){
		require_once('Views/Cliente/error.php');
	}

}

?>