/*  VALIDANDO  ARCHIVO ANEXO MODAL NUEVO */

$(".nuevoAnexoE").change(function() {
  var anexo = this.files[0];
  // console.log("archivo", anexo);

  /*  validar el formato del archivo, que sea docx, doc, pdf y odt*/

  if (
    anexo["type"] !=
      "application/vnd.openxmlformats-officedocument.wordprocessingml.document" &&
    anexo["type"] != "application/pdf" &&
    anexo["type"] != "application/msword" &&
    anexo["type"] != "application/vnd.oasis.opendocument.text"
  ) {
    $(".nuevoAnexoE").val("");

    swal({
      title: "Error al subir archivo",
      text: "¡El archivo debe estar en formato docx, doc, odt o pdf!",
      type: "error",
      confirmButtonText: "¡Cerrar!"
    });

    /*  validar el peso del archivo, que no se mayor a 2 mb */
  } else if (anexo["size"] > 4194304) {
    $(".nuevoAnexoE").val("");

    swal({
      title: "Error al subir el archivo",
      text: "¡El archivo no debe pesar más de 4 MB!",
      type: "error",
      confirmButtonText: "¡Cerrar!"
    });
  }
});

/*  VALIDANDO  ARCHIVO ANEXO MODAL EDITAR */

$(".editarAnexoE").change(function() {
  var anexo = this.files[0];
  // console.log("archivo", anexo);

  /*  validar el formato del archivo, que sea docx, doc, pdf y odt*/

  if (
    anexo["type"] !=
      "application/vnd.openxmlformats-officedocument.wordprocessingml.document" &&
    anexo["type"] != "application/pdf" &&
    anexo["type"] != "application/msword" &&
    anexo["type"] != "application/vnd.oasis.opendocument.text"
  ) {
    $(".editarAnexoE").val("");

    swal({
      title: "Error al subir archivo",
      text: "¡El archivo debe estar en formato docx, doc, odt o pdf!",
      type: "error",
      confirmButtonText: "¡Cerrar!"
    });

    /*  validar el peso del archivo, que no se mayor a 2 mb */
  } else if (anexo["size"] > 4194304) {
    $(".editarAnexoE").val("");

    swal({
      title: "Error al subir el archivo",
      text: "¡El archivo no debe pesar más de 4 MB!",
      type: "error",
      confirmButtonText: "¡Cerrar!"
    });
  }
});

/*--------------------------------------------------
    CARGAR LA TABLA DINAMICA DE EQUIPOS EN INVENTARIO
---------------------------------------------------*/

//pedimos datos al ajax y cambiamos idioma a la tabla datatable
$(".tablaEquipos").DataTable({
  ajax: "ajax/datatable-inventario.ajax.php",
  deferRender: true,
  retrieve: true,
  processing: true,

  /* Datatable -  vincula el plugins datatable con la calse tablas asignada a la tabla del formualrio usuarios*/

  language: {
    sProcessing: "Procesando...",
    sLengthMenu: "Mostrar _MENU_ registros",
    sZeroRecords: "No se encontraron resultados",
    sEmptyTable: "Ningún dato disponible en esta tabla",
    sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0",
    sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
    sInfoPostFix: "",
    sSearch: "Buscar:",
    sUrl: "",
    sInfoThousands: ",",
    sLoadingRecords: "Cargando...",
    oPaginate: {
      sFirst: "Primero",
      sLast: "Último",
      sNext: "Siguiente",
      sPrevious: "Anterior"
    },
    oAria: {
      sSortAscending: ": Activar para ordenar la columna de manera ascendente",
      sSortDescending: ": Activar para ordenar la columna de manera descendente"
    }
  }
});

/* $.ajax({

      url:"ajax/datatable-histo-equipos.ajax.php",
      success:function(respuesta){
  
          console.log("respuesta", respuesta);
      }
  
  
  }) */

//pedimos datos al ajax y cambiamos idioma a la tabla datatable historial equipos

