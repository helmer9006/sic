<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1>

      Administrar Tipos de Equipos
        
      </h1>

      <ol class="breadcrumb">

        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

        <li class="active">Administrar Tipos Equipos</li>

      </ol>

    </section>

    <!-- Main content -->
    
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTipoEquipo">
            
            Agregar Tipo Equipo
          
          </button>  

        </div>

        <div class="box-body">
          <!-- clase tablas es usada para agregar efectos plugins datatable y dt-responsive para que la tabla sea responsiva en moviles-->
          <table class="table table-bordered table-striped dt-responsive tablas " width="100%">
          
            <thead>
            
              <tr>

                    <th style="width:10px">#</th>
                    <th>TIPO EQUIPO</th>
                    <th>FECHA CREACIÓN</th>
                    <th>ACCIONES</th>
                    
              </tr>
          
            </thead>
            <body>

         <?php
              
            $item = null;
            $valor = null;
      
            $tipos = ControladorTipoEquipos::ctrMostrarTiposEquipos($item, $valor);
            
          foreach ($tipos as $key => $value){

           echo '   
              <tr>
                    <td>'.($key+1).'</td>
                    <td  class="text-uppercase">'.$value["descrip_tp_equipo"].'</td>
                    <td>'.$value["fecha_creacion"].'</td>
                   
                    <td>
                      <div class="btn-group">

                        <button class="btn btn-warning  btnEditarTipoEquipo" idTipoEquipo="'.$value["id_tipo"].'" data-toggle="modal" data-target="#modalEditarTipoEquipo"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger btnEliminarTipoEquipo" idTipoEquipo="'.$value["id_tipo"].'"><i class="fa fa-times"></i></button>
                    
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
					VENTANA MODAL AGREGAR TIPO
	     =============================================-->


  <!-- Modal -->
<div id="modalAgregarTipoEquipo" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <!-- Modal content-->
      <div class="modal-content">

    <form rol="form" method="post">
        <!--=============================================
                ENCABEZADO DEL MODAL
        =============================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" data-dismiss="modal" class="close">&times;</button>
            
            <h4 class="modal-title">Agregar Tipo Equipo</h4>
          
          </div>
        <!--=============================================
                CUERPO DEL MODAL
        =============================================-->
          
          <div class="modal-body">

              <div class="box-boby">

                <!-- Entrada Nombre Tipo-->

                <div class="form-group">

                      <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-th"></i></span>
                      <input type="text" class="form-control input-lg" id="nuevoTipoEquipo" name="nuevoTipoEquipo" placeholder="Ingresar Nombre Tipo Equipo" required>
                      </div>
                      
                  </div>                
        </div>
    </div>
        <!--=============================================
              FOOTER DEL MODAL
        =============================================-->
          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Guardar Tipo</button>
          
          </div>


              <?php

                  $crearTipoE = new ControladorTipoEquipos();
                  $crearTipoE -> ctrCrearTipoEquipo();

              ?>
          
          </form>
      
        </div>

    </div>
  </div>




       <!--=============================================
					VENTANA MODAL EDITAR CATEGORIA
	     =============================================-->


  <!-- Modal -->
  <div id="modalEditarTipoEquipo" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <!-- Modal content-->
      <div class="modal-content">

    <form rol="form" method="post">
        <!--=============================================
                ENCABEZADO DEL MODAL
        =============================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" data-dismiss="modal" class="close">&times;</button>
            
            <h4 class="modal-title">Editar Tipo Equipo</h4>
          
          </div>
        <!--=============================================
                CUERPO DEL MODAL
        =============================================-->
          
          <div class="modal-body">

              <div class="box-boby">

                <!-- Entrada Editar Nombre Tipo Equipo-->

                <div class="form-group">

                      <div class="input-group">

                          <span class="input-group-addon"><i class="fa fa-th"></i></span>
                          <input type="text" class="form-control input-lg" id="editarTipoEquipo" name="editarTipoEquipo">
                          <input type="hidden"  id="identTipoEquipo" name="identTipoEquipo">
                          
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

                  $editarTipoE = new ControladorTipoEquipos();
                  $editarTipoE -> ctrEditarTipoEquipo();
                  

              ?>
          
          </form>
      
        </div>

    </div>
  </div>

<!-- se intancia la clase controladorTipoTickets y se ejecuta el metodo borrar Tipo Ticket-->

<?php
        $borrarTipoEquipo = new ControladorTipoEquipos();
        $borrarTipoEquipo -> ctrBorrarTipoEquipo();
?>