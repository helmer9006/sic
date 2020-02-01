<?php
require_once "../controladores/marcas.controlador.php";
require_once "../modelos/marcas.modelo.php";

class AjaxMarcas{

//Editar marca

    public $idMarca;

	public function ajaxEditarMarca(){

		$item = "id";
		$valor = $this->idMarca;

		$respuesta = ControladorMarcas::ctrMostrarMarcas($item, $valor);

        echo json_encode($respuesta);
        
	}


	/*=============================================
	VALIDAR NO REPETIR MARCA
	=============================================*/	

	public $validarMarca;

	public function ajaxValidarMarca(){

		$item = "nombre";
		$valor = $this->validarMarca;

		$respuesta = ControladorMarcas::ctrMostrarMarcas($item, $valor);

		echo json_encode($respuesta);

	}



    

} //fin clase



/*=============================================
EDITAR MARCA
=============================================*/	

if(isset($_POST["idMarca"])){

	$editar = new AjaxMarcas();
	$editar -> idMarca = $_POST["idMarca"];
	$editar -> ajaxEditarMarca();    
}


/*=============================================
  VALIDAR QUE MARCA NO ESTE CREADO EN LA DB
=============================================*/	

if(isset($_POST["validarMarca"])){


    $valMarca = new AjaxMarcas();
    $valMarca -> validarMarca = $_POST["validarMarca"];
    $valMarca -> ajaxValidarMarca();
}
    
?>
