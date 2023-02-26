<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";



//mostrar la tabla de productos
class TablaProductosVentas{
    public function mostrarTablaProductosVentas(){
      
      $itme = null;
      $valor= null;

      $productos= ControladorProductos::ctrMostrarProductos($itme,$valor);
    
       

      $datosJson = '{
        "data": [';

        for($i=0; $i <count($productos); $i++){

          //treamos la imagen
          $imagen = "<img src= '".$productos[$i]["imagen"]."' width='40px'> ";
          
          //Stock
          
          
          if($productos[$i]["stock"] <= 10){
            
            $stock = "<button class='btn btn-danger'>".$productos[$i]["stock"]."</button>";

          }elseif($productos[$i]["stock"] > 11 && $productos[$i]["stock"] <= 15) {

            $stock = "<button class='btn btn-warning'>".$productos[$i]["stock"]."</button>";

          }else{
            $stock = "<button class='btn btn-success'>".$productos[$i]["stock"]."</button>";
          }

          //Traemos las acciones

          $botones = "<div class='btn-group'><button class='btn btn-primary agregarProducto recuperarBoton' idProducto='".$productos[$i]["id"]."'>Agregar</button></div>";

          $datosJson .= '[
                  "'.($i+1).'",
                  "'.$imagen.'",
                  "'.$productos[$i]["codigo"].'",
                  "'.$productos[$i]["descripcion"].'",
                  "'.$stock.'",
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
$activarProductosVentas = new TablaProductosVentas();
$activarProductosVentas -> mostrarTablaProductosVentas();

                    