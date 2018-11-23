<?php 
/**
* 
*/

//CREACIÓN DE LA CLASE
class Cliente
{
    //ATRIBUTOS A UTILIZAR
	private $idCliente;
	private $nombre;
	private $edad;
	private $email;
	private $estatus;

	//CREAR EL CONSTRUCTOR CON LOS ATRIBUTOS ANTES MENCIONADOS
	function __construct($idCliente, $nombre,$edad, $email, $estatus)
	{
		$this->setIdCliente($idCliente);
		$this->setNombre($nombre);
		$this->setEdad($edad);
        $this->setEmail($email);
		$this->setEstatus($estatus);
	}

	//TENER GETTERS & SETTERS DE CADA ATRIBUTO
	public function getIdCliente(){
		return $this->idCliente;
	}

	public function setIdCliente($idCliente){
		$this->idCliente = $idCliente;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getEdad(){
		return $this->edad;
	}

	public function setEdad($edad){
		$this->edad = $edad;
	}

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

	public function getEstatus(){

		return $this->estatus;
	}

	//MÉTODO PARA SELECCIONAR EL ESTATUS
	public function setEstatus($estatus){
		//SI EL ESTATUS ES ON, SERÁ 1
		if (strcmp($estatus, 'on')==0) {
			$this->estatus=1;
		} elseif(strcmp($estatus, '1')==0) {
			$this->estatus='checked';
		//DE LO CONTRARIO, SERÁ OFF & 0
		}elseif (strcmp($estatus, '0')==0) {
			$this->estatus='of';
		}else {
			$this->estatus=0;
		}

	}

	//MÉTODO PARA ANADIR UN REGISTRO
	public static function addCliente($cliente){
	    //CONEXION A BASE DE DATOS
		$db=Db::getConnect();

		//VARIABLE DE INSERT PARA CREAR EL QUERY DE INSERCIÓN
		$insert=$db->prepare('INSERT INTO clientes VALUES (NULL,:nombre,:edad,:email, :estatus)');
		//OBTENER LOS DATOS
		$insert->bindValue('nombre',$cliente->getNombre());
		$insert->bindValue('edad',$cliente->getEdad());
		$insert->bindValue('email',$cliente->getEmail());
        $insert->bindValue('estatus',$cliente->getEstatus());
		$insert->execute();
	}

	//MÉTODO PARA OBTENER LOS REGISTROS
	public static function listClientes(){
	    //OBTENER CONEXION
		$db=Db::getConnect();
		//VARIABLE PARA EL ARRAY DE LOS DATOS
		$listaClientes=[];
        //VARIABLE PARA EL QUERY
		$select=$db->query('SELECT * FROM clientes');
        //MANDAR LLAMAR LOS CAMPOS DE LA TABLA
		foreach($select->fetchAll() as $cliente){
			$listaClientes[]=new Cliente($cliente['idCliente'],$cliente['nombre'],$cliente['edad'],$cliente['email'], $cliente['estatus']);
		}
		//DEVUELVE LA LISTA DE REGISTROS
		return $listaClientes;
	}

	//MÉTODO PARA BUSCAR EL ID QUE SE QUIERE ELIMINAR
	public static function searchById($idCliente){
        //OBTENER CONEXION
	    $db=Db::getConnect();
	    //VARIABLE PARA QUERY DE BUSQUEDA
		$select=$db->prepare('SELECT * FROM clientes WHERE idCliente=:idCliente');
		$select->bindValue('idCliente',$idCliente);
		$select->execute();
        //MANDAR LLAMAR LOS CAMPOS DE LA TABLA
		$clienteDb=$select->fetch();

		//CONSULTA DEL REGISTRO
		$cliente = new Cliente ($clienteDb['idCliente'],$clienteDb['nombre'], $clienteDb['edad'],$clienteDb['email'], $clienteDb['estatus']);
		return $cliente;

	}

	//MÉTODO PARA EDITAR EL REGISTRO
	public static function editCliente($cliente){
	    //CONEXION A BASE DE DATOS
		$db=Db::getConnect();

		//VARIABLE PARA PREPARACION DE QUERY DE UPDATE
		$update=$db->prepare('UPDATE clientes SET nombre=:nombre, edad=:edad, email=:email, estatus=:estatus WHERE idCliente=:idCliente');
        //OBTENER LOS DATOS
		$update->bindValue('nombre', $cliente->getNombre());
		$update->bindValue('edad',$cliente->getEdad());
        $update->bindValue('email',$cliente->getEmail());
		$update->bindValue('estatus',$cliente->getEstatus());
		$update->bindValue('idCliente',$cliente->getIdCliente());
		$update->execute();
	}

	//MÉTODO PARA ELIMINAR EL REGISTRO SELECCIONADO
	public static function deleteCliente($idCliente){
	    //CONEXIÓN A BASE DE DATOS
		$db=Db::getConnect();
		//VARIABLE DE DELETE PARA PREPARACION DE QUERY DE DELETE
		$delete=$db->prepare('DELETE FROM clientes WHERE idCliente=:idCliente');
		//OBTENER EL ID A ELIMINAR
		$delete->bindValue('idCliente',$idCliente);
		$delete->execute();		
	}
}

?>