/*  Edtiar Tipo */

$(document).on("click", ".btnEditarTipoEquipo", function() {
  var idTipoEquipo = $(this).attr("idTipoEquipo");
  var datos = new FormData();
  datos.append("idTipoEquipo", idTipoEquipo);

  $.ajax({
    url: "ajax/tipos-equipos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta) {
      console.log(respuesta);

      $("#editarTipoEquipo").val(respuesta["descrip_tp_equipo"]);
      $("#identTipoEquipo").val(respuesta["id_tipo"]);
    }
  });
});

/* Validar si el nombre del tipo ya esta creado*/

$("#nuevoTipoEquipo").change(function() {
  $(".alert").remove();

  var tipo = $(this).val();

  var datos = new FormData();
  datos.append("validarTipoEquipo", tipo);

  $.ajax({
    url: "ajax/tipos-equipos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta) {
      if (respuesta) {
        $("#nuevoTipoEquipo")
          .parent()
          .after(
            '<div class="alert alert-warning">Este tipo ya existe en la base de datos</div>'
          );

        $("#nuevoTipoEquipo").val("");
      }
    }
  });
});

/*=======ELIMINAR TIPO=============*/

$(document).on("click", ".btnEliminarTipoEquipo", function() {
  var idTipoEquipo = $(this).attr("idTipoEquipo");

  swal({
    title: "¿Está seguro de borrar el tipo de equipo?",
    text: "¡Si no lo está puede cancelar la accíón!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, borrar tipo equipo!"
  }).then(function(result) {
    if (result.value) {
      window.location =
        "index.php?ruta=tipos-equipos&idTipoEquipo=" + idTipoEquipo;
    }
  });
});
