//subiendo la foto del usuario
$(".nuevaFoto").change(function(){

    var imagen =this.files[0];
    console.log("imagen", imagen);
    
   // valindado que el formato sea jpg o png

    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png" ){

        $(".nuevaFoto").val("");

            swal({
                title: "Error al subir la imagen",
                text:"La imagen debe estar en formato JPG o PNG",
                type: "error",
                confirmButtonText:"Cerrar"
            });

    }else if(imagen["size"] > 2000000){
        $(".nuevaFoto").val("");

        swal({
            title: "Error al subir la imagen",
            text:"La imagen no debe de pesar mas de 2 MB",
            type: "error",
            confirmButtonText:"Cerrar"
        });


    }else{

        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function(event){

            var rutaImagen = event.target.result;
            
            $(".previsualizar").attr("src", rutaImagen);
        
        })
    }

})

//Editar usuario

$(".tablas").on("click", ".btnEditarUsuario", function(){

	var idUsuario = $(this).attr("idUsuario");
    //console.log("idUsuario", idUsuario);
<<<<<<< HEAD
=======
	
>>>>>>> bdc2ae979d1c2981d4f9483f5dc3900ce52b18a7
	var datos = new FormData();
	datos.append("idUsuario", idUsuario);

	$.ajax({

		url:"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

            //Traer los datos de la base de datos
			
			$("#editarNombre").val(respuesta["nombre"]);
			$("#editarUsuario").val(respuesta["usuario"]);
			$("#editarPerfil").html(respuesta["perfil"]);
            $("#editarPerfil").val(respuesta["perfil"]);
            $("#fotoActual").val(respuesta["foto"]);

            $("#passwordActual").val(respuesta["password"]);

			if(respuesta["foto"] != ""){

				$(".previsualizar").attr("src", respuesta["foto"]);

			}
            //console.log("respuesta", respuesta);

		}

	});

})

//activar usuario


$(document).on("click", ".btnActivar", function(){

    var idUsuario = $(this).attr("idUsuario");
    var estadoUsuario = $(this).attr("estadoUsuario");

    var datos = new FormData();
<<<<<<< HEAD
    datos.append("activarId", idUsuario);
    datos.append("activarUsuario", estadoUsuario);

    $.ajax({

        url:"ajax/usuarios.ajax.php",
        method:"POST",
        data:datos,
        cache: false,
        contentType:false,
        processData:false,
        success:function(respuesta){
            
        }

    })

    if(estadoUsuario == 0){

        $(this).removeClass('btn-seccess');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoUsuario',1);
    }else{
        $(this).addClass('btn-seccess');
        $(this).removeClass('btn-danger');
        $(this).html('Activado');
        $(this).attr('estadoUsuario',0);
    }

=======
        datos.append("activarId", idUsuario);
        datos.append("activarUsuario", estadoUsuario);

        $.ajax({

            url:"ajax/usuarios.ajax.php",
            method:"POST",
            data:datos,
            cache: false,
            contentType: false,
            processData: false,
            success:function(respuesta){
                if(window.matchMedia("(max-width:767px)").matches){

                    swal({
                        type: "success",
                        title: "El usuario ha sido Actualizado correctamente",
                        confirmButtonText: "Cerrar"
                        
                    }).then(function(result) {
                                  
                            if (result.value) {
  
                                  window.location = "usuarios";
  
                            }
                        });

                }
            }

        })
        if(estadoUsuario == 0 ){

            $(this).removeClass('btn-success');
            $(this).addClass('btn-danger');
            $(this).html('Desactivado');
            $(this).attr('estadoUsuario',1);

        }else{
            $(this).addClass('btn-success');
            $(this).removeClass('btn-danger');
            $(this).html('Activado');
            $(this).attr('estadoUsuario',0);
        }

<<<<<<< HEAD
})

//Revisar si el usuario ya esta registrado

$('#nuevoUsuario').change(function(){

    $(".alert").remove();

    var usuario = $(this).val();

    var datos = new FormData();
    datos.append("validarUsuario", usuario);

    $.ajax({

        url:"ajax/usuarios.ajax.php",
        method:"POST",
        data:datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success:function(respuesta){

            if(respuesta){

                $("#nuevoUsuario").parent().after('<div class= "alert alert-warning">Este usuari ya existe en la base de datos </div>');

                $("#nuevoUsuario").val("");
            }

        }

    })
})

//eliminar Usuario
/*
$("btnEliminarUsuario").click(function(){

    var idUsuario= $(this).attr("idUsuario");
    var fotoUsuario = $(this).attr("fotoUsuario");
    var fotoUsuario= $(this).attr("fotoUsuario");

    swal({
        title: 'Estas Seguro de borar el usuario',
        text: "Si no lo esat puede cancelar la accion",
        type:'warning',
        showCancelButton: true:
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, Borrar usuario'
    }).then((result)=>{

        if(result.value){

            window.location = "index.php?ruta=usuarios&idUsuario="+idUsuario+"&fotoUsuario="+fotoUsuario;
            window.location = "index.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario+"&fotoUsuario="+fotoUsuario;
        }

    })
})*/
$(document).on("click", ".btnEliminarUsuario", function(){

    var idUsuario = $(this).attr("idUsuario");
    var fotoUsuario = $(this).attr("fotoUsuario");
    var usuario = $(this).attr("usuario");
  
    swal({
      title: '¿Está seguro de borrar el usuario?',
      text: "¡Si no lo está puede cancelar la accíón!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar usuario!'
    }).then(function(result){
  
      if(result.value){
  
        window.location = "index.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario+"&fotoUsuario="+fotoUsuario;
        
      }
  
    })
  
  })
  
  
  
=======
>>>>>>> bdc2ae979d1c2981d4f9483f5dc3900ce52b18a7
})
>>>>>>> c5876e282565dbcab4baef9a9aa10bbeed580d60
