<?php
require_once "../controladores/inventario.controlador.php";
require_once "../controladores/historial.controlador.php";

require_once "../modelos/inventario.modelo.php";
require_once "../modelos/historial.modelo.php";

class TablaHistorial{

    public $idEquipoH;
    public function mostrarTablaHistorial(){

        //echo json_encode($respuesta);

        //$item =  null;
        //$valor = null;
        $item = "id_equipo";
        $valor = $this->idEquipoH;
  
        $historial = ControladorHistorial::ctrMostrarHistorialxEquipo($item, $valor);
      
        if($historial){

            $datos_json = '{
                "data": [';
    
                for($i=0; $i < count($historial); $i++){
                    //declaracion de la fecha solo fecha sin hora ni minutos
                    $date = date_create($historial[$i]["fecha_observacion"]);
                    $fecha=date_format($date, 'd-m-Y');
    
                    //validar si existe anexo y mostrar boton   
                   
                    $botones = "<div class='btn-group'><button type='button'onClick='editarHistorial()' class='btn btn-warning btn-sm btnEditarHisto' idEquipo='".$historial[$i]["id_equipo"]."' idHistorial='".$historial[$i]["id"]."'><i class='glyphicon glyphicon-edit'></i></i></button><button type='button'onClick='eliminarHistorial()' class='btn btn-danger btn-sm btnEliminarHisto' idEquipo='".$historial[$i]["id_equipo"]."' idHistorial='".$historial[$i]["id"]."'  idCodigo='".$historial[$i]["codigo"]."'><i class='glyphicon glyphicon-trash'></i></i></button></div>";
                    
                    $datos_json .='
                    [
                        "'.($i+1).'",
                        "'.$historial[$i]["codigo"].'",
                        "'.$historial[$i]["observacion"].'",
                        "'.$historial[$i]["usuario"].'",    
                        "'.$fecha.'",
                        "'.$botones.'"
                    ],';  
    
          }//fin for 
          
            $datos_json = substr($datos_json, 0, -1);
               $datos_json .= ']
            }';
          
        echo $datos_json;    
     

        }else{
            $datos_json = '{}';
            echo $datos_json;    

        }
       

 
    }

}

if(isset($_POST["idEquipoH"])){

    
	$traerHistorial = new TablaHistorial();
	$traerHistorial -> idEquipoH = $_POST["idEquipoH"];
    $traerHistorial -> mostrarTablaHistorial();    
   
	//var_dump($_POST["idEquipo"]);
}


/*========================================================
ACTIVAR TABLA DE historial
=========================================================*/

   // $activarHistorial = new TablaHistorial();
   // $activarHistorial -> mostrarTablaHistorial();

	/*var_dump($_POST["idEquipo"]);*/

