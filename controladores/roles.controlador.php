<?php

class ControladorRoles{
	
/* crear Roles*/ 



	static public function ctrMostrarRoles($item, $valor){

	$tabla = "roles";

	$respuesta = ModeloRoles::mdlMostrarRoles($tabla, $item, $valor);

	return $respuesta;
}

	static public function ctrCrearRol(){

        if(isset($_POST["nuevoRol"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoRol"])){

				$tabla = "roles";
		

				$datos = array("nombre" => $_POST["nuevoRol"]);	

					          
				$respuesta = ModeloRoles::mdlIngresarRol($tabla, $datos);
				
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El rol ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "roles";

						}

					});
				
					</script>';
					
					}

				} else{

					
					echo '<script>

					swal({

						type: "error",
						title: "¡El rol no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "roles";

						}

					});				

				</script>';
				
				}
				
			}

	}


	static public function ctrEditarRol(){

		if(isset($_POST["editarRol"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarRol"])){


				$tabla = "roles";
				$valor = $_POST["identRol"];
				
				$datos = array("nombre" => $_POST["editarRol"]);	

				$respuesta = ModeloRoles::mdlEditarRol($tabla, $datos, $valor);		
			

				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El Rol ha sido modificado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "roles";

						}

					});
				
					</script>';
					
					} 

			}else{
				
					echo '<script>

					swal({

						type: "error",
						title: "¡El nombre del rol no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "roles";

						}

					});				

				</script>';
				
				
			}


		}	
	}


	static public function ctrBorrarRol(){

		if(isset($_GET["idRol"])){

			$tabla ="roles";
			$datos = $_GET["idRol"];

			$respuesta = ModeloRoles::mdlBorrarRoles($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El rol ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "roles";

								}
							})

				</script>';

			}		

		}

	}

}



  
