<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1>

      Administrar Marcas
        
      </h1>

      <ol class="breadcrumb">

        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

        <li class="active">Administrar Marcas</li>

      </ol>

    </section>

    <!-- Main content -->
    
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarMarca">
            
            Agregar Marcas
          
          </button>  

        </div>

        <div class="box-body">
          <!-- clase tablas es usada para agregar efectos plugins datatable y dt-responsive para que la tabla sea responsiva en moviles-->
          <table class="table table-bordered table-striped dt-responsive tablas " width="100%">
          
            <thead>
            
              <tr>

                    <th style="width:10px">#</th>
                    <th>MARCA</th>
                    <th>FECHA CREACIÓN</th>
                    <th>ACCIONES</th>
                    
              </tr>
          
            </thead>
            <body>

         <?php
              
            $item = null;
            $valor = null;
      
            $marcas = ControladorMarcas::ctrMostrarMarcas($item, $valor);
            
          foreach ($marcas as $key => $value){

           echo '   
              <tr>
                    <td>'.($key+1).'</td>
                    <td  class="text-uppercase">'.$value["nombre"].'</td>
                    <td>'.$value["fecha_creacion"].'</td>
                   
                    <td>
                      <div class="btn-group">

                        <button class="btn btn-warning  btnEditarMarca" idMarca="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarMarca"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger btnEliminarMarca" idMarca="'.$value["id"].'"><i class="fa fa-times"></i></button>
                    
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
					VENTANA MODAL AGREGAR MARCA- MARCA NUEVA
	     =============================================-->


  <!-- Modal -->
<div id="modalAgregarMarca" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <!-- Modal content-->
      <div class="modal-content">

    <form rol="form" method="post">
        <!--=============================================
                ENCABEZADO DEL MODAL
        =============================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" data-dismiss="modal" class="close">&times;</button>
            
            <h4 class="modal-title">Agregar Marca</h4>
          
          </div>
        <!--=============================================
                CUERPO DEL MODAL
        =============================================-->
          
          <div class="modal-body">

              <div class="box-boby">

                <!-- Entrada Nombre Marca-->

                <div class="form-group">

                      <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-th"></i></span>
                      <input type="text" class="form-control input-lg" id="nuevaMarca" name="nuevaMarca" placeholder="Ingresar Nombre Marca" required>
                      </div>
                      
                  </div>                
        </div>
    </div>
        <!--=============================================
              FOOTER DEL MODAL
        =============================================-->
          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Guardar Marca</button>
          
          </div>


              <?php

                  $crearMarca = new ControladorMarcas();
                  $crearMarca -> ctrCrearMarca();

              ?>
          
          </form>
      
        </div>

    </div>
  </div>




       <!--=============================================
					VENTANA MODAL EDITAR CATEGORIA
	     =============================================-->


  <!-- Modal -->
  <div id="modalEditarMarca" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <!-- Modal content-->
      <div class="modal-content">

    <form rol="form" method="post">
        <!--=============================================
                ENCABEZADO DEL MODAL
        =============================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" data-dismiss="modal" class="close">&times;</button>
            
            <h4 class="modal-title">Editar Marca</h4>
          
          </div>
        <!--=============================================
                CUERPO DEL MODAL
        =============================================-->
          
          <div class="modal-body">

              <div class="box-boby">

                <!-- Entrada Editar Nombre Marca-->

                <div class="form-group">

                      <div class="input-group">

                          <span class="input-group-addon"><i class="fa fa-th"></i></span>
                          <input type="text" class="form-control input-lg" id="editarMarca" name="editarMarca">
                          <input type="hidden"  id="identMarca" name="identMarca">
                          
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

                  $editarMarca = new ControladorMarcas();
                  $editarMarca -> ctrEditarMarca();
                  

              ?>
          
          </form>
      
        </div>

    </div>
  </div>

<!-- se intancia la clase controladorMarcas y se ejecuta el metodo borrar marca-->

<?php
        $borrarMarca = new ControladorMarcas();
        $borrarMarca -> ctrBorrarMarca();
?>