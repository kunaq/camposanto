<div class="m-grid m-grid--hor m-grid--root m-page">
	<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-1" id="m_login" style="background-image: url('vista/img/fondo3-min.jpg'); background-position: center center; background-repeat: no-repeat; background-attachment: fixed;">
		<div class="col-lg-12">
			<div class="m-grid__item m-grid__item--fluid m-login__wrapper">
				<div class="m-login__container" >		
					<div class="m-login__signin" style="background-color: #fff; padding: 20px;">
						<div class="m-login__logo" style="margin-bottom: 20px; ">
							<img src="vista/img/Logo_SG5.png" style="background-color: white; height: 100px; border-radius: 60px; margin-bottom: 10px;">
						</div>	
						<div class="m-login__head" style="padding: 0 20px 20px 20px;">
							<h3 class="m-login__title" style="color: #666;">
								Sistema  de Gestión<br> de Camposanto
							</h3>
						</div>
						<form class="m-form">
							<!-- SELECCIONAR EMPRESA -->
							<div class="form-group m-form__group seleccioneEmpresa" style="padding-top: 0;">
								<select class="form-control m-input" required id="empresa" placeholder="Seleccionar Empresa">
									<option value="0">Seleccionar Empresa</option>
									<option value="1">Empresa 1</option>
									<option value="2">Empresa 2</option>
									<option value="3">Empresa 3</option>
								</select>
							</div>	
						<!-- ENTRADA PARA EL USUARIO -->
							<div class="form-group m-input-icon m-input-icon--left">
								<input class="form-control m-input" type="text" placeholder="Usuario" name="user" style="background-color: #fff; color: #000;" autofocus id="user" required>
								<span class="m-input-icon__icon m-input-icon__icon--left">
									<span>
										<i class="fa fa-user"></i>
									</span>
								</span>
							</div>
							<!-- ENTRADA PARA LA CONTRASEÑA -->
							<div class="row">
								<div class="col-lg-12 form-group m-form__group">
									<div class="input-group m-input-icon m-input-icon--left">
										<input class="form-control m-input" type="password" placeholder="Contraseña" id="password" name="password" style="background-color: #fff; color: #000;" required autofocus>
										<span class="m-input-icon__icon m-input-icon__icon--left">
											<span>
												<i class="fa fa-lock"></i>
											</span>
										</span>
										<div class=" input-group-append">
												<button id="show_password" class="btn btn-secondary m-btn m-btn--custom m-btn--label-metal btn-sm input-group-text" type="button" onclick="mostrarPassword()">
													<span class="fa fa-eye-slash icon"></span>
												</button>
										</div>
									</div>
								</div>
							</div>
							<br>				
							<!-- ENTRADA PARA EL CAPTCHA -->
							<div class="form-group m-form__group" style="padding-top: 0;">
								<?php
								echo '<img src="'.$_SESSION['captcha']['image_src'].'" alt="CAPTCHA code" style="display:block; margin: 0 auto;">';
								?>
							</div>
							<!-- ENTRADA PARA EL TEXTO DEL CAPTCHA -->
							<div class="row">
								<div class="col-lg-10 offset-lg-1">
									<div class="form-group m-form__group"  style="padding-top: 0;">
										<input class="form-control m-input" required type="text" placeholder="Digite el texto de la imagen" name="txtcaptcha" id="txtcaptcha" data-toggle="tooltip" data-placement="right" title="Sensible a mayúsculas y minúsculas." oninput="verificacaptcha(this.value,'<?php echo $_SESSION['captcha']['code'];?>');" style="background-color: #fff; color: #000;" autofocus>
									</div>
								</div>
								<div class="col-lg-1" id="vercaptcha">
									<i class="fa fa-check" hidden id="bienCaptcha"></i>
									<i class="fa fa-close" hidden id="malCaptcha"></i>
									<input type="hidden" id="bien">
								</div>
							</div>
							<!-- BOTON INGRESAR -->
							<br>
							<div class="m-login__form-action">
								<div class="row">
									<div class="col m--align-center">
										<button type="button" class="btn btn-danger btnIngresar2">
											Ingresar
										</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end::Page Snippets -->
</body>
<!-- end::Body -->
</html>
