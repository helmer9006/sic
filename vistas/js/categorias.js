
/*  Edtiar el Categoria */

$(document).on("click", ".btnEditarCategoria", function(){
var idCategoria = $(this).attr("idCategoria");
var datos = new FormData();
datos.append("idCategoria", idCategoria);

$.ajax({

    url: "ajax/categorias.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
    
         
       $("#editarCategoria").val(respuesta["categoria"]);
       $("#editarAreaCategoria").val(respuesta["id_area"]);
       $("#editarAreaCategoria").html(respuesta["area"]);
       $("#identCategoria").val(respuesta["id"]);
      
         }

    });

})


/* Validar si el nombre de categoria ya esta creado*/

$("#nuevaCategoria").change(function(){

	$(".alert").remove();

	var categoria = $(this).val();

	var datos = new FormData();
	datos.append("validarCategoria", categoria);

	 $.ajax({
	    url:"ajax/categorias.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
       
	    	if(respuesta){

	    		$("#nuevaCategoria").parent().after('<div class="alert alert-warning">Esta categoria ya existe en la base de datos</div>');

	    		$("#  ").val("");

	    	}

	    }

	})
})


/*=======ELIMINAR CATEGORIA=============*/

$(document).on("click", ".btnEliminarCategoria", function(){

    var idCategoria = $(this).attr("idCategoria");
    
    swal({
      title: '¿Está seguro de borrar la categoria?',
      text: "¡Si no lo está puede cancelar la accíón!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar categoria!'
    }).then(function(result){
  
      if(result.value){
  
        window.location = "index.php?ruta=categorias&idCategoria="+idCategoria;
  
      }
  
    })
  
  })
  