<?php

class ControladorMarcas{
	
/* crear Marcas*/ 



	static public function ctrMostrarMarcas($item, $valor){

	$tabla = "marca";

	$respuesta = ModeloMarcas::mdlMostrarMarcas($tabla, $item, $valor);

	return $respuesta;
}

	static public function ctrCrearMarca(){

        if(isset($_POST["nuevaMarca"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaMarca"])){

				$tabla = "marca";
		

				$datos = array("nombre" => $_POST["nuevaMarca"]);	

					          
				$respuesta = ModeloMarcas::mdlIngresarMarca($tabla, $datos);
				
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡La Marca ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "marcas";

						}

					});
				
					</script>';
					
					}

				} else{

					
					echo '<script>

					swal({

						type: "error",
						title: "¡La Marca no puede ir vacía o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "marcas";

						}

					});				

				</script>';
				
				}
				
			}

	}


	static public function ctrEditarMarca(){

		if(isset($_POST["editarMarca"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarMarca"])){


				$tabla = "marca";
				$valor = $_POST["identMarca"];
				
				$datos = array("nombre" => $_POST["editarMarca"]);	

				$respuesta = ModeloMarcas::mdlEditarMarca($tabla, $datos, $valor);		
			

				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡La Marca ha sido modificado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "marcas";

						}

					});
				
					</script>';
					
					} 

			}else{
				
					echo '<script>

					swal({

						type: "error",
						title: "¡El nombre del la marca no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "marcas";

						}

					});				

				</script>';
				
				
			}


		}	
	}


	static public function ctrBorrarMarca(){

		if(isset($_GET["idMarca"])){

			$tabla ="marca";
			$datos = $_GET["idMarca"];

			$respuesta = ModeloMarcas::mdlBorrarMarca($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La Marca ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "marcas";

								}
							})

				</script>';

			}		

		}

	}

}



  
