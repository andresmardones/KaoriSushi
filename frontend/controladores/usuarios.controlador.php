<?php
 
class ControladorUsuarios{

	/*==================================
	=       REGISTRO DE USUARIO        =
	==================================*/

	public function ctrRegistroUsuario(){
 
		if (isset($_POST["regUsuario"])) {
			
			if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["regUsuario"]) && 
				preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["regEmail"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["regPassword"])) {

					$encriptar = crypt($_POST["regPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

					$encriptarEmail = md5($_POST["regEmail"]);
				
					$datos = array("nombre" => $_POST["regUsuario"],
					 			   "password" => $encriptar,
								   "email" => $_POST["regEmail"],
								   "modo" => "directo",
								   "verificacion" => 1,
								   "emailEncriptado" => $encriptarEmail); 

					$tabla = "usuarios";

					$respuesta = ModeloUsuarios::mdlRegistroUsuario($tabla, $datos);

					if($respuesta == "ok"){

						/*=====================================
						=       VERIFICACION DE CORREO        =
						=====================================*/

						date_default_timezone_set("America/Santiago");

						$url = Ruta::ctrRuta();

						$mail = new PHPMailer;

						$mail->CharSet = 'UTF-8';

						$mail->isMail();

						$mail->setFrom('log@kaorisushi.cl', 'Kaori Sushi');

						$mail->addReplyTo('log@kaorisushi.cl', 'Kaori Sushi');

						$mail->Subject = "Por favor verifique su dirección de correo electrónico";

						$mail->addAddress($_POST["regEmail"]);

						$mail->msgHTML('<div style="width: 100%; background: #eee; position: relative; font-family: sans-serif; padding-bottom: 40px;">
		
											<center>
												
												<img style="padding: 20px; width: 10%;" src="http://www.kaorisushi.cl/images/templatemo_logo.png">

												<div style="position: relative; margin: auto; width: 600px; background: white; padding: 20px;">
													
													<img style="padding: 20px; width: 15%;" src="http://tutorialesatualcance.com/tienda/icon-email.png">

													<h3 style="font-weight: 100; color: #999">VERIFIQUE  SU DIRECCIÓN DE CORREO ELECTRÓNICO</h3>

													<hr style="border: 1px solid #ccc; width: 80%">

													<h4 style="font-weight: 100; color: #999; padding: 0 20px;">Para comenzar a usar su cuenta de Tienda Virtual, debe confirmar su dirección de correo electrónico</h4>

													<a href="'.$url.'verificar/'.$encriptarEmail.'" target="_blank" style="text-decoration: none">
														
														<div style="line-height: 60; background: #0aa; width: 60%; color: white;">Verifique su dirección de correo electrónico</div>

													</a>

													<br>

													<hr style="border: 1px solid #ccc; width: 80%">

													<h5 style="font-weight: 100; color: #999">Si no se inscribió en esta cuenta, puede ignorar este correo electrónico y la cuenta se eliminará</h5>

												</div>

											</center>

										</div>');

						$envio = $mail->Send();

						if (!$envio) {

							echo '<script> 

									swal({

											title: "¡ERROR!",
											text: "Ocurrio un problema enviando la verificacion de correo electrónico a '.$_POST["regEmail"].$mail->ErrorInfo.'",
											type: "error",
											confirmButtonText: "Cerrar",
											closeOnConfirm: false

										},

										function(isConfirm){

												if(isConfirm){
													history.back();
												}

									});

								</script>';
							
						}else{

							echo '<script> 

								swal({

										title: "Se ha registrado correctamente",
										text: "Revise su bandeja de entrada (o la carpeta de SPAM) de su correo electrónico '.$_POST["regEmail"].' para verificar su cuenta",
										type: "success",
										confirmButtonText: "Cerrar",
										closeOnConfirm: false

									},

									function(isConfirm){

											if(isConfirm){
												history.back();
											}

								});

							</script>';

						}

					}

			}else{

				echo '<script> 

					swal({

							title: "¡ERROR!",
							text: "Error al registrar el usuario, no se permiten caracteres especiales",
							type: "error",
							confirmButtonText: "Cerrar",
							closeOnConfirm: false

						},

						function(isConfirm){

								if(isConfirm){
									history.back();
								}

					});

				</script>';

			}

		}

	}

	/*=====================================
	=           MOSTRAR USUARIO           =
	=====================================*/

	static public function ctrMostrarUsuario($item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);

		return $respuesta;

	}

