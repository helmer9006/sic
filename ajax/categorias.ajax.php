<?php
require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxCategorias{

//Editar Categoria

    public $idCategoria;

	public function ajaxEditarCategoria(){

		$item = "id";
		$valor = $this->idCategoria;

		$respuesta = ControladorCategorias::ctrMostrarCategorias($item, $valor);

        echo json_encode($respuesta);
        
	}


	/*=============================================
	VALIDAR NO REPETIR CATEGORIA
	=============================================*/	

	public $validarCategoria;

	public function ajaxValidarCategoria(){

		$item = "nombre";
		$valor = $this->validarCategoria;

		$respuesta = ControladorCategorias::ctrMostrarCategorias($item, $valor);

		echo json_encode($respuesta);

	}

	/*=================================================
	CARGAR CATEGORIAS EN VISTA TICKET ANIDADADA CON AREA
	==================================================*/	

	public function ajaxCargarCategorias(){

		$item = "id_area";
		$valor = $this->id_area;
		
		$respuesta = ControladorCategorias::ctrMostrarCategoriasxArea($item, $valor);
	
		$categorias = '<option value="0" id="editarListaCategoria">Elige una Categoría</option>';

			foreach ($respuesta as $key => $res)
			{
				$categorias  .= "<option value='$res[id]'>$res[categoria]</option>";
			}
		echo $categorias ;
	}

    

} //fin clase



/*=============================================
EDITAR CATEGORIA
=============================================*/	

if(isset($_POST["idCategoria"])){

	$editar = new AjaxCategorias();
	$editar -> idCategoria = $_POST["idCategoria"];
	$editar -> ajaxEditarCategoria();    
}


/*=============================================
  VALIDAR QUE CATEGORIA NO ESTE CREADO EN LA DB
=============================================*/	

if(isset($_POST["validarCategoria"])){


    $valCategoria = new AjaxCategorias();
    $valCategoria -> validarCategoria = $_POST["validarCategoria"];
    $valCategoria -> ajaxValidarCategoria();
}
    
/*===========================================================
RECIBIR ID_AREA SELECCIONADA PARA CARGAR CATEGORIAS ANIDADADAS
============================================================*/	
if(isset($_POST["id_area"])){

	$cargarcat = new AjaxCategorias();
	$cargarcat -> id_area = $_POST["id_area"];
  	$cargarcat-> ajaxCargarCategorias();
}



?>
