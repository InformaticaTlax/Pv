<?php

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxCategorias{
    //editar Categorias

    public $idCategoria;

    public function ajaxEditarCategoria(){

        $item = "id";
        $valor = $this->idCategoria;

        $respuesta = ControladorCategorias::ctrMostrarCategorias($item, $valor);
        echo json_encode($respuesta);


    }
}

//Editar Categorias
if(isset($_POST["idCategoria"])){

    $categoria =new AjaxCategorias();
    $categoria -> idCategoria =  $_POST["idCategoria"];
    $categoria -> ajaxEditarCategoria();
}