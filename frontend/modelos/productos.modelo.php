<?php

require_once "conexion.php";

class ModeloProductos{

	/*=============================================
	=            Mostrar Categorias               =
	=============================================*/

	static public function mdlMostrarCategorias($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();
	 
			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	=            Mostrar SubCategorias            =
	=============================================*/

	static public function mdlMostrarSubCAtegorias($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	=            Mostrar Productos            =
	=============================================*/

	static public function mdlMostrarProductos($tabla, $ordenar, $item, $valor, $base, $tope, $modo){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY $ordenar $modo LIMIT $base, $tope");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $ordenar $modo LIMIT $base, $tope");

			$stmt -> execute();
	 
			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;
	}

	/*=============================================
	=            Mostrar InfoProducto            =
	=============================================*/

	static public function mdlMostrarInfoProducto($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	=               Listar Productos              =
	=============================================*/

	static public function mdlListarProductos($tabla, $ordenar, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY $ordenar DESC");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();
	
		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $ordenar DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	=               Mostrar Banner                =
	=============================================*/

	static public function mdlMostrarBanner($tabla, $ruta){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ruta = :ruta");

		$stmt -> bindParam(":ruta", $ruta, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	/*========================================
	=                 Buscador               =
	========================================*/

	static public function mdlBuscarProductos($tabla, $busqueda, $ordenar, $modo, $base, $tope){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ruta like '%$busqueda%' OR titulo like '%$busqueda%' OR titular like '%$busqueda%' OR descripcion like '%$busqueda%' ORDER BY $ordenar $modo LIMIT $base, $tope");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=================================================
	=            Listar Productos Busqueda            =
	=================================================*/
	
	static public function mdlListarProductosBusqueda($tabla, $busqueda){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ruta like '%$busqueda%' OR titulo like '%$busqueda%' OR titular like '%$busqueda%' OR descripcion like '%$busqueda%'");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=================================================
	=            Actualizar Vista Producto            =
	=================================================*/
	
	static public function mdlActualizarVistaProducto($tabla, $datos, $item){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item = :$item WHERE ruta = :ruta");

		$stmt -> bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$stmt -> bindParam(":".$item, $datos["valor"], PDO::PARAM_STR);

		if ($stmt -> execute()){
		
			return "ok";

		}else{

			return "error";

		}
		

		$stmt -> close();

		$stmt = null;

	}

	

}