<?php
require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

class AjaxProductos{

    //generar Codigo a Partir de Id Categoria
    
    public $idCategoria;

    public function ajaxCrearCodigoProducto(){
        $item = "id_categoria";
        $valor = $this->idCategoria;

        $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

        echo json_encode($respuesta);

    }

}

//generar codigo apartor de Id Categoria

if(isset($_POST["idCategoria"])){
    
    $codigoProducto = new AjaxProductos();
    $codigoProducto -> idCategoria = $_POST["idCategoria"];
    $codigoProducto -> ajaxCrearCodigoProducto();

}