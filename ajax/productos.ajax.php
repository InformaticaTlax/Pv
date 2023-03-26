<?php
require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

class AjaxProductos{

    //generar Codigo a Partir de Id Categoria
    
    public $idCategoria;

    public function ajaxCrearCodigoProducto(){
        $item = "id_categoria";
        $valor = $this->idCategoria;
        $orden = "id";

        $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

        echo json_encode($respuesta);

    }
    ///editar producto

    public $idProducto;
    public $traerProductos;
    public $nombreProducto;

    public function ajaxEditarProducto(){

        if($this->traerProductos == "ok"){
          
            $item = null;
            $valor = null;
            $orden = "id";

            $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
    
            echo json_encode($respuesta);
        }else if ($this->nombreProducto != ""){
            
            $item = "descripcion";
            $valor = $this->nombreProducto;
            $orden = "id";

            $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

            echo json_encode($respuesta);
        
        }else{
            $item = "id";
            $valor = $this->idProducto;
            $orden = "id";

            $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

            echo json_encode($respuesta);
        }

        
    }

}

//generar codigo apartor de Id Categoria

if(isset($_POST["idCategoria"])){
    
    $codigoProducto = new AjaxProductos();
    $codigoProducto -> idCategoria = $_POST["idCategoria"];
    $codigoProducto -> ajaxCrearCodigoProducto();

}
//editar producto

if(isset($_POST["idProducto"])){
    
    $editarProducto = new AjaxProductos();
    $editarProducto -> idProducto = $_POST["idProducto"];
    $editarProducto -> ajaxEditarProducto();

}
//traer productos
if(isset($_POST["traerProductos"])){
    
    $traerProductos = new AjaxProductos();
    $traerProductos -> traerProductos = $_POST["traerProductos"];
    $traerProductos -> ajaxEditarProducto();

}

//nombre producto
if(isset($_POST["nombreProducto"])){
    
    $traerProductos = new AjaxProductos();
    $traerProductos -> nombreProducto = $_POST["nombreProducto"];
    $traerProductos -> ajaxEditarProducto();

}