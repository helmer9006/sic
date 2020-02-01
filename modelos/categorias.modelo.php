<?php

require_once "conexion.php";

class ModeloCategorias{

	/* Crear Categoria */

     public function mdlIngresarCategoria($tabla, $datos){
		
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, id_area) VALUES (:valor1, :valor2)");
		
		$stmt->bindParam(":valor1", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":valor2", $datos["id_area"], PDO::PARAM_STR);
	

		if($stmt->execute()){

			return "ok";	

		} 
		
		else{

			return "error";

		}
		
		

		$stmt->close();
		$stmt = null; 

	}
	
	static public function mdlMostrarCategorias($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT c.id id, c.nombre as categoria, a.id id_area, a.nombre area, c.fecha_creacion from $tabla as c INNER JOIN area as a ON (c.id_area = a.id) WHERE c.$item = :valor1"); 
	
			$stmt -> bindParam(":valor1", $valor, PDO::PARAM_STR);
	
			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT  c.id, c.nombre as categoria, a.nombre area, c.fecha_creacion from $tabla as c 
			INNER JOIN area as a ON (c.id_area = a.id)");

			$stmt -> execute();

			return $stmt -> fetchAll();
			
		}

		$stmt -> close();

		$stmt = null;

	}



	static public function mdlMostrarCategoriasxArea($tabla, $item, $valor){

			$stmt = Conexion::conectar()->prepare("SELECT c.id id, c.nombre as categoria, a.id id_area, a.nombre area, c.fecha_creacion from $tabla as c INNER JOIN area as a ON (c.id_area = a.id) WHERE c.$item = :valor1"); 
	
			$stmt -> bindParam(":valor1", $valor, PDO::PARAM_STR);
	
			$stmt -> execute();

			return $stmt -> fetchAll();

	}

	public function mdlEditarCategoria($tabla, $datos, $valor){
		
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :valor1, id_area = :valor2 WHERE id = :valor3");
	
		$stmt->bindParam(":valor1", $datos["categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":valor2", $datos["id_area"], PDO::PARAM_STR);
		$stmt->bindParam(":valor3", $valor, PDO::PARAM_STR);

		
		if($stmt->execute()){

			return "ok";	

		} 
		
		else{

			return "error";

		}
		

		$stmt->close();
		$stmt = null; 

	}

	static public function mdlBorrarCategoria($tabla, $datos){

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
