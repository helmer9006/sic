<?php
require_once "../controladores/areas.controlador.php";
require_once "../modelos/areas.modelo.php";

class AjaxAreas{



//cargar Areas

public function ajaxCargarAreas(){


	$item = null; 
	$valor= null;
	$respuesta = ControladorAreas::ctrMostrarAreas($item, $valor);

	$areas = '<option value="0" id="editarListaArea"></option>';

	foreach ($respuesta as $key => $res)
	{
		$areas  .= "<option value='$res[id]'>$res[nombre]</option>";
	}
	echo $areas ;
	//echo json_encode($respuesta);	
}


//Editar area

    public $idArea;

	public function ajaxEditarArea(){

		$item = "id";
		$valor = $this->idArea;

		$respuesta = ControladorAreas::ctrMostrarAreas($item, $valor);

        echo json_encode($respuesta);
        
	}


	/*=============================================
	VALIDAR NO REPETIR AREAS
	=============================================*/	

	public $validarArea;

	public function ajaxValidarArea(){

		$item = "nombre";
		$valor = $this->validarArea;

		$respuesta = ControladorAreas::ctrMostrarAreas($item, $valor);

		echo json_encode($respuesta);

	}



    

} //fin clase


/*=============================================
  CARGAR AREAS PARA SELECT AREAS ANIDADO CON CATEGORIAS
=============================================*/	

if(isset($_POST["peticion"])){

	$cargararea = new AjaxAreas();
	$cargararea -> ajaxCargarAreas = $_POST["peticion"];
  	$cargararea-> ajaxCargarAreas();
}
    


/*=============================================
EDITAR AREAS
=============================================*/	

if(isset($_POST["idArea"])){

	$editar = new AjaxAreas();
	$editar -> idArea = $_POST["idArea"];
	$editar -> ajaxEditarArea();    
}


/*=============================================
  VALIDAR QUE AREA NO ESTE CREADO EN LA DB
=============================================*/	

if(isset($_POST["validarArea"])){


    $valArea = new AjaxAreas();
    $valArea -> ajaxValidarArea = $_POST["validarArea"];
    $valArea-> ajaxValidarArea();
}
    
?>