	/*=====================================
	=         ACTUALIZAR USUARIO          =
	=====================================*/

	static public function ctrActualizarUsuario($id, $item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $id, $item, $valor);

		return $respuesta;

	}

	/*==================================
	=        INGRESO DE USUARIO        =
	==================================*/

	public function ctrIngresoUsuario(){

		if (isset($_POST["ingEmail"])) {

			if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["ingEmail"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])) {

					$encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

					$tabla = "usuarios";
					$item = "email";
					$valor = $_POST["ingEmail"];

					$respuesta = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);

					if ($respuesta["email"] == $_POST["ingEmail"] && $respuesta["password"] == $encriptar) {

						if ($respuesta["verificacion"] == 1) {
						
							echo '<script> 

								swal({

										title: "¡NO HA VERIFICADO SU CORREO ELECTRÓNICO!",
										text: "Por favor revise su bandeja de entrada (o la carpeta de SPAM) de su correo electrónico para verificar la dirección de correo electrónico '.$respuesta["email"].'",
										type: "error",
										confirmButtonText: "Cerrar",
										closeOnConfirm: false

									},

									function(isConfirm){

											if(isConfirm){
												history.back();
											}

								});

							</script>';

						}else{

							$_SESSION["validarSesion"] = "ok";
							$_SESSION["id"] = $respuesta["id"];
							$_SESSION["nombre"] = $respuesta["nombre"];
							$_SESSION["foto"] = $respuesta["foto"];
							$_SESSION["email"] = $respuesta["email"];
							$_SESSION["password"] = $respuesta["password"];
							$_SESSION["modo"] = $respuesta["modo"];

							echo '<script>

								window.location = localStorage.getItem("rutaActual");
	
							</script>';

						}

					}else{

						echo '<script> 

								swal({

										title: "¡ERROR AL INGRESAR!",
										text: "Por favor revise que el email sea el correcto o la contraseña coincida con la registrada",
										type: "error",
										confirmButtonText: "Cerrar",
										closeOnConfirm: false

									},

									function(isConfirm){

											if(isConfirm){
												window.location = localStorage.getItem("rutaActual");
											}

								});

							</script>';

					}

			}else{

				echo '<script> 

					swal({

							title: "¡ERROR!",
							text: "Error al ingresar al sistema, no se permiten caracteres especiales",
							type: "error",
							confirmButtonText: "Cerrar",
							closeOnConfirm: false

						},

				 		function(isConfirm){

								if(isConfirm){
									history.back();
								}

					});

				</script>';

			}

		}

	}

	/*=========================================
	=            OLVIDO CONTRASEÑA            =
	=========================================*/
	
	public function ctrOlvidoPassword(){

		if (isset($_POST["passEmail"])) {

			if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["passEmail"])) {
				
				/*====================================================
				=            GENERAR CONTRASEÑA ALEATORIA            =
				====================================================*/

				function generarPassword($longitud){

					$key = "";
					$pattern = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

					$max = strlen($pattern)-1;

					for($i = 0; $i < $longitud; $i++){

						$key .= $pattern{mt_rand(0,$max)};

					}

					return $key;

				}

				$nuevaPassword = generarPassword(11);
				
				$encriptar = crypt($nuevaPassword, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$tabla = "usuarios";

				$item1 = "email";
				$valor1 = $_POST["passEmail"];

				$respuesta1 = ModeloUsuarios::mdlMostrarUsuario($tabla, $item1, $valor1);

				if ($respuesta1) {

					$id = $respuesta1["id"];
					$item2 = "password";
					$valor2 = $encriptar;

					$respuesta2 = ModeloUsuarios::mdlActualizarUsuario($tabla, $id, $item2, $valor2);

					if ($respuesta2 == "ok") {

						/*=====================================
						=        CAMBIO DE CONTRASEÑA         =
						=====================================*/

						date_default_timezone_set("America/Santiago");

						$url = Ruta::ctrRuta();

						$mail = new PHPMailer;

						$mail->CharSet = 'UTF-8';

						$mail->isMail();

						$mail->setFrom('log@kaorisushi.cl', 'Kaori Sushi');

						$mail->addReplyTo('log@kaorisushi.cl', 'Kaori Sushi');

						$mail->Subject = "Solicitud de nueva contraseña - KaoriSushi";

						$mail->addAddress($_POST["passEmail"]);

						$mail->msgHTML('<div style="width: 100%; background: #eee; position: relative; font-family: sans-serif; padding-bottom: 40px;">
		
										<center>
											
											<img style="padding: 20px; width: 10%;" src="http://www.kaorisushi.cl/images/templatemo_logo.png">

										</center>

										<div style="position: relative; margin: auto; width: 600px; background: white; padding: 20px">

											<center>
											
											<img style="padding: 20px; width: 15%" src="http://tutorialesatualcance.com/tienda/icon-pass.png">

											<h3 style="font-weight: 100; color: #999">SOLICITUD DE NUEVA CONTRASEÑA</h3>

											<hr style="border: 1px solid #ccc; width: 80%">

											<h4 style="font-weight: 100; color: #999; padding: 0 20px"><strong>Su nueva contraseña: </strong>'.$nuevaPassword.'</h4>

											<a href="'.$url.'" target="_blank" style="text-decoration: none">
												
												<div style="line-height: 60px; background: #0aa; width: 60%; color: white">Ingrese nuevamente al sitio</div>

											</a>

											<br>

											<hr style="border: 1px solid #ccc; width: 80%">

											<h5 style="font-weight: 100; color: #999">Si no se inscribió en esta cuenta, puede ignorar este correo electrónico y la cuenta se eliminará</h5>

											</center>

										</div>

										

									</div>');

						$envio = $mail->Send();

						if (!$envio) {

							echo '<script> 

									swal({

											title: "¡ERROR!",
											text: "Ocurrio un problema enviando el cambio de contraseña a '.$_POST["passEmail"].$mail->ErrorInfo.'",
											type: "error",
											confirmButtonText: "Cerrar",
											closeOnConfirm: false

										},

										function(isConfirm){

												if(isConfirm){
													history.back();
												}

									});

								</script>';
							
						}else{

							echo '<script> 

								swal({

										title: "Cambio de contraseña realizado",
										text: "Revise su bandeja de entrada (o la carpeta de SPAM) de su correo electrónico '.$_POST["passEmail"].' para verificar su nueva contraseña",
										type: "success",
										confirmButtonText: "Cerrar",
										closeOnConfirm: false

									},

									function(isConfirm){

											if(isConfirm){
												history.back();
											}

								});

							</script>';

						}

					}

				}else{

					echo '<script> 

						swal({

								title: "¡ERROR!",
								text: "El correo electrónico no existe en el sistema",
								type: "error",
								confirmButtonText: "Cerrar",
								closeOnConfirm: false

							},

					 		function(isConfirm){

									if(isConfirm){
										history.back();
									}

						});

					</script>';


				}

			}else{

				echo '<script> 

					swal({

							title: "¡ERROR!",
							text: "Error al enviar el correo electrónico, puede estar mal escrito",
							type: "error",
							confirmButtonText: "Cerrar",
							closeOnConfirm: false

						},

				 		function(isConfirm){

								if(isConfirm){
									history.back();
								}

					});

				</script>';

			}

		}

	}
	
}