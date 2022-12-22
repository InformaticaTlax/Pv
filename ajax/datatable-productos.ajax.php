<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

//mostrar la tabla de productos
class TablaProductos{
    public function mostrarTablaProductos(){
      
      $itme = null;
      $valor= null;

      $productos= ControladorProductos::ctrMostrarProductos($itme,$valor);
    
       

      $datosJson = '{
        "data": [';

        for($i=0; $i <count($productos); $i++){

          //treamos la imagen
          $imagen = "<img src= '".$productos[$i]["imagen"]."' width='40px'> ";
          //Traemos la categoria

          $itme = "id";
          $valor = $productos[$i]["id_categoria"];

          $categoria = ControladorCategorias::ctrMostrarCategorias($itme,$valor);
          //Stock
          
          
          if($productos[$i]["stock"] <= 10){
            
            $stock = "<button class='btn btn-danger'>".$productos[$i]["stock"]."</button>";

          }elseif($productos[$i]["stock"] > 11 && $productos[$i]["stock"] <= 15) {

            $stock = "<button class='btn btn-warning'>".$productos[$i]["stock"]."</button>";

          }else{
            $stock = "<button class='btn btn-success'>".$productos[$i]["stock"]."</button>";
          }

          //Traemos las acciones

          $botones = "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class= 'fa fa-pencil'></i></button> <button class='btn btn-danger btnEliminarProducto' idProducto='".$productos[$i]["id"]."' codigo='".$productos[$i]["codigo"]."' imagen='".$productos[$i]["imagen"]."'><i class= 'fa fa-times'></i></button></div>";

          $datosJson .= '[
                  "'.($i+1).'",
                  "'.$imagen.'",
                  "'.$productos[$i]["codigo"].'",
                  "'.$productos[$i]["descripcion"].'",
                  "'.$categoria["categoria"].'",
                  "'.$stock.'",
                  "'.$productos[$i]["precio_compra"].'",
                  "'.$productos[$i]["precio_venta"].'",
                  "'.$productos[$i]["fecha"].'",
                  "'.$botones.'"
                ],';
              } 
              
              $datosJson = substr($datosJson, 0, -1);

              $datosJson .= '] 
            
            }';
          echo $datosJson;
      

    }
}

//Activar tabla de productos
$activarProductos = new TablaProductos();
$activarProductos -> mostrarTablaProductos();

                    