<?php

class ControladorTickets{
	
/* crear Ticket*/ 

static public function ctrMostrarTickets($item, $valor){

	$tabla = "ticket";

	$respuesta = ModeloTickets::mdlMostrarTickets($tabla, $item, $valor);

	return $respuesta;
}

static public function ctrMostrarTicketsxItem($item, $valor){

	$tabla = "ticket";

	$respuesta = ModeloTickets::mdlMostrarTicketsxItem($tabla, $item, $valor);

	return $respuesta;
}


static public function ctrCrearTicket(){

        if(isset($_POST["nuevoTitulo"])){

            if(preg_match('/^[?\\¿\\!\\¡\\:\\,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoTitulo"]) &&
               preg_match('/^[?\\¿\\!\\¡\\:\\,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDescripcion"])){

                $tabla = "ticket";
                $estado = '1';
                //se define fecha actual y zona horaria para enviar la fecha actual
                date_default_timezone_set('America/Bogota');
                $fecha = date('Y-m-d');
				$hora = date('H:i:s');
                $fechaActual = $fecha.' '.$hora;

                // se pasa array de datos al modelo
				$datos = array("titulo" => $_POST["nuevoTitulo"],
							   "codigo" => $_POST["nuevoCodigoT"],
                               "descripcion" => $_POST["nuevaDescripcion"],
							   "fecha_registro" => $fechaActual,
                               "tipo" => $_POST["nuevoTipo"],
                               "usuario" => $_SESSION["id"],
                               "area" => $_POST["nuevaAreaT"],                      
							   "categoria" => $_POST["nuevaCategoria"],
							   "dependencia" => $_POST["nuevaDependenciaT"],
							   "prioridad" => $_POST["nuevaPrioridad"],
                               "estado" => $estado);	
                               
				        
				$respuesta = ModeloTickets::mdlCrearTicket($tabla, $datos);
                
                

				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El Ticket ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "tickets";

						}

					});
				
					</script>';
					
					}

				} else{

                    print_r(Conexion::conectar()->errorInfo());
					echo '<script>

					swal({

						type: "error",
						title: "¡El titulo no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "tickets";

						}

					});				

				</script>';
				
				}
				
			}

	}


	static public function ctrEditarTicket(){

        if(isset($_POST["editarTitulo"])){

			if(preg_match('/^[?\\¿\\!\\¡\\:\\,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTitulo"]) &&
               preg_match('/^[?\\¿\\!\\¡\\:\\,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcion"])){

                $tabla = "ticket";
				$valor =  $_POST["editarId"];
                //se define fecha actual y zona horaria para enviar la fecha actual
                date_default_timezone_set('America/Bogota');
                $fecha = date('Y-m-d');
				$hora = date('H:i:s');
                $fechaActual = $fecha.' '.$hora;

                // se pasa array de datos al modelo
                $datos = array("titulo" => $_POST["editarTitulo"],
                               "descripcion" => $_POST["editarDescripcion"],
                               "fecha_actualizacion" => $fechaActual,
                               "tipo" => $_POST["editarTipo"],
                               "usuario" => $_SESSION["id"],
                               "area" => $_POST["editarArea"],                      
                               "categoria" => $_POST["editarCategoria"],
							   "prioridad" => $_POST["editarPrioridad"],
							   "dependencia" => $_POST["editarDependenciaT"],
							   "estado" => $_POST["editarEstado"]);
							 
                             
                            
				$respuesta = ModeloTickets::mdlEditarTicket($tabla, $datos, $valor);
         
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El Ticket ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "tickets";

						}

					});
				
					</script>';
					
					}

				} else{

					
					echo '<script>

					swal({

						type: "error",
						title: "¡El titulo no puede ir vacío o llevar caracteres especiales!"
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "tickets";

						}

					});				

				</script>';
				
				}
				
			}

	}


	static public function ctrBorrarTicket(){

		if(isset($_GET["idTicket"])){

			$tabla ="ticket";
			$datos = $_GET["idTicket"];
			
			$respuesta = ModeloTickets::mdlBorrarTicket($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El Ticket ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "tickets";

								}
							})

				</script>';

			}		

		}

	}

}


  
