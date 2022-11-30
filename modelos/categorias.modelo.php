<?php

require_once "conexion.php";

    class ModeloCategorias{

        //crear Categoria

        static public function mdlIngresarCategoria($tabla, $datos){

            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(categoria) VALUES (:categoria)");

            $stmt->bindParam(":categoria", $datos, PDO::PARAM_STR);

            if($stmt -> execute()){

                return "ok";
            
            }else{
    
                return "error";	
    
            }
    
            $stmt -> close();
    
            $stmt = null;

        }

    }

