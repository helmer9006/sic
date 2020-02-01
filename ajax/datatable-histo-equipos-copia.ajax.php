<?php
require_once "../controladores/inventario.controlador.php";
require_once "../controladores/historial.controlador.php";
require_once "../controladores/usuarios.controlador.php";


require_once "../modelos/inventario.modelo.php";
require_once "../modelos/usuarios.modelo.php";
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
      

        echo json_encode($historial);
 
 
    }
}


if(isset($_POST["idEquipoH"])){

    
	$traerHistorial = new TablaHistorial();
	$traerHistorial -> idEquipoH = $_POST["idEquipoH"];
	$traerHistorial -> mostrarTablaHistorial();    
	//var_dump($_POST["idEquipo"]);
}
/*========================================================
ACTIVAR TABLA DE EQUIPOS
=========================================================*/

   // $activarHistorial = new TablaHistorial();
   // $activarHistorial -> mostrarTablaHistorial();

	/*var_dump($_POST["idEquipo"]);*/

