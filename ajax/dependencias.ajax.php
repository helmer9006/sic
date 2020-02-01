<?php
require_once "../controladores/dependencias.controlador.php";
require_once "../modelos/dependencias.modelo.php";

class AjaxDependencias{

//Editar dependencia

    public $idDependencia;

	public function ajaxEditarDependencia(){

		$item = "id";
		$valor = $this->idDependencia;

		$respuesta = ControladorDependencias::ctrMostrarDependencias($item, $valor);

        echo json_encode($respuesta);
        
	}


	/*=============================================
	VALIDAR NO REPETIR DEPENDENCIA
	=============================================*/	

	public $validarDependencia;

	public function ajaxValidarDependencia(){

		$item = "nombre";
		$valor = $this->validarDependencia;

		$respuesta = ControladorDependencias::ctrMostrarDependencias($item, $valor);

		echo json_encode($respuesta);

	}

} //fin clase



/*=============================================
EDITAR DEPENDENCIA
=============================================*/	

if(isset($_POST["idDependencia"])){

	$editar = new AjaxDependencias();
	$editar -> idDependencia = $_POST["idDependencia"];
	$editar -> ajaxEditarDependencia();    
}


/*=============================================
  VALIDAR QUE DEPENDENCIA NO ESTE CREADO EN LA DB
=============================================*/	

if(isset($_POST["validarDependencia"])){


    $valDependencia = new AjaxDependencias();
    $valDependencia -> validarDependencia = $_POST["validarDependencia"];
    $valDependencia -> ajaxValidarDependencia();
}
    
?>
