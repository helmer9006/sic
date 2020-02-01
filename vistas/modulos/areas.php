<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1>

      Administrar Áreas
        
      </h1>

      <ol class="breadcrumb">

        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

        <li class="active">Administrar Áreas</li>

      </ol>

    </section>

    <!-- Main content -->
    
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarArea">
            
            Agregar Área
          
          </button>  

        </div>

        <div class="box-body">
          <!-- clase tablas es usada para agregar efectos plugins datatable y dt-responsive para que la tabla sea responsiva en moviles-->
          <table class="table table-bordered table-striped dt-responsive tablas " width="100%">
          
            <thead>
            
              <tr>

                    <th style="width:10px">#</th>
                    <th>Área</th>
                    <th>Fecha Creacion</th>
                    <th>Acciones</th>
                    
              </tr>
          
            </thead>
            <body>

         <?php
              
            $item = null;
            $valor = null;
      
            $areas = ControladorAreas::ctrMostrarAreas($item, $valor);
            
          foreach ($areas as $key => $value){

           echo '   
              <tr>
                    <td>'.($key+1).'</td>
                    <td>'.$value["nombre"].'</td>
                    <td>'.$value["fecha_creacion"].'</td>
                   
                    <td>
                      <div class="btn-group">

                        <button class="btn btn-warning  btnEditarArea" idArea="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarArea"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger btnEliminarArea" idArea="'.$value["id"].'"><i class="fa fa-times"></i></button>
                    
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
					VENTANA MODAL AGREGAR AREA- AREA NUEVA
	     =============================================-->


  <!-- Modal -->
<div id="modalAgregarArea" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <!-- Modal content-->
      <div class="modal-content">

    <form rol="form" method="post">
        <!--=============================================
                ENCABEZADO DEL MODAL
        =============================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" data-dismiss="modal" class="close">&times;</button>
            
            <h4 class="modal-title">Agregar Área</h4>
          
          </div>
        <!--=============================================
                CUERPO DEL MODAL
        =============================================-->
          
          <div class="modal-body">

              <div class="box-boby">

                <!-- Entrada Nombre Categoria-->

                <div class="form-group">

                      <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-th"></i></span>
                      <input type="text" class="form-control input-lg" id="nuevaArea" name="nuevaArea" placeholder="Ingresar nombre área" required>
                      </div>
                      
                  </div>
    
        </div>
    </div>
        <!--=============================================
              FOOTER DEL MODAL
        =============================================-->
          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Guardar Área</button>
          
          </div>


              <?php

                  $crearArea = new ControladorAreas();
                  $crearArea -> ctrCrearArea();

              ?>
          
          </form>
      
        </div>

    </div>
  </div>




       <!--=============================================
					VENTANA MODAL EDITAR CATEGORIA
	     =============================================-->


  <!-- Modal -->
  <div id="modalEditarArea" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <!-- Modal content-->
      <div class="modal-content">

    <form rol="form" method="post">
        <!--=============================================
                ENCABEZADO DEL MODAL
        =============================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" data-dismiss="modal" class="close">&times;</button>
            
            <h4 class="modal-title">Editar Área</h4>
          
          </div>
        <!--=============================================
                CUERPO DEL MODAL
        =============================================-->
          
          <div class="modal-body">

              <div class="box-boby">

                <!-- Entrada Editar Nombre Area-->

                <div class="form-group">

                      <div class="input-group">

                          <span class="input-group-addon"><i class="fa fa-th"></i></span>
                          <input type="text" class="form-control input-lg" id="editarArea" name="editarArea">
                          <input type="hidden"  id="identArea" name="identArea">
                          
                      </div>
                      
                  </div>                          
        </div>
    </div>
        <!--=============================================
              FOOTER DEL MODAL
        =============================================-->
          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Guardar Área</button>
          
          </div>


              <?php

                  $editarArea = new ControladorAreas();
                  $editarArea -> ctrEditarArea();
                  

              ?>
          
          </form>
      
        </div>

    </div>
  </div>

<!-- se intancia la clase controladorAreas y se ejecuta el metodo borrar area-->

<?php
        $borrarArea = new ControladorAreas();
        $borrarArea -> ctrBorrarArea();
?>