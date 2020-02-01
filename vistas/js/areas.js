/*  Edtiar el Area */

$(document).on("click", ".btnEditarArea", function() {
  var idArea = $(this).attr("idArea");
  var datos = new FormData();
  datos.append("idArea", idArea);

  $.ajax({
    url: "ajax/areas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta) {
      $("#editarArea").val(respuesta["nombre"]);
      $("#identArea").val(respuesta["id"]);
    }
  });
});

/* Validar si el nombre de area ya esta creado*/

$("#nuevaArea").change(function() {
  $(".alert").remove();

  var area = $(this).val();

  var datos = new FormData();
  datos.append("validarArea", area);

  $.ajax({
    url: "ajax/areas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta) {
      if (respuesta) {
        $("#nuevaArea")
          .parent()
          .after(
            '<div class="alert alert-warning">Esta área ya existe en la base de datos</div>'
          );

        $("#nuevaArea").val("");
      }
    }
  });
});

/*=======ELIMINAR AREA=============*/

$(document).on("click", ".btnEliminarArea", function() {
  var idArea = $(this).attr("idArea");

  swal({
    title: "¿Está seguro de borrar el área?",
    text: "¡Si no lo está puede cancelar la accíón!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, borrar área!"
  }).then(function(result) {
    if (result.value) {
      window.location = "index.php?ruta=areas&idArea=" + idArea;
    }
  });
});
