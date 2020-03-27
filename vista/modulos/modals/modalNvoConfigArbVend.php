<div class="modal fade" id="m_modal_nvoConfigArbVen" tabindex="-1" role="dialog" aria-labelledby="configuracionesModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" style="width: 50rem;" role="document">
		<div class="modal-content">
		<form id="configuracionesModal">
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
				<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true">
					<div class="form-group row">
						<div class="col-lg-12">
							<input type="text" disabled class="form-control form-control-sm m-input" name="dscTrabModConfArbVen" style="text-align: center;" id="dscTrabModConfArbVen">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-1">
							<label>Año</label>
						</div>
						<div class="col-lg-2">
							<select class="form-control form-control-sm m-input  m-select2 m-select2-general" id="anioConfTraArbVen" class="anioConfTraArbVen" style="width: 100%">
								<option  disabled value="todos">Seleccione</option>
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
								<option  disabled value="todos">Seleccione</option>
								<option value="15D">15D</option>
								<option value="30D">30D</option>
							</select>
						</div>
						<div class="col-lg-1">
							<label>Periodo</label>
						</div>
						<div class="col-lg-3">
							<select class="form-control form-control-sm m-input m-select2 m-select2-general" style="width: 100%" name="periodoConfTraArbVen" id="periodoConfTraArbVen"></select>
						</div>
					</div>
					<hr>
					<div class="form-group row">
						<div class="col-lg-2">
							<label>Grupo</label>
						</div>
						<div class="col-lg-3">
							<div class="input-group m-input-group">
								<input type="text" class="form-control form-control-sm m-input" name="grupoModTraArbVen" disabled="" id="grupoModTraArbVen" onchange="nombreGrupoVenta(this.value,'dscGrupoModConfArbVen');">
								<div class="input-group-append">
									<span data-toggle="modal" data-target="#m_modal_Grupo">
										<button type="button" class="btn btn-sm btnGuardarKqPst" data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Buscar grupo" id="btnGrupoModArbVen">
											<i class="fa fa-search">
											</i>
										</button>
									</span>
								</div>
							</div>
						</div>
						<div class="col-lg-7">
							<input type="text" disabled class="form-control form-control-sm m-input" name="dscGrupoModConfArbVen" id="dscGrupoModConfArbVen">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-2">
							<label>Comisionista</label>
						</div>
						<div class="col-lg-3">
							<div class="input-group m-input-group">
								<input type="text" class="form-control form-control-sm m-input" name="comisionistaModArbVen" disabled="" id="comisionistaModArbVen" onchange="nombreComisionista(this.value,'dscComisionistaArbVen');">
								<div class="input-group-append">
									<span data-toggle="modal" data-target="#m_modal_comisionista">
										<button type="button" class="btn btn-sm btnGuardarKqPst" data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Buscar grupo" id="btnComModArbVen">
											<i class="fa fa-search">
											</i>
										</button>
									</span>
								</div>
							</div>
						</div>
						<div class="col-lg-7">
							<input type="text" disabled class="form-control form-control-sm m-input" name="dscComisionistaArbVen" id="dscComisionistaArbVen">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-2">
							<label>Supervisor</label>
						</div>
						<div class="col-lg-3">
							<div class="input-group m-input-group">
								<input type="text" class="form-control form-control-sm m-input" name="SupervisorModArbVen" disabled="" id="SupervisorModArbVen" onchange="nombreTrabajador(this.value,'dscSpervisorArbVen');">
								<div class="input-group-append">
									<span data-toggle="modal" data-target="#m_modal_4">
										<button type="button" class="btn btn-sm btnGuardarKqPst" data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Buscar grupo" onclick="creaTablaVendedor('cobrador');">
											<i class="fa fa-search">
											</i>
										</button>
									</span>
								</div>
							</div>
						</div>
						<div class="col-lg-7">
							<input type="text" disabled class="form-control form-control-sm m-input" name="dscSpervisorArbVen" id="dscSpervisorArbVen">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-2">
							<label>Jefe de ventas</label>
						</div>
						<div class="col-lg-3">
							<div class="input-group m-input-group">
								<input type="text" class="form-control form-control-sm m-input" name="jefeVentaModArbVen" disabled="" id="jefeVentaModArbVen" onchange="nombreTrabajador(this.value,'dscJefeVentaModArbVen');">
								<div class="input-group-append">
									<span data-toggle="modal" data-target="#m_modal_4">
										<button type="button" class="btn btn-sm btnGuardarKqPst" data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Buscar grupo" onclick="creaTablaVendedor('cobrador');">
											<i class="fa fa-search">
											</i>
										</button>
									</span>
								</div>
							</div>
						</div>
						<div class="col-lg-7">
							<input type="text" disabled class="form-control form-control-sm m-input" name="dscJefeVentaModArbVen" id="dscJefeVentaModArbVen">
						</div>
					</div>
				</div>
			</div>
			<input type="hidden" id="flgJefeModArbVen" name="flgJefeModArbVen">
			<input type="hidden" id="flgSupModArbVen" name="flgSupModArbVen">
			<input type="hidden" id="entrada" name="entrada">
			<div class="modal-footer">
				<div class="row">
					<div class="col-lg-5">
						<button type="button" class="btn btn-sm btnGuardarKqPst" title="Guardar">Aceptar</button>	
					</div>
					<div class="col-lg-2">
						<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" title="Cerrar">Cancelar</button>
					</div>
				</div>
			</div>
		</form>
		</div>
	</div>
</div>