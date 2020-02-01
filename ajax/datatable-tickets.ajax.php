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
require_once "../modelos/tickets.modelo.php";
require_once "../controladores/tickets.controlador.php";

class TablaTickets{

    public $idTipo;
    public $usuarioActivo;

    public function mostrarTablaTickets(){


        
        $item1 = 'id';
        $valor1= $this->usuarioActivo;

        $usuario = ControladorUsuarios::ctrMostrarUsuarioxId($item1, $valor1);
        
       
        $item = 'id_estado_ticket';
        $valor = $this->idTipo;
        $tickets = ControladorTickets::ctrMostrarTickets($item, $valor);
      
        if($tickets){
        $datos_json = '{
            "data": [';

        for($i=0; $i < count($tickets); $i++){

                //declaracion de la fecha registro solo fecha sin hora ni minutos

                $date = date_create($tickets[$i]["fecha_registro"]);
                $fecha=date_format($date, 'd-m-Y');

                // validar estado y asignar color al boton
                
               
                $botones = "<div class='btn-group'><button class='btn btn-warning btn-sm btnEditarTicket' idTicket='".$tickets[$i]["id"]."' data-toggle='modal' data-target='#modalEditarTicket'><i class='glyphicon glyphicon-edit'></i></button><button class='btn btn-danger btn-sm btnEliminarTicket' idTicket='".$tickets[$i]["id"]."'  idCodigo='".$tickets[$i]["codigo"]."'><i class='glyphicon glyphicon-trash'></i></button></div>";
                
                $datos_json .='
                [
                    "'.($i+1).'",
                    "'.$tickets[$i]["codigo"].'",
                    "'.$tickets[$i]["titulo"].'",
                    "'.$tickets[$i]["descripcion"].'",
                    "'.$tickets[$i]["tipo"].'",
                    "'.$tickets[$i]["area"].'",
                    "'.$tickets[$i]["categoria"].'",
                    "'.$tickets[$i]["dependencia"].'",
                    "'.$tickets[$i]["usuario"].'",
                    "'.$tickets[$i]["prioridad"].'",
                    "'.$fecha.'",
                    "'.$tickets[$i]["fecha_actualizacion"].'",
                    "'.$botones.'"
                ],';  

             }//fin for 
      
            $datos_json = substr($datos_json, 0, -1);
            $datos_json .= ']
    
                 }';
        echo $datos_json;    
    
    }else {
        
        $datos_json = '{}';
        echo $datos_json; 

    }
 } 
}
 


/*========================================================
TRAER DATOS TABLA DE TICKETS
=========================================================*/
if(isset($_POST['idTipo'])){
    
	$traerTickets = new TablaTickets();
    $traerTickets -> idTipo = $_POST["idTipo"];
    $traerTickets -> usuarioActivo = $_POST["usuarioActivo"];
    $traerTickets -> mostrarTablaTickets();  
    
      
}

/*========================================================
ACTIVAR TABLA DE TICKETS
=========================================================*/

//$activarTickets = new TablaTickets();
//$activarTickets -> mostrarTablaTickets();
