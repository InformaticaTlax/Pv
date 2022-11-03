<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuario.modelo.php";

class AjaxUsuarios{
    // Editar usuario
    public $idUsuario;//manda usuario de javascript

    public function ajaxEditarUsuario(){

        $item = "id";
        $valor = $this ->idUsuario;
        
        $respuesta = ControladorUsuarios::ctrMostrarUsuarios($item,$valor);

        echo json_encode($respuesta);

    }
//Activar usuario
public $activarUsuario;
public  $actvarID;

public function ajaxActivarUsuario(){

    $tabla = "usuarios";
    $item1 = "estado";
    $valor1 = $this->activarUsuario;

    $item2= "id";
    $valor2 = $this->activarId;

    $respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1,$valor1, $item2, $valor2);
}
}    



//Objeto de editar Usuario
if(isset($_POST["idUsuario"])){
    
    $editar =new AjaxUsuarios();
    $editar -> idUsuario = $_POST["idUsuario"];
    $editar -> ajaxEditarUsuario();

}

//activar Usuario

if(isset($_POST["activarUsuario"])){

    $activarUsuario= new AjaxUsuarios();
    $activarUsuario -> activarUsuario = $_POST["activarUsuario"];
    $activarUsuario -> activarId = $_POST["activarId"];
}

    
