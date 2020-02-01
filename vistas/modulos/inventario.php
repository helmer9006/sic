<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1 class="fa fa-ticket" style="padding: 15px;">
     
      Administrar Inventario

      </h1>

      <ol class="breadcrumb">

        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

        <li class="active">Administrar Inventario</li>
     
      </ol>

    </section>

    <!-- Main content -->
    <section class="content">
           
              <!-- cargue boto agregar tickets - Default box -->
              <div class="box">

              <div class="box-header with-border">
                <br>
                  <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarEquipo">
                  Agregar Nuevo Equipo
                </button>               
              </div>
              <br>
      
         
         <div class="box-body">
         
          <!-- clase tablas es usada para agregar efectos plugins datatable y dt-responsive para que la tabla sea responsiva en moviles-->
         
          <table class="table table-bordered table-striped dt-responsive tablaEquipos display" width="100%">
          
            <thead>
           
              <tr>
                    <th style="width:4px">#</th>
                    <th style="width:6px">CÓDIGO</th>
                    <th>MARCA</th>
                    <th>MODELO</th>
                    <th>SERIAL</th>
                    <th>IP EQUIPO</th>
                    <th>ASIGNADO</th>
                    <th style="width:2px">PISO</th>
                    <th>CATEGORIA</th>
                    <th>DEPENDENCIA</th>
                    <th>ERP</th>              
                    <th>USUARIO</th>
                    <th>AREA</th>
                    <th style="width:8px">REGISTRO</th>
                    <th>ESTADO</th>
                    <th style="width:8px">ANEXO</th>
                    <th>ACCIONES</th>
                    
              </tr>
          
            </thead>
            
          </table>

        </div>
        <!-- /.box-body -->
        
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


       <!--=============================================
					VENTANA MODAL AGREGAR EQUIPO- NUEVO EQUIPO
	     =============================================-->

 
  <!-- Modal -->
  <div id="modalAgregarEquipo" class="modal fade modal-fullscreen" role="dialog">
  
  <div class="modal-dialog borderModal" id="modalTamaño">


    <!-- Modal content-->

      <div class="modal-content">

    <form rol="form" method="post" enctype="multipart/form-data">
        <!--=============================================
                ENCABEZADO DEL MODAL
        =============================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" data-dismiss="modal" class="close">&times;</button>
            
            <h4 class="modal-title">Agregar Equipo</h4>
          
          </div>
        <!--=============================================
                CUERPO DEL MODAL
        =============================================-->

        
          
          <div class="modal-body">

              <div class="box-boby">


               <!-- Entrada Para Seleccionar Tipo Equipo-->
                 
              <div class="form-group row">

                        <div class="col-xs-6">

                          <div class="input-group">

                                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                  
                                    <select class="form-control input-lg" id="nuevaAreaE" name="nuevaAreaE" required>
                                      
                                      <option value="">Seleccionar Area</option>
                                      
                                        <?php 

                                        $item = null;
                                        $valor = null;
                                    
                                    
                                        $areas = ControladorAreas::ctrMostrarAreas($item, $valor);           

                                      // var_dump($tipos);
                                      
                                            foreach ($areas as $key => $res)
                                              {
                                                echo "<option value='".$res['id']."'>".$res['nombre']."</option>";
                                              }
                                        ?>        
                                    
                                      </select>
        
                              </div>  
                    </div>     

          
                <!-- Entrada Categoria equipo-->

                      <div class="col-xs-6">

                              <div class="form-group" >
                          
                                          <div class="input-group"  id="selectorcategoriasE">
                                          

                                          

                                          </div>
                            
                                </div>

                    </div>     

              </div>                                        




                <!-- Entrada Codigo equipo-->


                <div class="form-group row">
              
                    <div class="col-xs-6">

                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-code"></i></span>
                            <input type="text" class="form-control input-lg" id="nuevoCodigoE" name="nuevaCodigoE" placeholder="Ingresar codigo equipo" readonly required>
                        
                          </div>
                          
                    </div>
                  
               
               <!-- Entrada Para Seleccionar Marca-->

                <div class="col-xs-6">   

                     <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-th"></i></span>
                            
                              <select class="form-control input-lg" id="nuevaMarcaE" name="nuevaMarcaE" required>
                                
                                <option value="">Seleccionar Marca</option>
                                
                                  <?php 

                                  $item = null;
                                  $valor = null;
                               
                              
                                  $marcas = ControladorMarcas::ctrMostrarMarcas($item, $valor);
                                 // var_dump($tipos);
                                 
                                      foreach ($marcas as $key => $res)
                                        {
                                          echo "<option value='".$res['id']."'>".$res['nombre']."</option>";
                                        }
                                   ?>        
                              
                                </select>
  
                        </div>  

                    </div>

              </div>


           <div class="form-group row">     

                <!-- Entrada modelo equipo-->

                <div class="col-xs-6">   

                      <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-code"></i></span>
                        <input type="text" class="form-control input-lg" id="nuevoModeloE" name="nuevoModeloE" placeholder="Ingresar modelo equipo"  required>
                    
                    </div>
                      
                </div>
          

                <!-- Entrada serial equipo-->

                  <div class="col-xs-6">   

                      <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-code"></i></span>
                        <input type="text" class="form-control input-lg" id="nuevoSerialE" name="nuevoSerialE" placeholder="Ingresar serial equipo">
                    
                     </div>
                      
                  </div>
                  
            </div>         
            
            
            <div class="form-group row">  

                 <!-- Entrada ip equipo equipo-->     

                 <div class="col-xs-6">   

                      <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-code"></i></span>
                        <input type="text" class="form-control input-lg" id="nuevaIpE" name="nuevaIpE" placeholder="Ingresar IP equipo">
                    
                    </div>
                      
                </div>

           

                 <!-- ENTRADA PARA SELECCIONAR PISO -->


                    <div class="col-xs-6">
                     
                        <div class="input-group">
                        
                          <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                            <select class="form-control input-lg" name="nuevoPisoE">
                              
                                  <option value="">Seleccionar Piso</option>

                                  <option value=1>1</option>
                                  <option value=2>2</option>
                                  <option value=3>3</option>
                                  <option value=4>4</option>
                                  <option value=5>5</option>
                                  <option value=6>6</option>
                                  <option value=7>7</option>
                                  <option value=8>8</option>
                                  <option value=9>9</option>

                            </select>

                      </div>

                    </div>    
        
              </div>   


              <div class="form-group row">

                <!-- Entrada persona responsable equipo -->      

                  <div class="col-xs-6">

                      <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-code"></i></span>
                        <input type="text" class="form-control input-lg" id="nuevoAsignadoE" name="nuevoAsignadoE" placeholder="Ingresar persona a cargo"  required>
                    
                      </div>
                      
                </div>
              
                <!-- Entrada Para Seleccionar Dependencia-->
                

                        <div class="col-xs-6">

                          <div class="input-group">

                                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                  
                                    <select class="form-control input-lg" id="nuevaDependenciaE" name="nuevaDependenciaE" required>
                                      
                                      <option value="">Seleccionar Dependencia</option>
                                      
                                        <?php 

                                        $item = null;
                                        $valor = null;
                                    
                                    
                                        $dependencias = ControladorDependencias::ctrMostrarDependencias($item, $valor);        

                                      // var_dump($tipos);
                                      
                                            foreach ($dependencias as $key => $res)
                                              {
                                                echo "<option value='".$res['id']."'>".$res['nombre']."</option>";
                                              }
                                        ?>        
                                    
                                      </select>
        
                            </div>  

                         </div>
                        
                </div> 
                

                <div class="form-group row">

                  <!-- Entrada erp -->      
                      <div class="col-xs-6">

                            <div class="input-group">

                              <span class="input-group-addon"><i class="fa fa-code"></i></span>
                              <input type="text" class="form-control input-lg" id="nuevoErp" name="nuevoErp" placeholder="Ingresar detalle ERP">
                          
                            </div>
                            
                      </div>
                                
                 </div>  

                

                      <!-- ENTRADA PARA SUBIR DOCUMENTO ANEXO -->
                   <div class="form-group row">

                      <div class="col-xs-6">
                        
                            <div class="panel">SUBIR ANEXO</div>

                                <input type="file" class="btn btn-primary nuevoAnexoE"  name="nuevoAnexoE" accept="application/pdf, .doc, .docx, .odt">

                                <p class="help-block">Peso máximo del documento 4MB(formato pdf)</p>

                            </div>

                       </div>       
                    </div>   
                          
                   
          </div>                               
                       
    
        <!--=============================================
              FOOTER DEL MODAL
        =============================================-->
          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Guardar Equipo</button>
          
          </div>


              <?php


                $crearEquipo = new ControladorEquipos();
                $crearEquipo -> ctrCrearEquipo();

              ?>
          
          </form>
      
        </div>

    </div>
    </div>




       <!--=============================================
					        VENTANA MODAL EDITAR EQUIPO
	     =============================================-->


  <!-- Modal -->
  <div id="modalEditarEquipo" class="modal fade modal-fullscreen" role="dialog">
  
  <div class="modal-dialog borderModal" id="modalTamaño">

    <!-- Modal content-->

      <div class="modal-content">

    <form rol="form" method="post" enctype="multipart/form-data">
        <!--=============================================
                ENCABEZADO DEL MODAL
        =============================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" data-dismiss="modal" class="close">&times;</button>
            
            <h4 class="modal-title">Editar Equipo</h4>
          
          </div>
        <!--=============================================
                CUERPO DEL MODAL
        =============================================-->

        
          
          <div class="modal-body">

              <div class="box-boby">


               <!-- Entrada Para Seleccionar Area Equipo-->
                 
              <div class="form-group row">

                      <div class="col-xs-6">


                        <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-code"></i></span>
                            <input type="text" class="form-control input-lg" id="editarAreaE" name="editarAreaE" readonly required> 
                            <input type="hidden"  id="editarIdE" name="editarIdE">
                                       
                          </div>

                          
                      </div>     

                       <!-- Entrada Categoria equipo-->
                                  
                      <div class="col-xs-6">

                              
                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-code"></i></span>
                            <input type="text" class="form-control input-lg" id="editarCategoriaE" name="editarCategoriaE" readonly required>
                                       
                          </div>
                       </div>     

              </div>                                        


                <!-- Entrada Codigo equipo-->


                <div class="form-group row">
              
                    <div class="col-xs-6">

                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-code"></i></span>
                            <input type="text" class="form-control input-lg" id="editarCodigoE" name="editarCodigoE" readonly required>
                                       
                          </div>
                          
                    </div>
                  
               
               <!-- Entrada Para Seleccionar Marca-->

                <div class="col-xs-6">   

                     <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-th"></i></span>
                            
                              <select class="form-control input-lg"  name="editarMarcaE" required>
                                
                                <option value="''"id="editarMarcaE"></option>
                                
                                  <?php 

                                  $item = null;
                                  $valor = null;
                               
                              
                                  $marcas = ControladorMarcas::ctrMostrarMarcas($item, $valor);
                                 // var_dump($tipos);
                                 
                                      foreach ($marcas as $key => $res)
                                        {
                                          echo "<option value='".$res['id']."'>".$res['nombre']."</option>";
                                        }
                                   ?>        
                              
                                </select>
  
                        </div>  

                    </div>

              </div>


           <div class="form-group row">     

                <!-- Entrada modelo equipo-->

                <div class="col-xs-6">   

                      <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-code"></i></span>

                        <input type="text" class="form-control input-lg" id="editarModeloE" name="editarModeloE" required>
                    
                    </div>
                      
                </div>
          

                <!-- Entrada serial equipo-->

                  <div class="col-xs-6">   

                      <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-code"></i></span>
                        <input type="text" class="form-control input-lg" id="editarSerialE" name="editarSerialE">
                    
                     </div>
                      
                  </div>
                  
            </div>         
            
            
            <div class="form-group row">  

                 <!-- Entrada ip equipo equipo-->     

                 <div class="col-xs-6">   

                      <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-code"></i></span>
                        <input type="text" class="form-control input-lg" id="editarIpE" name="editarIpE">
                    
                    </div>
                      
                </div>


                 <!-- ENTRADA PARA SELECCIONAR PISO -->


                    <div class="col-xs-6">
                     
                        <div class="input-group">
                        
                          <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                            <select class="form-control input-lg" name="editarPisoE" required>
                              
                                  <option value="''" id="editarPisoE"></option>      
                                  <option value=1>1</option>
                                  <option value=2>2</option>
                                  <option value=3>3</option>
                                  <option value=4>4</option>
                                  <option value=5>5</option>
                                  <option value=6>6</option>
                                  <option value=7>7</option>
                                  <option value=8>8</option>
                                  <option value=9>9</option>

                            </select>

                      </div>

                    </div>    
        
              </div>   


              <div class="form-group row">

                <!-- Entrada persona responsable equipo -->      

                  <div class="col-xs-6">

                      <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-code"></i></span>
                        <input type="text" class="form-control input-lg" id="editarAsignadoE" name="editarAsignadoE" required>
                    
                      </div>
                      
                </div>
              
                <!-- Entrada Para Seleccionar Dependencia-->
                

                        <div class="col-xs-6">

                          <div class="input-group">

                                  <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                  
                                    <select class="form-control input-lg"  name="editarDependenciaE" required>
                                      
                                      <option value="''"id="editarDependenciaE"></option>
                                      
                                        <?php 

                                        $item = null;
                                        $valor = null;
                                    
                                    
                                        $dependencias = ControladorDependencias::ctrMostrarDependencias($item, $valor);        

                                      // var_dump($tipos);
                                      
                                            foreach ($dependencias as $key => $res)
                                              {
                                                echo "<option value='".$res['id']."'>".$res['nombre']."</option>";
                                              }
                                        ?>        
                                    
                                      </select>
        
                            </div>  

                         </div>
                        
                </div> 
                

                <div class="form-group row">

                  <!-- Entrada erp -->      
                      <div class="col-xs-6">

                            <div class="input-group">

                              <span class="input-group-addon"><i class="fa fa-code"></i></span>
                              <input type="text" class="form-control input-lg" id="editarErp" name="editarErp">
                          
                            </div>
                            
                      </div>
                      <div class="col-xs-6">
                     
                        <div class="input-group">
                        
                          <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                            <select class="form-control input-lg" name="editarEstadoE" required>
                              
                                  <option value="''" id="editarEstadoE"></option>

                                  <option value=1>Activo</option>
                                  <option value=2>De Baja</option>
                            

                            </select>

                      </div>

                    </div>    
        
                                
                 </div>  

                

                      <!-- ENTRADA PARA SUBIR DOCUMENTO ANEXO -->
                   <div class="form-group row">

                      <div class="col-xs-6">
                        
                            <div class="panel">SUBIR ANEXO</div>

                                <input type="file" class="btn btn-primary editarAnexoE" name="editarAnexoE" accept="application/pdf, .doc, .docx, .odf">
                                <input type="hidden"   id="editarAnexoExiste" name="editarAnexoExiste">              
                                <p class="help-block">Peso máximo del documento 4MB(formato pdf)</p>

                            </div>


                       </div>       
                    </div>   
                          
                   
          </div>                               
                       
    
        <!--=============================================
              FOOTER DEL MODAL
        =============================================-->
          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Guardar Equipo</button>
          
          </div>


              <?php

               $editarEquipo = new ControladorEquipos();
               $editarEquipo -> ctrEditarEquipo();

              ?>
          
          </form>
      
        </div>

    </div>
    </div>

