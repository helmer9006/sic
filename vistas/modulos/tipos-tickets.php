<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1>

      Administrar Tipos de Tickets
        
      </h1>

      <ol class="breadcrumb">

        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

        <li class="active">Administrar Tipos Ticket</li>

      </ol>

    </section>

    <!-- Main content -->
    
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTipo">
            
            Agregar Tipo
          
          </button>  

        </div>

        <div class="box-body">
          <!-- clase tablas es usada para agregar efectos plugins datatable y dt-responsive para que la tabla sea responsiva en moviles-->
          <table class="table table-bordered table-striped dt-responsive tablas " width="100%">
          
            <thead>
            
              <tr>

                    <th style="width:10px">#</th>
                    <th>TIPO TICKET</th>
                    <th>FECHA CREACIÓN</th>
                    <th>ACCIONES</th>
                    
              </tr>
          
            </thead>
            <body>

         <?php
              
            $item = null;
            $valor = null;
      
            $tipos = ControladorTipoTickets::ctrMostrarTiposTickets($item, $valor);
            
          foreach ($tipos as $key => $value){

           echo '   
              <tr>
                    <td>'.($key+1).'</td>
                    <td  class="text-uppercase">'.$value["nombre"].'</td>
                    <td>'.$value["fecha_creacion"].'</td>
                   
                    <td>
                      <div class="btn-group">

                        <button class="btn btn-warning  btnEditarTipo" idTipo="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarTipo"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger btnEliminarTipo" idTipo="'.$value["id"].'"><i class="fa fa-times"></i></button>
                    
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
<div id="modalAgregarTipo" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <!-- Modal content-->
      <div class="modal-content">

    <form rol="form" method="post">
        <!--=============================================
                ENCABEZADO DEL MODAL
        =============================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" data-dismiss="modal" class="close">&times;</button>
            
            <h4 class="modal-title">Agregar Tipo</h4>
          
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
                      <input type="text" class="form-control input-lg" id="nuevoTipo" name="nuevoTipo" placeholder="Ingresar Nombre Tipo" required>
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

                  $crearTipo = new ControladorTipoTickets();
                  $crearTipo -> ctrCrearTipoTicket();

              ?>
          
          </form>
      
        </div>

    </div>
  </div>




       <!--=============================================
					VENTANA MODAL EDITAR CATEGORIA
	     =============================================-->


  <!-- Modal -->
  <div id="modalEditarTipo" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <!-- Modal content-->
      <div class="modal-content">

    <form rol="form" method="post">
        <!--=============================================
                ENCABEZADO DEL MODAL
        =============================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" data-dismiss="modal" class="close">&times;</button>
            
            <h4 class="modal-title">Editar Tipo</h4>
          
          </div>
        <!--=============================================
                CUERPO DEL MODAL
        =============================================-->
          
          <div class="modal-body">

              <div class="box-boby">

                <!-- Entrada Editar Nombre Tipo-->

                <div class="form-group">

                      <div class="input-group">

                          <span class="input-group-addon"><i class="fa fa-th"></i></span>
                          <input type="text" class="form-control input-lg" id="editarTipo" name="editarTipo">
                          <input type="hidden"  id="identTipo" name="identTipo">
                          
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

                  $editarTipo = new ControladorTipoTickets();
                  $editarTipo -> ctrEditarTipoTicket();
                  

              ?>
          
          </form>
      
        </div>

    </div>
  </div>

<!-- se intancia la clase controladorTipoTickets y se ejecuta el metodo borrar Tipo Ticket-->

<?php
        $borrarTipo = new ControladorTipoTickets();
        $borrarTipo -> ctrBorrarTipoTicket();
?>