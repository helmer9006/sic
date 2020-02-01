
/*  Edtiar Tipo */

$(document).on("click", ".btnEditarTipo", function(){
var idTipo = $(this).attr("idTipo");
var datos = new FormData();
datos.append("idTipo", idTipo);

$.ajax({

    url: "ajax/tipos-tickets.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
   // console.log(respuesta);

         
       $("#editarTipo").val(respuesta["nombre"]);
       $("#identTipo").val(respuesta["id"]);
      
         }

    });

})
/* Validar si el nombre del tipo ya esta creado*/

$("#nuevotipo").change(function(){

	$(".alert").remove();

	var tipo = $(this).val();

	var datos = new FormData();
	datos.append("validarTipo", tipo);

	 $.ajax({
	    url:"ajax/tipos-tickets.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
       
	    	if(respuesta){

	    		$("#nuevoTipo").parent().after('<div class="alert alert-warning">Este mtipo ya existe en la base de datos</div>');

	    		$("#nuevoTipo").val("");

	    	}

	    }
	})
})


/*=======ELIMINAR TIPO=============*/

$(document).on("click", ".btnEliminarTipo", function(){

    var idTipo = $(this).attr("idTipo");
    
    swal({
      title: '¿Está seguro de borrar el tipo de ticket?',
      text: "¡Si no lo está puede cancelar la accíón!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar tipo!'
    }).then(function(result){
  
      if(result.value){
  
        window.location = "index.php?ruta=tipos-tickets&idTipo="+idTipo;
  
      }
  
    })
  
  })
  