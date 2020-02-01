<!--usaurio activo-->
<input type="hidden" class="form-control input-lg" id="idUsuarioT" name="idUsuarioT" value='<?php echo $_SESSION["id"]; ?>'>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">

    <h1 class="fa fa-ticket" style="padding: 15px;">

      Administrar Tickets

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar Tickets</li>

    </ol>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- cargue boto agregar tickets - Default box -->
    <div class="box">

      <div class="box-header with-border">
        <br>
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTicket">
          Agregar Nuevo Ticket
        </button>
      </div>
      <br>

      <!-- CREACION DE TABS POR ESTADOS -->
      <ul id="myTab" class="nav nav-tabs tabticket" style="padding: 10px;">
        <li class="active" onclick=clickaction(this) id="abiertos1"> <a href="#1" data-toggle="tab"><i class='fa fa-tag fa-lg'></i>ABIERTOS</a></li>
        <li onclick=clickaction(this) id="proceso2"><a href="#2" data-toggle="tab"><i class='fa fa-retweet fa-lg'></i>PROCESO</a></li>
        <li onclick=clickaction(this) id="cerrados3"><a href="#3" data-toggle="tab"><i class='fa fa-check-square-o fa-lg'></i>CERRADOS</a></li>
        <li onclick=clickaction(this) id="cancelados4"><a href="#4" data-toggle="tab"><i class='fa fa-times fa-lg'></i>CANCELADOS</a></li>
      </ul>


      <!-- CREACION DE CONTENIDOS DE LOS TABS POR ESTADOS -->
      <div id="tabContent" class="tab-content">

        <!--=============================================
                          TAB TICKET ABIERTOS
                =============================================-->

        <div class="tab-pane fade in active" id="1">

          <!-- clase tablas es usada para agregar efectos plugins datatable y dt-responsive para que la tabla sea responsiva en moviles-->

          <table class="table table-bordered table-striped dt-responsive tablaTickets1 display" width="100%">

            <thead>

              <tr>
                <th style="width:4px">#</th>
                <th style="width:6px">CÓDIGO</th>
                <th>TITULO</th>
                <th>DESCRIPCION</th>
                <th>TIPO</th>
                <th>AREA</th>
                <th>CATEGORIA</th>
                <th>DEPENDENCIA</th>
                <th>USUARIO</th>
                <th>PRIORIDAD</th>
                <th>FECHA</th>
                <th>ACTUALIZACION</th>
                <th>ACCIONES</th>

              </tr>

            </thead>

          </table>


        </div>

        <!--=============================================
                          TAB TICKET EN PROCESO 
              =============================================-->
        <div class="tab-pane fade" id="2">

          <!-- clase tablas es usada para agregar efectos plugins datatable y dt-responsive para que la tabla sea responsiva en moviles-->


          <table class="table table-bordered table-striped dt-responsive tablaTickets2 display" width="100%">

            <thead>

              <tr>

                <th style="width:4px">#</th>
                <th style="width:6px">CÓDIGO</th>
                <th>TITULO</th>
                <th>DESCRIPCION</th>
                <th>TIPO</th>
                <th>AREA</th>
                <th>CATEGORIA</th>
                <th>DEPENDENCIA</th>
                <th>USUARIO</th>
                <th>PRIORIDAD</th>
                <th>FECHA</th>
                <th>ACTUALIZACION</th>
                <th>ACCIONES</th>

              </tr>

            </thead>

          </table>



        </div>

        <!--=============================================
                          TAB TICKET CERRADOS
              =============================================-->
        <div class="tab-pane fade" id="3">
          <!-- clase tablas es usada para agregar efectos plugins datatable y dt-responsive para que la tabla sea responsiva en moviles-->

          <table class="table table-bordered table-striped dt-responsive tablaTickets3 display" width="100%">

            <thead>

              <tr>

                <th style="width:4px">#</th>
                <th style="width:6px">CÓDIGO</th>
                <th>TITULO</th>
                <th>DESCRIPCION</th>
                <th>TIPO</th>
                <th>AREA</th>
                <th>CATEGORIA</th>
                <th>DEPENDENCIA</th>
                <th>USUARIO</th>
                <th>PRIORIDAD</th>
                <th>FECHA</th>
                <th>ACTUALIZACION</th>
                <th>ACCIONES</th>

              </tr>

            </thead>

          </table>

        </div>

        <!--=============================================
                          TAB TICKET CANCELADOS
              =============================================-->
        <div class="tab-pane fade" id="4">

          <!-- clase tablas es usada para agregar efectos plugins datatable y dt-responsive para que la tabla sea responsiva en moviles-->

          <table class="table table-bordered table-striped dt-responsive tablaTickets4 display" width="100%">

            <thead>

              <tr>
                <th style="width:4px">#</th>
                <th style="width:6px">CÓDIGO</th>
                <th>TITULO</th>
                <th>DESCRIPCION</th>
                <th>TIPO</th>
                <th>AREA</th>
                <th>CATEGORIA</th>
                <th>DEPENDENCIA</th>
                <th>USUARIO</th>
                <th>PRIORIDAD</th>
                <th>FECHA</th>
                <th>ACTUALIZACION</th>
                <th>ACCIONES</th>

              </tr>

            </thead>

          </table>


        </div>

      </div>

      <!-- FIN CREACION DE TABS POR ESTADOS -->

      <!-- FIN CREACION DE TABS POR ESTADOS -->


      <!-- TABLA DINAMICA DE TICKETS -->

      <div class="box-body">


      </div>
      <!-- /.box-body -->

    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->




