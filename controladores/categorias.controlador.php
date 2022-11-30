<?php

class ControladorCategorias{

    //categorias
    static public function ctrCrearCategoria(){

        if(isset($_POST["nuevaCategoria"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCategoria"])){

                $tabla = "categorias";

                $datos = $_POST["nuevaCategorias"];

                $respuesta = ModeloCategorias::mdlIngresarCategoria($tabla, $datos);

                if($respuesta == "ok"){

                    echo '<script>

							swal({

								type: "success",
								title: "La categoria se ha agregado correctamente",
								showConfirmButton: true,
								confirmButtonText: "Cerrar",
								closeOnConfirm: false

							}).then((result)=>{

								if(result.value){
								
									window.location = "usuarios";
								}

							});
					

					</script>';

                }
            


            }else{

                echo '<script>

					swal({

						type: "error",
						title: "¡La categoria  no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
						
							window.location = "categorias";
						}

					});
				

				</script>';

            }
        }
    }
}