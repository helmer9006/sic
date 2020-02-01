<?php

require_once "../controladores/inventario.controlador.php";
require_once "../controladores/categorias.controlador.php";
require_once "../controladores/usuarios.controlador.php";
require_once "../controladores/areas.controlador.php";
require_once "../controladores/marcas.controlador.php";
require_once "../controladores/dependencias.controlador.php";
require_once "../modelos/inventario.modelo.php";
require_once "../modelos/usuarios.modelo.php";
require_once "../modelos/areas.modelo.php";
require_once "../modelos/marcas.modelo.php";
require_once "../modelos/dependencias.modelo.php";
require_once "../modelos/categorias.modelo.php";

class TablaEquipos{

    public function mostrarTablaEquipos(){

        $item = null;
        $valor = null;
  
        $equipos = ControladorEquipos::ctrMostrarEquipos($item, $valor);
      
     
        $datos_json = '{
            "data": [';

            for($i=0; $i < count($equipos); $i++){
                //declaracion de la fecha solo fecha sin hora ni minutos
                $date = date_create($equipos[$i]["fecha_registro"]);
                $fecha=date_format($date, 'd-m-Y');

                //validar si existe anexo y mostrar boton
                
                if($equipos[$i]["anexo"] != ""){
             
                    $anexo = "<a href=".$equipos[$i]["anexo"]." target='_blank'>Ver</a>";

                }else{
                    $anexo ='';
                }

                // validar estado y asignar color al boton
                if($equipos[$i]["estado"]!= "Activo"){

                    $estado = "<label class='btn btn-danger'>".$equipos[$i]["estado"]."</label>";

                }else{
                    $estado = "<label class='btn btn-sm btn-success'>".$equipos[$i]["estado"]."</label>";
                }
               
                $botones = "<div class='btn-group'><button class='btn btn-warning btn-sm btnEditarEquipo' idEquipo='".$equipos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarEquipo'><i class='glyphicon glyphicon-edit'></i></button><button class='btn btn-danger btn-sm btnEliminarEquipo' idEquipo='".$equipos[$i]["id"]."'  idCodigo='".$equipos[$i]["codigo"]."'><i class='glyphicon glyphicon-trash'></i></button><button class='btn btn-sm btn-default btnMostrarHistorial' idEquipoH='".$equipos[$i]["id"]."'idCodigo='".$equipos[$i]["codigo"]."' data-toggle='modal' data-target='#modalHistoEquipo' data-backdrop='static' data-keyboard='false'><i class='fa fa-eye' aria-hidden='true'></i></button></div>";
                
                $datos_json .='
                [
                    "'.($i+1).'",
                    "'.$equipos[$i]["codigo"].'",
                    "'.$equipos[$i]["marca"].'",
                    "'.$equipos[$i]["modelo"].'",
                    "'.$equipos[$i]["serial"].'",
                    "'.$equipos[$i]["ip_equipo"].'",
                    "'.$equipos[$i]["asignado"].'",
                    "'.$equipos[$i]["piso"].'",
                    "'.$equipos[$i]["categoria"].'",
                    "'.$equipos[$i]["dependencia"].'",
                    "'.$equipos[$i]["erp"].'",
                    "'.$equipos[$i]["usuario"].'",
                    "'.$equipos[$i]["area"].'",
                    "'.$fecha.'",
                    "'.$estado.'",
                    "'.$anexo.'",
                    "'.$botones.'"
                ],';  

      }//fin for 
      $datos_json = substr($datos_json, 0, -1);
     $datos_json .= ']
    
    }';
    echo $datos_json;    
 

  
    }

}


/*========================================================
ACTIVAR TABLA DE EQUIPOS
=========================================================*/

$activarEquipos = new TablaEquipos();
$activarEquipos -> mostrarTablaEquipos();