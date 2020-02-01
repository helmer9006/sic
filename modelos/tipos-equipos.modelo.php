<?php

require_once "conexion.php";

class ModeloTipoEquipos{

	/* funcion para traer datos de tipos de equipos */
	static public function mdlMostrarTiposEquipos($tabla, $item, $valor){

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

    //funcion para crear tipos de equipos
    static public function mdlIngresarTipoEquipo($tabla, $datos){
        
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (descrip_tp_equipo) VALUES (:valor1)");
		
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

    //funcion para editar tipos de equipos
	public function mdlEditarTipoEquipo($tabla, $datos, $valor){
		
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET descrip_tp_equipo = :valor1 WHERE id_tipo = :valor2");
	
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
    
    //funcion para eliminar tipos de equipos
	static public function mdlBorrarTipoEquipo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_tipo = :valor1");
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
