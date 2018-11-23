<?php 

//CLASE DE CONEXION
class Db
{
	//CREAR VARIABLE PARA LA CONEXION
    private static $instance=NULL;
	
    //MÉTODO PARA REALIZAR CONEXION
	public static function getConnect(){
		if (!isset(self::$instance)) {
		    //VARIBLE PARA COMPROBAR LA CONEXION
			$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
			//INGRESAR DATOS DEL SERVIDOR, NOMBRE DE LA BASE DE DATOS, USUARIO Y CONTRASEÑA
			self::$instance= new PDO('mysql:host=localhost;dbname=ejemplo','root','',$pdo_options);
		}
		//REGRESA LA CONEXION
		return self::$instance;
	}
}

 ?>