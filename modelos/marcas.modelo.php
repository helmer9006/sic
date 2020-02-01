<?php

require_once "conexion.php";

class ModeloMarcas{

	/* Crear Marca */

     public function mdlIngresarMarca($tabla, $datos){
		
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre) VALUES (:valor1)");
		
		$stmt->bindParam(":valor1", $datos["nombre"], PDO::PARAM_STR);

	

		if($stmt->execute()){

			return "ok";	
			//echo "\nPDO::errorInfo():\n";
			//print_r(Conexion::conectar()->errorInfo());
			//return;
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
	
	static public function mdlMostrarMarcas($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * from $tabla WHERE  $item = :valor1"); 
	
			$stmt -> bindParam(":valor1", $valor, PDO::PARAM_STR);
	
			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * from $tabla order by 2 asc");

			$stmt -> execute();

			return $stmt -> fetchAll();
			
		}

		$stmt -> close();

		$stmt = null;

	}

	public function mdlEditarMarca($tabla, $datos, $valor){
		
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :valor1 WHERE id = :valor2");
	
		$stmt->bindParam(":valor1", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":valor2", $valor, PDO::PARAM_STR);
		
		
		if($stmt->execute()){

			return "ok";	
			//echo "\nPDO::errorInfo():\n";
			//print_r(Conexion::conectar()->errorInfo());
			//return;
		} 
		
		else{

			return "error";
		
		}
		
		$stmt->close();
		$stmt = null; 

	}

	static public function mdlBorrarMarca($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :valor1");
		$stmt->bindParam(":valor1", $datos, PDO::PARAM_STR);

		
		if($stmt->execute()){
	
			return "ok";	
			
		}else{

			return "error";
		}

		$stmt->close();
		$stmt = null; 
		
	}

}
