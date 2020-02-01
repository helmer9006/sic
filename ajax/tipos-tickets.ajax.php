<?php
require_once "../controladores/tipos-tickets.controlador.php";
require_once "../modelos/tipos-tickets.modelo.php";

class AjaxTiposTickets{

//Editar tipo

    public $idTipo;

	public function ajaxEditarTipo(){

		$item = "id";
		$valor = $this->idTipo;

		$respuesta = ControladorTipoTickets::ctrMostrarTiposTickets($item, $valor);

        echo json_encode($respuesta);
        
	}


	/*=============================================
	VALIDAR NO REPETIR TIPO
	=============================================*/	

	public $validarTipo;

	public function ajaxValidarTipo(){

		$item = "nombre";
		$valor = $this->validarTipo;

		$respuesta = ControladorTipoTickets::ctrMostrarTiposTickets($item, $valor);

		echo json_encode($respuesta);

	}



    

} //fin clase



/*=============================================
EDITAR TIPO
=============================================*/	

if(isset($_POST["idTipo"])){

	$editar = new AjaxTiposTickets();
	$editar -> idTipo = $_POST["idTipo"];
	$editar -> ajaxEditarTipo();    
}


/*=============================================
  VALIDAR QUE TIPO NO ESTE CREADO EN LA DB
=============================================*/	

if(isset($_POST["validarTipo"])){


    $valTipo = new AjaxTiposTickets();
    $valTipo -> ajaxValidarTipo = $_POST["validarTipo"];
    $valTipo -> ajaxValidarTipo();
}
    
?>
