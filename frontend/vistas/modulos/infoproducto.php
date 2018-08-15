<?php 

$servidor = Ruta::ctrRutaServidor();
$url = Ruta::ctrRuta();

?>
<!--=================================
=      BREADCRUMB INFOPRODUCTOS     =
==================================-->

<div class="container-fluid well well-sm">
	
	<div class="container">
		
		<div class="row">
			
			<ul class="breadcrumb fondoBreadcrumb text-uppercase">
				
				<li><a href="<?php echo $url; ?>">INICIO</a></li>
				<li class="active pagActiva"><?php echo $rutas[0]; ?></li>

			</ul>

		</div>

	</div>

</div>

<!--=================================
=           INFOPRODUCTOS           =
==================================-->

<div class="container-fluid infoproducto">
	
	<div class="container">
		
		<div class="row">

			<?php

				$item = "ruta";
				$valor = $rutas[0];
				$infoproducto = ControladorProductos::ctrMostrarInfoProducto($item, $valor);

				if ($infoproducto["tipo"] == "fisico") {
					/*=============================================
					=              VISOR DE IMAGENES              =
					=============================================*/

					echo '<div class="col-md-5 col-sm-6 col-xs-12 visorImg">
						
						<figure class="visor">
							
							<img id="lupa1" class="img-thumbnail" src="http://localhost/backend/vistas/img/multimedia/tennis-verde/img-01.jpg">

							<img id="lupa2" class="img-thumbnail" src="http://localhost/backend/vistas/img/multimedia/tennis-verde/img-02.jpg">

							<img id="lupa3" class="img-thumbnail" src="http://localhost/backend/vistas/img/multimedia/tennis-verde/img-03.jpg">

							<img id="lupa4" class="img-thumbnail" src="http://localhost/backend/vistas/img/multimedia/tennis-verde/img-04.jpg">

							<img id="lupa5" class="img-thumbnail" src="http://localhost/backend/vistas/img/multimedia/tennis-verde/img-05.jpg">

						</figure>

						<div class="flexslider">

							<ul class="slides">
								
								<li>
									<img value="1" class="img-thumbnail" src="http://localhost/backend/vistas/img/multimedia/tennis-verde/img-01.jpg">
								</li>

								<li>
									<img value="2" class="img-thumbnail" src="http://localhost/backend/vistas/img/multimedia/tennis-verde/img-02.jpg">
								</li>

								<li>
									<img value="3" class="img-thumbnail" src="http://localhost/backend/vistas/img/multimedia/tennis-verde/img-03.jpg">
								</li>

								<li>
									<img value="4" class="img-thumbnail" src="http://localhost/backend/vistas/img/multimedia/tennis-verde/img-04.jpg">
								</li>

								<li>
									<img value="5" class="img-thumbnail" src="http://localhost/backend/vistas/img/multimedia/tennis-verde/img-05.jpg">
								</li>

							</ul>		

						</div>

					</div>';	
				}else{

					/*=============================================
					=              VISOR DE VIDEO                 =
					=============================================*/

					echo '<div class="col-sm-6 col-xs-12">

							<iframe class="videoPresentacion" src="https://www.youtube.com/embed/N4aY6yX" width="100%" frameborder="0" allowfullscreen></iframe>

						</div>';

				}

			?>
			
			<!--=================================
			=             PRODUCTO              =
			==================================-->

			<?php

			if($infoproducto["tipo"] == "fisico"){

				echo '<div class="col-md-7 col-sm-6 col-xs-12">';

			}else{

				echo '<div class="col-sm-6 col-xs-12">';

			}


			?>


			
				<!--=================================
				=       REGRESAR A LA TIENDA        =
				==================================-->

				<div class="col-xs-6">
					
					<h6>
						
						<a href="javascript:history.back()" class="text-muted">
							
							<i class="fa fa-reply"></i> Continuar comprando

						</a>

					</h6>

				</div>

				<!--=================================
				=   COMPARTIR EN REDES SOCIALES     =
				==================================-->

				<div class="col-xs-6">
					
					<h6>
						
						<a href="dropdown-toggle pull-right text-muted" data-toggle="dropdown" href="#">
							
							<i class="fa fa-plus"></i> Compartir

						</a>

						<ul class="dropdown-menu pull-right compartirRedes">
							
							<li>
								
								<p class="btnFacebook">
									
									<i class="fa fa-facebook"></i>
									Facebook

								</p>

							</li>

							<li>
								
								<p class="btnGoogle">
									
									<i class="fa fa-google"></i>
									Google

								</p>

							</li>

						</ul>

					</h6>
					
				</div>

				<div class="clearfix"></div>

				<!--=================================
				=         ESPACIO PRODUCTO          =
				==================================-->
				
				<?php

					/*=============================================
					=            TITULO DEL PRODUCTO              =
					=============================================*/
		
					if($infoproducto["oferta"] == 0){

						if($infoproducto["nuevo"] == 0){

							echo '<h1 class="text-muted text-uppercase">'.$infoproducto["titulo"].'</h1>';

						}else{

							echo '<h1 class="text-muted text-uppercase">'.$infoproducto["titulo"].'

							<br>

							<small><span class="label label-warning">NUEVO</span></small>

							</h1>';
						}

					}else{

						if($infoproducto["nuevo"] == 0){

							echo '<h1 class="text-muted text-uppercase">'.$infoproducto["titulo"].'
							
							<br>

							<small><span class="label label-warning">'.$infoproducto["descuentoOferta"].'% Desc</span></small>
							
							</h1>';

						}else{

							echo '<h1 class="text-muted text-uppercase">'.$infoproducto["titulo"].'
							
							<br>

							<small>

								<span class="label label-warning">NUEVO</span>

								<span class="label label-warning">'.$infoproducto["descuentoOferta"].'% Desc</span>
								
							</small>
							
							</h1>';

						}

					}

					/*=============================================
					=            PRECIO DEL PRODUCTO              =
					=============================================*/

					if ($infoproducto["oferta"] == 0) {
					
						echo '<h2 class="text-muted">$'.$infoproducto["precio"].'</h2>';

					}else{

						echo '<h2 class="text-muted">

							<span>

								<strong class="oferta">$'.$infoproducto["precio"].'</strong>
							
							</span>

							<span>
								
								$'.$infoproducto["precioOferta"].'
	
							</span>

							</h2>';

					}

					/*=============================================
					=           DESCRIPCION DEL PRODUCTO          =
					=============================================*/

					echo '<p>'.$infoproducto["descripcion"].'</p>';
					
				?>

				<hr>
				
				<!--=================================
				=    CARACTERISTICAS DEL PRODUCTO   =
				==================================-->

				<div class="col-xs-12">

					<?php

						echo '<h3 class="text-muted">Ingredientes: </h3><p>'.$infoproducto["descripcion"].'</p>';

					?>

				</div>

				<div class="form-group row">
					
				<?php

					$detalles = json_decode($infoproducto["detalles"],true);

					if($infoproducto["detalles"] != null){

						if ($detalles["Opcion"]) {
							
							echo '<div class="col-md-3 col-xs-12">

								<select class="form-control seleccionarDetalle" id="seleccionarOpcion">

								<option value="">Opción</option>';

								for ($i = 0; $i <= count($detalles["Opcion"]) ; $i++) { 
									
									echo '<option value="'.$detalles["Opcion"][$i].'">'.$detalles["Opcion"][$i].'</option>';

								}

							echo '</select>	

							</div>';

						}

					}

					/*===============================
					=            ENTREGA            =
					===============================*/
					
					echo '<h4 class="col-md-12 col-sm-0 col-xs-0">

						<hr>

						<span class="label label-default" style="font-weight:100">

							<i class="fa fa-clock-o" style="margin-right:5px"></i>
							Entregas entre 30-45 min |
							<i class="fa fa-shopping-cart" style="margin:0px 5px"></i>
							'.$infoproducto["ventas"].' ventas |
							<i class="fa fa-eye" style="margin:0px 5px"></i>
							Visto por <span class="vistas">'.$infoproducto["vistas"].'</span> personas

						</span>

					</h4>

					<h4 class="col-lg-0 col-md-0 col-xs-12">

						<hr>

						<small>

							<i class="fa fa-clock-o" style="margin-right:5px"></i>
							Entregas entre 30-45 min <br>
							<i class="fa fa-shopping-cart" style="margin:0px 5px"></i>
							'.$infoproducto["ventas"].' ventas <br>
							<i class="fa fa-eye" style="margin:0px 5px"></i>
							Visto por <span class="vistas">'.$infoproducto["vistas"].'</span> personas

						</small>

					</h4>';
					
				?>	

				</div>
				
				<!--=================================
				=         BOTONES DE COMPRA         =
				==================================-->

				<div class="row botonesCompra">
					
					<div class="col-md-6">
						
						

					</div>

					<div class="col-md-6">
						
						<button class="btn btn-default btn-block btn-lg backColor">

						Agregar al carrito

						<i class="fa fa-shopping-cart"></i>

						</button>

					</div>

				</div>

				
				<!--=================================
				=            ZONA LUPA              =
				==================================-->

				<figure class="lupa">
					
					<img src="">

				</figure>

			</div>	

		</div>

		<!--=================================
		=            COMENTARIOS            =
		==================================-->

		<br>

		<div class="row">
			
			<ul class="nav nav-tabs">
				
				<li class="active"><a>Comentarios (4)</a></li>
				<li><a>Ver más</a></li>
				<li class="pull-right"><a class="text-muted">Promedio de Calificación: 3.5 |

				<i class="fa fa-star text-success"></i>
				<i class="fa fa-star text-success"></i>
				<i class="fa fa-star text-success"></i>
				<i class="fa fa-star-half-o text-success"></i>
				<i class="fa fa-star-o text-success"></i>

				</a></li>

			</ul>

			<br>

		</div>

		<div class="row comentarios">
			
			<div class="panel-group col-md-3 col-sm-6 col-xs-12">
				
				<div class="panel panel-default">
					
					<div class="panel-heading text-uppercase">
						
						Andrés
						<span class="text-right">
							
							<img class="img-circle" src="<?php echo $url; ?>vistas/img/usuarios/40/944.jpg" width="20%">

						</span>

					</div>

					<div class="panel-body"><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo nobis eum deserunt ad. Corrupti maxime quisquam velit unde, eum ab magni! Incidunt nam maiores dolores ullam vitae, adipisci fugit omnis!</small></div>

					<div class="panel-footer">
						
						<i class="fa fa-star text-success"></i>
						<i class="fa fa-star text-success"></i>
						<i class="fa fa-star text-success"></i>
						<i class="fa fa-star-half-o text-success"></i>
						<i class="fa fa-star-o text-success"></i>

					</div>

				</div>

			</div>

			<div class="panel-group col-md-3 col-sm-6 col-xs-12">
				
				<div class="panel panel-default">
					
					<div class="panel-heading text-uppercase">
						
						Andrés
						<span class="text-right">
							
							<img class="img-circle" src="<?php echo $url; ?>vistas/img/usuarios/40/944.jpg" width="20%">

						</span>

					</div>

					<div class="panel-body"><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo nobis eum deserunt ad. Corrupti maxime quisquam velit unde, eum ab magni! Incidunt nam maiores dolores ullam vitae, adipisci fugit omnis!</small></div>

					<div class="panel-footer">
						
						<i class="fa fa-star text-success"></i>
						<i class="fa fa-star text-success"></i>
						<i class="fa fa-star text-success"></i>
						<i class="fa fa-star-half-o text-success"></i>
						<i class="fa fa-star-o text-success"></i>

					</div>

				</div>

			</div>

			<div class="panel-group col-md-3 col-sm-6 col-xs-12">
				
				<div class="panel panel-default">
					
					<div class="panel-heading text-uppercase">
						
						Andrés
						<span class="text-right">
							
							<img class="img-circle" src="<?php echo $url; ?>vistas/img/usuarios/40/944.jpg" width="20%">

						</span>

					</div>

					<div class="panel-body"><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo nobis eum deserunt ad. Corrupti maxime quisquam velit unde, eum ab magni! Incidunt nam maiores dolores ullam vitae, adipisci fugit omnis!</small></div>

					<div class="panel-footer">
						
						<i class="fa fa-star text-success"></i>
						<i class="fa fa-star text-success"></i>
						<i class="fa fa-star text-success"></i>
						<i class="fa fa-star-half-o text-success"></i>
						<i class="fa fa-star-o text-success"></i>

					</div>

				</div>

			</div>
			
			<div class="panel-group col-md-3 col-sm-6 col-xs-12">
				
				<div class="panel panel-default">
					
					<div class="panel-heading text-uppercase">
						
						Andrés
						<span class="text-right">
							
							<img class="img-circle" src="<?php echo $url; ?>vistas/img/usuarios/40/944.jpg" width="20%">

						</span>

					</div>

					<div class="panel-body"><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo nobis eum deserunt ad. Corrupti maxime quisquam velit unde, eum ab magni! Incidunt nam maiores dolores ullam vitae, adipisci fugit omnis!</small></div>

					<div class="panel-footer">
						
						<i class="fa fa-star text-success"></i>
						<i class="fa fa-star text-success"></i>
						<i class="fa fa-star text-success"></i>
						<i class="fa fa-star-half-o text-success"></i>
						<i class="fa fa-star-o text-success"></i>

					</div>

				</div>

			</div>

		</div>

		<hr>

	</div>

