<?php

class ControladorProductos{

	/*=============================================
	=            Mostrar Categorias               =
	=============================================*/
	

	static public function ctrMostrarCategorias($item, $valor){

		$tabla = "categorias";

		$respuesta = ModeloProductos::mdlMostrarCategorias($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	=            Mostrar SubCategorias            =
	=============================================*/

	static public function ctrMostrarSubCategorias($item, $valor){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarSubCategorias($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	=              Mostrar Productos              =
	=============================================*/

	static public function ctrMostrarProductos($ordenar, $item, $valor, $base, $tope, $modo){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarProductos($tabla, $ordenar, $item, $valor, $base, $tope, $modo);

		return $respuesta;

	}

	/*=============================================
	=            Mostrar InfoProducto             =
	=============================================*/

	public function ctrMostrarInfoProducto($item, $valor){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarInfoProducto($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	=              Listar Productos              =
	=============================================*/

	static public function ctrListarProductos($ordenar, $item, $valor){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlListarProductos($tabla, $ordenar, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	=              Mostrar Banner                 =
	=============================================*/
	

	static public function ctrMostrarBanner($ruta){

		$tabla = "banner";

		$respuesta = ModeloProductos::mdlMostrarBanner($tabla, $ruta);

		return $respuesta;

	}

	/*================================
	=            Buscador            =
	================================*/
	
	static public function ctrBuscarProductos($busqueda, $ordenar, $modo, $base, $tope){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlBuscarProductos($tabla, $busqueda, $ordenar, $modo, $base, $tope);

		return $respuesta;

	}
	
	/*=================================================
	=            Listar Productos Buscador            =
	=================================================*/

	static public function ctrListarProductosBusqueda($busqueda){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlListarProductosBusqueda($tabla, $busqueda);

		return $respuesta;

	}

	/*=================================================
	=            Actualizar Vista Producto            =
	=================================================*/

	static public function ctrActualizarVistaProducto($datos, $item){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlActualizarVistaProducto($tabla, $datos, $item);

		return $respuesta;

	}

	
}