<?php

class ControladorDependencias{
	
/* crear Dependencias*/ 



	static public function ctrMostrarDependencias($item, $valor){

	$tabla = "dependencia";

	$respuesta = ModeloDependencias::mdlMostrarDependencias($tabla, $item, $valor);

	return $respuesta;
}

	static public function ctrCrearDependencia(){

        if(isset($_POST["nuevaDependencia"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDependencia"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDescripcion"])){

				$tabla = "dependencia";
		

                $datos = array("nombre" => $_POST["nuevaDependencia"],
                               "descripcion" => $_POST["nuevaDescripcion"]);	

					          
				$respuesta = ModeloDependencias::mdlIngresarDependencia($tabla, $datos);
				
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡La Dependencia ha sido guardada correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "dependencias";

						}

					});
				
					</script>';
					
					}

				} else{

					
					echo '<script>

					swal({

						type: "error",
						title: "¡La Dependencia no puede ir vacía o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "dependencias";

						}

					});				

				</script>';
				
				}
				
			}

	}


	static public function ctrEditarDependencia(){

		if(isset($_POST["editarDependencia"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDependencia"])){


				$tabla = "dependencia";
				$valor = $_POST["identDependencia"];
				
                $datos = array("nombre" => $_POST["editarDependencia"],
                               "descripcion" => $_POST["editarDescripcion"]);	

				$respuesta = ModeloDependencias::mdlEditarDependencia($tabla, $datos, $valor);		
			

				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡La Dependencia ha sido modificada correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "dependencias";

						}

					});
				
					</script>';
					
					} 

			}else{
				
					echo '<script>

					swal({

						type: "error",
						title: "¡El nombre de la dependencia no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "dependencias";

						}

					});				

				</script>';
				
				
			}


		}	
	}


	static public function ctrBorrarDependencia(){

		if(isset($_GET["idDependencia"])){

			$tabla ="dependencia";
			$datos = $_GET["idDependencia"];

			$respuesta = ModeloDependencias::mdlBorrarDependencia($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La Dependencia ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "dependencias";

								}
							})

				</script>';

			}		

		}

	}

}



  
