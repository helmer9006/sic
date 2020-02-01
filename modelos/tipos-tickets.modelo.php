<?php

require_once "conexion.php";

class ModeloTipoTickets{

	/* Crear Tipo */

     public function mdlIngresarTipoTicket($tabla, $datos){
		
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre) VALUES (:valor1)");
		
		$stmt->bindParam(":valor1", $datos["nombre"], PDO::PARAM_STR);

	

		if($stmt->execute()){

			return "ok";			
		} 
		
		else{

			return "error";

		}
		
		

		$stmt->close();
		$stmt = null; 

	}
	
	static public function mdlMostrarTiposTickets($tabla, $item, $valor){

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

	public function mdlEditarTipoTicket($tabla, $datos, $valor){
		
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :valor1 WHERE id = :valor2");
	
		$stmt->bindParam(":valor1", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":valor2", $valor, PDO::PARAM_STR);
		
		
		if($stmt->execute()){

			return "ok";	
		} 
		
		else{

			return "error";
		
		}
		
		$stmt->close();
		$stmt = null; 

	}

	static public function mdlBorrarTipoTicket($tabla, $datos){

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
