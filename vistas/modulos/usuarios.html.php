<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1>

      Administrar Usuarios
        
      </h1>

      <ol class="breadcrumb">

        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

        <li class="active">Administrar usuarios</li>

      </ol>

    </section>

    <!-- Main content -->
    
    <section class="content">

      <!-- Default box -->
      <div class="box">

        <div class="box-header with-border">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
            
            Agregar Usuario
          
          </button>  

        </div>

        <div class="box-body">
          <!-- clase tablas es usada para agregar efectos plugins datatable y dt-responsive para que la tabla sea responsiva en moviles-->
          <table class="table table-bordered table-striped dt-responsive tablas">
          
            <thead>
            
              <tr>

                    <th style="width:10px">#</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Foto</th>
                    <th>Perfil</th>
                    <th>Rol</th>
                    <th>Estado</th>
                    <th>Ultimo Login</th>
                    <th>Acciones</th>

              </tr>
          
            </thead>
            <body>
              
              <tr>
                    <td>1</td>
                    <td>Usuario Administrador</td>
                    <td>admin</td>
                    <td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>
                    <td>Administrador</td>
                    <td>Sistemas</td>
                    <td><button class="btn btn-success btn-xs">Activado</button> </td>
                    <td>2017-12-11 12:05:32</td>
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
					VENTANA MODAL AGREGAR USUARIO - USAURIO NUEVO
	     =============================================-->


  <!-- Modal -->
<div id="modalAgregarUsuario" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <!-- Modal content-->
      <div class="modal-content">

    <form rol="form" method="post" enctype="multipart/form-data">
        <!--=============================================
                ENCABEZADO DEL MODAL
        =============================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" class="close">&times;</button>
            
            <h4 class="modal-title">Agregar Usuario</h4>
          
          </div>
        <!--=============================================
                CUERPO DEL MODAL
        =============================================-->
          
          <div class="modal-body">

              <div class="box-boby">

                <!-- Entrada Nombre usuario-->

                <div class="form-group">

                      <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar Nombre" required>

                      </div>
                      
                  </div>
                  
                  <!-- Entrada nick o usuario-->
                  
                  <div class="form-group">

                        <div class="input-group">

                          <span class="input-group-addon"><i class="fa fa-key"></i></span>
                          <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar Usuario o Nick" required>

                        </div>
                    
                  </div>
                
                <!-- Entrada Contrasena-->
                  
                <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                      <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar Contrasena" required>

                    </div>

                  </div>


                  <!-- Entrada Para Seleccionar Perfil-->
                  
                  <div class="form-group">

                        <div class="input-group">

                          <span class="input-group-addon"><i class="fa fa-users"></i></span>
                          
                          <select class="form-control input-lg" name="nuevoPerfil">

                            <option value="">Seleccionar Perfil</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Especial">Especial</option>
                            <option value="Estandar">Estandar</option>  

                          </select>
                          
                        </div>
                
                  </div>
            <!-- Entrada Para Seleccionar Rol-->
                  
              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-sign-in"></i></span>
                  
                  <select class="form-control input-lg" name="nuevoRol">

                    <option value="">Seleccionar Rol</option>
                    <option value="Aires Acondicionados">Aires Acondicionados</option>
                    <option value="Electrecidad">Electricidad</option>
                    <option value="EquiposMedicos">Equipos Medicos</option>  
                    <option value="MantenimientoGeneral">Mantenimiento General</option> 
                    <option value="Sistemas">Sistemas</option> 
                  </select>
                  
                </div>

              </div>

            <!-- Entrada Para Cargar Foto-->  

            <div class="form-group">

                <div class="panel">SUBIR FOTO</div>
                <input type="file" id="nuevaFoto" name="nuevaFoto"> 
                <p class="help-block">Peso Maximo de la foto 2 MB</p>
                <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="100px">
            </div>
              
      
        </div>

        <!--=============================================
              FOOTER DEL MODAL
        =============================================-->
          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Guardar Usuario</button>
          
          </div>

          </form>
      
        </div>

  </div>
</div>
</div>