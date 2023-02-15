<?php
class ControladorVentas{
    //mostrar Ventas
    static public function ctrMostrarVentas($item, $valor){
        $tabla = "ventas";

        $respuesta = ModeloVentas::mdlMostrarVentas($tabla,$item,$valor);

        return $respuesta;
    }

    //crear venta
    static public function ctrCrearVenta(){

		if(isset($_POST["nuevaVenta"])){

			/*=============================================
			ACTUALIZAR LAS COMPRAS DEL CLIENTE Y REDUCIR EL STOCK Y AUMENTAR LAS VENTAS DE LOS PRODUCTOS
			=============================================*/

			$listaProductos = json_decode($_POST["listaProductos"], true);
            var_dump($listaProductos );
        }
    }
}