<?php

    $borrarEquipo = new ControladorEquipos();
    $borrarEquipo->ctrBorrarEquipo(); 

?>

       <!--=============================================
					VENTANA MODAL HISTORIAL EQUIPO
	     =============================================-->


  <!-- Modal -->
  <div id="modalHistoEquipo" class="modal fade modal-fullscreen" role="dialog">
  
  <div class="modalTamaño borderModal" id="modalTamaño">

    <!-- Modal content-->

      <div class="modal-content">
      
    <form rol="form" id="formHistorial" method="post" enctype="multipart/form-data">
        <!--=============================================
                ENCABEZADO DEL MODAL
        =============================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" data-dismiss="modal"  id="cerrar" class="close" >&times;</button>
            
            <h4 class="modal-title">Historial Equipo</h4>
          
          </div>
        <!--=============================================
                CUERPO DEL MODAL
        ==============================================-->
  
          <!--=======LABEL INFORMATIVO=============-->
  
          <div class="modal-body">
          <p class="mensaje"></p>

          <div class="box-boby">
                                            
            <label id="labelHistoE" name="labelHistoE" style="font-size:16px; text-align: center"></label>
          
            <!-- <a id="labelHistoE" name="labelHistoE" href="#" target='_blank'></a>-->
              

          <button type="button" value="Mostrar"  onClick="mostrar();" id="boton" class="btn btn-primary" style="display:block; margin-bottom: 15px; margin-top: -35px; margin-left: 5px;"><i class="fa fa-plus"></i></button>       
          <button type="button" value="Ocultar"  onClick="ocultar();" id="botonOcul" class="btn btn-primary" style="display:none; margin-bottom: 15px; margin-top: -35px; margin-left: 5px;"><i class="fa fa-minus"></i></button>       
  
      <div class="container" id="mostrarOcultar" style="display:none; margin-left: -10px;">


            <!-- ENTRADA PARA OBSERVACION -->

            <div class="form-group row">

                <div class="col-xs-6" >

                     <div  style="margin-bottom: 5px" class="input-group date datapicker" >
                        
                        <input  type="text" class="form-control" id="nuevaFechaH" name="nuevaFecha"><span class="input-group-addon" ><i class="glyphicon glyphicon-calendar"></i></span>

                     </div>

         
                    <textarea class="form-control rounded-0" name="nuevaObservacion" id="Observacion"   style="display:block;"  placeholder="Ingresar Observacion" ></textarea>      
                    <textarea class="form-control rounded-0" name="editarObservacion" id="editarObservacion"  style="display:none;"   placeholder="Ingresar Observacion" ></textarea>               
                    <input type="hidden" class="form-control input-lg" id="idHisto" name="idHisto"><!--id equipo -->
                    <input type="hidden" class="form-control input-lg" id="idHistorial" name="idHistorial"> <!--id historial -->                       
                    <input type="hidden" class="form-control input-lg" id="idUsuario" name="idUsuario" <?php echo "value='".$_SESSION['id']."'"; ?> >
                    
                    <button type="button" onClick="guardarHistorial()" class="btn btn-primary btnGuardar"  id="guardar" style="display:block; margin-top: 10px;">Guardar</button>            
                    <button type="button" onClick="modificarHistorial();" id="botonEditar" class="btn btn-primary btnEditar" style="display:none; margin-top: 10px;">Guardar Cambios</button>       
          
 
               </div>
               

      </div>
          
            
            
           
                  
                                             
      </div>
      <hr>
   </div>                     
      


             <!-- clase tablas es usada para agregar efectos plugins datatable y dt-responsive para que la tabla sea responsiva en moviles-->
             <table class="table table-bordered table-striped dt-responsive tablaHistoE display" width="100%">
          
          <thead>
         
            <tr>
                  <th style="width:10px">#</th>
                  <th>CÓDIGO</th>
                  <th>OBSERVACION</th>
                  <th>USUARIO</th>
                  <th style="width:60px;">FECHA.</th>
                  <th>ACCIONES</th>
                  
            </tr>
        
          </thead>
          
        </table>
        
     

        </div>

        <!--=============================================
              FOOTER DEL MODAL
        =============================================-->
          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left"  id="cerrar" data-dismiss="modal">Salir</button>
   
          </div>

              <?php

                // $crearHistorial = new ControladorHistorial();
              //   $crearHistorial -> ctrCrearHistorial();

              ?>
          
          </form>

  
        </div>
        </div>
    </div>
 

<!-- se intancia la clase controladorUsuarios y se ejecuta el metodo borrar usuario-->

<?php
       // $borrarhistorial = new ControladorHistorial();
        //$borrarhistorial -> ctrEliminarHistorial();
?>


