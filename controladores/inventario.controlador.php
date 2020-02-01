<?php

class ControladorEquipos{
	
/* crear Ticket*/ 

static public function ctrMostrarEquipos($item, $valor){

	$tabla = "equipo";

	$respuesta = ModeloEquipos::mdlMostrarEquipos($tabla, $item, $valor);

	return $respuesta;
}

	static public function ctrCrearEquipo(){

		if(isset($_POST["nuevoAsignadoE"])){

            if(preg_match('/^[?\\¿\\!\\¡\\:\\,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoAsignadoE"]) &&
			   preg_match('/^[?\\¿\\!\\¡\\:\\,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaIpE"])&&
			   preg_match('/^[?\\¿\\!\\¡\\:\\,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoErp"])){



				
				/*=============================================
						VALIDAR ARCHIVO ANEXO
				=============================================*/
							

				$directorio= './vistas/documentos/'.$_POST["nuevaCodigoE"].'/';
				if(!file_exists($directorio)){

					mkdir($directorio);
				}
				

				if($_FILES["nuevoAnexoE"]["type"] == "application/pdf"){
				
					$aleatorio = mt_rand(100,999);
					$archivo = $directorio.$aleatorio.".pdf";

						if(!file_exists($archivo)){

							$resultado = move_uploaded_file($_FILES["nuevoAnexoE"]["tmp_name"],$archivo);

						}
				}
	
				if($_FILES["nuevoAnexoE"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
				
					$aleatorio = mt_rand(100,999);
					$archivo = $directorio.$aleatorio.".docx";

						if(!file_exists($archivo)){

							$resultado = move_uploaded_file($_FILES["nuevoAnexoE"]["tmp_name"],$archivo);

						}
				}

				
				if($_FILES["nuevoAnexoE"]["type"] == "application/msword"){
				
					$aleatorio = mt_rand(100,999);
					$archivo = $directorio.$aleatorio.".doc";

						if(!file_exists($archivo)){

							$resultado = move_uploaded_file($_FILES["nuevoAnexoE"]["tmp_name"],$archivo);

						}
				}
				if($_FILES["nuevoAnexoE"]["type"] == "application/vnd.oasis.opendocument.text"){
				
					$aleatorio = mt_rand(100,999);
					$archivo = $directorio.$aleatorio.".odt";

						if(!file_exists($archivo)){

							$resultado = move_uploaded_file($_FILES["nuevoAnexoE"]["tmp_name"],$archivo);

						}
				}
			// FIN VALIDACION Y MOVIDA  DE DOCUMENTO ARCHIVO ANEXO 


                $tabla = "equipo";
                $estado = '1';
                //se define fecha actual y zona horaria para enviar la fecha actual
                date_default_timezone_set('America/Bogota');
                $fecha = date('Y-m-d');
				$hora = date('H:i:s');
				$fechaActual = $fecha.' '.$hora;
								
				//return;
                // se pasa array de datos al modelo
                $datos = array("id_categoria" => $_POST["nuevaCategoriaE"],
                               "codigo" => $_POST["nuevaCodigoE"],
                               "marca" => $_POST["nuevaMarcaE"],
                               "modelo" => $_POST["nuevoModeloE"],
                               "serial" => $_POST["nuevoSerialE"],                      
                               "ip" => $_POST["nuevaIpE"],
							   "piso" => $_POST["nuevoPisoE"],
							   "asignado" => $_POST["nuevoAsignadoE"],
							   "id_dependencia" => $_POST["nuevaDependenciaE"],
							   "erp" => $_POST["nuevoErp"],
							   "id_usuario" => $_SESSION["id"],
							   "estado" => $estado,	
							   "id_area" => $_POST["nuevaAreaE"],
							   "anexo" => $archivo,
							   "fecha_registro" => $fechaActual);
                                                            
						
					  
				$respuesta = ModeloEquipos::mdlCrearEquipo($tabla, $datos);
                
                

				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El Equipo ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "inventario";

						}

					});
				
					</script>';
					
					}

				} else{

                    print_r(Conexion::conectar()->errorInfo());
					echo '<script>

					swal({

						type: "error",
						title: "¡Los campos no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "inventario";

						}

					});				

				</script>';
				
				}
				
			}

	}


	static public function ctrEditarEquipo(){

       
		
	

		if(isset($_POST["editarAsignadoE"])){

            if(preg_match('/^[?\\¿\\!\\¡\\:\\,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarAsignadoE"]) &&
			   preg_match('/^[?\\¿\\!\\¡\\:\\,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarIpE"])&&
			   preg_match('/^[?\\¿\\!\\¡\\:\\,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarErp"])){



				
				/*=============================================
						VALIDAR ARCHIVO ANEXO
				=============================================*/
							
				$archivoE = $_POST["editarAnexoExiste"];

				$directorio= './vistas/documentos/'.$_POST["editarCodigoE"].'/';
				if(!file_exists($directorio)){

					mkdir($directorio);
				}
				

				if($_FILES["editarAnexoE"]["type"] == "application/pdf"){
				
					$aleatorio = mt_rand(100,999);
					$archivoE = $directorio.$aleatorio.".pdf";

						if(!file_exists($archivoE)){

							$resultado = move_uploaded_file($_FILES["editarAnexoE"]["tmp_name"],$archivoE);

						}
				}
				
				if($_FILES["editarAnexoE"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
				
					$aleatorio = mt_rand(100,999);
					$archivoE = $directorio.$aleatorio.".docx";

						if(!file_exists($archivoE)){

							$resultado = move_uploaded_file($_FILES["editarAnexoE"]["tmp_name"],$archivoE);

						}
				}

				
				if($_FILES["editarAnexoE"]["type"] == "application/msword"){
				
					$aleatorio = mt_rand(100,999);
					$archivoE = $directorio.$aleatorio.".doc";

						if(!file_exists($archivoE)){

							$resultado = move_uploaded_file($_FILES["editarAnexoE"]["tmp_name"],$archivoE);

						}
				}
				if($_FILES["editarAnexoE"]["type"] == "application/vnd.oasis.opendocument.text"){
				
					$aleatorio = mt_rand(100,999);
					$archivoE = $directorio.$aleatorio.".odt";

						if(!file_exists($archivoE)){

							$resultado = move_uploaded_file($_FILES["editarAnexoE"]["tmp_name"],$archivoE);

						}
				}
			// FIN VALIDACION Y MOVIDA  DE DOCUMENTO ARCHIVO ANEXO 


                $tabla = "equipo";
                //se define fecha actual y zona horaria para enviar la fecha actual
                date_default_timezone_set('America/Bogota');
                $fecha = date('Y-m-d');
				$hora = date('H:i:s');
				$fechaActual = $fecha.' '.$hora;
				$valor = $_POST["editarIdE"];

				//return;
                // se pasa array de datos al modelo
				$datos = array("codigo" => $_POST["editarCodigoE"],
							   "id_area" => $_POST["editarAreaE"],
							   "id_categoria" => $_POST["editarCategoriaE"],
							   "marca" => $_POST["editarMarcaE"],
                               "modelo" => $_POST["editarModeloE"],
                               "serial" => $_POST["editarSerialE"],                      
                               "ip" => $_POST["editarIpE"],
							   "piso" => $_POST["editarPisoE"],
							   "asignado" => $_POST["editarAsignadoE"],
							   "id_dependencia" => $_POST["editarDependenciaE"],
							   "erp" => $_POST["editarErp"],
							   "id_usuario" => $_SESSION["id"],
							   "estado" =>  $_POST["editarEstadoE"],
							   "anexo" => $archivoE,
							   "fecha_registro" => $fechaActual);
                                                            
						
					  
				$respuesta = ModeloEquipos::mdlEditarEquipo($tabla, $datos, $valor);
		

				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El Equipo ha sido modificado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "inventario";

						}

					});
				
					</script>';
					
					}

				} else{

                    print_r(Conexion::conectar()->errorInfo());
					echo '<script>

					swal({

						type: "error",
						title: "¡Los campos no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "inventario";

						}

					});				

				</script>';
				
				}
				
			}

	}

	static public function ctrBorrarEquipo(){

		if(isset($_GET["idEquipo"])){

			$tabla ="equipo";
			$datos = $_GET["idEquipo"];
			
			$respuesta = ModeloEquipos::mdlBorrarEquipo($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El Equipo ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "inventario";

								}
							})

				</script>';

			}		

		}

	}

}


  
