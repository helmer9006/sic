<?php

require_once "conexion.php";

class ModeloDependencias{

	/* Crear Dependencia */

     public function mdlIngresarDependencia($tabla, $datos){
		
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, descripcion) VALUES (:valor1, :valor2)");
		
        $stmt->bindParam(":valor1", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":valor2", $datos["descripcion"], PDO::PARAM_STR);

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
	
	static public function mdlMostrarDependencias($tabla, $item, $valor){

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

	public function mdlEditarDependencia($tabla, $datos, $valor){
		
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :valor1, descripcion = :valor2 WHERE id = :valor3");
	
        $stmt->bindParam(":valor1", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":valor2", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":valor3", $valor, PDO::PARAM_STR);
        
        
		if($stmt->execute()){

			return "ok";	

		} else{

			return "error";	
		}
		

		$stmt->close();
		$stmt = null; 

	}

	static public function mdlBorrarDependencia($tabla, $datos){

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