//Capturando la categoria para asginar codigo
$("#selectorcategoriasE").change(function() {
  //var idCategoriaE = $(this).val();
  //obtener id del combo categorias
  var idCategoriaE = document.getElementById("nuevaCategoriaE").value;

  /* Para obtener el texto del select acitvo*/
  var combo = document.getElementById("nuevaCategoriaE");
  var nomTipo = combo.options[combo.selectedIndex].text;

  //var nomTipo = select.options[select.selectedIndex].innerText;
  //alert(nomTipo);
  //return;

  var datos = new FormData();
  datos.append("idCategoriaE", idCategoriaE);

  $.ajax({
    url: "ajax/inventario.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta) {
      //  alert(respuesta);

      //si la respuesta es falsa asignamos codigo inicial equipo
      if (!respuesta) {
        var codigoNuevo = nomTipo.substring(0, 3);
        codigoNuevo += "-";

        codigoNuevo += idCategoriaE + "01";
        $("#nuevoCodigoE").val(codigoNuevo);
      } else {
        var result = respuesta["categoria"];
        var codigoNuevo = result.substring(0, 3);
        codigoNuevo += "-";
        var codigo = respuesta["codigo"].substring(4);
        codigoNuevo += Number(codigo) + 1;
        $("#nuevoCodigoE").val(codigoNuevo);
      }
    }
  });
});

/*=============================================
 Activar la consulta apartir de la seleccion del area,
 recargando lista categorias, en modal nuevo equipo
=============================================*/

$(document).ready(function() {
  recargarLista();

  $("#nuevaAreaE").change(function() {
    recargarLista();
  });
});

//funcion para cargar lista de categorias segun area seleccionada

function recargarLista() {
  $.ajax({
    type: "POST",
    url: "ajax/inventario.ajax.php",
    data: "idAreas=" + $("#nuevaAreaE").val(),
    success: function(r) {
      $("#selectorcategoriasE").html(r);
      //console.log(r);
    }
  });
}

//fin

/*=============================================
 Activar la consulta apartir de la seleccion del area,
 recargando lista categorias, en modal editar Equipo
=============================================	*/

$(document).ready(function() {
  recargarListaEditar();

  $("#listaAreasE").change(function() {
    recargarListaEditar();
  });
});

//funcion para cargar lista de categorias segun area seleccionada

function recargarListaEditar() {
  var id_area = $("#listaAreasE").val();
  //alert(id_area);

  $.ajax({
    type: "POST",
    url: "ajax/categorias.ajax.php",
    data: { id_area: id_area }
  })

    .done(function(lista_cat) {
      $("#listaCategoriasE").html(lista_cat);
    })
    .fail(function() {
      alert("Hubo un error al cargar las categorías");
    });
}

//nueva carga de areas desde ajax en modal editar

/* 
  $(document).ready(function(){
    
    // alert('prueba');
      $.ajax({
    
          type:"POST",
          url:"ajax/areas.ajax.php",
          data: {'peticion': 'cargar_areas'}
  
         })
  
           .done(function(respuesta){
             //alert(respuesta);
           $('#listaAreasE').html(respuesta)
           })
         .fail(function(){
  
           alert('Hubo un error al cargar las áreas');
         })
        
       })
  
/*=============================================
 EDITAR EQUIPO
=============================================	*/
$(document).on("click", ".btnEditarEquipo", function() {
  var idEquipo = $(this).attr("idEquipo");
  var datos = new FormData();
  datos.append("idEquipo", idEquipo);

  $.ajax({
    url: "ajax/inventario.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta) {
      $("#editarCodigoE").val(respuesta["codigo"]);
      $("#editarIdE").val(respuesta["id"]);

      $("#editarAreaE").val(respuesta["area"]);
      $("#editarCategoriaE").val(respuesta["categoria"]);
      $("#editarModeloE").val(respuesta["modelo"]);
      $("#editarMarcaE").html(respuesta["marca"]);
      $("#editarMarcaE").val(respuesta["id_marca"]);
      $("#editarIpE").val(respuesta["ip_equipo"]);
      $("#editarSerialE").val(respuesta["serial"]);
      $("#editarEstadoE").html(respuesta["estado"]);
      $("#editarEstadoE").val(respuesta["id_estado"]);
      $("#editarPisoE").val(respuesta["piso"]);
      $("#editarPisoE").html(respuesta["piso"]);
      $("#editarAsignadoE").val(respuesta["asignado"]);
      $("#editarDependenciaE").html(respuesta["dependencia"]);
      $("#editarDependenciaE").val(respuesta["id_dependencia"]);
      $("#editarErp").val(respuesta["erp"]);
      $("#editarAnexoExiste").val(respuesta["anexo"]);
    }
  });
});

/*=============================================
 ELIMINAR EQUIPO
=============================================*/

$(document).on("click", ".btnEliminarEquipo", function() {
  var idEquipo = $(this).attr("idEquipo");

  swal({
    title: "¿Está seguro de borrar el Equipo?",
    text: "¡Si no lo está puede cancelar la accíón!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, borrar Equipo!"
  }).then(function(result) {
    if (result.value) {
      window.location = "index.php?ruta=inventario&idEquipo=" + idEquipo;
    }
  });
});

