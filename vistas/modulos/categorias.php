<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1>

      Administrar Categorias
        
      </h1>

      <ol class="breadcrumb">

        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

        <li class="active">Administrar Categorias</li>

      </ol>

    </section>

    <!-- Main content -->
    
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
            
            Agregar Categoria
          
          </button>  

        </div>

        <div class="box-body">
          <!-- clase tablas es usada para agregar efectos plugins datatable y dt-responsive para que la tabla sea responsiva en moviles-->
          <table class="table table-bordered table-striped dt-responsive tablas " width="100%">
          
            <thead>
           
              <tr>
                    <th style="width:10px">#</th>
                    <th>Categoria</th>
                    <th>Área</th>
                    <th>Fecha Creacion</th>
                    <th>Acciones</th>
                    
              </tr>
          
            </thead>
            <body>

         <?php
              
            $item = null;
            $valor = null;
      
            $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
            $areas = ControladorAreas::ctrMostrarAreas($item, $valor);

          foreach ($categorias as $key => $value){

           echo '   
              <tr>
                    <td>'.($key+1).'</td>
                    <td>'.$value["categoria"].'</td>
                    <td>'.$value["area"].'</td>
                    <td>'.$value["fecha_creacion"].'</td>
                   
                    <td>
                      <div class="btn-group">

                        <button class="btn btn-warning  btnEditarCategoria" idCategoria="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger btnEliminarCategoria" idCategoria="'.$value["id"].'"><i class="fa fa-times"></i></button>
                    
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
					VENTANA MODAL AGREGAR CATEGORIA- CATEGORIA NUEVA
	     =============================================-->


  <!-- Modal -->
<div id="modalAgregarCategoria" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <!-- Modal content-->
      <div class="modal-content">

    <form rol="form" method="post">
        <!--=============================================
                ENCABEZADO DEL MODAL
        =============================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" data-dismiss="modal" class="close">&times;</button>
            
            <h4 class="modal-title">Agregar Categoria</h4>
          
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
                      <input type="text" class="form-control input-lg" id="nuevaCategoria" name="nuevaCategoria" placeholder="Ingresar Categoria" required>
                      </div>
                      
                  </div>
                  
  
            <!-- Entrada Para Seleccionar area Categoria-->
        
              <div class="form-group">

                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-user-o"></i></span>
                            
                            <select class="form-control input-lg" name="areaCategoria">
                            <option value="">Seleccionar Área</option>
                            <?php 
                             foreach ($areas as $key => $res)
                              {
                                 echo "<option value='".$res['id']."'>".$res['nombre']."</option>";
                              }
                          ?>        
                          </select>
  
                        </div>  

              </div>
      
        </div>


    </div>
        <!--=============================================
              FOOTER DEL MODAL
        =============================================-->
          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Guardar Categoria</button>
          
          </div>


              <?php

                  $crearCategoria = new ControladorCategorias();
                  $crearCategoria -> ctrCrearCategoria();

              ?>
          
          </form>
      
        </div>

    </div>
  </div>




       <!--=============================================
					VENTANA MODAL EDITAR CATEGORIA
	     =============================================-->


  <!-- Modal -->
  <div id="modalEditarCategoria" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <!-- Modal content-->
      <div class="modal-content">

    <form rol="form" method="post">
        <!--=============================================
                ENCABEZADO DEL MODAL
        =============================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" data-dismiss="modal" class="close">&times;</button>
            
            <h4 class="modal-title">Editar Categoria</h4>
          
          </div>
        <!--=============================================
                CUERPO DEL MODAL
        =============================================-->
          
          <div class="modal-body">

              <div class="box-boby">

                <!-- Entrada Editar Nombre Categoria-->

                <div class="form-group">

                      <div class="input-group">

                          <span class="input-group-addon"><i class="fa fa-th"></i></span>
                          <input type="text" class="form-control input-lg" id="editarCategoria" name="editarCategoria">
                          <input type="hidden"  id="identCategoria" name="identCategoria">
                          
                      </div>
                      
                  </div>
                  
            <!-- Entrada Para Seleccionar Area Categoria a Editar-->
                               
              <div class="form-group">

                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-user-o"></i></span>
                            
                            <select class="form-control input-lg" name="editarAreaCategoria">

                            <option value="''" id="editarAreaCategoria"></option>

                            <?php 
                             foreach ($areas as $key => $res)
                              {
                                 echo "<option value='".$res['id']."'>".$res['nombre']."</option>";
                              }
                          ?>        
                          </select>
  
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

                  $editarCategoria = new ControladorCategorias();
                  $editarCategoria -> ctrEditarCategoria();
                  

              ?>
          
          </form>
      
        </div>

    </div>
  </div>

<!-- se intancia la clase controladorCategorias y se ejecuta el metodo borrar categoria-->

<?php
        $borrarCategoria = new ControladorCategorias();
        $borrarCategoria -> ctrBorrarCategoria();
?>