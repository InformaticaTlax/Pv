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
            //var_dump($listaProductos );
            $totalProductosComprados = array();
            foreach($listaProductos as $key => $value){

                array_push($totalProductosComprados, $value["cantidad"]);

                $tablaProductos = "productos";

                $item = "id";
                $valor = $value["id"];

                $traerProducto = ModeloProductos::mdlMostrarProductos($tablaProductos, $item, $valor);

                //var_dump($traerProducto["ventas"]);

                $item1a = "ventas";
                $valor1a = $value["cantidad"] + $traerProducto["ventas"];

                $nuevasVentas = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1a, $valor1a, $valor);

                $item1b = "stock";
                $valor1b = $value["stock"];

                $nuevasStock = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1b, $valor1b, $valor);

            }

            $tablaClientes = "clientes";
            $item = "id";
            $valor = $_POST["seleccionarCliente"];

            $traerCliente = ModeloClientes::mdlMostrarClientes($tablaClientes, $item, $valor);
            
            var_dump($traerCliente["compras"]);

            $item1a= "compras";
            $valor1a= array_sum($totalProductosComprados) + $traerCliente["compras"];

            $comprasCliente = ModeloClientes::mdlActualizarCliente($tablaClientes, $item1a, $valor1a, $valor);

			$item1b= "ultima_compra";
			date_default_timezone_set('America/Mexico_City');

			$fecha = date('Y-m-d');
			$hora = date('H:i:s');

			$valor1b = $fecha.' '.$hora; 

            $comprasCliente = ModeloClientes::mdlActualizarCliente($tablaClientes, $item1b, $valor1b, $valor);


            /*=============================================
			GUARDAR LA COMPRA
			=============================================*/	

			$tabla = "ventas";

			$datos = array("id_vendedor"=>$_POST["idVendedor"],
						   "id_cliente"=>$_POST["seleccionarCliente"],
						   "codigo"=>$_POST["nuevaVenta"],
						   "productos"=>$_POST["listaProductos"],
						   "impuesto"=>$_POST["nuevoPrecioImpuesto"],
						   "neto"=>$_POST["nuevoPrecioNeto"],
						   "total"=>$_POST["totalVenta"],
						   "metodo_pago"=>$_POST["listaMetodoPago"]);

			$respuesta = ModeloVentas::mdlIngresarVenta($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				localStorage.removeItem("rango");

				swal({
					  type: "success",
					  title: "La venta ha sido guardada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then((result) => {
								if (result.value) {

								window.location = "ventas";

								}
							})

				</script>';

			}

		}

	}
	
	static public function ctrEditarVenta(){

		if(isset($_POST["editarVenta"])){

			

				/*=============================================
				FORMATEAR TABLA DE PRODUCTOS Y LA DE CLIENTES
				=============================================*/
				$tabla = "ventas";
	
				$item = "codigo";
				$valor = $_POST["editarVenta"];
	
				$traerVenta = ModeloVentas::mdlMostrarVentas($tabla, $item, $valor);

				//revisar si vienen productos editados

				
				if($_POST["listaProductos"] == ""){

					$listaProductos = $traerVenta["productos"];
					$cambioProdcuto = false;
				}else{
					$listaProductos= $_POST["listaProductos"];
					$cambioProdcuto = true;
				}

				if($cambioProdcuto){

					$productos = json_decode($traerVenta["productos"], true);
					$totalProductosComprados = array();
					//var_dump($productos);

						foreach($productos as $key => $value){

							array_push($totalProductosComprados, $value["cantidad"]);
							
							$tablaProductos = "productos";
							$item = "id";
							$valor = $value["id"];
							$traerProducto = ModeloProductos::mdlMostrarProductos($tablaProductos, $item, $valor);

							$item1a = "ventas";
							$valor1a = $traerProducto["ventas"] - $value["cantidad"];

							$nuevasVentas = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1a, $valor1a, $valor);
							
							$item1b = "stock";
							$valor1b = $value["stock"] + $traerProducto["stock"];

							$nuevasStock = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1b, $valor1b, $valor);

						}

						$tablaClientes = "clientes";
						$itemCliente = "id";
						$valorCliente = $_POST["seleccionarCliente"];

						$traerCliente = ModeloClientes::mdlMostrarClientes($tablaClientes, $itemCliente, $valorCliente);

						$item1a= "compras";
						$valor1a=  $traerCliente["compras"] - array_sum($totalProductosComprados);

						$comprasCliente = ModeloClientes::mdlActualizarCliente($tablaClientes, $item1a, $valor1a, $valor);

					/*=============================================
					ACTUALIZAR LAS COMPRAS DEL CLIENTE Y REDUCIR EL STOCK Y AUMENTAR LAS VENTAS DE LOS PRODUCTOS
					=============================================*/

					$listaProductos2 = json_decode($listaProductos, true);
					//var_dump($listaProductos2 );
					$totalProductosComprados = array();
					foreach($listaProductos2 as $key => $value){

						array_push($totalProductosComprados, $value["cantidad"]);

						$tablaProductos = "productos";

						$item = "id";
						$valor = $value["id"];

						$traerProducto = ModeloProductos::mdlMostrarProductos($tablaProductos, $item, $valor);

						//var_dump($traerProducto["ventas"]);

						$item1a = "ventas";
						$valor1a = $value["cantidad"] + $traerProducto["ventas"];

						$nuevasVentas = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1a, $valor1a, $valor);

						$item1b = "stock";
						$valor1b = $value["stock"];

						$nuevasStock = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1b, $valor1b, $valor);

					}

					$tablaClientes_2 = "clientes";

					$item_2 = "id";
					$valor_2 = $_POST["seleccionarCliente"];

					$traerCliente_2 = ModeloClientes::mdlMostrarClientes($tablaClientes_2, $item_2, $valor_2);

					
					//var_dump($traerCliente["compras"]);

					$item1a_2= "compras";
					$valor1a_2= array_sum($totalProductosComprados) + $traerCliente["compras"];

					$comprasCliente_2 = ModeloClientes::mdlActualizarCliente($tablaClientes, $item1a, $valor1a, $valor);

					$item1b_2= "ultima_compra";

					date_default_timezone_set('America/Mexico_City');

					$fecha_2 = date('Y-m-d');
					$hora_2 = date('H:i:s');

					$valor1b_2 = $fecha_2.' '.$hora_2; 

					$comprasCliente_2 = ModeloClientes::mdlActualizarCliente($tablaClientes, $item1b, $valor1b, $valor);

				}
				
				

            /*=============================================
			GUARDAR cabios de LA COMPRA
			=============================================*/	

			$tabla = "ventas";

			$datos = array("id_vendedor"=>$_POST["idVendedor"],
						   "id_cliente"=>$_POST["seleccionarCliente"],
						   "codigo"=>$_POST["editarVenta"],
						   "productos"=>$listaProductos,
						   "impuesto"=>$_POST["nuevoPrecioImpuesto"],
						   "neto"=>$_POST["nuevoPrecioNeto"],
						   "total"=>$_POST["totalVenta"],
						   "metodo_pago"=>$_POST["listaMetodoPago"]);

			$respuesta = ModeloVentas::mdlEditarVenta($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				localStorage.removeItem("rango");

				swal({
					  type: "success",
					  title: "La venta ha sido editada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then((result) => {
								if (result.value) {

								window.location = "ventas";

								}
							})

				</script>';

			}

		}

	}

	//eliminar venta
	static public function ctrEliminarVenta(){
		
		if(isset($_GET["idVenta"])){

			$tabla = "ventas";

			$item = "id";
			$valor = $_GET["idVenta"];

			$traerVenta = ModeloVentas::mdlMostrarVentas($tabla, $item, $valor);
			//actualizar fecha ultima compra

			$tablaClientes = "clientes";

			$itemVentas = null;
			$valorVentas = null;

			$traerVentas = ModeloVentas::mdlMostrarVentas($tabla, $itemVentas, $valorVentas);

			$guardarFechas = array();

			foreach($traerVentas as $key => $value){

				if($value["id_cliente"] == $traerVenta["id_cliente"]);{

					//var_dump($value["fecha"]);
					array_push($guardarFechas, $value["fecha"]);
				}

			}
 
			//var_dump($guardarFechas);
			if(count($guardarFechas) > 1){
				if($traerVenta["fecha"] > $guardarFechas[count($guardarFechas)-2]){

				if($traerVenta["fecha"] > $guardarFechas[count($guardarFechas)-2] ){

					$item = "ultima_compra";
					$valor = $guardarFechas[count($guardarFechas)-2];
					$valorIdCliente = $traerVenta["id_cliente"];

					$comprasCliente = ModeloClientes::mdlActualizarCliente($tablaClientes, $item, $valor, $valorIdCliente);				
					$item = "ultima_compra";
					$valor = $guardarFechas[count($guardarFechas)-2];
					$valorIdCliente = $traerVenta["id_cliente"];


				}else{

					$item = "ultima_compra";
					$valor = $guardarFechas[count($guardarFechas)-1];
					$valorIdCliente = $traerVenta["id_cliente"];

					$comprasCliente = ModeloClientes::mdlActualizarCliente($tablaClientes, $item, $valor, $valorIdCliente);	

				}
					$comprasCliente = ModeloCliente::mdlActualizarCliente($tablaClientes,$item, $valor, $valorIdCliente);

				}
			}else{

				$item = "ultima_compra";
				$valor = "0000-00-00 00:00:00";
				$valorIdCliente = $traerVenta["id_cliente"];

				$comprasCliente = ModeloClientes::mdlActualizarCliente($tablaClientes, $item, $valor, $valorIdCliente);				

			}

		}
	}
}
