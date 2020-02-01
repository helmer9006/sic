<?php
require_once "../controladores/tickets.controlador.php";
require_once "../modelos/tickets.modelo.php";
require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";
require_once "../controladores/areas.controlador.php";
require_once "../modelos/areas.modelo.php";



class AjaxTickets{

/*=============================================
EDITAR TICKET
=============================================*/	

public $idTicket;
public $idAreaT;

public function ajaxEditarTicket(){

	$item = "id";
	$valor = $this->idTicket;

	$respuesta = ControladorTickets::ctrMostrarTicketsxItem($item, $valor);
	
	echo json_encode($respuesta);
	
}

	/*=============================================
	llenar combo categorias anidado con area
	=============================================*/	
	public $idAreas;
	public $idAreasEditar;

	public function ajaxCargarCategorias(){

		$item = "id_area";
		$valor = $this->idAreas;

		$respuesta = ControladorCategorias::ctrMostrarCategoriasxArea($item, $valor);
	
		$cadena ="
		<span class='input-group-addon'><i class='fa fa-th'></i></span> 
		<select class='form-control input-lg' id='nuevaCategoria' name='nuevaCategoria'>
		<option value=''>Seleccionar Categoría</option>
		";

		foreach ($respuesta as $key => $res)
		{
		  $cadena =$cadena.'<option value='.$res[0].'>'.$res[1].'</option>';
		}
		echo $cadena."</select>";
	}

	public function ajaxCargarAreasEditar(){

		$item = "id_area";
		$valor = $this->idAreasEditar;
		
		$respuesta = ControladorCategorias::ctrMostrarCategoriasxArea($item, $valor);
	
		$cadena ="
		<span class='input-group-addon'><i class='fa fa-th'></i></span> 
		<select class='form-control input-lg'  name='editarCategoria'>
		<option value= '''' id='editarCategoriaTicket'></option>
		";

		foreach ($respuesta as $key => $res)
		{
		  $cadena =$cadena.'<option value='.$res[0].'>'.$res[1].'</option>';
		}
		echo $cadena."</select>";
	}
 
	public function ajaxCrearCodigoTickets(){
		$item = "id_area"; 
		$valor =  $this->idAreaT;	
		$respuesta = ControladorTickets::ctrMostrarTicketsxItem($item, $valor);
        echo json_encode($respuesta);                     

	} 

} //fin clase

/*=============================================
CONSULTAR AREAS PARA CARGAR CATEGORIAS - EN NUEVO TICKET
=============================================*/	

	if(isset($_POST["idAreasT"])){
	
	$cargar = new AjaxTickets();
	$cargar -> idAreas = $_POST["idAreasT"];
	$cargar -> ajaxCargarCategorias();    
	
	}
	
/*=============================================
CONSULTAR AREAS PARA CARGAR CATEGORIAS - EN EDITAR TICKET
=============================================*/	

	
	if(isset($_POST["idAreasEditar"])){
	
		$editar = new AjaxTickets();
		$editar -> idAreasEditar = $_POST["idAreasEditar"];
		$editar -> ajaxCargarAreasEditar();    
		//var_dump($_POST["idAreasEditar"]);   
		}


/*=============================================
EDITAR TICKET
=============================================*/	

if(isset($_POST["idTicket"])){

	$editar = new AjaxTickets();
	$editar -> idTicket = $_POST["idTicket"];
	$editar -> ajaxEditarTicket();    
	//var_dump($_POST["idTicket"]);
}


/*=============================================
TRAER ULTIMO CODIGO TICKET
=============================================*/	
if(isset($_POST["idAreaT"])){
	  
	$codigoArea = new AjaxTickets();
	$codigoArea -> idAreaT = $_POST["idAreaT"];
	$codigoArea-> ajaxCrearCodigoTickets();
	
}

?>