/*=============================================
 CARGAR IDIOMA ESPAÑOL Y ACTIVAR DATAPICKER
=============================================*/

/*$(".datapicker").datepicker("setDate", new Date(),
"language",'es');
*/

$(".datapicker")
  .datepicker({
    autoclose: true,
    pickTime: false,
    assumeNearbyYear: true,
    dateFormat: "dd/mm/yyyy",
    language: "es",
    firstDay: 1
  })
  .datepicker("setDate", new Date());

/*=============================================
 ACTIVAR CAMPO Y BOTON GUARDAR HISTORIAL EQUIPO
=============================================*/

function mostrar() {
  document.getElementById("mostrarOcultar").style.display = "block";
  document.getElementById("botonOcul").style.display = "block";
  document.getElementById("boton").style.display = "none";

  $("#editarObservacion").val("");
  $("#Observacion").val("");
  document.getElementById("Observacion").style.display = "block";
  document.getElementById("editarObservacion").style.display = "none";
  document.getElementById("botonEditar").style.display = "none";
  document.getElementById("guardar").style.display = "block";

  $(".mensaje").html("");

  $("#nuevaFechaH")
    .datepicker({
      dateFormat: "dd/mm/yy",
      language: "es",
      firstDay: 1
    })
    .datepicker("setDate", new Date());
}

function ocultar() {
  document.getElementById("mostrarOcultar").style.display = "none";
  document.getElementById("boton").style.display = "block";
  document.getElementById("botonOcul").style.display = "none";
}

/*======================================================
      CARGAR TABLA HISTORIAL FILTRANDO POR EQUIPO SELECCIONADO
      ========================================================	*/
$(document).on("click", ".btnMostrarHistorial", function() {
  /*$(".tablaEquipos tbody").on("click", "button.btnMostrarHistorial", function(){*/
  ocultar();

  var idEquipoH = $(this).attr("idEquipoH");
  var codigoE = $(this).attr("codigoE");

  var datos = new FormData();
  datos.append("idEquipoH", idEquipoH);
  $("#idHisto").val(idEquipoH);

  $.ajax({
    url: "ajax/datatable-histo-equipos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    deferRender: true,
    retrieve: true,
    processing: true,

    success: function($datos_json) {
      //se destruye tabla para volver a realizar el llamado
      $(".tablaHistoE")
        .DataTable()
        .destroy();
      if (Object.entries($datos_json).length === 0) {
        //execute
        //se asigna el json de datos a la datatable de historial cuando json viene sin historial
        var table = $(".tablaHistoE").DataTable();

        table.clear();
        table.row
          .add([
            "",
            "",
            "",
            "El equipo seleccionado no tiene registros...",
            "",
            ""
          ])
          .draw();
      } else {
        //se asigna el json de datos a la datatable de historial cuando json viene con datos de historial
        var tabla = $(".tablaHistoE").DataTable($datos_json);
      }
    }
  });
});

/*======================================================
        GUARDAR REGISTRO DE HISTORIAL X EQUIPO
      ========================================================	*/
