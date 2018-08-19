<?php

	$servidor = Ruta::ctrRutaServidor();
	$url = Ruta::ctrRuta();

?>

<!--=========================
=            TOP            =
==========================-->

<div class="container-fluid barraSuperior" id="top">
	
	<div class="container">
		
		<div class="row">
			
			<!--============================
			=            SOCIAL            =
			=============================-->
			
			<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 social">
				
				<ul>

					<?php

					$social = ControladorPlantilla::ctrEstiloPlantilla();

					$jsonRedesSociales = json_decode($social["redesSociales"],true);

					foreach ($jsonRedesSociales as $key => $value) {

 						echo '<li>
							  	<a href="'.$value["url"].'" target="_blank">
									<i class="fa '.$value["red"].' redSocial '.$value["estilo"].'" aria-hidden="true"></i>
								</a>
							  </li>';

 					}

					?>

				</ul>

			</div>
			
			<!--==============================
			=            REGISTRO            =
			===============================-->
			
			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 registro">
				
				<ul>
					
					<li><a href="#modaIngreso" data-toggle="modal">Ingresar</a></li>
					<li>|</li>
					<li><a href="#modalRegistro" data-toggle="modal">Crear cuenta</a></li>

				</ul>

			</div>

		</div>

	</div>

</div>

<!--============================
=            HEADER            =
=============================-->

<header class="container-fluid">
	<div class="container">
		<div class="row" id="cabezote">

			<!--==============================
			=            LOGOTIPO            =
			===============================-->
			
			<div class="col-lg-3 col-md-3 col-sm-2 col-xs-12" id="logotipo">
				
				<a href="<?php echo $url; ?>">
					
					<img src="<?php echo $servidor.$social["logo"]; ?>" class="img-responsive">

				</a>

			</div>

			<!--==================================================
			=            BLOQUE CATEGORIAS Y BUSCADOR            =
			===================================================-->

			<div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">

				<!--======================================
				=            BOTON CATEGORIAS            =
				=======================================-->
				
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 backColor" id="btnCategorias">
				
					<p>CATEGORIAS
					<span class="pull-right"><i class="fa fa-bars" aria-hidden="true"></i></span>
					</p>
				
				</div>

				<!--======================================
				=                BUSCADOR                =
				=======================================-->
				
				<div class="input-group col-lg-8 col-md-8 col-sm-8 col-xs-12" id="buscador">

				<input type="search" name="buscar" class="form-control" placeholder="Buscar...">

				<span class="input-group-btn">

					<a href="<?php echo $url; ?>buscador/1/recientes">

						<button class="btn btn-default backColor" type="submit">

							<i class="fa fa-search"></i>

						</button>
						
					</a>
					
				</span>

				</div>

			</div>

			<!--========================================
			=            CARRITO DE COMPRAS            =
			=========================================-->
			
			<div class="col-lg-3 col-md-3 col-sm-2 col-xs-12" id="carrito">
				
				<a href="#">
					<button class="btn btn-default pull-left backColor">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					</button>
				</a>

				<p>TU CARRITO <span class="cantidadCesta"></span> <br> CLP $ <span class="sumaCesta"></span> </p>

			</div>		

			
		</div>

		<!--================================
		=            CATEGORIAS            =
		=================================-->
		
		<div class="col-xs-12 backColor" id="categorias">

			<?php

				$item = null;
				$valor = null;

				$categorias = ControladorProductos::ctrMostrarCategorias($item, $valor);

				foreach ($categorias as $key => $value) {
					

					echo '<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">

							<h4>
								<a href="'.$url.$value["ruta"].'" class="pixelCategorias">'.$value["categoria"].'</a>
							</h4>
				
							<hr>

							<ul>';

								$item = "id_categoria";
								
								$valor = $value["id"];


								$subcategorias = ControladorProductos::ctrMostrarSubCategorias($item, $valor);

								foreach ($subcategorias as $key => $value) {
									echo'<li><a href="'.$url.$value["ruta"].'" class="pixelSubCategorias">'.$value["titulo"].'</a></li>';
								}
								
								echo '</ul>

						</div>';
				}

			?>
			
		</div>
		

	</div>
</header>

<!--==============================================
=            VENTANA PARA EL REGISTRO            =
===============================================-->

<div class="modal fade modalFormulario" id="modalRegistro" role="dialog">
	
	<div class="modal-content modal-dialog">

		<div class="modal-body modalTitulo">

			<h3 class="backColor">Registrarse</h3>
			
			<button type="button" class="close" data-dismiss="modal">&times;</button>

			<!--=======================================
			=            REGISTRO FACEBOOK            =
			========================================-->

			<div class="col-sm-6 col-xs-12 facebook" id="btnFacebookRegistro">
				
				<p>
					<i class="fa fa-facebook"></i>
					Registro con Facebook
				</p>

			</div>

			<!--=======================================
			=             REGISTRO GOOGLE             =
			========================================-->
			
			<div class="col-sm-6 col-xs-12 google" id="btnGoogleRegistro">
				
				<p>
					<i class="fa fa-google"></i>
					Registro con Google
				</p>

			</div>

			<!--=======================================
			=            REGISTRO DIRECTO             =
			========================================-->
			
			<form method="post" onsubmit="return registroUsuario()">
				
				<hr>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-user"></i>

						</span>

						<input type="text" class="form-control text-uppercase" id="regUsuario" name="regUsuario" placeholder="Nombre Completo" required>

					</div>

				</div>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-envelope"></i>

						</span>

						<input type="email" class="form-control" id="regEmail" name="regEmail" placeholder="Correo Electrónico" required>

					</div>

				</div>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-lock"></i>

						</span>

						<input type="password" class="form-control" id="regPassword" name="regPassword" placeholder="Contraseña" required>

					</div>

				</div>

				<!--============================================
				=            TERMINOS Y CONDICIONES            =
				=============================================-->
				
				<div class="checkbox">
					
					<label>
						
						<input id="regPoliticas" type="checkbox">

						<small>
							
							Al registrarse, usted acepta nuestras condiciones de uso y políticas de privacidad 
							<a href="https://www.iubenda.com/privacy-policy/35270453" class="iubenda-white iubenda-embed " title="Condiciones de uso y políticas de privacidad">Leer más</a> <script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src="https://cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script>  

						</small>

					</label>

				</div>

				<?php

					$registro = new ControladorUsuarios();
					$registro -> ctrRegistroUsuario();

				?>

				<input type="submit" class="btn btn-default backColor btn-block" value="ENVIAR">

			</form>
			
		</div>

		<div class="modal-footer">
			
			¿Ya tienes una cuenta? | <strong><a href="#modalIngreso" data-dismiss="modal" data-toggle="modal">Ingresar</a></strong>

		</div>

	</div>

</div>