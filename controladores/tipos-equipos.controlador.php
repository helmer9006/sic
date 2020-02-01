<?php

class ControladorTipoEquipos{
	
/* mostrar Tipo*/ 

	static public function ctrMostrarTiposEquipos($item, $valor){

	$tabla = "tp_equipo";

	$respuesta = ModeloTipoEquipos::mdlMostrarTiposEquipos($tabla, $item, $valor);

	return $respuesta;
}
    //crear tipo equipo
	static public function ctrCrearTipoEquipo(){

        if(isset($_POST["nuevoTipoEquipo"])){

			if(preg_match('/^[?\\¿\\!\\¡\\:\\,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoTipoEquipo"])){

				$tabla = "tp_equipo";
		

				$datos = array("nombre" => $_POST["nuevoTipoEquipo"]);	

					          
				$respuesta = ModeloTipoEquipos::mdlIngresarTipoEquipo($tabla, $datos);

				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El tipo de equipo ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "tipos-equipos";

						}

					});
				
					</script>';
					
					}

				} else{

					
					echo '<script>

					swal({

						type: "error",
						title: "¡El tipo de equipo no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "tipos-equipos";

						}

					});				

				</script>';
				
				}
				
			}

	}


	static public function ctrEditarTipoEquipo(){

		if(isset($_POST["editarTipoEquipo"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTipoEquipo"])){


				$tabla = "tp_equipo";
				$valor = $_POST["identTipoEquipo"];
				
				$datos = array("nombre" => $_POST["editarTipoEquipo"]);	

				$respuesta = ModeloTipoEquipos::mdlEditarTipoEquipo($tabla, $datos, $valor);		
              

				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El tipo de equipo ha sido modificado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "tipos-equipos";

						}

					});
				
					</script>';
					
					} 

			}else{
				
					echo '<script>

					swal({

						type: "error",
						title: "¡El nombre del tipo de equipo no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "tipos-equipos";

						}

					});				

				</script>';
				
				
			}


		}	
	}


	static public function ctrBorrarTipoEquipo(){

		if(isset($_GET["idTipoEquipo"])){

			$tabla ="tp_equipo";
			$datos = $_GET["idTipoEquipo"];

			$respuesta = ModeloTipoEquipos::mdlBorrarTipoEquipo($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El Tipo ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "tipos-equipos";

								}
							})

				</script>';

			}		

		}

	}

}



  
