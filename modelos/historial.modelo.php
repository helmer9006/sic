<?php

require_once "conexion.php";

class ModeloHistorial{

    /* Crear Historial */
 
    static public function mdlMostrarHistorial($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT h.id_histo id, e.codigo codigo, h.observacion observacion, u.nombre nombre, h.fecha_observacion fecha_observacion, c.nombre categoria, m.nombre marca, e.modelo modelo, d.nombre dependencia from histo_equipo as h 
            INNER JOIN equipo as e ON (h.id_equipo = e.id_equipo) 
            INNER JOIN usuarios as u ON (h.id_usuario = u.id) 
            INNER JOIN marca as m ON (e.id_marca = m.id) 
            INNER JOIN categoria as c ON (e.id_categoria = c.id) 
            INNER JOIN dependencia as d ON (e.id_dependencia = d.id) 
            WHERE h.$item = :valor1"); 
	
			$stmt -> bindParam(":valor1", $valor, PDO::PARAM_STR);
	
			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT h.id_histo id, e.codigo codigo, h.observacion observacion, u.nombre usuario, h.fecha_observacion fecha_observacion, c.nombre categoria, m.nombre marca, e.modelo modelo, d.nombre dependencia from histo_equipo as h 
            INNER JOIN equipo as e ON (h.id_equipo = e.id_equipo) 
            INNER JOIN usuarios as u ON (h.id_usuario = u.id) 
            INNER JOIN marca as m ON (e.id_marca = m.id) 
            INNER JOIN categoria as c ON (e.id_categoria = c.id) 
            INNER JOIN dependencia as d ON (e.id_dependencia = d.id)");

			$stmt -> execute();
  
			return $stmt -> fetchAll();
			
		}

		$stmt -> close();

		$stmt = null;

    }
    
    static public function mdlMostrarHistorialxEquipo($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT h.id_histo id, h.id_equipo id_equipo, e.codigo codigo, h.observacion observacion, u.nombre usuario, h.fecha_observacion fecha_observacion, c.nombre categoria, m.nombre marca, e.modelo modelo, d.nombre dependencia from histo_equipo as h 
            INNER JOIN equipo as e ON (h.id_equipo = e.id_equipo) 
            INNER JOIN usuarios as u ON (h.id_usuario = u.id) 
            INNER JOIN marca as m ON (e.id_marca = m.id) 
            INNER JOIN categoria as c ON (e.id_categoria = c.id) 
            INNER JOIN dependencia as d ON (e.id_dependencia = d.id) 
            WHERE h.$item = :valor1"); 
	
			$stmt -> bindParam(":valor1", $valor, PDO::PARAM_STR);
	
            $stmt -> execute();
  
			return $stmt -> fetchAll();

            }

            $stmt -> close();

		    $stmt = null;

        }

    static public function mdlCrearHistorial($tabla, $item, $datos, $usuario){
	 
		
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (observacion, fecha_observacion, id_equipo, id_usuario) VALUES (:valor1, :valor2, :valor3, :valor4)");
        $stmt->bindParam(":valor1", $datos["observacion"], PDO::PARAM_STR);
        $stmt->bindParam(":valor2", $datos["fecha_observacion"], PDO::PARAM_STR);
        $stmt->bindParam(":valor3", $item, PDO::PARAM_STR);
        $stmt->bindParam(":valor4", $usuario, PDO::PARAM_STR);
      
         if($stmt->execute()){
 
             return 1;	
             //echo "\nPDO::errorInfo():\n";
             //print_r(Conexion::conectar()->errorInfo());
             //return;
         } 
         
         else{
 
             return "error";
             //para validar el error enviado por la base de datos
             //print_r(Conexion::conectar()->errorInfo());
             // return;
         }
 
 
         $stmt->close();
         $stmt = null; 
 
     }

     static public function mdlEliminarHistorial($tabla, $valor){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_histo = :valor1");
		$stmt->bindParam(":valor1", $valor, PDO::PARAM_STR);
     
		
		if($stmt->execute()){

			//echo "\nPDO::errorInfo():\n";
			//print_r(Conexion::conectar()->errorInfo());
			//return;
			return "ok";	
			
		}else{

			return "error";
		}

		$stmt->close();
		$stmt = null; 
		
    }



    
    static public function mdlModificarHistorial($tabla, $item, $datos){
     
  
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET observacion = :valor1, id_equipo = :valor2, id_usuario = :valor3, fecha_observacion = :valor4 where id_histo = $item");
        $stmt->bindParam(":valor1", $datos["observacion"], PDO::PARAM_STR);
        $stmt->bindParam(":valor2", $datos["id_equipo"], PDO::PARAM_STR);
        $stmt->bindParam(":valor3", $datos["id_usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":valor4",  $datos["fecha_observacion"], PDO::PARAM_STR);

     
         if($stmt->execute()){
 
             return 1;	
             //echo "\nPDO::errorInfo():\n";
             //print_r(Conexion::conectar()->errorInfo());
             //return;
         } 
         
         else{
 
             return "error";
             //para validar el error enviado por la base de datos
             //print_r(Conexion::conectar()->errorInfo());
             // return;
         }
 
     
         $stmt->close();
         $stmt = null; 
 
     }

 }