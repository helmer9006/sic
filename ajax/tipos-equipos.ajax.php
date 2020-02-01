<?php
require_once "../controladores/tipos-equipos.controlador.php";
require_once "../modelos/tipos-equipos.modelo.php";

class AjaxTiposEquipos{

//Editar tipo

    public $idTipoEquipo;

	public function ajaxEditarTipoEquipo(){

		$item = "id_tipo";
		$valor = $this->idTipoEquipo;
    
		$respuesta = ControladorTipoEquipos::ctrMostrarTiposEquipos($item, $valor);

        echo json_encode($respuesta);
        
	}


	/*=============================================
	VALIDAR NO REPETIR TIPO
	=============================================*/	

	public $validarTipoEquipo;

	public function ajaxValidarTipoEquipo(){
    
		$item = "descrip_tp_equipo";
		$valor = $this->validarTipoEquipo;

		$respuesta = ControladorTipoEquipos::ctrMostrarTiposEquipos($item, $valor);

		echo json_encode($respuesta);

	}



    

} //fin clase



/*=============================================
EDITAR TIPO
=============================================*/	

if(isset($_POST["idTipoEquipo"])){

	$editar = new AjaxTiposEquipos();
	$editar -> idTipoEquipo = $_POST["idTipoEquipo"];
	$editar -> ajaxEditarTipoEquipo();    
}


/*=============================================
  VALIDAR QUE TIPO NO ESTE CREADO EN LA DB
=============================================*/	

if(isset($_POST["validarTipoEquipo"])){

 
    $valTipo = new AjaxTiposEquipos();
    $valTipo -> validarTipoEquipo = $_POST["validarTipoEquipo"];
    $valTipo -> ajaxValidarTipoEquipo();
}
    
?>
