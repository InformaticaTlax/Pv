<?php

require_once "conexion.php";

class ModeloUsuarios{

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarUsuarios($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		

		//tengo falla
		$stmt -> close();

		$stmt = null;
	
	}
	//Registro de Usuarios

	static public function mdlIngresarUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, usuario, password, perfil, foto) 
			VALUES (:nombre, :usuario, :password, :perfil, :foto)");

			$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
			$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
			$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
			$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

			if($stmt->execute()){

				return "ok";	
	
			}else{
	
				return "error";
			
			}
			$stmt->close();
			$stmt = null;
	

	}
	//editar Usuario
	static public function mdlEditarUsuario($tabla,$datos){
	

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, password = :password, perfil = :perfil,
				 foto = :foto WHERE usuario = :usuario");
		

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

		if($stmt -> execute()){//problema

			return "ok";

		}else{

			return "error";

		}
		
		$stmt->close();
		$stmt = null;

	}
<<<<<<< HEAD
	/*=============================================
	ACTUALIZAR USUARIO
	=============================================*/

	static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){
=======
	//Actulizar Usuario
	
	static public function mdlActualizarUsuario($tabla, $item1,$valor1, $item2, $valor2){
>>>>>>> 90248bdbf41038383d585751ab59ae5711444152

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){
<<<<<<< HEAD

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

=======
			return "ok";
		}else{
			return "error";
		}
		
		$stmt->close();
		$stmt = null;
>>>>>>> 90248bdbf41038383d585751ab59ae5711444152
	}


}