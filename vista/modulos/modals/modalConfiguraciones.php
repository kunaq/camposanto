
<div class="modal fade" id="m_modal_configuraciones" tabindex="-1" role="dialog" aria-labelledby="configuracionesModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<form id="configuraciones">
			<div class="modal-header">
				<h5 class="modal-title" id="configuracionesModalLabel">
					Configuraciones
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						&times;
					</span>
				</button>
			</div>
			<div class="modal-body" >
				<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="490">
					<div class="form-group row">
						<div class="col-lg-4">
							<label>Elija un avatar:</label>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-3">
							<span class="nav__link">
								<img src="vista/img/user_m_1.png" style="width: 5rem;" id="user_m_1" class="rounded-circle" alt=""/>
							</span>
						</div>
						<div class="col-md-3">
							<span class="m-topbar__userpic">
								<img src="vista/img/user_m_2.png" style="width: 5rem;" id="user_m_2" class="rounded-circle  user-pick" alt=""/>
							</span>
						</div>
						<div class="col-md-3">
							<span class="m-topbar__userpic">
								<img src="vista/img/user_m_3.png" style="width: 5rem;" id="user_m_3" class="rounded-circle" alt=""/>
							</span>
						</div>
						<div class="col-md-3">
							<span class="m-topbar__userpic">
								<img src="vista/img/user_m_4.png" style="width: 5rem;" id="user_m_4" class="rounded-circle" alt=""/>
							</span>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-md-3">
							<span class="nav__link">
								<img src="vista/img/user_h_1.png" style="width: 5rem;" id="user_h_1" class="rounded-circle" alt=""/>
							</span>
						</div>
						<div class="col-md-3">
							<span class="m-topbar__userpic">
								<img src="vista/img/user_h_2.png"style="width: 5rem;" id="user_h_2" class="rounded-circle" alt=""/>
							</span>
						</div>
						<div class="col-md-3" style="margin-right: -10px">
							<span class="m-topbar__userpic">
								<img src="vista/img/user_h_3.png"style="width: 5rem;" id="user_h_3" class="rounded-circle" alt=""/>
							</span>
						</div>
						<div class="col-md-3" style="padding-left: 0;text-align: center;">
							<span class="m-topbar__userpic">
								<a href="#" class="btn btn-metal m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill m-btn--air"  data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Añadir imagen">
									<i class="fa fa-plus"></i>
								</a>
							</span>
						</div>
					</div>
					<hr>
					<div class="form-group row" style="margin-top: .5rem">
						<div class="col-lg-6">
							<label>Elija una combinación de colores:</label>
						</div>
						<div class="col-md-1">
							<span class="m-badge m-badge--success"></span>
						</div>
						<div class="col-md-1">
							<span class="m-badge m-badge--danger"></span>
						</div>
						<div class="col-md-1">
							<span class="m-badge m-badge--info"></span>
						</div>
						<div class="col-md-1">
							<span class="m-badge m-badge--warning user-pick"></span>
						</div>
						<div class="col-md-1">
							<span class="m-badge m-badge--metal"></span>
						</div>
					</div>
					<hr>
					<div class="form-group row">
						<div class="col-md-4">
							<label>Cambiar contraseña</label>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-12 form-group m-form__group">
							<div class="input-group m-input-icon m-input-icon--left">
								<input class="form-control m-input" type="password" placeholder="Contraseña actual" id="password_actual" name="password_actual" style="background-color: #fff; color: #000;" required autofocus>
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
					<div class="form-group row">
						<div class="col-lg-12 form-group m-form__group">
							<div class="input-group m-input-icon m-input-icon--left">
								<input class="form-control m-input" type="password" placeholder="Nueva contraseña" id="cambia_password" name="cambia_password" style="background-color: #fff; color: #000;" required autofocus>
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
					<div class="form-group row">
						<div class="col-lg-12 form-group m-form__group">
							<div class="input-group m-input-icon m-input-icon--left">
								<input class="form-control m-input" type="password" placeholder="Repita la contraseña" id="repetir_password" name="repetir_password" style="background-color: #fff; color: #000;" required autofocus>
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
				</div>
			</div>
			<div class="modal-footer">
				<div class="form-group row">
					<div class="col-md-12">
						<p class="pull-right">
							<button type="button" class="btn btn-metal">
								Guardar cambios
							</button>
						</p>
					</div>
				</div>
			</div>
		</form>
		</div>
	</div>
</div>