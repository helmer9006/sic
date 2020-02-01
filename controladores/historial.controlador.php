<?php

class ControladorHistorial{
	
/* crear Categorias*/ 

    static public function ctrMostrarHistorial($item, $valor){


        $tabla = "histo_equipo";

        $respuesta = ModeloHistorial::mdlMostrarHistorial($tabla, $item, $valor);
        
        return $respuesta;
    }

    static public function ctrMostrarHistorialxEquipo($item, $valor){
      
        
        $tabla = "histo_equipo";

        $respuesta = ModeloHistorial::mdlMostrarHistorialxEquipo($tabla, $item, $valor);
      
        return $respuesta;
    }
    
    static public function ctrCrearHistorial($item, $datos, $usuario){
   
      
        $tabla = "histo_equipo";
        $respuesta = ModeloHistorial::mdlCrearHistorial($tabla, $item, $datos, $usuario);


        return $respuesta;
    }

    static public function ctrModificarHistorial($item, $datos){
   
      
        $tabla = "histo_equipo";
        $respuesta = ModeloHistorial::mdlModificarHistorial($tabla, $item, $datos);


        return $respuesta;
    }
    static public function ctrEliminarHistorial($valor){
   
      
        $tabla = "histo_equipo";
        $respuesta = ModeloHistorial::mdlEliminarHistorial($tabla, $valor);
        
        return $respuesta;

    }


}