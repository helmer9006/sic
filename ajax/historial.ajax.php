<?php
require_once "../controladores/inventario.controlador.php";
require_once "../modelos/inventario.modelo.php";
require_once "../controladores/tipos-equipos.controlador.php";
require_once "../modelos/tipos-equipos.modelo.php";
require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";
require_once "../controladores/historial.controlador.php";
require_once "../modelos/historial.modelo.php";



class AjaxHistorial{

/*=============================================
EDITAR EQUIPO
=============================================*/	

public $observacionH;
public $idH;
public $idUsuario;
public $idHistorial;
public $idHistorialE;
public $nuevaFechaObservacionH;

public $idEquipo;
public $idUsuarioE;
public $editarObservacion;
public $editarFechaObservacionH;
public $idHistorialEdit;

public function ajaxCrearHistorial(){

	//$idH = $_POST["id"];
	//$idUsuario = $_POST["idusuario"];


	$datos = array("observacion" => $this->observacionH,
                   "fecha_observacion" => $this->nuevaFechaObservacionH);	
                               

	//$datos = $this->observacionH;
	$item = $this->idH;
	$usuario= $this->idUsuario;
	//$valor = $this->observacionH;
	$respuesta = ControladorHistorial::ctrCrearHistorial($item, $datos, $usuario);
	
	echo json_encode($respuesta);
	
}

public function ajaxModificarHistorial(){

	$datos = array("observacion" => $this->editarObservacion,
					"id_equipo" => $this->idEquipo,
					"id_usuario" => $this->idUsuarioE,
				   "fecha_observacion" => $this->editarFechaObservacionH);	
	$item = $this->idHistorialEdit;
	

	$respuesta = ControladorHistorial::ctrModificarHistorial($item, $datos);
	
	echo json_encode($respuesta);

}




public function ajaxEliminarHistorial(){

	$valor= $this->idHistorial;

	$respuesta = ControladorHistorial::ctrEliminarHistorial($valor);

	echo json_encode($respuesta);

}


public function ajaxtraerHistorial(){

	$valor = $this->idHistorialE;
	$item = "id_histo";
	$respuesta = ControladorHistorial::ctrMostrarHistorial($item, $valor);
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



/*=============================================
CREAR REGISTRO HISTORIAL
=============================================*/	

if(isset($_POST["observacion"])){

	$crear = new AjaxHistorial();
	$crear -> idH = $_POST["id"];
	$crear -> idUsuario = $_POST["idusuario"];
	$crear -> observacionH = $_POST["observacion"];
	$crear -> nuevaFechaObservacionH = $_POST["nuevaFechaObservacionH"];
	$crear -> ajaxCrearHistorial();    


}


/*=============================================
MODIFICAR REGISTRO HISTORIAL
=============================================*/	


if(isset($_POST["editarObservacion"])){

	$modificar = new AjaxHistorial();
	$modificar -> idEquipo = $_POST["idEquipo"];
	$modificar -> idUsuarioE = $_POST["idUsuarioE"];
	$modificar -> editarObservacion = $_POST["editarObservacion"];
	$modificar -> idHistorialEdit = $_POST["idHistorialEdit"];
	$modificar -> editarFechaObservacionH = $_POST["nuevaFechaObservacionH"];
	$modificar -> ajaxModificarHistorial();    
	


}


/*=============================================
TRAER DATOS PARA EDITAR REGISTRO HISTORIAL
=============================================*/	


if(isset($_POST["idHistorialE"])){

	$eliminar = new AjaxHistorial();
	$eliminar -> idHistorialE = $_POST["idHistorialE"];
	$eliminar -> ajaxtraerHistorial();

}

/*=============================================
ELIMINAR REGISTRO HISTORIAL
=============================================*/	


if(isset($_POST["idHistorial"])){

	$eliminar = new AjaxHistorial();
	$eliminar -> idHistorial = $_POST["idHistorial"];
	$eliminar -> ajaxEliminarHistorial();

}

?>