function guardarHistorial() {
  var reg = /^[?\\¿\\!\\¡\\:\\,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;
  var nuevaObservacion = $("#Observacion").val();
  var idusuario = $("#idUsuario").val();
  var textoC = $("#nuevaFechaH").val(); //se recibe valor de datapicker
  var texto = moment(textoC, "DD-MM-YYYY"); // se pasa el tipo de formato
  nuevaFechaObservacionH = moment(new Date(texto)).format("YYYY/MM/DD"); //se llama libreria moment para cambiar formato retornando fecha con nuevo formato

  var observacion = nuevaObservacion.toString();
  var id = $("#idHisto").val();

  var hoy = hoyFecha();

  if (observacion.trim() == "") {
    $(".mensaje").html(
      '<div class="alert alert-warning"><strong>Error!</strong>  Por favor ingresar observación.</div>'
    );
    $("#nuevaObservacion").focus();
    return false;
  } else if (textoC > hoy) {
    $(".mensaje").html(
      '<div class="alert alert-warning"><strong>Error!</strong>  La fecha no puede ser mayor a la actual.</div>'
    );

    $("#nuevaFechaH").focus();
    return false;
  } else if (observacion.trim() != "" && !reg.test(observacion)) {
    $(".mensaje").html(
      '<div class="alert alert-warning"><strong>Error!</strong>  Por favor ingresar observación Valida y sin caracteres especiales.</div>'
    );

    $("#nuevaObservacion").focus();
    return false;
  } else {
    $.ajax({
      type: "POST",
      url: "ajax/historial.ajax.php",
      data:
        "observacion=" +
        observacion +
        "&id=" +
        id +
        "&idusuario=" +
        idusuario +
        "&nuevaFechaObservacionH=" +
        nuevaFechaObservacionH,
      beforeSend: function() {
        $(".btnGuardar").attr("disabled", "disabled");
        $(".modal-body").css("opacity", ".5");
      },
      success: function(msg) {
        console.log(msg);
        if (msg == 1) {
          $("#nuevaObservacion").val("");

          $(".mensaje").html(
            '<div class="alert alert-success"><strong>¡Éxito!</strong>  El registro ha sido guardado correctamente.</div>'
          );
          ocultar();
          //ejecutamos metodo cargar datable historial para actualizar los datos de la tabla
          loadDatatableHistorial(id);
        } else {
          $(".mensaje").html(
            '<span style="color:red;">  Se produjo algún problema, por favor intente nuevamente.</span>'
          );
          console.log(msg);
        }
        $(".btnGuardar").removeAttr("disabled");
        $(".modal-body").css("opacity", "");
      }
    });
  }
}

/*======================================================
        EDITAR REGISTRO DE HISTORIAL X EQUIPO
      ========================================================	*/
function editarHistorial() {
  $(document).on("click", ".btnEditarHisto", function() {
    var idHistorial = $(this).attr("idHistorial");
    var datos = new FormData();
    datos.append("idHistorialE", idHistorial);

    $.ajax({
      url: "ajax/historial.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta) {
        mostrar();
        document.getElementById("botonEditar").style.display = "block";
        document.getElementById("guardar").style.display = "none";
        document.getElementById("Observacion").style.display = "none";
        document.getElementById("editarObservacion").style.display = "block";

        $("#editarObservacion").val(respuesta["observacion"]);
        var texto = respuesta["fecha_observacion"];
        var fechaObservacionH = moment(texto).format("DD/MM/YYYY");
        $("#nuevaFechaH").val(fechaObservacionH);
        $("#idHistorial").val(respuesta["id"]);
      }
    });
  });
}
/*======================================================
        GUARDAR CAMBIOS REGISTRO DE HISTORIAL X EQUIPO
      ========================================================	*/
function modificarHistorial() {
  var reg = /^[?\\¿\\!\\¡\\:\\,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;
  var hoy = hoyFecha();
  var idHistorialEdit = $("#idHistorial").val();

  //FECHA H
  var textoC = $("#nuevaFechaH").val(); //se recibe valor de datapicker
  var texto = moment(textoC, "DD-MM-YYYY"); // se pasa el tipo de formato
  var nuevaFechaObservacionH = moment(new Date(texto)).format("YYYY/MM/DD"); //se llama libreria moment para cambiar formato retornando fecha con nuevo formato

  var editarObservacion = $("#editarObservacion").val();
  var idEquipo = $("#idHisto").val();
  var idUsuarioE = $("#idUsuario").val();

  // console.log("editarObservacion "+editarObservacion+" usuarioE  "+idusuarioE+"  nuevaFechaObservacionH  "+nuevaFechaObservacionH+  "  idEquipo"+ idEquipo+ "  id historial  "+idHistorial);

  if (editarObservacion.trim() == "") {
    $(".mensaje").html(
      '<div class="alert alert-warning"><strong>Error!</strong>  Por favor ingresar observación.</div>'
    );
    $("#nuevaObservacion").focus();
    return false;
  } else if (textoC > hoy) {
    $(".mensaje").html(
      '<div class="alert alert-warning"><strong>Error!</strong>  La fecha no puede ser mayor a la actual.</div>'
    );

    $("#nuevaFechaH").focus();
    return false;
  } else if (editarObservacion.trim() != "" && !reg.test(editarObservacion)) {
    $(".mensaje").html(
      '<div class="alert alert-warning"><strong>Error!</strong>  Por favor ingresar observación Valida y sin caracteres especiales.</div>'
    );

    $("#editarObservacion").focus();
    return false;
  } else {
    $.ajax({
      type: "POST",
      url: "ajax/historial.ajax.php",
      data:
        "editarObservacion=" +
        editarObservacion +
        "&idEquipo=" +
        idEquipo +
        "&idUsuarioE=" +
        idUsuarioE +
        "&idHistorialEdit=" +
        idHistorialEdit +
        "&nuevaFechaObservacionH=" +
        nuevaFechaObservacionH,
      beforeSend: function() {
        $(".btnGuardar").attr("disabled", "disabled");
        $(".modal-body").css("opacity", ".5");
      },
      success: function(msg) {
        if (msg == 1) {
          $("#editarObservacion").val("");

          $(".mensaje").html(
            '<div class="alert alert-success"><strong>¡Éxito!</strong>  El registro ha sido modificado correctamente.</div>'
          );
          ocultar();
          //ejecutamos metodo cargar datable historial para actualizar los datos de la tabla

          loadDatatableHistorial(idEquipo);
        } else {
          $(".mensaje").html(
            '<span style="color:red;">  Se produjo algún problema, por favor intente nuevamente.</span>'
          );
        }
        $(".btnGuardar").removeAttr("disabled");
        $(".modal-body").css("opacity", "");
      }
    });
  }
}

/*======================================================
        ELIMINAR REGISTRO DE HISTORIAL X EQUIPO
      ========================================================	*/
function eliminarHistorial() {
  $(document).on("click", ".btnEliminarHisto", function() {
    var idHistorial = $(this).attr("idHistorial");
    var idEquipo = $(this).attr("idEquipo");

    var datos = new FormData();
    datos.append("idHistorial", idHistorial);
    swal({
      title: "¿Está seguro de borrar el Registro?",
      text: "¡Si no lo está puede cancelar la accíón!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "Si, borrar registro!"
    }).then(function(result) {
      if (result.value) {
        $.ajax({
          url: "ajax/historial.ajax.php",
          method: "POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function(res) {
            swal({
              type: "success",
              title: "¡El registro ha sido eliminado correctamente!",
              showConfirmButton: true,
              confirmButtonText: "Cerrar"
            }).then(function(result) {
              if (result.value) {
                datos.append("idEquipoH", idEquipo);
                var id = idEquipo;
                //CARGA DATATABLE HISTORIAL PARA ACTUALIZAR DATOS
                loadDatatableHistorial(id);
                $(".mensaje").html("");
              }
            });
          }
        });
      }
    });
  });
}

