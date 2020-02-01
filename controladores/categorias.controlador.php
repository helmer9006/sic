<?php

class ControladorCategorias{
	
/* crear Categorias*/ 



static public function ctrMostrarCategorias($item, $valor){

	$tabla = "categoria";

	$respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);

	return $respuesta;
}

static public function ctrMostrarCategoriasxArea($item, $valor){

	$tabla = "categoria";

	$respuesta = ModeloCategorias::mdlMostrarCategoriasxArea($tabla, $item, $valor);

	return $respuesta;
	var_dump($respuesta);
}

static public function ctrCrearCategoria(){

        if(isset($_POST["nuevaCategoria"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCategoria"])){

				$tabla = "categoria";
		

				$datos = array("nombre" => $_POST["nuevaCategoria"],
							   "id_area" => $_POST["areaCategoria"]);	

					          
				$respuesta = ModeloCategorias::mdlIngresarCategoria($tabla, $datos);
				
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡La Categoria ha sido guardada correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "categorias";

						}

					});
				
					</script>';
					
					}

				} else{

					
					echo '<script>

					swal({

						type: "error",
						title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "categorias";

						}

					});				

				</script>';
				
				}
				
			}

	}


	static public function ctrEditarCategoria(){

		if(isset($_POST["editarCategoria"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCategoria"])){


				$tabla = "categoria";
				$valor = $_POST["identCategoria"];
				
				$datos = array("categoria" => $_POST["editarCategoria"],    
							   "id_area" => $_POST["editarAreaCategoria"]);	

				$respuesta = ModeloCategorias::mdlEditarCategoria($tabla, $datos, $valor);		
			

				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡La Categoria ha sido modificado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "categorias";

						}

					});
				
					</script>';
					
					} 

			}else{
				
					echo '<script>

					swal({

						type: "error",
						title: "¡El nombre de la categoria no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "categorias";

						}

					});				

				</script>';
				
				
			}


		}	
	}


	static public function ctrBorrarCategoria(){

		if(isset($_GET["idCategoria"])){

			$tabla ="categoria";
			$datos = $_GET["idCategoria"];

			$respuesta = ModeloCategorias::mdlBorrarCategoria($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El usuario ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "categorias";

								}
							})

				</script>';

			}		

		}

	}

}

  
