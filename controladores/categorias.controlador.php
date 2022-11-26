<?php

class ControladorCategorias(){

    //Crear Categorias

    static public function ctrCrearCatgoria(){
        
        if(isset($_POST["nuevaCategoria"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCategoria"])){

            }
        }
    }
}