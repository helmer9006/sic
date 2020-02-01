
/*  Editar Dependencia */


$(document).on("click", ".btnEditarDependencia", function(){
var idDependencia = $(this).attr("idDependencia");
var datos = new FormData();
datos.append("idDependencia", idDependencia);

$.ajax({

    url: "ajax/dependencias.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
    

       $("#editarDependencia").val(respuesta["nombre"]);
       $("#editarDescripcion").val(respuesta["descripcion"]);
       $("#identDependencia").val(respuesta["id"]);
      
         }

    });

})


/* Validar si el nombre de dependencia ya esta creado*/

$("#nuevaDependencia").change(function(){

	$(".alert").remove();

	var dependencia = $(this).val();

	var datos = new FormData();
	datos.append("validarDependencia", dependencia);

	 $.ajax({
	    url:"ajax/dependencias.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
       
	    	if(respuesta){

	    		$("#nuevaDependencia").parent().after('<div class="alert alert-warning">Esta dependencia ya existe en la base de datos</div>');

	    		$("#nuevaDependencia").val("");

	    	}

	    }
	})
})


/*=======ELIMINAR DEPENDENCIA=============*/

$(document).on("click", ".btnEliminarDependencia", function(){

    var idDependencia = $(this).attr("idDependencia");
    
    swal({
      title: '¿Está seguro de borrar la dependencia?',
      text: "¡Si no lo está puede cancelar la accíón!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar dependencia!'
    }).then(function(result){
  
      if(result.value){
  
        window.location = "index.php?ruta=dependencias&idDependencia="+idDependencia;
  
      }
  
    })
  
  })
  