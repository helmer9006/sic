<?php

class ControladorAreas{
	
/* crear Areas*/ 



	static public function ctrMostrarAreas($item, $valor){

	$tabla = "area";

	$respuesta = ModeloAreas::mdlMostrarAreas($tabla, $item, $valor);

	return $respuesta;
}

	static public function ctrCrearArea(){

        if(isset($_POST["nuevaArea"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaArea"])){

				$tabla = "area";
		

				$datos = array("nombre" => $_POST["nuevaArea"]);	

					          
				$respuesta = ModeloAreas::mdlIngresarArea($tabla, $datos);
				
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El Área ha sido guardada correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "areas";

						}

					});
				
					</script>';
					
					}

				} else{

					
					echo '<script>

					swal({

						type: "error",
						title: "¡El Área no puede ir vacía o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "areas";

						}

					});				

				</script>';
				
				}
				
			}

	}


	static public function ctrEditarArea(){

		if(isset($_POST["editarArea"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarArea"])){


				$tabla = "area";
				$valor = $_POST["identArea"];
				
				$datos = array("nombre" => $_POST["editarArea"]);	

				$respuesta = ModeloAreas::mdlEditarArea($tabla, $datos, $valor);		
			

				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El Área ha sido modificada correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "areas";

						}

					});
				
					</script>';
					
					} 

			}else{
				
					echo '<script>

					swal({

						type: "error",
						title: "¡El nombre del área no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "areas";

						}

					});				

				</script>';
				
				
			}


		}	
	}


	static public function ctrBorrarArea(){

		if(isset($_GET["idArea"])){

			$tabla ="area";
			$datos = $_GET["idArea"];

			$respuesta = ModeloAreas::mdlBorrarArea($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El Area ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "areas";

								}
							})

				</script>';

			}		

		}

	}

}



  
