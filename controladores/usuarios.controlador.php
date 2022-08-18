<?php
class ControladorUsuarios{

	/*=============================================
	INGRESO DE USUARIO
	=============================================*/

	static public function ctrIngresoUsuario(){

		if(isset($_POST["ingUsuario"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

				$tabla = "usuarios";

				$item = "usuario";
				$valor = $_POST["ingUsuario"];

				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);
                    
               if($respuesta["usuario"] == $_POST["ingUsuario"]
			   	 && $respuesta["password"] == $_POST["ingPassword"]){
					
					$_SESSION["iniciarSesion"]= "ok";
					echo '<script>
						window.location = "inicio";
						</script>';

			   }else{
				echo '<br><div class= "alert alert-danger"> E´rror al ingresar, vuelva a intentarlo </div>';
			   }

                  
            }
        }

    }

	/*=============================================
	registro de usuario
	=============================================*/

	static public function ctrCrearUsuario(){
		if(isset($_POST["nuevoUsuario"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){

			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
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
		}

	}

}

