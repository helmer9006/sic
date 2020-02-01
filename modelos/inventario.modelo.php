<?php

require_once "conexion.php";

class ModeloEquipos{

	/* Crear Tickets */


	static public function mdlMostrarEquipos($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT e.id_equipo id, e.codigo codigo, e.id_marca, m.nombre marca, e.modelo modelo, e.serial, e.ip_equipo, e.asignado, e.piso, e.id_categoria, c.nombre categoria, e.id_dependencia, d.nombre dependencia, e.erp erp, e.id_estado id_estado, es.descrip_estado estado, e.id_usuario, u.nombre usuario, e.id_area, a.nombre area, e.fecha_registro, e.anexo FROM 
            $tabla as e 
            INNER JOIN marca as m on (e.id_marca = m.id)
            INNER JOIN categoria c on (e.id_categoria = c.id) 
            INNER JOIN dependencia d on (e.id_dependencia = d.id) 
            INNER JOIN estado_equipo es on (e.id_estado = es.id_estado) 
            INNER JOIN usuarios u on (e.id_usuario = u.id) 
            INNER JOIN area a on (e.id_area = a.id)
			WHERE e.$item = :valor1 order by e.id_equipo desc"); 
			
			$stmt -> bindParam(":valor1", $valor, PDO::PARAM_STR);
		
			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT e.id_equipo id, e.codigo codigo, e.id_marca, m.nombre marca, e.modelo modelo, e.serial, e.ip_equipo, e.asignado, e.piso, e.id_categoria, c.nombre categoria, e.id_dependencia id_dependencia, d.nombre dependencia, e.erp  erp, e.id_estado id_estado, es.descrip_estado estado, e.id_usuario, u.nombre usuario, e.id_area, a.nombre area, e.fecha_registro, e.anexo FROM 
            $tabla as e 
            INNER JOIN marca as m on (e.id_marca = m.id)
            INNER JOIN categoria c on (e.id_categoria = c.id) 
            INNER JOIN dependencia d on (e.id_dependencia = d.id) 
            INNER JOIN estado_equipo es on (e.id_estado = es.id_estado) 
            INNER JOIN usuarios u on (e.id_usuario = u.id) 
            INNER JOIN area a on (e.id_area = a.id)
			");

			$stmt -> execute();

			return $stmt -> fetchAll();
			
		}

		$stmt -> close();

		$stmt = null;

	}

    public function mdlCrearEquipo($tabla, $datos){
	 
		

       $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (codigo, id_marca, modelo, serial, ip_equipo, asignado, id_categoria, id_dependencia, erp, id_estado, id_usuario, id_area, fecha_registro, anexo, piso) VALUES (:valor1, :valor2, :valor3, :valor4, :valor5, :valor6, :valor7, :valor8, :valor9, :valor10, :valor11, :valor12, :valor13, :valor14, :valor15)");
		
		$stmt->bindParam(":valor1", $datos["codigo"], PDO::PARAM_STR);
        $stmt->bindParam(":valor2", $datos["marca"], PDO::PARAM_STR);
        $stmt->bindParam(":valor3", $datos["modelo"], PDO::PARAM_STR);
        $stmt->bindParam(":valor4", $datos["serial"], PDO::PARAM_STR);
        $stmt->bindParam(":valor5", $datos["ip"], PDO::PARAM_STR);
        $stmt->bindParam(":valor6", $datos["asignado"], PDO::PARAM_STR);
        $stmt->bindParam(":valor7", $datos["id_categoria"], PDO::PARAM_STR);
        $stmt->bindParam(":valor8", $datos["id_dependencia"], PDO::PARAM_STR);
		$stmt->bindParam(":valor9", $datos["erp"], PDO::PARAM_STR);
		$stmt->bindParam(":valor10", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":valor11", $datos["id_usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":valor12", $datos["id_area"], PDO::PARAM_STR);
		$stmt->bindParam(":valor13", $datos["fecha_registro"], PDO::PARAM_STR);
		$stmt->bindParam(":valor14", $datos["anexo"], PDO::PARAM_STR);
		$stmt->bindParam(":valor15", $datos["piso"], PDO::PARAM_STR);
	

 		
		if($stmt->execute()){

			return "ok";	
			//echo "\nPDO::errorInfo():\n";
			//print_r(Conexion::conectar()->errorInfo());
			//return;
		} 
		
		else{

			return "error";
            //para validar el error enviado por la base de datos
            print_r(Conexion::conectar()->errorInfo());
			return;
		}


		$stmt->close();
		$stmt = null; 

	}
	
	public function mdlEditarEquipo($tabla, $datos, $valor){
		

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_marca = :valor1, modelo = :valor2, serial = :valor3, ip_equipo = :valor4, piso = :valor5, asignado = :valor6, id_dependencia = :valor7, erp = :valor8, id_estado = :valor9, anexo = :valor10 WHERE id_equipo = :valor11");
	
		$stmt->bindParam(":valor1", $datos["marca"], PDO::PARAM_STR);
		$stmt->bindParam(":valor2", $datos["modelo"], PDO::PARAM_STR);
		$stmt->bindParam(":valor3", $datos["serial"], PDO::PARAM_STR);
		$stmt->bindParam(":valor4", $datos["ip"], PDO::PARAM_STR);
		$stmt->bindParam(":valor5", $datos["piso"], PDO::PARAM_STR);
		$stmt->bindParam(":valor6", $datos["asignado"], PDO::PARAM_STR);
		$stmt->bindParam(":valor7", $datos["id_dependencia"], PDO::PARAM_STR);
		$stmt->bindParam(":valor8", $datos["erp"], PDO::PARAM_STR);
		$stmt->bindParam(":valor9", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":valor10",$datos["anexo"], PDO::PARAM_STR);
		$stmt->bindParam(":valor11", $valor, PDO::PARAM_STR);
	
		
		if($stmt->execute()){

			return "ok";	
		} 
		
		else{

			return "error";
				//para validar el error enviado por la base de datos
		

		}
			//para validar el error enviado por la base de datos
		
		
		
		$stmt->close();
		$stmt = null; 

	}

	static public function mdlBorrarEquipo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_equipo = :valor1");
		$stmt->bindParam(":valor1", $datos, PDO::PARAM_STR);

		
		if($stmt->execute()){

			return "ok";	
			
		}else{


			//echo "<script type=\"text/javascript\">alert('".Conexion::conectar()->errorInfo()."');</script>";  
			//print_r(Conexion::conectar()->errorInfo());
			return "error";
			//echo "\nPDO::errorInfo():\n";
			//print_r(Conexion::conectar()->errorInfo());
			//return;
		}
		//echo "\nPDO::errorInfo():\n";
		print_r(Conexion::conectar()->errorInfo());
		//return;
		
		$stmt->close();
		$stmt = null; 
		
	}

}
