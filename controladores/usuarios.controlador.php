<?php
class ControladorUsuarios{

	/*=============================================
	INGRESO DE USUARIO
	=============================================*/

	static public function ctrIngresoUsuario(){

		if(isset($_POST["ingUsuario"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

				$encriptar = crypt($_POST["ingPassword"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$tabla = "usuarios";

				$item = "usuario";
				$valor = $_POST["ingUsuario"];

				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);
                    
               if($respuesta["usuario"] == $_POST["ingUsuario"]
			   	 && $respuesta["password"] == $encriptar){
					
					$_SESSION["iniciarSesion"]= "ok";
					$_SESSION["id"]= $respuesta["id"];
					$_SESSION["nombre"]= $respuesta["nombre"];
					$_SESSION["usuario"]= $respuesta["usuario"];
					$_SESSION["foto"]= $respuesta["foto"];
					$_SESSION["perfil"]= $respuesta["perfil"];

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

					//validar imagen

					$ruta = "";
					if(isset($_FILES["nuevaFoto"]["tmp_name"])){
						//var_dump(getimagesize($_FILES["nuevaFoto"]["tmp_name"]));

						list($ancho,$alto) =getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

						$nuevoAncho = 500;
						$nuevoAlto = 500;

						//crear directorio para guardar la foto del usuario

						$directorio = "vistas/img/usuarios/".$_POST["nuevoUsuario"];
						mkdir($directorio, 0755);
						
						//de acuerdo al tipo de imagen aplicamos funcions por defecto de php

						
						if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){
							//Guardar imagen en el directorio

							$aleatorio = mt_rand(100,999);

							$ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";
							$origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

							$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

							imagecopyresized($destino,$origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

							imagejpeg($destino,$ruta);
						}
						
						if($_FILES["nuevaFoto"]["type"] == "image/png"){
							//Guardar imagen en el directorio

							$aleatorio = mt_rand(100,999);

							$ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";
							$origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

							$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

							imagecopyresized($destino,$origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

							imagepng($destino,$ruta);
						}
					}
					
					$tabla = "usuarios";

					$encriptar = crypt($_POST["nuevoPassword"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

					$datos = array("nombre" => $_POST["nuevoNombre"],
									"usuario" => $_POST["nuevoUsuario"],
									"password" => $encriptar,
									"perfil" => $_POST["nuevoPerfil"],
									"foto" => $ruta);
					$respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla,$datos);

					if ($respuesta == "ok"){
							echo '<script>

							swal({

								type: "success",
								title: "El usuario se ha agregado correctamente",
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

	/*=============================================
	MOSTRAR DE USUARIO
	=============================================*/

	static public function ctrMostrarUsuarios($item, $valor){
		$tabla ="usuarios";

		$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);
		
		return $respuesta;

	}
	
	/*=============================================
	Editar DE USUARIO
	=============================================*/
	public function ctrEditarUsuario(){

		if(isset($_POST["editarUsuario"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){
					
				//validar imagen

				$ruta = $_POST["fotoActual"];

				if(isset($_FILES["editarFoto"]["tmp_name"])){
					//var_dump(getimagesize($_FILES["editarFoto"]["tmp_name"]));

					list($ancho,$alto) =getimagesize($_FILES["editarFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					//crear directorio para guardar la foto del usuario

					$directorio = "vistas/img/usuarios/".$_POST["editarUsuario"];
					//Primero se pregunta si existe en la base de 
					
					if(!empty($_POST["fotoActual"])){

						unlink($_POST["fotoActual"]);

					}else{

						mkdir($directorio, 0755);

					}
					
					
					
					//de acuerdo al tipo de imagen aplicamos funcions por defecto de php

					
					if($_FILES["editarFoto"]["type"] == "image/jpeg"){
						//Guardar imagen en el directorio

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".jpg";
						$origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino,$origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino,$ruta);
					}
					
					if($_FILES["editarFoto"]["type"] == "image/png"){
						//Guardar imagen en el directorio

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".png";
						$origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino,$origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino,$ruta);
					}
				}

				$tabla = "usuarios";

				if($_POST["editarPassword"] != ""){

					if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){

						$encriptar = crypt($_POST["ingPassword"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

					}else{

						echo '<script>

							swal({
								type:"error",
								title: "La contraseña no puede ir vacia o llevar caracteres especiales",
								showConfirmButton: true,
								confirmButtonText: "Cerrar",
								closeOnConfirm: false,
								}).then((result) => {
									if(result.value){
										windows.location = "usuatios";
									}
								})
						
						</script>';

					}

					

				}else{

					$encriptar = $passwordActual;//aquitengo duda

				}
				$datos = array("nombre" => $_POST["editarNombre"],
								"usuario" => $_POST["editarUsuario"],
								"password" => $encriptar,
								"perfil" => $_POST["editarPerfil"],
								"foto" => $ruta);
								
				$respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

				if ($respuesta == "ok"){
					echo '<script>

					swal({

						type: "success",
						title: "El usuario se ha editado correctamente",
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
			

		}else{

			echo '<script>

							swal({
								type:"error",
								title: "El nombre no puede ir vacio o llevar caracteres especiales",
								showConfirmButton: true,
								confirmButtonText: "Cerrar",
								closeOnConfirm: false,
								}).then((result) => {
									if(result.value){
										windows.location = "usuatios";
									}
								})
						
			</script>';			

		}


	}

}

