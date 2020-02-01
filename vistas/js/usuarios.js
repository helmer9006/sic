/*  Subiendo la Foto del usuario */

$(".nuevaFoto").change(function() {
  var imagen = this.files[0];
  console.log("imagen", imagen);

  /*  validar el formato de la imagen, que sea jpg o png */

  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $(".nuevaFoto").val("");

    swal({
      title: "Error al subir la imagen",
      text: "¡La imagen debe esta en formato JPG o PNG!",
      type: "error",
      confirmButtonText: "¡Cerrar!"
    });

    /*  validar el peso de la imagen, que no se mayor a 2 mb */
  } else if (imagen["size"] > 2097152) {
    $(".nuevaFoto").val("");

    swal({
      title: "Error al subir la imagen",
      text: "¡La imagen no debe pesar más de 2 MB!",
      type: "error",
      confirmButtonText: "¡Cerrar!"
    });
  } else {
    var datosImagen = new FileReader();
    datosImagen.readAsDataURL(imagen);
    $(datosImagen).on("load", function(event) {
      var rutaImagen = event.target.result;

      $(".previsualizar").attr("src", rutaImagen);
    });
  }
});

/*  Edtiar el usuario */

$(document).on("click", ".btnEditarUsuario", function() {
  var idUsuario = $(this).attr("idUsuario");
  var datos = new FormData();
  datos.append("idUsuario", idUsuario);

  $.ajax({
    url: "ajax/usuarios.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta) {
      $("#editarNombre").val(respuesta["nombre"]);
      $("#editarUsuario").val(respuesta["usuario"]);
      $("#passwordActual").val(respuesta["contraseña"]);
      $("#editarEmail").val(respuesta["email"]);
      $("#editarPerfil").html(respuesta["perfil"]);
      $("#editarPerfil").val(respuesta["perfil"]);
      $("#editarArea").html(respuesta["nombre_area"]);
      $("#editarArea").val(respuesta["id_area"]);
      $("#editarEstado").html(respuesta["estado"]);
      $("#fotoActual").val(respuesta["foto_usuario"]);

      if (respuesta["foto_usuario"] != "") {
        $(".previsualizar").attr("src", respuesta["foto_usuario"]);
      }
    }
  });
});

/*  Activar el usuario */

$(document).on("click", ".btnActivar", function() {
  var idUsuario = $(this).attr("idUsuario");
  var estadoUsuario = $(this).attr("estadoUsuario");

  var datos = new FormData();
  datos.append("activarId", idUsuario);
  datos.append("activarUsuario", estadoUsuario);

  $.ajax({
    url: "ajax/usuarios.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function(respuesta) {
      if (window.matchMedia("(max-width:767px)").matches) {
        swal({
          title: "El usuario ha sido actualizado",
          type: "success",
          confirmButtonText: "¡Cerrar!"
        }).then(function(result) {
          if (result.value) {
            window.location = "usuarios";
          }
        });
      }
    }
  });

  if (estadoUsuario == 0) {
    $(this).removeClass("btn-success");
    $(this).addClass("btn-danger");
    $(this).html("Desactivado");
    $(this).attr("estadoUsuario", 1);
  } else {
    $(this).addClass("btn-success");
    $(this).removeClass("btn-danger");
    $(this).html("Activado");
    $(this).attr("estadoUsuario", 0);
  }
});

/* Validar si el nombre de usaurio ya esta creado*/

$("#nuevoUsuario").change(function() {
  $(".alert").remove();

  var usuario = $(this).val();

  var datos = new FormData();
  datos.append("validarUsuario", usuario);

  $.ajax({
    url: "ajax/usuarios.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta) {
      if (respuesta) {
        $("#nuevoUsuario")
          .parent()
          .after(
            '<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>'
          );

        $("#nuevoUsuario").val("");
      }
    }
  });
});

/*=======ELIMINAR USUARIO=============*/

$(document).on("click", ".btnEliminarUsuario", function() {
  var idUsuario = $(this).attr("idUsuario");
  var fotoUsuario = $(this).attr("fotoUsuario");
  var usuario = $(this).attr("usuario");

  swal({
    title: "¿Está seguro de borrar el usuario?",
    text: "¡Si no lo está puede cancelar la accíón!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, borrar usuario!"
  }).then(function(result) {
    if (result.value) {
      window.location =
        "index.php?ruta=usuarios&idUsuario=" +
        idUsuario +
        "&usuario=" +
        usuario +
        "&fotoUsuario=" +
        fotoUsuario;
    }
  });
});
