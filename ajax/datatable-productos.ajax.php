<?php
//mostrar la tabla de productos
class TablaProductos{
    public function mostrarTablaProductos(){

        echo '{
            "data": [
              [
                "1",
                "dsadasn/dasd/dasas.png",
                "101",
                "Aspiradora",
                "Taladros",
                "100",
                "$90",
                "$110",
                "10-12-2022",
                "botones"
              ],
              [
                "2",
                "dsadasn/dasd/dasas.png",
                "102",
                "Taladro",
                "Taladros",
                "170",
                "$90",
                "$110",
                "10-12-2022",
                "botones"
              ]
            ]
          }';

    }
}

//Activar tabla de productos
$activarProductos = new TablaProductos();
$activarProductos -> mostrarTablaProductos();

                    