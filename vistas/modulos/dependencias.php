<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1>

      Administrar Dependencias
        
      </h1>

      <ol class="breadcrumb">

        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

        <li class="active">Administrar Dependencias</li>

      </ol>

    </section>

    <!-- Main content -->
    
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarDependencia">
            
            Agregar Dependencia
          
          </button>  

        </div>

        <div class="box-body">
          <!-- clase tablas es usada para agregar efectos plugins datatable y dt-responsive para que la tabla sea responsiva en moviles-->
          <table class="table table-bordered table-striped dt-responsive tablas " width="100%">
          
            <thead>
            
              <tr>

                    <th style="width:10px">#</th>
                    <th>Dependencia</th>
                    <th>Descripción</th>
                    <th>Fecha Creación</th>
                    <th>Acciones</th>
                    
              </tr>
          
            </thead>
            <body>

         <?php
              
            $item = null;
            $valor = null;
      
            $dependencias = ControladorDependencias::ctrMostrarDependencias($item, $valor);
            
          foreach ($dependencias as $key => $value){

           echo '   
              <tr>
                    <td>'.($key+1).'</td>
                    <td>'.$value["nombre"].'</td>
                    <td>'.$value["descripcion"].'</td>
                    <td>'.$value["fecha_creacion"].'</td>
                   
                    <td>
                      <div class="btn-group">

                        <button class="btn btn-warning  btnEditarDependencia" idDependencia="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarDependencia"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger btnEliminarDependencia" idDependencia="'.$value["id"].'"><i class="fa fa-times"></i></button>
                    
                      </div>
                    
                    </td>
              
              
              </tr>';
          }

               ?>
            </body>
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
					VENTANA MODAL AGREGAR DEPENDENCIA
	     =============================================-->


  <!-- Modal -->
<div id="modalAgregarDependencia" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <!-- Modal content-->
      <div class="modal-content">

    <form rol="form" method="post">
        <!--=============================================
                ENCABEZADO DEL MODAL
        =============================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" data-dismiss="modal" class="close">&times;</button>
            
            <h4 class="modal-title">Agregar Dependencia</h4>
          
          </div>
        <!--=============================================
                CUERPO DEL MODAL
        =============================================-->
          
          <div class="modal-body">

              <div class="box-boby">

                <!-- Entrada Nombre Dependencia-->

                <div class="form-group">

                      <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-th"></i></span>
                      <input type="text" class="form-control input-lg" id="nuevaDependencia" name="nuevaDependencia" placeholder="Ingresar nombre dependencia" required>
                      </div>
                      
                  </div>    

                <!-- Entrada Nombre Dependencia-->

                  <div class="form-group">

                        <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-th"></i></span>
                        <input type="text" class="form-control input-lg" id="nuevaDescripcion" name="nuevaDescripcion" placeholder="Ingresar descripción" required>
                 </div>

            </div>    

        </div>
    </div>
        <!--=============================================
              FOOTER DEL MODAL
        =============================================-->
          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Guardar Dependencia</button>
          
          </div>


              <?php

                  $crearMarca = new ControladorDependencias();
                  $crearMarca -> ctrCrearDependencia();

              ?>
          
          </form>
      
        </div>

    </div>
  </div>




       <!--=============================================
					VENTANA MODAL EDITAR DEPENDENCIA
	     =============================================-->


  <!-- Modal -->
  <div id="modalEditarDependencia" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <!-- Modal content-->
      <div class="modal-content">

    <form rol="form" method="post">
        <!--=============================================
                ENCABEZADO DEL MODAL
        =============================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" data-dismiss="modal" class="close">&times;</button>
            
            <h4 class="modal-title">Editar Dependencia</h4>
          
          </div>
        <!--=============================================
                CUERPO DEL MODAL
        =============================================-->
          
          <div class="modal-body">

              <div class="box-boby">

                <!-- Entrada Editar Nombre Dependencia-->

                <div class="form-group">

                      <div class="input-group">

                          <span class="input-group-addon"><i class="fa fa-th"></i></span>
                          <input type="text" class="form-control input-lg" id="editarDependencia" name="editarDependencia">
                          <input type="hidden"  id="identDependencia" name="identDependencia">
                          
                      </div>
                      
                  </div>       

                 <!-- Entrada Editar Descripcion Dependencia-->
                  
                <div class="form-group">

                      <div class="input-group">

                          <span class="input-group-addon"><i class="fa fa-th"></i></span>
                          <input type="text" class="form-control input-lg" id="editarDescripcion" name="editarDescripcion">
                          
                      </div>
                      
                  </div>                      
        </div>
    </div>
        <!--=============================================
              FOOTER DEL MODAL
        =============================================-->
          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
          
          </div>


              <?php

                  $editarDependencia = new ControladorDependencias();
                  $editarDependencia -> ctrEditarDependencia();
                  

              ?>
          
          </form>
      
        </div>

    </div>
  </div>

<!-- se intancia la clase controladorDependencias y se ejecuta el metodo borrar dependencia-->

<?php
        $borrarDependencia = new ControladorDependencias();
        $borrarDependencia -> ctrBorrarDependencia();
?>