<?php

class ControladorCategorias{

    //Crear Categorias

    static public function ctrCrearCategoria(){
        
        if(isset($_POST["nuevaCategoria"])){

            //para permitir los caracteres especiales
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCategoria"])){

               $tabla = "categorias";
               
               $datos = $_POST["nuevaCategoria"];

               $respuesta = ModeloCategorias::mdlIngresarCategoria($tabla,$datos);

               if($respuesta == "ok"){

               

                echo'<script>

					swal({
						  type: "success",
						  title: "La categoría ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "categorias";

									}
								})

					</script>';

               }

            }else{

                echo'<script>

					swal({
						  type: "error",
						  title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "categorias";

							}
						})

			  	</script>';
            }
        }
    }
}