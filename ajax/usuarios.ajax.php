<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuario.modelo.php";

class AjaxUsuarios{
<<<<<<< HEAD

	/*=============================================
	EDITAR USUARIO
	=============================================*/	

	public $idUsuario;
<<<<<<< HEAD
	//si lo pasas a estatico ya en editar no funciona
=======
=======
    // Editar usuario
    public $idUsuario;//manda usuario de javascript
>>>>>>> 90248bdbf41038383d585751ab59ae5711444152

>>>>>>> c5876e282565dbcab4baef9a9aa10bbeed580d60
	public function ajaxEditarUsuario(){

		$item = "id";
		$valor = $this->idUsuario;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

<<<<<<< HEAD
		echo json_encode($respuesta);

	}

	/*=============================================
	ACTIVAR USUARIO
	=============================================*/	

	public $activarUsuario;
	public $activarId;
=======
    }
//Activar usuario
public $activarUsuario;
public  $actvarId;

public function ajaxActivarUsuario(){

    $tabla = "usuarios";
    $item1 = "estado";
    $valor1 = $this->activarUsuario;

    $item2= "id";
    $valor2 = $this->activarId;

    $respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1,$valor1, $item2, $valor2);
}
}    
>>>>>>> 90248bdbf41038383d585751ab59ae5711444152

	//si lo pasas a estatico ya  no funciona el metodo
	public function ajaxActivarUsuario(){

<<<<<<< HEAD
		$tabla = "usuarios";

		$item1 = "estado";
		$valor1 = $this->activarUsuario;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

	}

	/*=============================================
	VALIDAR NO REPETIR USUARIO
	=============================================*/	

	public $validarUsuario;

	public function ajaxValidarUsuario(){

		$item = "usuario";
		$valor = $this->validarUsuario;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR USUARIO
=============================================*/
=======
// editar Usuario
>>>>>>> 90248bdbf41038383d585751ab59ae5711444152
if(isset($_POST["idUsuario"])){

	$editar = new AjaxUsuarios();
	$editar -> idUsuario = $_POST["idUsuario"];
	$editar -> ajaxEditarUsuario();

}

/*=============================================
ACTIVAR USUARIO
=============================================*/	

if(isset($_POST["activarUsuario"])){

	$activarUsuario = new AjaxUsuarios();
	$activarUsuario -> activarUsuario = $_POST["activarUsuario"];
	$activarUsuario -> activarId = $_POST["activarId"];
	$activarUsuario -> ajaxActivarUsuario();

}

/*=============================================
VALIDAR NO REPETIR USUARIO
=============================================*/

if(isset( $_POST["validarUsuario"])){

	$valUsuario = new AjaxUsuarios();
	$valUsuario -> validarUsuario = $_POST["validarUsuario"];
	$valUsuario -> ajaxValidarUsuario();

}

//activar Usuario

if(isset($_POST["activarUsuario"])){

    $activarUsuario= new AjaxUsuarios();
    $activarUsuario -> activarUsuario = $_POST["activarUsuario"];
    $activarUsuario -> activarId = $_POST["activarId"];
    $activarUsuario -> ajaxActivarUsuario();
}

    