</div>

<!--=================================
=       ARTICULOS RELACIONADOS      =
==================================-->

<div class="container-fluid productos">
	
	<div class="container">
		
		<div class="row">
			
			<div class="col-xs-12 tituloDestacado">

				
				<div class="col-sm-6 col-xs-12">
					
					<h1><small>Productos Relacionados</small></h1>

				</div>

				<div class="col-sm-6 col-xs-12">

				<?php

					$item = "id";
					$valor = $infoproducto["id_categoria"];

					$rutaArticulosDestacados = ControladorProductos::ctrMostrarCategorias($item, $valor);

					echo '<a href="'.$url.$rutaArticulosDestacados["ruta"].'">
						
							<button class="btn btn-default backColor pull-right">
								
								VER MÁS<span class="fa fa-chevron-right"></span>

							</button>

						</a>';

				?>
					
					

				</div>

			</div>

			<div class="clearfix"></div>

			<hr>

		</div>

		<?php

		$ordenar = "";
		$item = "id_categoria";
		$valor = $infoproducto["id_categoria"];
		$base = 0;
		$tope = 4;
		$modo = "Rand()";

		$relacionados = ControladorProductos::ctrMostrarProductos($ordenar, $item, $valor, $base, $tope, $modo);

		if(!$relacionados){

			echo '<div class="col-xs-12 error404">

				<h1><small>¡Oops!</small></h1>

				<h2>No hay productos relacionados</h2>

			</div>';

		}else{

			echo'<ul class = "grid0">';

			foreach ($relacionados as $key => $value) {
				
				echo '<li class="col-md-3 col-sm-6 col-xs-12">
		
						<figure>
							
							<a href="'.$url.$value["ruta"].'" class="pixelProducto">
								
								<img src="'.$servidor.$value["portada"].'" class="img-responsive">

							</a>

						</figure>

						<h4>
			
							<small>
								
								<a href="'.$url.$value["ruta"].'" class="pixelProducto">
									
									'.$value["titulo"].'<br>

									<span style="color:rgba(0,0,0,0)">-</span>';

									if ($value["nuevo"] != 0) {
										
										echo '<span class="label label-warning fontSize">Nuevo</span> ';

									}

									if ($value["oferta"] != 0) {
										
										echo '<span class="label label-warning fontSize">'.$value["descuentoOferta"].'% Desc</span>';

									}

								echo '</a>

							</small>

						</h4>

						<div class="col-xs-6 precio">';

							if($value["oferta"] != 0){

								echo '<h2>

										<small>

											<strong class="oferta">$'.$value["precio"].'</strong>

										</small>

										<small>$'.$value["precioOferta"].'</small>

									</h2>';

							}else{

								echo '<h2><small>$'.$value["precio"].'</small></h2>';

							}
			
						echo '</div>

						<div class="col-xs-6 enlaces">
			
							<div class="btn-group pull-right">

								<a href="'.$url.$value["ruta"].'" class="pixelProducto">
									
									<button type="button" class="btn btn-default btn-xs " data-toggle="tooltip" title="Ver producto">
									
										<i class="fa fa-eye" aria-hidden="true"></i>

									</button>

								</a>
								
								<button type="button" class="btn btn-default btn-xs deseos" idProducto="'.$value["id"].'" data-toggle="tooltip" title="Agregar a mi lista de deseos">
									
									<i class="fa fa-heart" aria-hidden="true"></i>

								</button> ';

								if($value["oferta"] != 0){

									echo '<button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="'.$value["id"].'" imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.$value["precioOferta"].'" data-toggle="tooltip" title="Agregar al carrito de compras">
									
										<i class="fa fa-shopping-cart" aria-hidden="true"></i>

									</button>';

								}else{

									echo '<button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="'.$value["id"].'" imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.$value["precio"].'" data-toggle="tooltip" title="Agregar al carrito de compras">
									
										<i class="fa fa-shopping-cart" aria-hidden="true"></i>

									</button>';

								}
				
							echo '</div>

						</div>

					</li>';

			}

		echo '</ul>';

		}

		?>

	
	</div>

</div>
