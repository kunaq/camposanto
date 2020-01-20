<div class="m-content" style="width: calc(100%);">
	<!--Begin::Main Portlet-->
	<div class="m-portlet m-portlet--space">
		<!--begin: Portlet Head-->
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">Resolución de Contrato</h3>
				</div>
			</div>
		</div>
		<div class="m-portlet__body">
			<div class="row">
				<div class="col-lg-12">
					<fieldset class="fieldFormHorizontal">
						<legend>&nbsp;</legend>
						<div class="col-lg-12">
							<div class="row form-group">
								<div class="col-lg-3">
									<label>Localidad</label>
									<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="localidadResolucion" id="localidadResolucion" onchange="">
										<?php
											$tabla = "vtama_localidad";
											$item1 = "cod_localidad";
											$item2 = "dsc_localidad";
											$prueba = controladorEmpresa::
											ctrSelects($tabla,$item1,$item2);
										?>
									</select>
								</div>
								<div class="col-lg-3">
									<label>Contrato</label>
									<div class="input-group">
										<input type="text" class="form-control form-control-sm m-input" name="numConResolucion" id="numConResolucion">
										<div class="input-group-append">
											<button class="btn btnGuardarKqPst btn-sm" type="button" data-toggle="m-tooltip" data-container="body" data-placement="top" title="" data-original-title="Buscar contrato" onclick="buscaCtto();">
												<i class="la la-search"></i>
											</button>
										</div>
									</div>
								</div>
								<div class="col-lg-1">
									<label>Servicio</label>
									<input type="text" class="form-control form-control-sm m-input" name="numSerResolucion" id="numSerResolucion">
								</div>
								<div class="col-lg-4">
									<label>Programa</label>
									<input type="text" class="form-control form-control-sm m-input" name="dscProgResolucion" id="dscProgResolucion" disabled>
								</div>
								<div class="col-lg-1">
									<label>&nbsp;</label>
									<input type="text" class="form-control form-control-sm m-input" name="tipoProgResolucion" id="tipoProgResolucion" disabled>
								</div>
							</div>
						</div>
					</fieldset>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<fieldset class="fieldFormHorizontal">
						<legend class="tittle-box">Resolución</legend>
						<div class="col-lg-12">
							<div class="row form-group">
								<div class="col-lg-6">
									<label>Fecha</label>
									<div class="input-group date">
										<input type="text" class="form-control form-control-sm m-input" readonly="" id="m_datepicker_4_3" onchange="setPeriod()">
										<div class="input-group-append">
											<span class="input-group-text">
												<i class="la la-calendar-check-o"></i>
											</span>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<label>Tipo Cambio</label>
									<input type="text" class="form-control form-control-sm m-input" id="tCambioResolucion" disabled >
								</div>
								<div class="col-lg-12">
									<label>Tipo</label>
									<select class="form-contro form-control-sm m-input custom-select custom-select-danger" name="tipoResolucion" id="tipoResolucion" onchange="">
										<option value="">Seleccione</option>
										<?php
											$tabla = "vtama_tipo_resolucion";
											$item1 = "cod_tipo_resolucion";
											$item2 = "dsc_tipo_resolucion";
											$prueba = controladorEmpresa::
											ctrSelects($tabla,$item1,$item2);
										?>
									</select>
								</div>
								<div class="col-lg-12">
									<label>Motivo</label>
									<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="motivoResolucion" id="motivoResolucion" onchange="">
										<option value="">Seleccione</option>
										<?php
											$tabla = "vtama_motivo_resolucion";
											$item1 = "cod_motivo_resolucion";
											$item2 = "dsc_motivo_resolucion";
											$prueba = controladorEmpresa::
											ctrSelects($tabla,$item1,$item2);
										?>
									</select>
								</div>
								<div class="col-lg-12">
									<label>Detalle</label>
									<textarea class="form-control form-control-sm m-input" id="detalleResolucion" rows="2"></textarea>
								</div>
							</div>
						</div>
					</fieldset>
				</div>
				<div class="col-lg-6">
					<fieldset class="fieldFormHorizontal">
						<legend class="tittle-box">Conformación</legend>
						<div class="col-lg-12">
							<div class="row form-group">
								<div class="col-lg-12">
									<table class="table table-resposive myTableConformacion">
										<thead>
											<th>N°</th>
											<th>Tipo Servicio</th>
											<th>Saldo</th>
										</thead>
										<tbody>
											<tr>
												<td>0</td>
												<td>DERECHO DE USO</td>
												<td>3.282,00</td>
											</tr>
										</tbody>
										<tfoot>
											<tr>
												<td></td>
												<td style="text-align: right;">Total:&nbsp;&nbsp;</td>
												<td>3.282,00</td>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
					</fieldset>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<br>
					<ul class="nav nav-tabs  m-tabs-line m-tabs-line--danger" role="tablist">
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_3_1" role="tab">
								Datos Generales
							</a>
						</li>
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_3_2" role="tab">
								Estado del Contrato
							</a>
						</li>
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_3_3" role="tab">
								Comisiones
							</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="m_tabs_3_1" role="tabpanel">
							<div class="row">
								<div class="col-lg-6">
									<fieldset class="fieldFormHorizontal">
										<legend>&nbsp;</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-12">
													<label>Tipo Necesidad</label>
													<input type="text" class="form-control form-control-sm m-input" name="tipoNecResolucion" id="tipoNecResolucion" disabled>
												</div>
												<div class="col-lg-3">
													<label>Cliente</label>
													<input type="text" class="form-control form-control-sm m-input" name="codCliResolucion" id="codCliResolucion" disabled>
												</div>
												<div class="col-lg-9">
													<label>&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" name="nombreCliResolucion" id="nombreCliResolucion" disabled>
												</div>
												<div class="col-lg-4">
													<label>Tipo Documento</label>
													<input type="text" class="form-control form-control-sm m-input" name="tipoDocResolucion" id="tipoDocResolucion" disabled>
												</div>
												<div class="col-lg-4">
													<label>&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" name="numDocResolucion" id="numDocResolucion" disabled>
												</div>
												<div class="col-lg-4">
													<label>Telefono</label>
													<input type="text" class="form-control form-control-sm m-input" name="telCliResolucion" id="telCliResolucion" disabled>
												</div>
												<div class="col-lg-12">
													<label>Dirección</label>
													<input type="text" class="form-control form-control-sm m-input" name="dirCliResolucion" id="dirCliResolucion" disabled>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
								<div class="col-lg-6">
									<fieldset class="fieldFormHorizontal">
										<legend>&nbsp;</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-4">
													<label>J. Ventas</label>
													<input type="text" class="form-control form-control-sm m-input" name="codJVenResolucion" id="codJVenResolucion" disabled>
												</div>
												<div class="col-lg-8">
													<label>&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" name="dscJVenResolucion1s" id="dscJVenResolucion1s" disabled>
												</div>
												<div class="col-lg-4">
													<label>Vendedor</label>
													<input type="text" class="form-control form-control-sm m-input" name="codVenResolucion" id="codVenResolucion" disabled>
												</div>
												<div class="col-lg-8">
													<label>&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" name="dscVenResolucion" id="dscVenResolucion" disabled>
												</div>
												<div class="col-lg-4">
													<label>Grupo</label>
													<input type="text" class="form-control form-control-sm m-input" name="codGruResolucion" id="codGruResolucion" disabled>
												</div>
												<div class="col-lg-8">
													<label>&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" name="dscGruResolucion" id="dscGruResolucion" disabled>
												</div>
												<div class="col-lg-4">
													<label>Supervisor</label>
													<input type="text" class="form-control form-control-sm m-input" name="codSupResolucion" id="codSupResolucion" disabled>
												</div>
												<div class="col-lg-8">
													<label>&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" name="dscSupResolucion" id="dscSupResolucion" disabled>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="m_tabs_3_2" role="tabpanel">
							<div class="row">
								<div class="col-lg-12">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Cuotas</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-6">
													<div class="row">
														<div class="col-lg-12">
															<label>Regulares</label>
															<br>
														</div>
														<div class="col-lg-4">
															<label>Total</label>
															<input type="text" class="form-control form-control-sm m-input" id="cuoTotReg" disabled>
														</div>
														<div class="col-lg-4">
															<label>Cancel.</label>
															<input type="text" class="form-control form-control-sm m-input" id="cuoCanReg" disabled>
														</div>
														<div class="col-lg-4">
															<label>Pendi.</label>
															<input type="text" class="form-control form-control-sm m-input" id="cuoPenReg" disabled>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="row">
														<div class="col-lg-12">
															<label>FOMA</label>
															<br>
														</div>
														<div class="col-lg-4">
															<label>Total</label>
															<input type="text" class="form-control form-control-sm m-input" id="cuoTotFOMA" disabled>
														</div>
														<div class="col-lg-4">
															<label>Cancel.</label>
															<input type="text" class="form-control form-control-sm m-input" id="cuoCanFOMA" disabled>
														</div>
														<div class="col-lg-4">
															<label>Pendi.</label>
															<input type="text" class="form-control form-control-sm m-input" id="cuoPenFOMA" disabled>
														</div>
													</div>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Saldos</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-12">
													<table class="myTableEstado">
														<thead>
															<th class="static">&nbsp;</th>
															<th class="first-col">Subtotal</th>
															<th>Interés</th>
															<th>I.G.V.</th>
															<th>Total</th>
															<th>Emitido</th>
															<th>Cancelado</th>
															<th>Saldo</th>
														</thead>
														<tbody>
															<tr>
																<th scope="row" class="static">CUOI</th>
																<td class="first-col">1.768,00</td>
																<td>0,00</td>
																<td>0,00</td>
																<td>1.768,00</td>
																<td>0,00</td>
																<td>1.768,00</td>
																<td>0,00</td>
															</tr>
															<tr>
																<th scope="row" class="static">Financiado</th>
																<td class="first-col">3.282,00</td>
																<td>16,20</td>
																<td>0,00</td>
																<td>3.298,00</td>
																<td>0,00</td>
																<td>0,00</td>
																<td>3.298,00</td>
															</tr>
															<tr>
																<th scope="row" class="static">FOMA</th>
																<td class="first-col">300,00</td>
																<td>0,00</td>
																<td>0,00</td>
																<td>300,00</td>
																<td>0,00</td>
																<td>0,00</td>
																<td>300,00</td>
															</tr>
														</tbody>
													</table>
												</div>
												<div class="col-lg-12">&nbsp;</div>
												<div class="col-lg-6 input-group">
													<label>Estado&nbsp;&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" id="estadoConResolucion">
												</div>
												<div class="col-lg-6 input-group">
													<label>Moneda&nbsp;&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" id="monedaConResolucion">
												</div>
											</div>
										</div>
									</fieldset>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="m_tabs_3_3" role="tabpanel">
							<div class="row">
								<div class="col-lg-12">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">&nbsp;</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-2">
													<label>Año</label>
													<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="annoPerResolucion" id="annoPerResolucion" onchange="buscaPeriodo();">
														<option value="">Selecciona</option>
														<?php
															$prueba = controladorEmpresa::
															ctrAnnoPeriodo();
														?>
													</select>
												</div>
												<div class="col-lg-2">
													<label>Tipo</label>
													<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="tipoPerResolucion" id="tipoPerResolucion" onchange="buscaPeriodo();">
														<option value="">Selecciona</option>
														<option value="15D">15D</option>
														<option value="30D">30D</option>
													</select>
												</div>
												<div class="col-lg-2">
													<label>Periodo</label>
													<select class="form-control form-control-sm m-input custom-select custom-select-danger" name="perResolucion" id="perResolucion">
													</select>
												</div>
												<div class="col-lg-2">
													<label>Saldo Insoluto</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-2">
													<label>Porcent.</label>
													<input type="text" class="form-control form-control-sm m-input" id="" disabled>
												</div>
												<div class="col-lg-2 check-comisiones">
													<label class="m-checkbox">
														Afecta Comisiones
													</label>
													<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
														<label>
															<input type="checkbox" id="check-comision" disabled name="">
															<span class="jurid"></span>
														</label>
													</span>											
												</div>
											</div>
										</div>
									</fieldset>
								</div>
								<div class="col-lg-12">
									<fieldset class="fieldFormHorizontal">
										<legend class="tittle-box">Afectaciones</legend>
										<div class="col-lg-12">
											<div class="row form-group">
												<div class="col-lg-4">
													<label>Vendedor</label>
													<div class="input-group">
		  												<input type="text" class="form-control form-control-sm m-input" id="codVenComResolucion" disabled>
		  												<div class="input-group-append">
		   										 			<button class="btn btnGuardarKqPst btn-sm btn-outline-secondary" type="button"><i class="fa fa-plus"></i></button>
		  												</div>
													</div>
												</div>
												<div class="col-lg-8">
													<label>&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" id="dscVenComResolucion" disabled>
												</div>
												<div class="col-lg-4">
													<label>Supervisor</label>
													<div class="input-group">
		  												<input type="text" class="form-control form-control-sm m-input" id="codSupComResolucion" disabled>
		  												<div class="input-group-append">
		   										 			<button class="btn btnGuardarKqPst btn-sm btn-outline-secondary" type="button"><i class="fa fa-plus"></i></button>
		  												</div>
													</div>
												</div>
												<div class="col-lg-8">
													<label>&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" id="dscSupComResolucion" disabled>
												</div>
												<div class="col-lg-4">
													<label>Grupo</label>
													<div class="input-group">
		  												<input type="text" class="form-control form-control-sm m-input" id="codGruComResolucion" disabled>
		  												<div class="input-group-append">
		   										 			<button class="btn btnGuardarKqPst btn-sm btn-outline-secondary" type="button"><i class="fa fa-plus"></i></button>
		  												</div>
													</div>
												</div>
												<div class="col-lg-8">
													<label>&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" id="dscGruComResolucion" disabled>
												</div>
												<div class="col-lg-4">
													<label>Jefe de Ventas</label>
													<div class="input-group">
		  												<input type="text" class="form-control form-control-sm m-input" id="codJVenComResolucion" disabled>
		  												<div class="input-group-append">
		   										 			<button class="btn btnGuardarKqPst btn-sm btn-outline-secondary" type="button"><i class="fa fa-plus"></i></button>
		  												</div>
													</div>
												</div>
												<div class="col-lg-8">
													<label>&nbsp;</label>
													<input type="text" class="form-control form-control-sm m-input" id="dscJVenCoResolucion" disabled>
												</div>
											</div>
										</div>
									</fieldset>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php

include "modals/modalTablaClientes.php";
include "modals/modalEditContrato.php";
include "modals/modalResolucionContrato.php";
include "modals/modalPrintContrato.php";

 ?>