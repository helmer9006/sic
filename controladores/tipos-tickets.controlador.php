<?php

class ControladorTipoTickets{
	
/* crear Tipo*/ 

	static public function ctrMostrarTiposTickets($item, $valor){

	$tabla = "tipo";

	$respuesta = ModeloTipoTickets::mdlMostrarTiposTickets($tabla, $item, $valor);

	return $respuesta;
}

	static public function ctrCrearTipoTicket(){

        if(isset($_POST["nuevoTipo"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoTipo"])){

				$tabla = "tipo";
		

				$datos = array("nombre" => $_POST["nuevoTipo"]);	

					          
				$respuesta = ModeloTipoTickets::mdlIngresarTipoTicket($tabla, $datos);
				
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El tipo ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "tipos-tickets";

						}

					});
				
					</script>';
					
					}

				} else{

					
					echo '<script>

					swal({

						type: "error",
						title: "¡El tipo no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "tipos-tickets";

						}

					});				

				</script>';
				
				}
				
			}

	}


	static public function ctrEditarTipoTicket(){

		if(isset($_POST["editarTipo"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTipo"])){


				$tabla = "tipo";
				$valor = $_POST["identTipo"];
				
				$datos = array("nombre" => $_POST["editarTipo"]);	

				$respuesta = ModeloTipotickets::mdlEditarTipoTicket($tabla, $datos, $valor);		
			

				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El tipo ha sido modificado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "tipos-tickets";

						}

					});
				
					</script>';
					
					} 

			}else{
				
					echo '<script>

					swal({

						type: "error",
						title: "¡El nombre del tipo no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "tipos-tickets";

						}

					});				

				</script>';
				
				
			}


		}	
	}


	static public function ctrBorrarTipoTicket(){

		if(isset($_GET["idTipo"])){

			$tabla ="tipo";
			$datos = $_GET["idTipo"];

			$respuesta = ModeloTipoTickets::mdlBorrarTipoTicket($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El Tipo ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "tipos-tickets";

								}
							})

				</script>';

			}		

		}

	}

}



  