/*======================================================
        FUNCION PARA CARGAR TABLA DE HISTOEQUIPOS CON PARAMETRO ID
      ========================================================	*/
function loadDatatableHistorial(id) {
  //SE VALIDA SI EL DOC ESTA CARGADO Y SE CARGA NUEVAMENTE LA TABLA POR AJAX PARA MOSTRAR LA TABLA HISTO SIN REGISTRO ELIMINADO
  $(document).ready(function() {
    var datos = new FormData();
    datos.append("idEquipoH", id);
    $("#idHisto").val(id);

    $.ajax({
      url: "ajax/datatable-histo-equipos.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      deferRender: true,
      retrieve: true,
      processing: true,

      success: function($datos_json) {
        //se destruye tabla para volver a realizar el llamado
        $(".tablaHistoE")
          .DataTable()
          .destroy();
        if (Object.entries($datos_json).length === 0) {
          //execute
          //se asigna el json de datos a la datatable de historial cuando json viene sin historial
          var table = $(".tablaHistoE").DataTable();

          table.clear();
          table.row
            .add([
              "",
              "",
              "",
              "El equipo seleccionado no tiene registros...",
              "",
              ""
            ])
            .draw();
        } else {
          //se asigna el json de datos a la datatable de historial cuando json viene con datos de historial
          var tabla = $(".tablaHistoE").DataTable($datos_json);
        }
      }
    });
  });
  //
}

/*======================================================
      FUNCION PARA LIMPIAR CAMPOS AL CERRAR VENTANA MODAL HISTORIAL
      ========================================================	*/
$(document).on("click", "#cerrar", function() {
  $("#editarObservacion").val("");
  document.getElementById("Observacion").style.display = "block";
  document.getElementById("editarObservacion").style.display = "none";
  document.getElementById("botonEditar").style.display = "none";
  document.getElementById("guardar").style.display = "block";
  $(".mensaje").html("");
});

/*======================================================
              FUNCION PARA CANBIAR FORMATO DE FECHA
        ========================================================	*/
function formato(texto) {
  return texto.replace(/^(\d{4})-(\d{2})-(\d{2})$/g, "$3/$2/$1");
}

function hoyFecha() {
  var hoy = new Date();
  var dd = hoy.getDate();
  var mm = hoy.getMonth() + 1;
  var yyyy = hoy.getFullYear();

  dd = addZero(dd);
  mm = addZero(mm);

  return dd + "/" + mm + "/" + yyyy;
}

//complemento de la funcion hoyfecha
function addZero(i) {
  if (i < 10) {
    i = "0" + i;
  }
  return i;
}
