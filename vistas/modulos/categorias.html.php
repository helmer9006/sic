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
          <table class="table table-bordered table-striped dt-responsive tablas">
          
            <thead>
            
              <tr>

                    <th style="width:10px">#</th>
                    <th>Categoria</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                    
              </tr>
          
            </thead>
            <body>
              
              <tr>
                    <td>1</td>
                    <td>EQUIPO DE COMPUTO</td>
                    <td>Sistemas</td>
                   
                    <td>
                      <div class="btn-group">

                        <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                    
                      </div>
                    
                    </td>
              
              
              </tr>

              <tr>
                    <td>1</td>
                    <td>EQUIPO DE COMPUTO</td>
                    <td>Sistemas</td>
                   
                    <td>
                      <div class="btn-group">

                        <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                    
                      </div>
                    
                    </td>
              
              
              </tr>

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
                      <input type="text" class="form-control input-lg" name="nuevaCategoria" placeholder="Ingresar Categoria" required>
                      </div>
                      
                  </div>
                  
  
            <!-- Entrada Para Seleccionar Rol Categoria-->
                  
              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-user-o"></i></span>
                  
                  <select class="form-control input-lg" name="nuevoRol">

                    <option value="">Seleccionar Rol</option>
                    <option value=1>Aires Acondicionados</option>
                    <option value=2>Electricidad</option>
                    <option value=5>Equipos Medicos</option>  
                    <option value=3>Mantenimiento General</option> 
                    <option value=4>Sistemas</option>
                  </select>
                  
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
         
            $crearCategoria= new ControladorCategorias();
            $crearCategoria -> ctrCrearCategoria();

          ?>
          
          </form>
      
        </div>

  </div>
</div>
</div>