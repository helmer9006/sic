<?php

require_once "conexion.php";

class ModeloTickets{

	/* Crear Tickets */

     public function mdlCrearTicket($tabla, $datos){
	 

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (titulo, descripcion, fecha_registro, id_tipo, id_usuario, id_area, id_categoria, id_dependencia, id_prioridad, id_estado_ticket, codigo) VALUES (:valor1, :valor2, :valor3, :valor4, :valor5, :valor6, :valor7, :valor8, :valor9, :valor10, :valor11)");
		
		$stmt->bindParam(":valor1", $datos["titulo"], PDO::PARAM_STR);
        $stmt->bindParam(":valor2", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":valor3", $datos["fecha_registro"], PDO::PARAM_STR);
        $stmt->bindParam(":valor4", $datos["tipo"], PDO::PARAM_STR);
        $stmt->bindParam(":valor5", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":valor6", $datos["area"], PDO::PARAM_STR);
		$stmt->bindParam(":valor7", $datos["categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":valor8", $datos["dependencia"], PDO::PARAM_STR);
        $stmt->bindParam(":valor9", $datos["prioridad"], PDO::PARAM_STR);
		$stmt->bindParam(":valor10", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":valor11", $datos["codigo"], PDO::PARAM_STR);
      
		if($stmt->execute()){

			return "ok";	
			//echo "\nPDO::errorInfo():\n";
			//print_r(Conexion::conectar()->errorInfo());
			//return;
		} 
		
		else{
 				//para validar el error enviado por la base de datos
            	//echo "\nPDO::errorInfo():\n";
			   //print_r(Conexion::conectar()->errorInfo());
			return "error";
           
		}

		

		$stmt->close();
		$stmt = null; 

	}
	
	static public function mdlMostrarTickets($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT t.id as id, t.codigo, t.titulo, t.descripcion, t.fecha_actualizacion, t.fecha_registro, tp.id id_tipo, tp.nombre tipo, u.nombre usuario, a.id id_area, a.nombre area, c.id id_categoria, c.nombre categoria, p.id id_prioridad,  p.nombre prioridad, et.id id_estado, et.nombre estado, t.id_dependencia, d.nombre dependencia from $tabla as t 
			INNER JOIN usuarios as u ON (t.id_usuario = u.id)
			INNER JOIN tipo as tp ON (t.id_tipo = tp.id) 
			INNER JOIN area as a ON (t.id_area = a.id)
			INNER JOIN categoria as c ON (t.id_categoria = c.id)
			INNER JOIN prioridad as p ON (t.id_prioridad = p.id)
			INNER JOIN estado_ticket as et ON (t.id_estado_ticket = et.id)
			INNER JOIN dependencia as d ON (t.id_dependencia = d.id)
			WHERE $item = :valor1"); 

			$stmt -> bindParam(":valor1", $valor, PDO::PARAM_STR);
		
			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT t.id as id, t.codigo, t.titulo, t.descripcion, t.fecha_actualizacion, t.fecha_registro, tp.nombre tipo, u.nombre usuario, a.id id_area, a.nombre area, c.id id_categoria, c.nombre categoria, p.id id_prioridad, p.nombre prioridad, et.id id_estado, et.nombre estado, t.id_dependencia, d.nombre dependencia from $tabla as t 
			INNER JOIN usuarios as u ON (t.id_usuario = u.id)
			INNER JOIN tipo as tp ON (t.id_tipo = tp.id) 
			INNER JOIN area as a ON (t.id_area = a.id)
			INNER JOIN categoria as c ON (t.id_categoria = c.id)
			INNER JOIN prioridad as p ON (t.id_prioridad = p.id)
			INNER JOIN estado_ticket as et ON (t.id_estado_ticket = et.id)
			INNER JOIN dependencia as d ON (t.id_dependencia = d.id)
			
			");

			$stmt -> execute();

			return $stmt -> fetchAll();
			
		}

		$stmt -> close();

		$stmt = null;

	}

	static public function mdlMostrarTicketsxItem($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT t.id as id, t.codigo codigo, t.titulo, t.descripcion, t.fecha_actualizacion, t.fecha_registro, tp.id id_tipo, tp.nombre tipo, u.nombre usuario, a.id id_area, a.nombre area, c.id id_categoria, c.nombre categoria, p.id id_prioridad,  p.nombre prioridad, et.id id_estado, et.nombre estado, t.id_dependencia, d.nombre dependencia from $tabla as t 
			INNER JOIN usuarios as u ON (t.id_usuario = u.id)
			INNER JOIN tipo as tp ON (t.id_tipo = tp.id) 
			INNER JOIN area as a ON (t.id_area = a.id)
			INNER JOIN categoria as c ON (t.id_categoria = c.id)
			INNER JOIN prioridad as p ON (t.id_prioridad = p.id)
			INNER JOIN estado_ticket as et ON (t.id_estado_ticket = et.id)
			INNER JOIN dependencia as d ON (t.id_dependencia = d.id)
			WHERE t.$item = :valor1 order by t.codigo desc" ); 

			$stmt -> bindParam(":valor1", $valor, PDO::PARAM_STR);
		
			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt->close();
		$stmt = null; 

	}

	static public function mdlEditarTicket($tabla, $datos, $valor){
		

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET titulo = :valor1, descripcion = :valor2, fecha_actualizacion = :valor3, id_tipo = :valor4, id_area = :valor5, id_categoria = :valor6, id_prioridad = :valor7, id_estado_ticket = :valor8, id_dependencia = :valor10, id_usuario = :valor11 WHERE id = :valor9");
		var_dump($stmt);
		$stmt->bindParam(":valor1", $datos["titulo"], PDO::PARAM_STR);
		$stmt->bindParam(":valor2", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":valor3", $datos["fecha_actualizacion"], PDO::PARAM_STR);
		$stmt->bindParam(":valor4", $datos["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":valor5", $datos["area"], PDO::PARAM_STR);
		$stmt->bindParam(":valor6", $datos["categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":valor7", $datos["prioridad"], PDO::PARAM_STR);
		$stmt->bindParam(":valor8", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":valor9", $valor, PDO::PARAM_STR);
		$stmt->bindParam(":valor10",$datos["dependencia"], PDO::PARAM_STR);
		$stmt->bindParam(":valor11",$datos["usuario"], PDO::PARAM_STR);

		
		if($stmt->execute()){

			return "ok";	
		} 
		
		else{
				//para validar el error enviado por la base de datos
            	//echo "\nPDO::errorInfo():\n";
			   //print_r(Conexion::conectar()->errorInfo());
			return "error";
			

		}
		
		
		$stmt->close();
		$stmt = null; 

	}

	static public function mdlBorrarTicket($tabla, $datos){

		
		
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
