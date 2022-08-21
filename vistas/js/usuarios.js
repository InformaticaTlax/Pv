//subiendo la foto del usuario
$(".nuevaFoto").change(function(){

    var imagen =this.files[0];
    //valindado que el formato sea jpg o png

    if(imagen["type"] != "imagen/jpeg" && imagen["type"] != "imagen/png" ){

        $(".nuevaFoto").val("");

            swal({
                title: "Error al subir la imagen",
                text:"La imagen debe estar en formato JPG o PNG",
                type: "error",
                confirmButtonText:"Cerrar"
            });

    }else if(imagen["size"] > 200000){
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