<?php

require_once "conexion.php";

class ModeloUsuarios{

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarUsuarios($tabla, $item, $valor){

		if($item != null){

			//$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt = Conexion::conectar()->prepare("SELECT u.id, u.usuario, u.nombre nombre, u.email, u.contraseña, u.foto_usuario, u.estado, u.perfil, a.nombre as nombre_area, a.id as id_area, u.fecha_registro, u.ultimo_login FROM $tabla as u
			INNER JOIN area as a
			ON (u.id_area=a.id)WHERE u.$item  = :valor1"); 

			$stmt -> bindParam(":valor1", $valor, PDO::PARAM_STR);
	
			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT u.id, u.usuario, u.nombre nombre, u.email, u.contraseña, u.foto_usuario, u.estado, u.perfil, a.nombre nombre_area, u.fecha_registro, u.ultimo_login, a.id as id_area FROM $tabla as u
			INNER JOIN area as a
			ON (u.id_area=a.id)");

			$stmt -> execute();

			return $stmt -> fetchAll();
			
		}

		$stmt -> close();

		$stmt = null;

	}



	/*=============================================
	MOSTRAR USUARIOS X ID
	=============================================*/

	static public function MdlMostrarUsuarioxId($tabla, $item1, $valor1){

		if($item1 != null){

			$stmt = Conexion::conectar()->prepare("SELECT u.id id, u.usuario, u.nombre nombre, u.email, u.contraseña, u.foto_usuario, u.estado, u.perfil perfil, a.nombre as nombre_area, a.id as id_area, u.fecha_registro, u.ultimo_login FROM $tabla as u
			INNER JOIN area as a
			ON (u.id_area=a.id)WHERE u.$item1  = :valor1"); 

			$stmt -> bindParam(":valor1", $valor1, PDO::PARAM_STR);
	
			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	REGISTRO DE USUARIOS
	=============================================*/


    /*=============================================
	AGREGAR USUARIO
	=============================================*/

	static public function mdlIngresarUsuario($tabla, $datos){


		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, usuario, contraseña, perfil, id_area, email, foto_usuario) VALUES (:valor1, :valor2, :valor3, :valor4, :valor5, :valor6, :valor7)");

		$stmt->bindParam(":valor1", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":valor2", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":valor3", $datos["contraseña"], PDO::PARAM_STR);
		$stmt->bindParam(":valor4", $datos["perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":valor5", $datos["id_area"], PDO::PARAM_STR);
		$stmt->bindParam(":valor6", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":valor7", $datos["foto_usuario"], PDO::PARAM_STR);

		
		//$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
	

		if($stmt->execute()){

			return "ok";	
			
		} 
		
		else{

			return "error";
			//para validar el error enviado por la base de datos
			//echo "\nPDO::errorInfo():\n";
			//print_r(Conexion::conectar()->errorInfo());
			//return;
		}

		$stmt->close();
		
		$stmt = null; 

	}

	
	/*=============================================
	EDITAR USUARIO
	=============================================*/


	static public function mdlEditarUsuario($tabla, $datos){

		//print_r($datos);
		//return;

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :valor1, contraseña = :valor3, perfil =:valor4, email = :valor5, foto_usuario = :valor6, id_area = :valor7 WHERE usuario = :valor2" );
	
		$stmt->bindParam(":valor1", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":valor2", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":valor3", $datos["contraseña"], PDO::PARAM_STR);
		$stmt->bindParam(":valor4", $datos["perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":valor5", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":valor6", $datos["foto_usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":valor7", $datos["id_area"], PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "ok";	
			//para validar el error enviado por la base de datos
		
			
		}else{

			//para validar el error enviado por la base de datos
			//echo "\nPDO::errorInfo():\n";
			//print_r(Conexion::conectar()->errorInfo());
			//return;

			echo "\nPDO::errorInfo():\n";
			print_r(Conexion::conectar()->errorInfo());
			return;

			return "error";
		}
		echo "\nPDO::errorInfo():\n";
		print_r(Conexion::conectar()->errorInfo());
		return;

		$stmt->close();
		$stmt = null; 
		
	}


   /*=============================================
	ACTUALIZACION DE USUARIO
	=============================================*/

	static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :valor1 WHERE $item2 = :valor2");
		$stmt->bindParam(":valor1", $valor1, PDO::PARAM_STR);
		$stmt->bindParam(":valor2", $valor2, PDO::PARAM_STR);

		
		if($stmt->execute()){

			//echo "\nPDO::errorInfo():\n";
			//print_r(Conexion::conectar()->errorInfo());
			//return;

			return "ok";	
			
		}else{

			//para validar el error enviado por la base de datos
			//echo "\nPDO::errorInfo():\n";
			//print_r(Conexion::conectar()->errorInfo());
			return;

			return "error";
		}

		$stmt->close();
		$stmt = null; 
		
	}

   /*=============================================
	BORARR USUARIO
	=============================================*/

	static public function mdlBorrarUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :valor1");
		$stmt->bindParam(":valor1", $datos, PDO::PARAM_STR);

		
		if($stmt->execute()){

			//echo "\nPDO::errorInfo():\n";
			//print_r(Conexion::conectar()->errorInfo());
			//return;
			return "ok";	
			
		}else{

			//para validar el error enviado por la base de datos
			//echo "\nPDO::errorInfo():\n";
			//print_r(Conexion::conectar()->errorInfo());
			//return;

			return "error";
		}

		$stmt->close();
		$stmt = null; 
		
	}

}