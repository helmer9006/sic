/*=============================================
 Activar la consulta apartir de la seleccion del area,
 recargando lista categorias, en modal nuevo ticket
=============================================*/

$(document).ready(function () {
  recargarListaT();

  $("#nuevaAreaT").change(function () {
    recargarListaT();
  });
});

//funcion para cargar lista de categorias segun area seleccionada

$("#nuevaAreaT").change(function () {
  //CAPTURAMOS EL VALOR TIPO TEXTO DEL AREA SELECCIONADA
  var infocombo = document.getElementById("nuevaAreaT");
  var opcionseleccionada = infocombo.options[infocombo.selectedIndex].text;

  var idArea = $(nuevaAreaT).val();

  var datos = new FormData();
  datos.append("idAreaT", idArea);
  $.ajax({
    url: "ajax/tickets.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      if (!respuesta) {
        var codigoNuevo = opcionseleccionada.substring(0, 3);
        codigoNuevo += "-";
        codigoNuevo += idArea + "001";
        $("#nuevoCodigoT").val(codigoNuevo);
      } else {
        var result = respuesta["codigo"];
        var codigoNuevo = result.substring(0, 3);
        codigoNuevo += "-";
        var codigo = respuesta["codigo"].substring(4);

        codigoNuevo += Number(codigo) + 1;
        $("#nuevoCodigoT").val(codigoNuevo);
      }
    }
  });
});

//Funcion para cargar categorias por id de
function recargarListaT() {
  $.ajax({
    type: "POST",
    url: "ajax/tickets.ajax.php",
    data: "idAreasT=" + $("#nuevaAreaT").val(),
    success: function (res) {
      $("#selectorcategoriasT").html(res);
    }
  });
}

/*=============================================
 Activar la consulta apartir de la seleccion del area,
 recargando lista categorias, en modal editar ticket
=============================================*/

$(document).ready(function () {
  recargarListaEditarT();

  $("#listaAreas").change(function () {
    recargarListaEditarT();
  });
});

//funcion para cargar lista de categorias segun area seleccionada

function recargarListaEditarT() {
  var id_area = $("#listaAreas").val();

  $.ajax({
    type: "POST",
    url: "ajax/categorias.ajax.php",
    data: { id_area: id_area }
  })

    .done(function (lista_cat) {
      $("#listaCategorias").html(lista_cat);
    })
    .fail(function () {
      alert("Hubo un error al cargar las categorías");
    });
}

//Se carga  de areas desde ajax area para modal editar

$(document).ready(function () {
  // alert('prueba');
  $.ajax({
    type: "POST",
    url: "ajax/areas.ajax.php",
    data: { peticion: "cargar_areas" }
  })

    .done(function (respuesta) {
      $("#listaAreas").html(respuesta);
    })
    .fail(function () {
      alert("Hubo un error al cargar las áreas");
    });
});

/*=====================================================
 EDITAR TICKET - SE CONSULTA EL TICKET SELECCIONADO Y
SE TRAEN LOS DATOS POSTERIOREMENTE SE ASIGNAN A LOS CAMPOS
======================================================*/

$(document).on("click", ".btnEditarTicket", function () {
  var idTicket = $(this).attr("idTicket");
  var datos = new FormData();

  datos.append("idTicket", idTicket);

  $.ajax({
    url: "ajax/tickets.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#editarTitulo").val(respuesta["titulo"]);
      $("#editarId").val(respuesta["id"]);
      $("#editarDescripcion").val(respuesta["descripcion"]);
      //$("#editarTipoTicket").val(respuesta["tipo"]);
      $("#editarTipoTicket").html(respuesta["tipo"]);
      $("#editarTipoTicket").val(respuesta["id_tipo"]);
      $("#editarListaArea").val(respuesta["id_area"]);
      $("#editarListaArea").html(respuesta["area"]);
      $("#editarListaCategoria").html(respuesta["categoria"]);
      $("#editarListaCategoria").val(respuesta["id_categoria"]);
      $("#editarPrioridadTicket").val(respuesta["id_prioridad"]);
      $("#editarPrioridadTicket").html(respuesta["prioridad"]);
      $("#editarEstadoTicket").html(respuesta["estado"]);
      $("#editarEstadoTicket").val(respuesta["id_estado"]);
      $("#editarDependenciaTicket").val(respuesta["id_dependencia"]);
      $("#editarDependenciaTicket").html(respuesta["dependencia"]);

      editarDependenciaTicket;
    }
  });
});

/*=============================================
 ELIMINAR TICKET
=============================================*/

$(document).on("click", ".btnEliminarTicket", function () {
  var idTicket = $(this).attr("idTicket");

  swal({
    title: "¿Está seguro de borrar el Ticket?",
    text: "¡Si no lo está puede cancelar la accíón!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, borrar Ticket!"
  }).then(function (result) {
    if (result.value) {
      window.location = "index.php?ruta=tickets&idTicket=" + idTicket;
    }
  });
});

/*--------------------------------------------------
    CARGAR LA TABLA DINAMICA DE TICKETS
---------------------------------------------------*/

document.getElementById("abiertos1").click();

function clickaction(b) {
  // Accion por defecto para los tabs;
  switch (b.id) {
    case "abiertos1":
      // entra aqui si click en boton  piedra........

      loadDatatableTicket(1);
      break;
    case "proceso2":
      // entra aqui si papel........
      loadDatatableTicket(2);
      break;
    case "cerrados3":
      // entra aqui si tijeras........
      loadDatatableTicket(3);
      break;
    case "cancelados4":
      // entra aqui si tijeras........
      loadDatatableTicket(4);
      break;
  }
}

/*======================================================
        FUNCION PARA CARGAR TABLA DE TICKETS CON PARAMETRO ID
      ========================================================	*/

function loadDatatableTicket(id) {
  //SE VALIDA SI EL DOC ESTA CARGADO Y SE CARGA NUEVAMENTE LA TABLA POR AJAX PARA MOSTRAR LA TABLA HISTO SIN REGISTRO ELIMINADO
  var datos = new FormData();
  var usuarioActivo = $(idUsuarioT).val();
  datos.append("idTipo", id);
  datos.append("usuarioActivo", usuarioActivo);

  $.ajax({
    url: "./ajax/datatable-tickets.ajax.php",
    method: "POST",
    //data: datos,
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    deferRender: true,
    retrieve: true,
    processing: true,

    success: function ($datos_json) {
      //se destruye tabla para volver a realizar el llamado
      $(".tablaTickets" + id)
        .DataTable()
        .destroy();
      if (Object.entries($datos_json).length === 0) {
        //execute
        //se asigna el json de datos a la datatable de ticket cuando json viene sin historial

        var table = $(".tablaTickets" + id).DataTable();

        table.clear();
        table.row
          .add([
            "",
            "",
            "",
            "",
            "",
            "",
            "NO EXISTEN TICKETS CON ESTE ESTADO...",
            "",
            "",
            "",
            "",
            "",
            ""
          ])
          .draw();
      } else {
        //se asigna el json de datos a la datatable de historial cuando json viene con datos de historial
        $(".tablaTickets" + id).DataTable($datos_json);
      }
    }
  });
}
