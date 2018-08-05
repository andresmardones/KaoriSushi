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
				=            ZONA LUPA              =
				==================================-->

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

				?>	

				</div>
				
				<!--=================================
				=            ZONA LUPA              =
				==================================-->

				<figure class="lupa">
					
					<img src="">

				</figure>

			</div>	

		</div>

	</div>

</div>