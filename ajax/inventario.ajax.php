<?php
require_once "../controladores/inventario.controlador.php";
require_once "../modelos/inventario.modelo.php";
require_once "../controladores/tipos-equipos.controlador.php";
require_once "../modelos/tipos-equipos.modelo.php";
require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";



class AjaxEquipos{

/*=============================================
EDITAR EQUIPO
=============================================*/	

public $idEquipo;

public function ajaxEditarEquipo(){

	$item = "id_equipo";
	$valor = $this->idEquipo;

	$respuesta = ControladorEquipos::ctrMostrarEquipos($item, $valor);
	
	echo json_encode($respuesta);
	
}



public $idCategoriaE;

	public function ajaxCrearCodigoProducto(){
		$item = "id_categoria";
		$valor =  $this->idCategoriaE;	
		$respuesta = ControladorEquipos::ctrMostrarEquipos($item, $valor);
        echo json_encode($respuesta);                     

	} 

	public function ajaxCargarAreas(){

		$item = "id_area";
		$valor = $this->idAreas;

		$respuesta = ControladorCategorias::ctrMostrarCategoriasxArea($item, $valor);
	
		$cadena ="
		<span class='input-group-addon'><i class='fa fa-th'></i></span> 
		<select class='form-control input-lg' id='nuevaCategoriaE' name='nuevaCategoriaE'>
		<option value=''>Seleccionar Categoría</option>
		";

		foreach ($respuesta as $key => $res)
		{
		  $cadena =$cadena.'<option value='.$res[0].'>'.$res[1].'</option>';
		}
		echo $cadena."</select>";
	}

}//fin clase



	//GENERAR CODIGO A PARTIR DE ID DE CATEGORIA
	
	
	if(isset($_POST["idCategoriaE"])){
	  
		$codigoEquipo = new AjaxEquipos();
		$codigoEquipo -> idCategoriaE = $_POST["idCategoriaE"];
		$codigoEquipo-> ajaxCrearCodigoProducto();
		

	}



	
/*=============================================
CONSULTAR AREAS PARA CARGAR CATEGORIAS - EN NUEVO TICKET
=============================================*/	

if(isset($_POST["idAreas"])){
	
	$cargar = new AjaxEquipos();
	$cargar -> idAreas = $_POST["idAreas"];
	$cargar -> ajaxCargarAreas();    
	//var_dump($_POST["idAreas"]);   
	}



	

/*=============================================
EDITAR EQUIPO
=============================================*/	

if(isset($_POST["idEquipo"])){

	$editar = new AjaxEquipos();
	$editar -> idEquipo = $_POST["idEquipo"];
	$editar -> ajaxEditarEquipo();    
	//var_dump($_POST["idEquipo"]);
}

?>
