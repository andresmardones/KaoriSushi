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
				
					$datos = array("nombre" => $_POST["regUsuario"],
					 			   "password" => $encriptar,
								   "email" => $_POST["regEmail"],
								   "modo" => "directo",
								   "verificacion" => 1); 

					$tabla = "usuarios";

					$respuesta = ModeloUsuarios::mdlRegistroUsuario($tabla, $datos);

					if($respuesta == "ok"){

						/*=====================================
						=       VERIFICACION DE CORREO        =
						=====================================*/

						date_default_timezone_set("America/Santiago");

						$mail = new PHPMailer;

						$mail->isMail();

						$mail->setFrom('log@kaorisushi.cl', 'Kaori Sushi');

						$mail->addReplyTo('log@kaorisushi.cl', 'Kaori Sushi');

						$mail->Subject = "Por favor verifique su dirección de correo electrónico";

						$mail->addAddress($_POST["regEmail"]);

						$mail->msgHTML('');

						echo '<script> 

								swal({

										title: "Se ha registrado correctamente",
										text: "Revise su bandeja de entrada (o su carpeta de SPAM) de su correo electrónico '.$_POST["regEmail"].' para verificar su cuenta",
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

}