<!--=============================================
					      VENTANA MODAL AGREGAR TICKET
	     =============================================-->


<!-- Modal -->
<div id="modalAgregarTicket" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form rol="form" method="post">
        <!--=============================================
                ENCABEZADO DEL MODAL
        =============================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" data-dismiss="modal" class="close">&times;</button>

          <h4 class="modal-title">Agregar Ticket</h4>

        </div>
        <!--=============================================
                CUERPO DEL MODAL
        =============================================-->

        <div class="modal-body">

          <div class="box-boby">

            <!-- Entrada titulo Ticket-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-ticket"></i></span>
                <input type="text" class="form-control input-lg" id="nuevoTitulo" name="nuevoTitulo" placeholder="Ingresar titulo" required>
                <input type="hidden" class="form-control input-lg" id="nuevoCodigoT" name="nuevoCodigoT">
                <!--campo oculto para cargar codigo ticket desde js-->
              </div>

            </div>


            <!-- Entrada Para Ingresar la descripcion del ticket-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-align-left"></i></span>
                <input type="text" class="form-control input-lg" id="nuevaDescripcion" name="nuevaDescripcion" placeholder="Ingresar descripción" required>

              </div>

            </div>


            <!-- Entrada Para Seleccionar el tipo de Ticket-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-exchange"></i></span>

                <select class="form-control input-lg" name="nuevoTipo">

                  <option value="1">Soporte</option>


                </select>

              </div>

            </div>


            <!-- Entrada Para Seleccionar área del ticket-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control input-lg" id="nuevaAreaT" name="nuevaAreaT" required>

                  <option value="">Seleccionar Area</option>

                  <?php

                  $item = null;
                  $valor = null;


                  $areas = ControladorAreas::ctrMostrarAreas($item, $valor);

                  // var_dump($tipos);

                  foreach ($areas as $key => $res) {
                    echo "<option value='" . $res['id'] . "'>" . $res['nombre'] . "</option>";
                  }
                  ?>

                </select>

              </div>

            </div>

            <!-- Entrada Para Seleccionar la categoria del ticket-->

            <div class="form-group">

              <div class="input-group" id="selectorcategoriasT">




              </div>
            </div>

            <!-- Entrada Para Seleccionar dependencia del ticket-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control input-lg" id="nuevaDependenciaT" name="nuevaDependenciaT" required>

                  <option value="">Seleccionar Dependencia</option>

                  <?php

                  $item = null;
                  $valor = null;


                  $dependencias = ControladorDependencias::ctrMostrarDependencias($item, $valor);

                  // var_dump($tipos);

                  foreach ($dependencias as $key => $res) {
                    echo "<option value='" . $res['id'] . "'>" . $res['nombre'] . "</option>";
                  }
                  ?>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR PRIORIDAD -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-child"></i></span>

                <select class="form-control input-lg" name="nuevaPrioridad">

                  <option value="">Seleccionar Prioridad</option>

                  <option value=1>Alta</option>

                  <option value=2>Media</option>

                  <option value=3>Baja</option>

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
          <button type="submit" onclick=codigo(); class="btn btn-primary">Guardar Ticket</button>

        </div>

        <?php

        $crearTicket = new ControladorTickets();
        $crearTicket->ctrCrearTicket();


        ?>

      </form>

    </div>

  </div>
