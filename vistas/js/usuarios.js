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

$(".btnActivar").click(function(){

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

>>>>>>> bdc2ae979d1c2981d4f9483f5dc3900ce52b18a7
})