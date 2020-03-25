<div class="modal fade" id="m_modal_nvoConfigArbVen" tabindex="-1" role="dialog" aria-labelledby="configuracionesModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 50rem;" role="document">
		<div class="modal-content">
		<form id="configuraciones">
			<div class="modal-header">
				<h5 class="modal-title" id="configuracionesModalLabel">
					Configuración árbol vendedor
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
						<div class="col-lg-12">
							<input type="text" disabled class="form-control form-control-sm m-input" name="dscTrabModConfArbVen" id="dscTrabModConfArbVen">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-1">
							<label>Año</label>
						</div>
						<div class="col-lg-2">
							<select class="form-control form-control-sm m-input" id="anioConfTraArbVen" class="anioConfTraArbVen">
								<?php
								$prueba = controladorEmpresa::ctrAnnoPeriodo();
							  ?>
							 </select>
						</div>
						<div class="col-lg-2">
							<label>Tipo Periodo</label>
						</div>
						<div class="col-lg-3">
							<select class="form-control form-control-sm m-input m-select2 m-select2-general" style="width: 100%" name="tipoPerConfTraArbVen" id="tipoPerConfTraArbVen">
								<option selected="selected" disabled value="todos">Seleccione</option>
								<option value="15D">15D</option>
								<option value="30D">30D</option>
							</select>
						</div>
						<div class="col-lg-1">
							<label>Periodo</label>
						</div>
						<div class="col-lg-3">
							<select class="form-control form-control-sm m-input m-select2 m-select2-general" style="width: 100%" name="periodoConfTraArbVen" id="periodoConfTraArbVen">
								<option selected="selected" disabled value="todos">Seleccione</option>
							</select>
						</div>
					</div>
					<hr>
					<div class="form-group row">
						<div class="col-lg-1">
							<label>Grupo</label>
						</div>
						<div class="col-lg-2">
							<select class="form-control form-control-sm m-input" id="grupoConfTraArbVen" class="grupoConfTraArbVen">
								<?php
									//$prueba = controladorArbolVen::ctrNombreTrabajador();
								  ?>
							 </select>
						</div>
						<div class="col-lg-9">
							<input type="text" disabled class="form-control form-control-sm m-input" name="dscGrupoModConfArbVen" id="dscGrupoModConfArbVen">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-1">
							<label>Comisionista</label>
						</div>
						<div class="col-lg-2">
							<select class="form-control form-control-sm m-input" id="grupoConfTraArbVen" class="grupoConfTraArbVen">
								<?php
									//$prueba = controladorArbolVen::ctrNombreTrabajador();
								  ?>
							 </select>
						</div>
						<div class="col-lg-9">
							<input type="text" disabled class="form-control form-control-sm m-input" name="dscGrupoModConfArbVen" id="dscGrupoModConfArbVen">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-1">
							<label>Supervisor</label>
						</div>
						<div class="col-lg-2">
							<select class="form-control form-control-sm m-input" id="grupoConfTraArbVen" class="grupoConfTraArbVen">
								<?php
									//$prueba = controladorArbolVen::ctrNombreTrabajador();
								  ?>
							 </select>
						</div>
						<div class="col-lg-9">
							<input type="text" disabled class="form-control form-control-sm m-input" name="dscGrupoModConfArbVen" id="dscGrupoModConfArbVen">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-1">
							<label>Jefe de ventas</label>
						</div>
						<div class="col-lg-2">
							<select class="form-control form-control-sm m-input" id="grupoConfTraArbVen" class="grupoConfTraArbVen">
								<?php
									//$prueba = controladorArbolVen::ctrNombreTrabajador();
								  ?>
							 </select>
						</div>
						<div class="col-lg-9">
							<input type="text" disabled class="form-control form-control-sm m-input" name="dscGrupoModConfArbVen" id="dscGrupoModConfArbVen">
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div class="form-group row">
					<div class="col-md-12">
						<p class="pull-right">
							<button type="button" class="btn btn-sm btnGuardarKqPst" title="Guardar" id="">Aceptar</button>	
							<button type="button" class="btn btn-sm btn-danger close" data-dismiss="modal" title="Cerrar" id="">Cancelar</button>
						</p>
					</div>
				</div>
			</div>
		</form>
		</div>
	</div>
</div>