</div>




<!--=============================================
					      VENTANA MODAL EDITAR TICKET
	     =============================================-->


<!-- Modal -->
<div id="modalEditarTicket" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form rol="form" method="post">
        <!--=============================================
                ENCABEZADO DEL MODAL
        =============================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" data-dismiss="modal" class="close">&times;</button>

          <h4 class="modal-title">Editar Ticket</h4>

        </div>
        <!--=============================================
                CUERPO DEL MODAL
        =============================================-->

        <div class="modal-body">

          <div class="box-boby">

            <!-- Entrada titulo Ticket-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-ticket"></i></span>
                <input type="text" class="form-control input-lg" id="editarTitulo" name="editarTitulo" required>
                <input type="hidden" class="form-control input-lg" id="editarId" name="editarId">
              </div>

            </div>


            <!-- Entrada Para agregar descripcion del ticket-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-align-left"></i></span>
                <input type="text" class="form-control input-lg" id="editarDescripcion" name="editarDescripcion" required>

              </div>

            </div>



            <!-- Entrada Para Seleccionar el tipo de Ticket-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-exchange"></i></span>

                <select class="form-control input-lg" name="editarTipo">


                  <option value="''" id="editarTipoTicket"></option>
                  <?php

                  foreach ($tipos as $key => $res) {
                    echo "<option value='" . $res['id'] . "'>" . $res['nombre'] . "</option>";
                  }

                  ?>
                </select>

              </div>

            </div>



            <!-- ENTRADA PARA AREA ANIDADA CON CATEGORIAS-->


            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-navicon"></i></span>

                <select class="form-control input-lg" id="listaAreas" name="editarArea">


                </select>

              </div>

            </div>


            <!-- ENTRADA PARA CATEGORIAS ANIDADA CON AREA-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-navicon"></i></span>

                <select class="form-control input-lg" id="listaCategorias" name="editarCategoria">


                </select>

              </div>

            </div>

            <!-- Entrada Para Seleccionar dependencia del ticket-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control input-lg" id="editarDependenciaT" name="editarDependenciaT" required>


                  <option value="''" id="editarDependenciaTicket"></option>
                  <?php

                  $item = null;
                  $valor = null;

                  $dependencias = ControladorDependencias::ctrMostrarDependencias($item, $valor);

                  // var_dump($tipos);

                  foreach ($dependencias as $key => $res) {
                    echo "<option value='" . $res['id'] . "'>" . $res['nombre'] . "</option>";
                  }
                  ?>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR PRIORIDAD -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-child"></i></span>

                <select class="form-control input-lg" name="editarPrioridad">

                  <option value="''" id="editarPrioridadTicket"></option>

                  <option value=1>Alta</option>

                  <option value=2>Media</option>

                  <option value=3>Baja</option>

                </select>

              </div>

            </div>


            <!-- ENTRADA PARA SELECCIONAR ESTADO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-child"></i></span>

                <select class="form-control input-lg" name="editarEstado">

                  <option value="''" id="editarEstadoTicket"></option>


                  <option value=1>Abierto</option>

                  <option value=2>Proceso</option>

                  <option value=3>Cerrado</option>

                  <option value=4>Cancelado</option>

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
          <button type="submit" class="btn btn-primary">Guardar Ticket</button>


        </div>

        <?php

        $editarTicket = new ControladorTickets();
        $editarTicket->ctrEditarTicket();


        ?>

      </form>

    </div>

  </div>
</div>

<?php

$borrarTicket = new ControladorTickets();
$borrarTicket->ctrBorrarTicket();


?>